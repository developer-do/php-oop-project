<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
/**
 * !! Magic Methods: serialize (직렬화)
 * !! 
 */
class A 
{
    private $message = 'Hello, world';

    public function __sleep()
    {
        return [ 'message' ];
    }

    public function __wakeup()
    {
        var_dump(__METHOD__);
    }
}

$a = new A();
$serialized = serialize($a);
var_dump($serialized);

var_dump(unserialize($serialized));


// !! 위에는 이전 방식
// !! 아래는 최근 방식

class B implements Serializable
{
    private $message = 'Hello, world';

    public function serialize() 
    {
        return serialize($this->message);
    }

    public function unserialize($serialized) 
    {
        $this->message = unserialize($serialized);
    }
}

$b = new B();

$serialized = serialize($b);
var_dump($serialized);

var_dump(unserialize($serialized));