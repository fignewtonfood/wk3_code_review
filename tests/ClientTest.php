<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";
    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
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

        function test_getId()
        {
            //Arrange
            $name = "George";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_find()
        {
            //Arrange
            $stylist_name1 = "Sandra";
            $test_stylist1 = new Stylist($stylist_name1);
            $test_stylist1->save();
            $stylist_name2 = "Barbara";
            $test_stylist2 = new Stylist($stylist_name2);
            $test_stylist2->save();

            $client_name1 = "George";
            $stylist_id1 = $test_stylist1->getId();
            $test_client1 = new Client($client_name1, $stylist_id1);
            $test_client1->save();
            $client_name2 = "Ben";
            $stylist_id2 = $test_stylist2->getId();
            $test_client2 = new Client($client_name2, $stylist_id2);
            $test_client2->save();

            //Act
            $result = Client::find($test_stylist1->getId());

            //Assert
            $this->assertEquals($test_client1, $result);
        }

        function test_update()
        {
            //Arrange
            $name = "George";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            $new_name = "Greg";

            //Act
            $test_client->update($new_name);
            $result = $test_client->getName();

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
        //     $stylist_name2 = "";
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
