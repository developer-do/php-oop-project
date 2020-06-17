<?php
/**
 * Properties and Methods
 */
class A 
{
    public $message = 'Hello, world'; // properties

    public function foo() { // method
        return $this->message;
    }
}

$a = new A();
// var_dump($a->foo());



/**
 * Inherit
 */

class B extends A 
{

}

$b = new B();

// var_dump($b->foo());


/**
 * in Functions
 */
function foo(A $a)
{
    return $a->foo();
}

var_dump(foo($b));


/**
 * Context
 */



 
/**
 * Constants
 */
?>