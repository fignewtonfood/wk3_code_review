<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "George";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);

            //Act
            $test_client->save();
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name1 = "George";
            $name2 = "Ben";
            $stylist_id = 1;
            $test_client1 = new Client($name1, $stylist_id);
            $test_client1->save();
            $test_client2 = new Client($name2, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client1, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name1 = "George";
            $stylist_id = 1;
            $name2 = "Ben";
            $test_client1 = new Client($name1, $stylist_id);
            $test_client1->save();
            $test_client2 = new Client($name2, $stylist_id);
            $test_client2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

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
