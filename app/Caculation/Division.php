<?php 
    namespace App\Caculation;

    use App\Caculation\Exceptions\NoOperandsException;
    
    class Division extends OperationAbstract implements OperationInterface
    {
        public function caculate()
        {
            if(count($this->operands) === 0){
                throw new NoOperandsException;
                
            }

            return array_reduce(array_filter($this->operands), function($a,$b){
                if($a !== null && $b !== null){
                    return $a/$b;
                }
                return $b;
            }, null);
        }
    }
?>