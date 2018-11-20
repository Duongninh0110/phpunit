<?php 
    namespace App\Caculation;

    use App\Caculation\Exceptions\NoOperandsException;
    
    class Addition extends OperationAbstract implements OperationInterface
    {
        public function caculate()
        {
            // $result = 0;
            // $operands=$this->operands;
            // foreach ($operands as $operand) {
            //     $result+=$operand;
            // }
            // return $result;

            if(count($this->operands) === 0){
                throw new NoOperandsException;
                
            }

            return array_sum($this->operands);
        }
    }
?>