<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Common\Exceptions;

/**
 * BadMethodCallException
 *
 * Denote problems with a method call (e.g. incorrect number of arguments)
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class BadMethodCallException extends \BadMethodCallException implements ElasticsearchException
{
}
