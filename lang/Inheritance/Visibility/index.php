<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
/**
 * Visibility
 * 가시성 class 안에 public, protected, private 를 말한다.
 */
class A {
    public $public = 'public';
    protected $protected = 'protected';
    private $private = 'private';

    public function __construct() {

    }

    public function test() {
        return 'Test';
    }
}

$a = new A();
var_dump($a->public);       // !! public 외부에서 접근이 가능하다.
// var_dump($a->protected);    // !! protected 외부에서 접근 불가
// var_dump($a->private);      // !! private 외부에서 접근 불가


// protected는 상속받은 클래스 내부에 있는 protected 로 된 프로퍼티나 메서드에 접근이 가능하다.
// 하지만 private 는 상속받아도 접근하지 못해 사용하지 사용하지 못한다.
// !! protected는 상속에서 접근을 해줄 수 있다.
// !! private는 선언한 클래스 내부에서만 사용이 가능하다.
class B extends A
{
    private $message = 'Hello, world';

    private static $instance;

    private function __construct() 
    {
        parent::__construct();
        var_dump($this->message);       // !! class 내부에 있는 private는 접근 가능
        // var_dump($this->private);    // !! private는 접근 불가
        var_dump($this->protected);     // !! protect는 접근 가능
    }

    public static function getInstance() 
    {
        return new self();  // single tone 패턴이 아닐 때
        // return self::$instance ?: self::$instance = new self();  // single tone 패턴 생성 방법
    }
}

// $b = new B();
// var_dump($b->foo());

// 싱글톤 
$b = B::getInstance(); 
$bb = B::getInstance(); 

// single tone패턴이 아닐 때 false (객체가)
// single tone패턴 일 때 true 
var_dump($bb === $b);   

// $b = new B();    // !! 생성자가 private이기 때문에 객체를 생성할 수 없다.
