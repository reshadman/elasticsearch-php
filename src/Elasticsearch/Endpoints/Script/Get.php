<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Script;

use ElasticsearchV6\Endpoints\AbstractEndpoint;
use ElasticsearchV6\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Script
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    /**
     * @throws \ElasticsearchV6\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for put'
            );
        }
        $id   = $this->id;
        $uri  = "/_scripts/$id";

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'version_type',
            'version'
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
