<?php 

/**
 * Final
 * final은 메서드에서만 사용 가능, 프로퍼티 불가능
 * ex) public final function foo()
 * final은 재정의 클래스 상속 후 재정의가 가능한데
 * 재정의를 막아주는 역할을 한다.
 * 
 * 또한 클래스에서도 사용 가능하다.
 * 클래스에 사용을 하게 되면 해당 클래스 상속을 받지 못하게 된다.
 */

class A
{
    public $message;

    public final function foo() 
    {

    }
}

class B
{
    public function foo()
    {
        
    }
}

// 사용자가 상속하지 못하게 할때 final을 사용한다.


?>