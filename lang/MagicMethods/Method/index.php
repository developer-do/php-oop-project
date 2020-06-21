<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
/**
 * !! Magic Methods: Methods
 * !! Magic Mehtods는 php 내부에서 동작하는 것이기 때문에 내가 무언가 해줄 필요는 없다.
 * !! 어떤 Magic Methods는 return 값이 정해져 있다.
 * !! 없는 함수를 만들고 호출할 때 사용된다.
 */
class A
{   
    // !! __call 은 정의되지 않은 메서드들을 호출할 때 사용된다.
    public function __call($name, $args) 
    {
        // var_dump(__METHOD__);
        var_dump($name, $args);
        var_dump("not static");
    }

    // !! test code
    // public function foo() 
    // {
    //     return "not static foo function";
    // }

    // !! test code
    // public static function foo() 
    // {
    //     var_dump("static foo function");
    // }

    // !! __callStatic 은 정의되지 않은 메서드들을 호출할 때 사용된다.
    // public static function __callStatic($name, $args)
    // {
    //     var_dump($name, $args);
    //     var_dump("static");
    // }
     

    // public function foo() 
    // {
    //     var_dump(__METHOD__);
    // }

    // !! __invoke 는 인스턴스 자체를 함수처럼 호출할려 할 때 사용된다.
    public function __invoke( ... $args)
    {
        var_dump($args);
    }
}

$a = new A();
// $a->foo('Hello, world', 'wow!', 'test'); // !! public 메서드 호출
// A::foo();    // !! static 메서드 호출 ( static 메서드가 아니면 error )

$a("Hello, world", "Who are you?");

// User::whereId();