<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Stylist::deleteAll();
        // }

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

        // function test_getAll()
        // {
        //     //Arrange
        //     $xxxxx1 = "";
        //     $xxxxx2 = "";
        //     $test_xxxxx1 = new xxxxx($xxxxx1);
        //     $test_xxxxx1->save();
        //     $test_xxxxx2 = new xxxxx($xxxxx2);
        //     $test_xxxxx2->save();
        //
        //     //Act
        //     $result = xxxxx::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_xxxxx1, $test_xxxxx2], $result);
        // }

        // function test_deleteAll()
        // {
        //     //Arrange
        //     $xxxxx1 = "";
        //     $xxxxx2 = "";
        //     $test_xxxxx1 = new xxxxx($xxxxx1);
        //     $test_xxxxx1->save();
        //     $test_xxxxx2 = new xxxxx($xxxxx2);
        //     $test_xxxxx2->save();
        //
        //     //Act
        //     xxxxx::deleteAll();
        //
        //     //Assert
        //     $result = xxxxx::getAll();
        //     $this->assertEquals([], $result);
        // }

        // function test_getId()
        // {
        //     //Arrange
        //     $xxxxx = "";
        //     $test_xxxxx = new xxxxx($xxxxx);
        //     $test_xxxxx->save();
        //
        //     //Act
        //     $result = $test_xxxxx->getId();
        //
        //     //Assert
        //     $this->assertEquals(true, is_numeric($result));
        // }

        // function test_find()
        // {
        //     //Arrange
        //     $xxxxx1 = "";
        //     $test_xxxxx1 = new xxxxx($xxxxx1);
        //     $test_xxxxx1->save();
        //     $xxxxx2 = "";
        //     $test_xxxxx2 = new xxxxx($xxxxx2);
        //     $test_cxxxxx2->save();
        //
        //     //Act
        //     $result = xxxxx::find($test_xxxxx1->getId());
        //
        //     //Assert
        //     $this->assertEquals($test_xxxxx1, $result);
        // }

        // function test_update()
        // {
        //     //Arrange
        //     $xxxxx = "";
        //     $test_xxxxx = new xxxxx($xxxxx);
        //     $test_xxxxx->save();
        //
        //     $new_xxxxx = "";
        //
        //     //Act
        //     $test_xxxxx->update($new_xxxxx);
        //     $result = $test_xxxxx->getxxxxx();
        //
        //     //Assert
        //     $this->assertEquals($new_xxxxx, $result);
        //
        // }

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
