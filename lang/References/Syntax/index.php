<?php 

/**
 * ! References (참조)
 * ! 변수에 있는 메모리공간의 이름을 하나 더 부여하는 것을 의미
 */
$message = 'Hello, world';
$sayHello =& $message;  // ! =& 참조 기호

$sayHello = 'Who are you?';
// var_dump($message); // ! -> Who are you?

/**
 * ! Functions and Methods
 */
function foo()
{
    // global $message;
    $message =& $GLOBALS['message'];
    $message = 'Bye';
}


foo();
var_dump($message);

function foo2(&$message)
{
    $message = 'Hello, world';
}

foo2($message);
var_dump($message);

class MyClass
{
    public $message = 'Hello, world';

    public function &getMessage()
    {
        return $this->message;
    }
}

$myclass = new MyClass();
$sayHello =& $myclass->getMessage();
$sayHello = 'Bye';

var_dump($myclass->message);

/**
 * ! Unset
 * ! 참조는 해제 한다고 해서 연결된 것 까지 모두 헤제되지 않는다.
 */
$sayHello =& $message;
unset($sayHello);
var_dump($message);