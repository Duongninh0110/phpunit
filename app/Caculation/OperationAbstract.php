<?php 
namespace App\Caculation;

abstract class OperationAbstract
{
    protected $operands=[];

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }
}



 ?>