<?php 


/**
 * ! Compare
 */
$class1 = new stdClass();
$class1->sayHello = 'Hello, world';

$class2 = new stdClass();
$class2->sayHello = 'Hello, world';

// var_dump($class1 == $class2);   // ! 단순비교
// var_dump($class1 === $class2);  // ! 메모리의 주소값으로 비교



/**
 * ! Copy
 */
// ! $class3 = $class1 = <Object Id> 단순 객체 복사
/* 
$class3 = $class1;
var_Dump($class3);

$class3->sayHello = 'Hello, world2222';
var_dump($class1->sayHello);
var_dump($class3->sayHello);
var_dump($class1);
var_dump($class3);
 */

 // ! ($class3, $class1) = <Object Id> 참조
// $class3 =& $class1;
// $class3->sayHello = 'Hello, world2111';
// var_dump($class1->sayHello);

// ! 객체 얕은 복사
// $class3 = clone $class1;    
// var_dump($class3 === $class1);

// ! 객체 내부의 객체들은 주소값을 복사한다.
// $array1 = new ArrayObject([ 1, 2, new ArrayObject([ 3, 4])]);
// $array2 = clone $array1;
// var_dump($array1[2] === $array2[2]);


/**
 * ! Shallow Copy vs Deep Copy (얕은 복사 vs 깊은 복사)
 */
// !! 깊은 복사의 2가지 방법.
// ! Case 1. __clone
class MyArrayObject implements ArrayAccess, IteratorAggregate
{
    private $container = [];

    public function __construct($array)
    {
        $this->container = $array;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->container);
    }

    // ! 값을 할당할 때 사용
    public function offsetSet($offset, $value)
    {
        $this->container[$offset] = $value;
    }

    public function offsetExists($offset) 
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->container[$offset] : null;
    }

    // public function __clone()
    // {
    //     array_walk($this->container, fn (&$value) => is_object($value) ? $value = clone $value : null);
    // }
}

$myArrayObject1 = new MyArrayObject([ 1, 2, new MyArrayObject([3, 4])]);
// var_dump($myArrayObject1[1]);

foreach($myArrayObject1 as $key => $value) 
{
    var_dump($value);
}

// $myArrayObject2 = clone $myArrayObject1;

// var_dump($myArrayObject1[2] === $myArrayObject2[2]);

// ! Case 2. Serialize

$myArrayObject2 = unserialize(serialize($myArrayObject1));
var_dump($myArrayObject1[2] === $myArrayObject2[2]);