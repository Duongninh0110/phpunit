<?php 

class CaculatorTest extends PHPUnit\Framework\TestCase
{
     /** @test */
    public function can_set_single_operation()
    {
        $addition = new \App\Caculation\Addition;
        $addition->setOperands([5,10]);

        $caculator = new \App\Caculation\Caculator;
        $caculator->setOperation($addition);

        $this->assertCount(1, $caculator->getOperations());
    }

    /** @test */
    public function can_set_mutiple_operations()
    {
        $addition1 = new \App\Caculation\Addition;
        $addition1->setOperands([5,10]);

        $addition2 = new \App\Caculation\Addition;
        $addition2->setOperands([2,2]);

        $caculator = new \App\Caculation\Caculator;
        $caculator->setOperations([$addition1, $addition2]);
        

        $this->assertCount(2, $caculator->getOperations());
    }

    /** @test */
    public function operations_are_ignored_if_not_instance_of_operation_interface()
    {
        $addition1 = new \App\Caculation\Addition;
        $addition1->setOperands([5,10]);

        $addition2 = new \App\Caculation\Addition;
        $addition2->setOperands([2,2]);

        $caculator = new \App\Caculation\Caculator;
        $caculator->setOperations([$addition1, $addition2, 'dogs', 'cats']);
        

        $this->assertCount(2, $caculator->getOperations());
    }

    /** @test */
    public function can_caculate_result()
    {
        $addition = new \App\Caculation\Addition;
        $addition->setOperands([5,10]);

        $caculator = new \App\Caculation\Caculator;
        $caculator->setOperation($addition);
        

        $this->assertEquals(15, $caculator->caculate());
    }

    /** @test */
    public function caculate_method_return_multiple_result()
    {
        $addition = new \App\Caculation\Addition;
        $addition->setOperands([5,10]);

        $division = new \App\Caculation\Division;
        $division->setOperands([50,2]);

        $caculator = new \App\Caculation\Caculator;
        $caculator->setOperations([$addition, $division]);
        
        $this->assertInternalType('array', $caculator->caculate());
        $this->assertEquals(15, $caculator->caculate()[0]);
        $this->assertEquals(25, $caculator->caculate()[1]);
    }
}

 ?>