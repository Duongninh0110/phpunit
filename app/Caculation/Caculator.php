<?php 
namespace App\Caculation;

class Caculator 
{
    protected $operations = [];

    public function setOperation(OperationInterface $operation)
    {
        $this->operations[] = $operation;
    }

    public function setOperations(array $operations)
    {
        // foreach ($operations as $index => $operation) {
        //     if(!$operation instanceof OperationInterface){
        //         unset($operations[$index]);
        //     }
        // }

        $filteredOperation = array_filter($operations, function($operation){
            // if(!$operation instanceof OperationInterface){
            //     return false;
            // }
            // return true;
            return $operation instanceof OperationInterface;
        }, null);
        $this->operations = array_merge($this->operations,$filteredOperation);
    }

    public function getOperations()
    {
        return $this->operations;
    }

    public function caculate()
    {
        $result = [];
        if(count($this->operations)>1){
            foreach ($this->operations as $operation) {
            $result[]=$operation->caculate();
        }
        return $result;
        }
        return $this->operations[0]->caculate();
        
    }
}


 ?>