<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * !! Exception (error 처리)
 * !! 스크립트를 실행하는 도중에 에러가 나는 경우.
 */
try { 
    // !! 실행될 코드
    throw new Exception('Hello, world');
} catch(Exception $e) {
    // !! 에러가 났을 때 처리
    var_dump($e->getMessage());
} finally {
    // !! finally는 옵션이라 써도되고 안써도된다.
    // !! 마지막에 무조건 실행되는 코드
    var_dump('Finally');
}



set_error_handler(function ($errno, $errstr) {
    throw new ErrorException($errstr, $errno);
});

// set_exception_handler( fn (Exception $e) => var_dump($e->getMessage()) );
// set_exception_handler(fn (Exception $e) => var_dump($e->getMessage()));

/**
 * Error 
 */
try {
    new MyClass();
} catch (Error $e) {
    var_dump($e->getMessage());
} finally {

}
