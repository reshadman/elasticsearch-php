<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Cluster;

use ElasticsearchV6\Endpoints\AbstractEndpoint;

/**
 * RemoteInfo Health
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Cluster
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RemoteInfo extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        return "/_remote/info";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
