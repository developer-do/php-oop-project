<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);


function foo(A $a) {
    return $a->foo();
}


/**
 * Class Abstraction 추상클래스
 * !! 추상클래스는 객체를 만들어 줄 수 없다.
 */
abstract class A
{   
    protected $message = 'Hello, world';

    public function sayHello() // 구현된 추상클래스 메서드
    {
        return $this->message;
    }

    abstract public function foo();  // 구현되지 않은 추상클래스 
    // !! 구현되지 않은 추상클래스는 상속받는 자식 클래스에서 꼭 구현해 줘야한다.

    // abstract private function foo();  // !! private 는 사용 할 수 없다.
    // abstract protected function foo();  // !! protected 는 사용 할 수 있다.
}

// new A();    // !! 추상클래스는 객체(인스턴스화 시킬 수 없다.)를 만들 수 없다.

class B extends A
{
    public function foo() 
    {
        return __CLASS__; // !! 사용되는 있는 클래스 name return
    }
}



$b = new B();
var_dump(foo($b));

/**
 * !! 추상 클래스는 하나의 최상의 클래스는 독립적으로 객체를 만들어서 쓸수가 없고 자식클래스로만 있을때
 * !! 같은 인터페이스를 제공한다.
 * !! 구현부는 상관하지 않고 클래스 B가 메서드 foo()를 가지고 있다는 걸 알려주는 약속.
 * !! 구현되지 않은 추상클래스는 상속받는 자식에서 꼭 구현해줘야 한다.
 */