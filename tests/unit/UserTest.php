<?php 

class UserTest extends PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->user = new \App\Models\Users;
    }

    /** @test */
    public function that_we_can_get_first_name()
    {
        
        $this->user->setFirstName('Billy');
        $this->assertEquals($this->user->getFirstName(),'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {
        
        $this->user->setLastName('Garrett');
        $this->assertEquals($this->user->getLastName(),'Garrett');
    }

    public function testThatWeCanGetTheFullName()
    {
        $user = new \App\Models\Users;
        $user->setFirstName('Billy');
        $user->setLastName('Garrett');
        $this->assertEquals($user->getFullName(),'Billy Garrett');
    }

    public function testFirstNameAndLastNameAreTrimmed()
    {
        $user = new \App\Models\Users;
        $user->setFirstName('  Billy    ');
        $user->setLastName('  Garrett     ');
        $this->assertEquals($user->getFirstName(),'Billy');
        $this->assertEquals($user->getLastName(),'Garrett');
    }

    public function testEmailAddressCanBeSet()
    {
        $user = new \App\Models\Users;
        $user->setEmail('billy@codecourse.com');
        $this->assertEquals($user->getEmail(),'billy@codecourse.com');
    }

    public function testEmailVariableContainCorrectValues()
    {
        $user = new \App\Models\Users;
        $user->setFirstName('Billy');
        $user->setLastName('Garrett');
        $user->setEmail('billy@codecourse.com');
        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'],'Billy Garrett');
        $this->assertEquals($emailVariables['email'],'billy@codecourse.com');
    }

}

 ?>