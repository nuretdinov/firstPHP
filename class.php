<?php
class test{

    //public, protected, private
    public $num1;
    public $num2;
    public $znak;

    public function __construct($num1, $num2, $znak)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->znak = $znak;
    }

    //public, protected, private
    public function calc(){
        switch ($this->znak) {
            case "+":
                return $this->num1 + $this->num2;
                break;
            case "-":
                return $this->num1 - $this->num2;
                break;
        }

    }
}

$test1 = new test(5, 10, "-");
print $test1->num1 . "\n";
print $test1->num2 . "\n";
print $test1->calc();