<?php namespace Eve;

class Random {

    /**
     * Return a random value
     *
     * @return mixed
     */
    public static function value()
    {
        $values = [
            // null
            new \PHPParser_Node_Expr_ConstFetch(
                new \PHPParser_Node_Name(["null"])
            ),
            // false
            new \PHPParser_Node_Expr_ConstFetch(
                new \PHPParser_Node_Name(["false"])
            ),
            // 42.7
            new \PHPParser_Node_Scalar_DNumber(42.7),
            // 19
            new \PHPParser_Node_Scalar_LNumber(19),
            // new \stdClass
            new \PHPParser_Node_Expr_New(
                new \PHPParser_Node_Name(["\stdClass"])
            ),
            // []
            new \PHPParser_Node_Expr_Array([]),
            // "foobar"
            new \PHPParser_Node_Scalar_String("foobar"),
            // function() {}
            new \PHPParser_Node_Expr_Closure(),
            // eehh...resource?
        ];

        return $values[array_rand($values)];
    }

}

