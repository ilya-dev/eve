<?php namespace Eve;

use Eve\Builders\Build;
use ReflectionMethod, ReflectionParameter;
use Eve\Builders\MethodBuilder;

class Transform {

    /**
     * Builder instance
     *
     * @var Eve\Builders\Build
     */
    protected $builder;

    /**
     * The constructor
     *
     * @param  Eve\Builders\Build|null $builder
     * @return void
     */
    public function __construct(Build $builder = null)
    {
        $this->builder = $builder ?: new Build;
    }

    /**
     * \ReflectionMethod => \Eve\MethodBuilder
     *
     * @param  ReflectionMethod $method
     * @return Eve\Builders\MethodBuilder
     */
    public function method(ReflectionMethod $method)
    {
        $newMethod = $this->builder->aMethod($method->getName());

        foreach ($method->getParameters() as $parameter)
        {
            $newMethod->parameter($this->parameter($parameter));
        }

        $this->setVisibility($newMethod, $method);

        $this->addReturnStatement($newMethod);

        return $newMethod;
    }

    /**
     * \ReflectionParameter => \Eve\Builders\ParameterBuilder
     *
     * @param  ReflectionParameter $parameter
     * @return Eve\Builders\ParameterBuilder
     */
    public function parameter(ReflectionParameter $parameter)
    {
        $newParameter = $this->builder->aParameter($parameter->getName());

        if ($class = $parameter->getClass())
        {
            $newParameter->typeHint($class->getName());
        }

        if ($parameter->isDefaultValueAvailable())
        {
            $newParameter->defaultValue($parameter->getDefaultValue());
        }

        return $newParameter;
    }

    /**
     * Set proper visibility mode
     *
     * @param  Eve\Builders\MethodBuilder $newMethod
     * @param  ReflectionMethod $method
     * @return Eve\Builders\MethodBuilder
     */
    protected function setVisibility(MethodBuilder $newMethod, ReflectionMethod $method)
    {
        if ($method->isPublic()) return $newMethod;

        if ($method->isProtected()) return $newMethod->visibility('protected');

        return $newMethod->visibility('private');
    }

    /**
     * Add "return" statement
     *
     * @param  Eve\Builders\MethodBuilder
     * @return void
     */
    protected function addReturnStatement(MethodBuilder $method)
    {
        $value = \Eve\Random::value();

        $node = new \PHPParser_Node_Stmt_Return($value);

        $method->getBuilder()->addStmt($node);
    }

}

