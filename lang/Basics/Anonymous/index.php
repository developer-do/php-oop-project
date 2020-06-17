<?php 
/**
 * Anonymous Classes
 */

 // 익명 클래스
class A 
{
    public function foo()
    {
        return true;
    }
}


class B
{
    public function create()
    {
        return new Class extends A {};
    }
}

$b = new B();
var_dump($b->create()->foo());

?>