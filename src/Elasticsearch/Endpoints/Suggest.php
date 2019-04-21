<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints;

use ElasticsearchV6\Common\Exceptions;

/**
 * Class Suggest
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Suggest extends AbstractEndpoint
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
        $index = $this->index;
        $uri   = "/_suggest";

        if (isset($index) === true) {
            $uri = "/$index/_suggest";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'preference',
            'routing',
            'source',
        );
    }

    /**
     * @return array
     * @throws \ElasticsearchV6\Common\Exceptions\RuntimeException
     */
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Suggest');
        }

        return $this->body;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
