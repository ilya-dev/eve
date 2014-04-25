<?php namespace Eve\Builders;

use PhpParser\BuilderFactory;

class ParameterBuilder extends Builder {

    /**
     * The constructor.
     *
     * @param string $name
     * @return ParameterBuilder
     */
    public function __construct($name)
    {
        $this->builder = (new BuilderFactory)->param($name);
    }

    /**
     * Specify the default value.
     *
     * @param mixed $value
     * @return self
     */
    public function defaultValue($value)
    {
        $this->builder->setDefault($value);

        return $this;
    }

    /**
     * Specify the type hint.
     *
     * @param string $typeHint
     * @return self
     */
    public function typeHint($typeHint)
    {
        $this->builder->setTypeHint('\\'.$typeHint);

        return $this;
    }

}

