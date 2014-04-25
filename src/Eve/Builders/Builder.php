<?php namespace Eve\Builders;

use PhpParser\PrettyPrinter\Standard as PrettyPrinter;

abstract class Builder {

    /**
     * The Builder instance.
     *
     * @var Builder
     */
    protected $builder;

    /**
     * Get the underlying builder instance.
     *
     * @return mixed
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * "Pretty print" the instance.
     *
     * @return string
     */
    public function pretty()
    {
        $node = $this->builder->getNode();

        return (new PrettyPrinter)->prettyPrint([$node]);
    }

    /**
     * Convert the object to a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->pretty();
    }

}

