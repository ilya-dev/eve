<?php namespace Eve\Builders;

use PhpParser\BuilderFactory;

class ClassBuilder extends Builder {

    /**
     * The constructor
     *
     * @param  string $name
     * @return void
     */
    public function __construct($name)
    {
        $this->builder = (new BuilderFactory)->class($name);
    }

    /**
     * What should it extend?
     *
     * @param  dynamic
     * @return self
     */
    public function extend()
    {
        foreach (func_get_args() as $class)
        {
            $this->builder->extend($class);
        }

        return $this;
    }

    /**
     * What should it implement?
     *
     * @param  dynamic
     * @return self
     */
    public function implement()
    {
        foreach (func_get_args() as $interface)
        {
            $this->builder->implement($interface);
        }

        return $this;
    }

    /**
     * Add a method
     *
     * @param  Eve\Builders\MethodBuilder $method
     * @return self
     */
    public function method(MethodBuilder $method)
    {
        $this->builder->addStmt($method->getBuilder());

        return $this;
    }

}

