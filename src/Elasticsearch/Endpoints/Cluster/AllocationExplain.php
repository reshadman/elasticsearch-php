<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Cluster;

use ElasticsearchV6\Endpoints\AbstractEndpoint;

/**
 * Class AllocationExplain
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Cluster
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class AllocationExplain extends AbstractEndpoint
{

    /**
     * @param array $body
     *
     * @throws \ElasticsearchV6\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        return "/_cluster/allocation/explain";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'include_yes_decisions',
            'include_disk_info',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
