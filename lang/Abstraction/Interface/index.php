<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Interface 
 * !! 클래스가 아니다.
 * !! 추상 클래스는 구현된 것이 있고, 구현 안된것들이 있는 반면
 * !! 인터페이스는 전부다 구현되지 않는다.
 * !! 인터페이스는 유저하고 소통하기 위한 약속이다.
 * !! 기능적인 접근을 할때 인터페이스 사용.
 */

function foo(A $a)
{
    return $a->foo();
}

interface A
{
    public function foo();

    // private function foo2();    // !! 인터페이스에서 private는 사용할 수 없다.
    // protected function foo3();  // !! 인터페이스에서 protected는 사용할 수 없다.  
}

// !! 인터페이스 간 확장을 할려면 extends 로 한다.
interface AA extends A 
{
    public function sayHello();
}


// !! 인터페이스를 상속받는 클래스는 extends가 아닌 implements로 상속을 받아 상속된 모든 메서드들을 구현한다.
class B implements AA
{
    public function foo() 
    {
        return __CLASS__;
    }

    public function sayHello()
    {
        return 'Hello, world';
    }
}



$b = new B();
var_dump(foo($b));


?>