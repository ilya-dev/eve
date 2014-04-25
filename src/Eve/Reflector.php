<?php namespace Eve;

class Reflector extends \ReflectionClass {

    /**
     * Get all abstract methods.
     *
     * @return array
     */
    public function getAbstract()
    {
        return $this->getMethods(\ReflectionMethod::IS_ABSTRACT);
    }

}

