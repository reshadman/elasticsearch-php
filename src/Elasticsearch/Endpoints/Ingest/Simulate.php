<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Ingest;

use ElasticsearchV6\Common\Exceptions;
use ElasticsearchV6\Endpoints\AbstractEndpoint;

/**
 * Class Simulate
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Ingest
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Simulate extends AbstractEndpoint
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
     * @throws \ElasticsearchV6\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->id) === true) {
            return "/_ingest/pipeline/{$this->id}/_simulate";
        }
        return "/_ingest/pipeline/_simulate";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'verbose',
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
