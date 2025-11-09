<?php
require_once __DIR__ . '/testframework.php';
require_once __DIR__ . '/../src/StringUtils.php';

$testFramework = new TestFramework();

$testFramework->addTest('StringUtils reverse', function() {
    return assertEquals("cba", StringUtils::reverse("abc"), "Reverse of 'abc' should be 'cba'");
});

$testFramework->addTest('StringUtils to uppercase', function() {
    return assertEquals("HELLO", StringUtils::toUpperCase("hello"), "Uppercase of 'hello' should be 'HELLO'");
});

$testFramework->addTest('StringUtils to lowercase', function() {
    return assertEquals("hello", StringUtils::toLowerCase("HELLO"), "Lowercase of 'HELLO' should be 'hello'");
});

$testFramework->addTest('StringUtils capitalize words', function() {
    return assertEquals("Hello World", StringUtils::capitalizeWords("hello world"), "Capitalize words of 'hello world' should be 'Hello World'");
});

$testFramework->addTest('StringUtils contains - true case', function() {
    return assertTrue(StringUtils::contains("hello world", "world"), "Should contain 'world'");
});

$testFramework->addTest('StringUtils contains - false case', function() {
    return assertFalse(StringUtils::contains("hello world", "test"), "Should not contain 'test'");
});