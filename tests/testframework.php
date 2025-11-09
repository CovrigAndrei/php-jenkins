<?php

class TestFramework
{
    private $tests = [];
    private $successCount = 0;
    private $totalTests = 0;
    
    public function addTest($testName, $testFunction)
    {
        $this->tests[$testName] = $testFunction;
    }
    
    public function run()
    {
        echo "🚀 Running " . count($this->tests) . " tests...\n";
        echo str_repeat("=", 50) . "\n";
        
        foreach ($this->tests as $testName => $testFunction) {
            $this->totalTests++;
            echo "📝 Test: $testName\n";
            
            try {
                $result = $testFunction();
                if ($result) {
                    echo "✅ PASS: $testName\n";
                    $this->successCount++;
                } else {
                    echo "❌ FAIL: $testName\n";
                }
            } catch (Exception $e) {
                echo "💥 ERROR: $testName - " . $e->getMessage() . "\n";
            }
            
            echo "\n";
        }
        
        $this->report();
    }
    
    private function report()
    {
        echo str_repeat("=", 50) . "\n";
        echo "📊 TEST RESULTS:\n";
        echo "✅ Passed: $this->successCount\n";
        echo "❌ Failed: " . ($this->totalTests - $this->successCount) . "\n";
        echo "📋 Total: $this->totalTests\n";
        
        if ($this->successCount === $this->totalTests) {
            echo "🎉 ALL TESTS PASSED!\n";
            exit(0);
        } else {
            echo "💥 SOME TESTS FAILED!\n";
            exit(1);
        }
    }
}

// Utility functions
function assertEquals($expected, $actual, $message = "")
{
    if ($expected === $actual) {
        return true;
    } else {
        echo "   Expected: " . var_export($expected, true) . "\n";
        echo "   Actual: " . var_export($actual, true) . "\n";
        if ($message) echo "   Message: $message\n";
        return false;
    }
}

function assertTrue($condition, $message = "")
{
    return assertEquals(true, $condition, $message);
}

function assertFalse($condition, $message = "")
{
    return assertEquals(false, $condition, $message);
}

function assertThrows($callback, $expectedException = 'Exception', $message = "")
{
    try {
        $callback();
        echo "   Expected exception: $expectedException\n";
        echo "   But no exception was thrown\n";
        if ($message) echo "   Message: $message\n";
        return false;
    } catch (Exception $e) {
        if (get_class($e) === $expectedException || $e instanceof $expectedException) {
            return true;
        } else {
            echo "   Expected exception: $expectedException\n";
            echo "   Got exception: " . get_class($e) . " - " . $e->getMessage() . "\n";
            if ($message) echo "   Message: $message\n";
            return false;
        }
    }
}