<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Cat;

use ElasticsearchV6\Endpoints\AbstractEndpoint;

/**
 * Class Indices
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class Indices extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_cat/indices";

        if (isset($index) === true) {
            $uri = "/_cat/indices/$index";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'bytes',
            'local',
            'master_timeout',
            'h',
            'help',
            'pri',
            'v',
            'health',
            's',
            'format',
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
