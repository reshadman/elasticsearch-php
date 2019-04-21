<?php

declare(strict_types = 1);
/**
 * User: zach
 * Date: 01/12/2015
 * Time: 14:34:49 pm
 */

namespace ElasticsearchV6\Endpoints\Cat;

use ElasticsearchV6\Endpoints\AbstractEndpoint;
use ElasticsearchV6\Common\Exceptions;

/**
 * Class Segments
 *
 * @category Elasticsearch
 * @package ElasticsearchV6\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class Segments extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_cat/segments";

        if (isset($index) === true) {
            $uri = "/_cat/segments/$index";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'h',
            'help',
            'v',
            's',
            'format',
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
