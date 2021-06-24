<?php

namespace MVC\Core;

class Model
{
    public function getProperties()
    {
        return get_object_vars($this);
    }

    public function getPropertiesNoTimeStamp()
    {
        $rs = $this->getProperties();
        unset($rs['created_at']);
        unset($rs['updated_at']);
        return $rs;
    }

    public function getPropertiesString()
    {
        return implode(',', array_keys($this->getProperties()));
    }

    public function getMyClass()
    {
        return get_class($this);
    }

    /**
     * @param array $array
     */
    public function setData($array)
    {
        foreach ($array as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function set(string $name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }

    public function get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->{$name};
        } else {
            return "";
        }
    }
}
