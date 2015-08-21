<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";
// server signin
    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
//tearDown function runs after every method
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }
//spec 1
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
//spec 2
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
//spec 3
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
//spec 7
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
//spec 9
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
//spec 11
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
//spec 14
        function test_deleteOne()
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
            $test_client2 = new Client($client_name2, $stylist_id1);
            $test_client2->save();

            $client_name3 = "Brad";
            $stylist_id2 = $test_stylist2->getId();
            $test_client3 = new Client($client_name3, $stylist_id2);
            $test_client3->save();
            $client_name4 = "Greg";
            $test_client4 = new Client($client_name4, $stylist_id2);
            $test_client4->save();

            //Act
            $test_stylist1->deleteOne();
            $result1 = Stylist::getAll();
            $result2 = Client::getAll();

            //Assert
            $this->assertEquals([$test_stylist2], $result1);
            $this->assertEquals([$test_client3, $test_client4], $result2);
        }
    }
