<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Snapshot\Repository;

use ElasticsearchV6\Endpoints\AbstractEndpoint;
use ElasticsearchV6\Common\Exceptions;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Snapshot\Repository
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Delete extends AbstractEndpoint
{
    /**
     * A comma-separated list of repository names
     *
     * @var string
     */
    private $repository;

    /**
     * @param string $repository
     *
     * @return $this
     */
    public function setRepository($repository)
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;

        return $this;
    }

    /**
     * @throws \ElasticsearchV6\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Delete'
            );
        }
        $repository = $this->repository;
        $uri   = "/_snapshot/$repository";

        if (isset($repository) === true) {
            $uri = "/_snapshot/$repository";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'master_timeout',
            'timeout',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'DELETE';
    }
}
