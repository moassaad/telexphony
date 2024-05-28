<?php
namespace App\Support;

class IMEI {
    private $imei;
    private $evenSwap = array(
        0   =>  0,
        1   =>  2,
        2   =>  4,
        3   =>  6,
        4   =>  8,
        5   =>  1,
        6   =>  3,
        7   =>  5,
        8   =>  7,
        9   =>  9
    );
    
    public function isValid($imei) {
        return $this->checkImei($imei);
    }
    private function checkImei($imei) : bool {
        $imei = $this->toString($imei);
        $imei = str_split($imei);
        $digitV = end($imei);
        if(count($imei) != 15)
        {
            return false;
        }
        array_pop($imei);
        $oddIMEI = 0;
        $evenIMEI = 0;
        foreach($imei as $index => $value )
        {
            if(($index%2) == 0)
            {
                $oddIMEI += $value;
            }
            else
            {
                $even = $this->evenSwap[$value];
                $evenIMEI += $even;
            }
        }
        // $check = $oddIMEI + $evenIMEI + $digitV;
        $check = (($oddIMEI + $evenIMEI + $digitV)%10 == 0)? true : false;
        // var_dump($check);
        return $check;
    }
    private function toString($value) {
        return (string) $value;
    }
}
?>
<?php


?>