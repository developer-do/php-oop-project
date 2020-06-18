<?php 
error_reporting(E_ALL);

ini_set("display_errors", 1);



/**
 * Static
 */

// function 내에서 정적 변수
class A
{
    public static $message = 'Hello, world';

    // 정적 메서드 내에서는 this를 사용할 수 없다.
    public static function foo()
    {
        // return $this->message;
        // this 사용시 에러 정적은 변하지 않기 때문에 상태라고 보기 어렵다.?
        return self::$message;
    }
}

// var_dump(A::$message);


// 가변 클래스
$classname = 'A';

// $a = new A(); 와 같다.
$a = new $classname();

// 가변클래스에서
var_dump($a->foo()); // 정적 메서드에는 접근 가능
// var_dump($a->$message); // 정적 프로퍼티에서 접근 불가능
// 가변클래스는 권장되는 방법은 아님.
// 클래스 이름으로 접근하는 것을 권함 A::$message; or A::foo();
?>