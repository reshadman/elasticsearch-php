<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints;

use ElasticsearchV6\Common\Exceptions\InvalidArgumentException;
use ElasticsearchV6\Serializers\SerializerInterface;

/**
 * Class Bulk
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Bulk extends AbstractEndpoint implements BulkEndpointInterface
{
    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param string|array|\Traversable $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        if (empty($body)) {
            return $this;
        }

        if (is_array($body) === true || $body instanceof \Traversable) {
            foreach ($body as $item) {
                $this->body .= $this->serializer->serialize($item) . "\n";
            }
        } elseif (is_string($body)) {
            $this->body = $body;
            if (substr($body, -1) != "\n") {
                $this->body .= "\n";
            }
        } else {
            throw new InvalidArgumentException("Bulk body must be an array, traversable object or string");
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        return $this->getOptionalURI('_bulk');
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'consistency',
            'refresh',
            'replication',
            'type',
            'fields',
            'pipeline',
            '_source',
            '_source_include',
            '_source_exclude',
            'pipeline'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
