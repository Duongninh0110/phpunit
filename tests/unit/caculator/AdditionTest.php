<?php 

class AdditionTest extends PHPUnit\Framework\TestCase
{
   /** @test */
    public function adds_up_given_operands()
    {
        $addition = new \App\Caculation\Addition;
        $addition->setOperands([5,10]);

        $this->assertEquals(15, $addition->caculate());
    }

    /** @test */
    public function no_operands_throw_exeption_when_caculating()
    {
        $this->expectException(\App\Caculation\Exceptions\NoOperandsException::class);

        $addition = new \App\Caculation\Addition;
        $addition->caculate();
    }
}

 ?>