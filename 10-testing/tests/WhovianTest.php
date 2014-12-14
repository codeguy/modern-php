<?php
require dirname(__DIR__) . '/src/Whovian.php';

class WhovianTest extends PHPUnit_Framework_TestCase
{
    public function testSetsDoctorWithConstructor()
    {
        $whovian = new Whovian('Peter Capaldi');
        $this->assertAttributeEquals('Peter Capaldi', 'favoriteDoctor', $whovian);
    }

    public function testSaysDoctorName()
    {
        $whovian = new Whovian('David Tennant');
        $this->assertEquals('The best doctor is David Tennant', $whovian->say());
    }

    public function testRespondToInAgreement()
    {
        $whovian = new Whovian('David Tennant');

        $opinion = 'David Tennant is the best doctor, period';
        $this->assertEquals('I agree!', $whovian->respondTo($opinion));
    }

    /**
     * @expectedException Exception
     */
    public function testRespondToInDisagreement()
    {
        $whovian = new Whovian('David Tennant');

        $opinion = 'No way. Matt Smith was awesome!';
        $whovian->respondTo($opinion);
    }
}
