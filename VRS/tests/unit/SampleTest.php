<?php

    class SampleTest extends \PHPUnit_Framework_TestCase
    {
        /*public function testTrueAssertsToTrue()
        {
            $this->assertFalse(false);
        } */

        public function huh()
        {
            $user = new \application\views\venue;

            $user->set_whether_it_is_a_string('Lolol');

            $this->assertEquals($user->get_whether_it_is_a_string());
        }
    }

?>