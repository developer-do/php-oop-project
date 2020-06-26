<?php 


/**
 * ! Classes/Objects Functions
 */
class A
{
    public $message = "Hello, World";

    protected $message2 = "message2";

    public function foo()
    {
        return $this->message;
    }

    protected function foo2() 
    {
        return $this->message2;
    }
}

class B extends A
{

}

// ! A 클래스를 MyClass로도 호출 할 수 있게 별칭을 달아줌
class_alias('A', 'MyClass');
$myclass = new MyClass;
var_dump($myclass);


/**
 * ! Exists
 */
echo "<pre>";
var_dump(
    // ! class가 있는지 확인
    class_exists('MyClass'), 
    // ! class안에 property가 있는지 확인
    property_exists('MyClass', 'message')
);
echo "</pre>";

/**
 * ! Get
 */
$a = new MyClass();
$b = new B();
// 
echo "<pre>";
var_dump(
    // ! class name return
    get_class($a), 
    // ! class properties return
    // ! 단 public 만 호출
    get_class_vars('MyClass'),
    // ! class methods return
    // ! 단 public 만 호출
    get_class_methods('MyClass')
);


// var_dump(get_declared_classes());

var_dump(
    get_object_vars($a),
    get_parent_class($b)
);
echo "</pre>";


/**
 * ! is
 */
// 
echo "<pre>";
var_dump(
    // ! $a, instanceof Myclass와 같다.
    // ! $b, instanceof Myclass와 같다.
    is_a($b, 'MyClass'),
    // ! 서브 클래스확인 자식인지 여부 확인
    is_subclass_of($a, 'MyClass')
);
echo "</pre>";