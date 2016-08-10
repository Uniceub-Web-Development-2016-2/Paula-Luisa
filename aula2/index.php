<?php
class Math {
        private $num1;
        private $num2;

        public function_construct($numbah1, $numbah2){
                $this->num1 = $num1;
                $this->num2 = $num2;
        }

        public function sumAttr(){
                return $this->sum($this->num1, $this->num2);
        }

        public function sum($num1, $num2){

                if($num1 < 0 || $num2 <0)
                        return "Can not sum 0";
                return $num1 + $num2;

        }

        public function sumAll($numsArr){

                $sum = 0;
                foreach($numsArr as $num){
                        $sum = $sum + $num;
                }

                return $sum;
        }
}

$math = new Math(1,7);
echo $math->sumAttr();
echo "<br>";
echo $math->sum(8,5);
echo "<br>;"
$array = array(1, 3, 4, 5, 6, 7, 8, 99);
echo $math->sumAll($array);
