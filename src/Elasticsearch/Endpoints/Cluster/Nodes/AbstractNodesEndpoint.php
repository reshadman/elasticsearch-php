<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Cluster\Nodes;

use ElasticsearchV6\Common\Exceptions\InvalidArgumentException;
use ElasticsearchV6\Endpoints\AbstractEndpoint;

/**
 * Class AbstractNodesEndpoint
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractNodesEndpoint extends AbstractEndpoint
{
    /**
     * A comma-separated list of node IDs or names to limit the returned information;
     * use `_local` to return information from the node you're connecting to,
     * leave empty to get information from all nodes
     *
     * @var string
     */
    protected $nodeID;

    /**
     * @param string|string[] $nodeID
     *
     * @throws \ElasticsearchV6\Common\Exceptions\InvalidArgumentException
     *
     * @return $this
     */
    public function setNodeID($nodeID)
    {
        if (isset($nodeID) !== true) {
            return $this;
        }

        if (!(is_array($nodeID) === true || is_string($nodeID) === true)) {
            throw new InvalidArgumentException("invalid node_id");
        }

        if (is_array($nodeID) === true) {
            $nodeID = implode(',', $nodeID);
        }

        $this->nodeID = $nodeID;

        return $this;
    }
}
