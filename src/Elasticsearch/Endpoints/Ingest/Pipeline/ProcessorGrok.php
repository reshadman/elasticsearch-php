<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Ingest\Pipeline;

use ElasticsearchV6\Common\Exceptions;
use ElasticsearchV6\Endpoints\AbstractEndpoint;

/**
 * Class ProcessorGrok
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Ingest
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ProcessorGrok extends AbstractEndpoint
{
    /**
     * @throws \ElasticsearchV6\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        return "/_ingest/processor/grok";
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
