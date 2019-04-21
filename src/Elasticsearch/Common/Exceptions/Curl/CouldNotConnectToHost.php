<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Common\Exceptions\Curl;

use ElasticsearchV6\Common\Exceptions\ElasticsearchException;
use ElasticsearchV6\Common\Exceptions\TransportException;

/**
 * Class CouldNotConnectToHost
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Common\Exceptions\Curl
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class CouldNotConnectToHost extends TransportException implements ElasticsearchException
{
}
