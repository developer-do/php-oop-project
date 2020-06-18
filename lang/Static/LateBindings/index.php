<?php 


/**
 * Static Binding
 */
class A
{
    public static function foo() 
    // public function foo() 
    {
        // static::who();
        self::who();
    }

    public static function who()
    // public function who()
    {
        var_dump('A_Hello, world');
        var_dump(__CLASS__);
    }
}


class B extends A
{
    public static function test()
    // public function test()
    {
        // A::foo();   // 호출 정보를 전달하지 않는다.
        
        // parent::foo();   // 호출 정보를 전달한다.
        self::foo();     // 호출 정보를 전달한다.
    }

    public static function who()
    // public function who()
    {
        var_dump(__CLASS__);
    }
}


$b = new B();
$b->test();







?>