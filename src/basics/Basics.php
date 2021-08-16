<?php

namespace basics;


class Basics implements BasicsInterface{
    private BasicsValidator $validator;

    public function __construct(BasicsValidator $v){
        $this->validator=$v;
    }

    /**
     * @param int $minute
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getMinuteQuarter(int $minute): string{
        $caught=false;
        try{
            $this->validator->isMinutesException($minute);
        }
        catch(InvalidArgumentException $e){
            $caught=true;
            echo $e->getMessage();
        }
        $result="";
        if (!$caught){
            if($minute>0 && $minute<=15){
                $result="first";
            } 
            else if($minute>15 && $minute<=30){
                $result="second";
            }
            else if($minute>30 && $minute<=45){
                $result="third";
            }
            else{
                $result="fourth";
            }
        }
        return $result;
    }

    /**
     * @param int $year
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isLeapYear(int $year): bool{
        $caught=false;
        try{
            $this->validator->isYearException($year);
        }
        catch(InvalidArgumentException $e){
            $caught=true;
            echo $e->getMessage();
        }
        if (!$caught){
            if(($year%4==0 && $year%100 !=0) || $year%400==0){
                return true;
            }
        }
        return false;
    }


    
    /**
     * @param string $input
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isSumEqual(string $input): bool{
        $caught=false;
        try{
            $this->validator->isValidStringException($input);
        }
        catch(InvalidArgumentException $e){
            $caught=true;
            echo $e->getMessage();
        }

        if (!$caught){
            
            $sumFirstNums=0;
            $sumLastNums=0;

            for($i=0;$i<strlen($input)/2;$i++){
                $sumFirstNums+=$input[$i];
            }
            for($i=strlen($input)/2;$i<strlen($input);$i++){
                $sumLastNums+=$input[$i];
            }

            return $sumFirstNums==$sumLastNums;
        }

        return false;
    }
}
