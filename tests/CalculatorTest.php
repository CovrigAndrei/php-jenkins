<?php
require_once __DIR__ . '/testframework.php';
require_once __DIR__ . '/../src/Calculator.php';

$testFramework = new TestFramework();

$testFramework->addTest('Calculator addition', function() {
    $calc = new Calculator();
    return assertEquals(5, $calc->add(2, 3), "2 + 3 should equal 5");
});

$testFramework->addTest('Calculator subtraction', function() {
    $calc = new Calculator();
    return assertEquals(1, $calc->subtract(4, 3), "4 - 3 should equal 1");
});

$testFramework->addTest('Calculator multiplication', function() {
    $calc = new Calculator();
    return assertEquals(6, $calc->multiply(2, 3), "2 * 3 should equal 6");
});

$testFramework->addTest('Calculator division', function() {
    $calc = new Calculator();
    return assertEquals(2, $calc->divide(6, 3), "6 / 3 should equal 2");
});

$testFramework->addTest('Calculator division by zero', function() {
    $calc = new Calculator();
    return assertThrows(
        function() use ($calc) { $calc->divide(5, 0); },
        'InvalidArgumentException',
        "Division by zero should throw exception"
    );
});

$testFramework->addTest('Calculator power', function() {
    $calc = new Calculator();
    return assertEquals(8, $calc->power(2, 3), "2^3 should equal 8");
});