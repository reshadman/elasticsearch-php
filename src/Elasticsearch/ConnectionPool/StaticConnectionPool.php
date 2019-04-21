<?php

declare(strict_types = 1);

namespace ElasticsearchV6\ConnectionPool;

use ElasticsearchV6\Common\Exceptions\NoNodesAvailableException;
use ElasticsearchV6\ConnectionPool\Selectors\SelectorInterface;
use ElasticsearchV6\Connections\Connection;
use ElasticsearchV6\Connections\ConnectionFactoryInterface;

class StaticConnectionPool extends AbstractConnectionPool implements ConnectionPoolInterface
{
    /**
     * @var int
     */
    private $pingTimeout    = 60;

    /**
     * @var int
     */
    private $maxPingTimeout = 3600;

    /**
     * {@inheritdoc}
     */
    public function __construct($connections, SelectorInterface $selector, ConnectionFactoryInterface $factory, $connectionPoolParams)
    {
        parent::__construct($connections, $selector, $factory, $connectionPoolParams);
        $this->scheduleCheck();
    }

    /**
     * @param bool $force
     *
     * @return Connection
     * @throws \ElasticsearchV6\Common\Exceptions\NoNodesAvailableException
     */
    public function nextConnection($force = false)
    {
        $skipped = array();

        $total = count($this->connections);
        while ($total--) {
            /** @var Connection $connection */
            $connection = $this->selector->select($this->connections);
            if ($connection->isAlive() === true) {
                return $connection;
            }

            if ($this->readyToRevive($connection) === true) {
                if ($connection->ping() === true) {
                    return $connection;
                }
            } else {
                $skipped[] = $connection;
            }
        }

        // All "alive" nodes failed, force pings on "dead" nodes
        foreach ($skipped as $connection) {
            if ($connection->ping() === true) {
                return $connection;
            }
        }

        throw new NoNodesAvailableException("No alive nodes found in your cluster");
    }

    public function scheduleCheck()
    {
        foreach ($this->connections as $connection) {
            $connection->markDead();
        }
    }

    /**
     * @param Connection $connection
     *
     * @return bool
     */
    private function readyToRevive(Connection $connection)
    {
        $timeout = min(
            $this->pingTimeout * pow(2, $connection->getPingFailures()),
            $this->maxPingTimeout
        );

        if ($connection->getLastPing() + $timeout < time()) {
            return true;
        } else {
            return false;
        }
    }
}
