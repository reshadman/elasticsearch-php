<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints;

use ElasticsearchV6\Serializers\SerializerInterface;
use ElasticsearchV6\Transport;

/**
 * Interface BulkEndpointInterface
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
interface BulkEndpointInterface
{
    /**
     * Constructor
     *
     * @param SerializerInterface $serializer A serializer
     */
    public function __construct(SerializerInterface $serializer);
}
