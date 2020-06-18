<?php 


/**
 * 매직 메서드이다.
 * Constructor, Destructor (생성자, 소멸자)
 * 생성자 : 객체를 생성할 때 호출
 * 소멸자 : 객체를 소멸할 때 호출
 */
class A
{
    public function __construct()
    {
        var_dump(__METHOD__);
    }

    public function __destruct()
    {
        var_dump(__METHOD__);
    }
}

// $a = new A();
// unset($a);
// 스크립트가 끝나기 직전 소멸자가 실행되며, 소멸자를 먼저 실행하고 싶다면 unset으로 헤제 시켜줘야 한다.
// var_dump('Hello, world');




/**
 * Constructor Parameters
 */

class B
{
    public $message;

    public function __construct($message) 
    {
        $this->message = $message;
    }
}

// $b = new B('minji love');
// var_dump($b);



/**
 * Inherit
 */


class C extends A
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct() 
    {
        parent::__destruct();
    }
}

$c = new C();
