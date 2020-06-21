<?php 

/**
 * !! 정말 중요함
 * !! Namespaces
 * !! 객체지향언어에서 가장 중요한 3가지가 있는데 (모던 php 의 근간이 되는 부분)
 * !! 1. class (클래스)
 * !! 2. abstraction (추상화)
 * !! 3. namespace (네임스페이스)
 * 
 * 
 * !! namespace는 구역을 나눈다.
 * !! namespace는 같은 클래스 간에 충돌을 막기 위해 나왔다.
 * !! autoloading
 * 
 * !! namespace는 파일 하나당 한개를 권장한다. (여러개도 가능하지만 한개를 권장함)
 * 
 */



namespace A
{
    const MESSAGE = __NAMESPACE__;
    const TEST = "TEST1111";

    class A 
    {
        public function foo() 
        {
            
            return __METHOD__;
        }
    }

    function foo() 
    {
        echo "A\A foo() !!! ";
        return __FUNCTION__;
    }

    function var_dump()
    {
        echo __FUNCTION__;
    }

    // * 현재 namespace 안에 있는 var_dump function 이다.
    var_dump();

    // * global namespace 안에 var_dump를 사용할려면 \를 붙여줘야 한다.
    \var_dump("Hello, world");
}

namespace A\B
{
    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }
}


// * global namespace와 같다.
namespace
{
    use A\A;
    // use A\B\A; // * 이렇게 같은 클래스가 있을 경우 충돌이 일어나며, as로 변경해서 사용 가능하다.
    use A\B\A as AB;
    use function A\foo;
    use const A\MESSAGE;
    use const A\TEST;

    // $a = new A\A();
    $a = new A();
    var_dump($a->foo()); // * namespace도 같이 출력된다. - A\A::foo 출력 (__METHOD__)
    var_dump(TEST);

    echo "<br>";

    $ab = new AB();
    var_dump($ab->foo()); // * namespace도 같이 출력된다. - A\B\A::foo 출력 (__METHOD__)

    echo "<br>";
    
    var_dump(foo());

    echo "<br>";

    var_dump(MESSAGE);
}


// * namespace가 없으면 global namespace class A를 말한다.
// class A {}

?>