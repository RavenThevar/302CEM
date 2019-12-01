<?php

    class Test02 extends \PHPUnit_Framework_TestCase
    {
        public function test_get_category_list()
        {
            $expected = [
                1 => 'Somersville',
                2 => 'Hunting',
                3 => 'Jack Drive',
            ];

            $list = $this->obj->get_category_list();

            foreach ($list as $category) 
            {
                $this->assertEquals($expected[$category->id], $category->name);
            }
        }
    }
?>