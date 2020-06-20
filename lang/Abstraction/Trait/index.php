<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * !! Trait 트레이트
 * !! php 는 다중 상속을 지원하지 않는다.
 * !! Trait는 클래스의 일부분이다.
 * !! Trait를 여러개 썻을 때 충돌이 발생할 수 있다.
 */
trait A
{
    public $message = 'Hello, world';

    public function sayHello()
    {
        return $this->message;
    }

    abstract protected function foo();
}


trait AA 
{
    public function sayHello()
    {
        return __TRAIT__;   // !! trait의 이름이 출력된다. AA
    }
}

trait AAA 
{
    use A, AA {
        A::sayHello insteadof AA;   // !! A의 sayHello를 사용하겠다.
        // AA::sayHello insteadof A;   // !! AA의 sayHello를 사용하겠다.
        A::sayHello as protected h; // !! 별칭과 가시성(visibility)도 변경할 수 있다.
    }
}

class B
{
    use AAA;
    /**
     * use AAA와 아래의 코드는 같다.
     *  use A, AA {
            A::sayHello insteadof AA;   // !! A의 sayHello를 사용하겠다.
            // AA::sayHello insteadof A;   // !! AA의 sayHello를 사용하겠다.
            A::sayHello as protected h; // !! 별칭과 가시성(visibility)도 변경할 수 있다.
        }
     */

    public function foo() 
    {
        return __CLASS__;
    }
}

$b = new B();
var_dump($b->sayHello());

/**************************
 * !! Trait 우선순위
 */


class C
{
    private $message = 'Hello, world';
    
    // !! Trait 3순위
    public function sayHello() 
    {
        return $this->message;
    }
}


trait D
{
    // !! Trait 2순위
    public function sayHello()
    {
        return __TRAIT__;
    }
}


class E extends C 
{
    use D;
    // !! Trait 1순위
    public function sayHello()
    {
        return __CLASS__;
    }
}

$e = new E();
var_dump($e->sayHello());









?>