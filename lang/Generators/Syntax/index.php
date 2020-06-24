<?php 

/**
 * !! Generator
 */
// ! 1번째) 가장 기본적인 제너레이터 함수
function gen()
{
    yield 1;
    yield 2;
    yield 3;
}

// $gen = gen();
// var_dump($gen);

// $gen = gen();
// var_dump($gen->current());
// $gen->next();
// var_dump($gen->current());

// $gen = gen();
// foreach ($gen as $number)
// {
//     var_dump($number);
// }

// ! 2번째) 중간에 함수 호출
function gen2() 
{
    yield 1;
    yield from gen();
    yield 2;
}

foreach(gen2() as $number) 
{
    // var_dump($number);
}


// ! 3번쨰) key 와 value 값 순차적으로 호출
function gen3()
{
    yield 'message' => 'Hello, world';
}

foreach(gen3() as $key => $value) 
{
    // var_dump($key, $value);
}


// ! 4번째) 많이 사용하지 않는 방법
function gen4() 
{
    $data = yield;
    yield $data;
}

$gen4 = gen4();
// var_dump($gen4->current());
// var_dump($gen4->send('Hello, world'));
// var_dump($gen4->current());


// ! 왜 쓰는지?
function __range($start, $end, $step = 1) 
{
    for($i = 0; $i < $end; $i += $step) 
    {
        yield $i;
    }
}

$s = microtime(true);
foreach(__range(0, 100000) as $number) {}
// foreach(range(0, 100000) as $number) {}

// float(0.0027050971984863) int(426304) // ! -> Generator 시간대비 메모리 효율성이 좋음
// float(0.0021770000457764) int(4583656) // ! -> built-in function 메모리 대비 시간 효율성이 좋음

var_dump(microtime(true) - $s, memory_get_peak_usage());