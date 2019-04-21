<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Cat;

use ElasticsearchV6\Endpoints\AbstractEndpoint;

/**
 * Class Health
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Plugins extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $uri   = "/_cat/plugins";

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
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
