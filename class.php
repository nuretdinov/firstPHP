<?php
class calculate{

    //public, protected, private
    public $num1;
    public $num2;
    public $znak;

    public function __construct(float $num1, float $num2, string $znak)
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
            default:
                return null;
                break;
        }

    }
}

class calculateResult
{
    public function output(calculate $calc) //$calc может быть только типа класс calculate!
    {
        $out=$calc->calc();
        print $out;
    }
}
$calculate1 = new calculate(5, 7, "+");

$result = new calculateResult();
$result->output($calculate1);