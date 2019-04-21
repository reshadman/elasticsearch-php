<?php

declare(strict_types = 1);

namespace ElasticsearchV6\ConnectionPool\Selectors;

/**
 * Class RandomSelector
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Connections\Selectors
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
interface SelectorInterface
{
    /**
     * Perform logic to select a single ConnectionInterface instance from the array provided
     *
     * @param \ElasticsearchV6\Connections\ConnectionInterface[] $connections an array of ConnectionInterface instances to choose from
     *
     * @return \ElasticsearchV6\Connections\ConnectionInterface
     */
    public function select($connections);
}
