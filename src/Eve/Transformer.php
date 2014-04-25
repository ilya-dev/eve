<?php namespace Eve;

use Eve\Builders\BuilderFactory;
use ReflectionMethod, ReflectionParameter;
use Eve\Builders\MethodBuilder;

class Transformer {

    /**
     * The Builder instance.
     *
     * @var Builders\BuilderFactory
     */
    protected $builder;

    /**
     * The constructor.
     *
     * @param Builders\BuilderFactory|null $builder
     * @return Transformer
     */
    public function __construct(Build $builder = null)
    {
        $this->builder = $builder ?: new Build;
    }

    /**
     * \ReflectionMethod => Builders\MethodBuilder.
     *
     * @param \ReflectionMethod $method
     * @return Builders\MethodBuilder
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
     * \ReflectionParameter => Builders\ParameterBuilder.
     *
     * @param \ReflectionParameter $parameter
     * @return Builders\ParameterBuilder
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
     * Set a proper visibility mode.
     *
     * @param Builders\MethodBuilder $newMethod
     * @param \ReflectionMethod $method
     * @return Builders\MethodBuilder
     */
    protected function setVisibility(MethodBuilder $newMethod, ReflectionMethod $method)
    {
        if ($method->isPublic()) return $newMethod;

        if ($method->isProtected()) return $newMethod->visibility('protected');

        return $newMethod->visibility('private');
    }

    /**
     * Add a "return" statement.
     *
     * @param Builders\MethodBuilder
     * @return void
     */
    protected function addReturnStatement(MethodBuilder $method)
    {
        $value = \Eve\Random::value();

        $node = new \PhpParser\Node\Stmt\Return_($value);

        $method->getBuilder()->addStmt($node);
    }

}

