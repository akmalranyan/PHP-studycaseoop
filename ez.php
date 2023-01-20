<?php

class PPH21Calculator{
    private function FirstRule(float $pkp): float{
        if(0 < $pkp && 50000000 >= $pkp){
            return $pkp * 0.05;
        }else{
            return 0;
        }
    }
    private function SecondRule(float $pkp): float{
        if(50000000 < $pkp && 250000000 >= $pkp){
            $pkp -= 50000000;
            $previous = $this -> FirstRule(50000000);
            return ($pkp * 0.15)+$previous;
        }else{
            return 0;
        }
    }
    private function ThirdRule(float $pkp): float{
        if(250000000 < $pkp && 500000000 >= $pkp){
            $pkp -= 250000000;
            $previous = $this -> SecondRule(250000000);
            return ($pkp * 0.25)+$previous;
        }else{
            return 0;
        }
    }
    private function FourthRule(float $pkp): float{
        if(500000000 < $pkp && 99999999999999 >= $pkp){
            $pkp -= 500000000;
            $previous = $this -> ThirdRule(500000000);
            return ($pkp * 0.3)+$previous;
        }else{
            return 0;
        }
    }
    public function calculate(float $pkp): float{
        return $this -> FirstRule($pkp) ?: $this -> SecondRule($pkp) ?: $this -> ThirdRule($pkp) ?: $this -> Fourthrule($pkp);
    }
}
$pph21 = new PPH21Calculator;
echo $pph21 -> calculate(60000000);



?>