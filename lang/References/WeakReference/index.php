<?php

/**
 * ! WeakReference
 * ! 배열을 객체로 형변환 시켜주는 것 
 */

// $messages = [
//     'sayHello' => 'Hello, world'
// ];
// var_dump($messages);
// var_dump((object) $messages);


// $class = new stdClass;

// $weakRef = WeakReference::create($class);
// var_dump($weakRef->get());


$obj = new stdClass;
$weakref = WeakReference::create($obj);
var_dump($weakref->get());
unset($obj);
var_dump($weakref->get());