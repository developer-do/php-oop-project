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

// var_dump(foo($b));


/**
 * Context
 */

class C extends A
{
    public function foo() 
    {   
        // 자기 자신을 가리키는 self 즉 class C를 가리킴
        // return new self(); 

        // 사용 되고 있는 class 를 D or E 가리킴 
        // return new static();

        // 부모의 class를 가리킨다. 즉 A를 가리킴
        // return new parent();
    }
}


class D extends C
{

}

$d = new D();
// var_dump($d->foo());


// class E extends D
// {

// }

// $e = new E();
// var_dump($e->foo());

 
/**
 * Constants
 */
Class E
{
    const MESSAGE = 'Hello, world';

    public function getConstants() 
    {
        // :: 스코프 해결 연산자
        return self::MESSAGE;
    }

    // class 이름 값 가져오기
    public function getClassNAme()
    {
        return __CLASS__;
    }
}


$e = new E();
// var_dump($e->getConstants());
// var_dump(E::MESSAGE);

// var_dump($e->getClassName());

/**
 * Instance
 */
$d = new D();
var_dump($d instanceof A);

// 인스턴스랑 객체라는 말은 혼용해서 쓰인다.
// 객체는 범용적으로 사용,
// 인스턴스는 무엇의 인스턴스 ex) class E에 인스턴스를 만든다. 
// 객체는 객체를 만든다.



?>