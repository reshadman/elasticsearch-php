<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Common\Exceptions;

/**
 * NoShardAvailableException
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class NoShardAvailableException extends ServerErrorResponseException implements ElasticsearchException
{
}
