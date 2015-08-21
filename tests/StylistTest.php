<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";
    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            stylist::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "Sandra";
            $test_stylist = new Stylist($name);

            //Act
            $test_stylist->save();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name1 = "Sandra";
            $name2 = "Barbara";
            $test_stylist1 = new Stylist($name1);
            $test_stylist1->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist1, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name1 = "Sandra";
            $name2 = "Barbara";
            $test_stylist1 = new Stylist($name1);
            $test_stylist1->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Sandra";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_find()
        {
            //Arrange
            $name1 = "Sandra";
            $test_stylist1 = new Stylist($name1);
            $test_stylist1->save();
            $name2 = "Barbara";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist1->getId());

            //Assert
            $this->assertEquals($test_stylist1, $result);
        }

        function test_update()
        {
            //Arrange
            $name = "Barbara";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $new_name = "Beth";

            //Act
            $test_stylist->update($new_name);
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        // function test_deleteOne()
        // {
        //     //Arrange
        //     $xxxxx1 = "";
        //     $test_xxxxx1 = new xxxxx($xxxxx1);
        //     $test_xxxxx1->save();
        //
        //     $type2 = "";
        //     $test_xxxxx2 = new xxxxx($xxxxx2);
        //     $test_xxxxx2->save();
        //
        //     //Act
        //     $test_xxxxx1->deleteOne();
        //     $result = xxxxx::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_xxxxx2], $result);
        // }

    }
