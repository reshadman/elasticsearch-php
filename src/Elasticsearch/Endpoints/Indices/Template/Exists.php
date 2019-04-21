<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Indices\Template;

use ElasticsearchV6\Endpoints\AbstractEndpoint;
use ElasticsearchV6\Common\Exceptions;

/**
 * Class Exists
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Indices\Template
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Exists extends AbstractEndpoint
{
    /**
     * The name of the template
     *
     * @var string
     */
    private $name;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @throws \ElasticsearchV6\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for Exists'
            );
        }
        $name = $this->name;
        $uri   = "/_template/$name";

        if (isset($name) === true) {
            $uri = "/_template/$name";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'local',
            'master_timeout'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'HEAD';
    }
}
