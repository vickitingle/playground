<?php

namespace Framework\Core;

/**
 * Class AbstractModel
 * @package Framework\Core
 * @author Vicki Tingle <vicki.tingle@gmail.com>
 */
abstract class AbstractModel
{
    /** @var array */
    protected $data = [];

    /**
     * Set data onto the model
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setData($key, $value)
    {
        return $this->data[$key] = $value;
    }

    /**
     * Retrieve data from the model
     * @param $key
     * @return mixed
     */
    public function getData($key)
    {
        return $this->data[$key];
    }
}