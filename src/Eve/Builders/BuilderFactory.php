<?php namespace Eve\Builders;

class BuilderFactory {

    /**
     * Build a new class
     *
     * @param  string $name
     * @return Eve\Builders\ClassBuilder
     */
    public function aClass($name)
    {
        return new ClassBuilder($name);
    }

    /**
     * Build a new method
     *
     * @param  string $name
     * @return Eve\Builders\MethodBuilder
     */
    public function aMethod($name)
    {
        return new MethodBuilder($name);
    }

    /**
     * Build a new parameter
     *
     * @param  string $name
     * @return Eve\Builders\ParameterBuilder
     */
    public function aParameter($name)
    {
        return new ParameterBuilder($name);
    }

}

