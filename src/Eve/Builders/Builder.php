<?php namespace Eve\Builders;

use PHPParser_PrettyPrinter_Default as PrettyPrinter;

abstract class Builder {

    /**
     * Builder instance
     *
     * @var mixed
     */
    protected $builder;

    /**
     * Get the underlying builder instance
     *
     * @return mixed
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * "Pretty print"
     *
     * @return string
     */
    public function pretty()
    {
        $node = $this->builder->getNode();

        return (new PrettyPrinter)->prettyPrint([$node]);
    }

    /**
     * Gets fired when attempting to represent an object as a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->pretty();
    }

}

