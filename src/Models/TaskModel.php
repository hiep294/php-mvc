<?php

namespace MVC\Models;

use MVC\Core\Model;

class TaskModel extends Model
{
    /**
     * @var null|int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;
}
