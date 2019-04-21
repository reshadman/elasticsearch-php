<?php

declare(strict_types = 1);

namespace ElasticsearchV6\Endpoints\Tasks;

use ElasticsearchV6\Common\Exceptions;
use ElasticsearchV6\Endpoints\AbstractEndpoint;

/**
 * Class TasksLists
 *
 * @category Elasticsearch
 * @package  ElasticsearchV6\Endpoints\Tasks
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TasksList extends AbstractEndpoint
{

    /**
     * @throws \ElasticsearchV6\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        return "/_tasks";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'node_id',
            'actions',
            'detailed',
            'parent_node',
            'parent_task',
            'wait_for_completion',
            'group_by',
            'task_id'
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
