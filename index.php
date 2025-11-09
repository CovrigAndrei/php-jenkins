<?php
require_once __DIR__ . '/src/Calculator.php';
require_once __DIR__ . '/src/StringUtils.php';

echo "<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Project</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 800px; margin: 0 auto; }
        .test-result { padding: 10px; margin: 5px 0; border-radius: 5px; }
        .pass { background-color: #d4edda; color: #155724; }
        .fail { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🧪 Simple PHP Project</h1>
        <p>This is a simple PHP project with unit tests for Jenkins CI/CD.</p>
        
        <h2>Calculator Examples:</h2>";

$calculator = new Calculator();
echo "<p>2 + 3 = " . $calculator->add(2, 3) . "</p>";
echo "<p>5 - 2 = " . $calculator->subtract(5, 2) . "</p>";
echo "<p>4 * 3 = " . $calculator->multiply(4, 3) . "</p>";

echo "<h2>StringUtils Examples:</h2>";
echo "<p>Reverse of 'hello': " . StringUtils::reverse("hello") . "</p>";
echo "<p>Uppercase of 'test': " . StringUtils::toUpperCase("test") . "</p>";
echo "<p>Capitalize 'hello world': " . StringUtils::capitalizeWords("hello world") . "</p>";

echo "<h2>Run Tests:</h2>";
echo "<p><a href='/tests/run-all-tests.php' target='_blank'>Run All Tests</a></p>";

echo "</div></body></html>";