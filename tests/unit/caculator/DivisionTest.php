<?php 

class DivisionTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function divide_given_operands()
    {
        $division = new \App\Caculation\Division;
        $division->setOperands([100,2]);

        $this->assertEquals(50, $division->caculate());
    }

    /** @test */
    public function removes_division_by_zero()
    {
        $division = new \App\Caculation\Division;
        $division->setOperands([10,0,0,5,0]);

        $this->assertEquals(2, $division->caculate());
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