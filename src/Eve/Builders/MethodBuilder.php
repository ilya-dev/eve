<?php namespace Eve\Builders;

use PhpParser\BuilderFactory;

class MethodBuilder extends Builder {

    /**
     * The constructor.
     *
     * @param string $name
     * @return MethodBuilder
     */
    public function __construct($name)
    {
        $this->builder = (new BuilderFactory)->method($name);
    }

    /**
     * Specify the method's visibility mode.
     *
     * @param string $mode
     * @return self
     */
    public function visibility($mode)
    {
        $this->builder->{'make'.ucfirst($mode)}();

        return $this;
    }

    /**
     * Add a parameter.
     *
     * @param ParameterBuilder $parameter
     * @return self
     */
    public function parameter(ParameterBuilder $parameter)
    {
        $this->builder->addParam($parameter->getBuilder());

        return $this;
    }

}

