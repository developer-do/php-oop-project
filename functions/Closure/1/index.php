<?php 

/**
 * ! Closure
 */

function foo()
{
    return 'Hello, world';
}

// $foo = function(){
//     return 'Hello, world';
// };



// var_dump(Closure::fromCallable('foo'));
// ! 익명함수들은 클로저의 객체이다.


class A
{
    protected $message = 'Hello, world';
}

$foo = function() {
    return $this->message;
};
// Function call

$a = new A();


// ! call 은 그냥 private에 접근할 수 있다.
$foo->call($a);


// ! bindTo
// ! 2번째 인자가 null이면, public 프로퍼티에만 접근 가능
// ! 2번째 인자가 해당 객체 인스턴스를 가리키면 private, protected도 접근가능하다.
$foo2 = $foo->bindTo($a, $a);
// var_dump($foo2());



function foo2(\Closure $callback)
{
    var_dump($callback());
}

foo2(function(){
    return 'Hello, world';
});