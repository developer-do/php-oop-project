<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
/**
 * !! Magic Methods: Property
 * !! Property Magic Methods 종류들
 */
class A
{
    private $message = "true";

    // !! property에 값이 있는지 확인할 때 
    // !! 선언만 했을 경우에는 false, 값이 할당 되어 있을 때는 true
    public function __isset($name) 
    {
        return isset($this->$name);
    }

    // !! 해당 property 값을 지워버린다. NULL값을 가지게 됨.
    public function __unset($name)
    {
        unset($this->$name);
    }

    // !! class 내부에 property 값을 지정 할 때 사용
    public function __set($name, $value) 
    {
        $this->$name = $value;
    }

    // !! class 내부에 property에 접근해서 값을 가져올 때 사용
    public function __get($name) 
    {
        return $this->$name;
    }
}

$a = new A(); // !! class instance 생성
var_dump(isset($a->message));   // !! instance 내부에 $message property에 값이 존재하는지 확인
unset($a->message);             // !! instance 내부에 $message 값 초기화
var_dump(isset($a->message));   // !! instance 내부에 $message property에 값이 존재하는지 확인

$a->__set('message', 'Hello, world');   // !! instance 내부에 $message property에 Hello, world 값 할당
var_dump($a->__get('message'));         // !! instance 내부에 $message property의 값 추출
var_dump(isset($a->message));           // !! instance 내부에 $message property에 값이 존재하는지 확인