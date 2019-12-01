 <?php 

    class User
    {
        public $first_name;
        public $last_name;

        public function setFirstName($firstName)
        {
            $this->first_name = $firstName;
        }

        public function getFirstName()
        {
            return $this->first_name;
        }

        public function setLastName($lastName)
        {
            $this->last_name = $lastName;
        }

        public function getLastName()
        {
            return $this->last_name;
        }
    }

    class Test05 extends \PHPUnit_Framework_TestCase
    {
        public function testThatWeCanGetTheFirstName()
        {
            $user = new User;
            $user->setLastName('Smith');

            $this->assertEquals($user->getLastName(), 'Smith');

        }

        public function testThatWeCanGetTheLastName()
        {
            $user = new User;
            $user->setFirstName('Billy');

            $this->assertEquals($user->getFirstName(), 'Billy');

        }
    }
 ?>