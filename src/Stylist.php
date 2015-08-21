<?php
    class Stylist
    {
        private $name;
        private $id;
//constructor
        function __construct($name, $id = null)
        {
            $this->id = $id;
            $this->name = $name;
        }
//getters
        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }
//setter
        function setName($new_name)
        {
            $this->name = $new_name;
        }
        //function to save to table
        function save()
        {
            //SQL string executed to insert clients and their stylist into table
            $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}');");
            //auto-incremented id
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
//function to update entry in table
        function update($new_name)
        {
            //SQL string executed to update stylists names in the table
            $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }
//deletes one entry in table
        function deleteOne()
        {
            //SQL string executed to delete one stylist from table
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
            //SQL string executed to delete all clients that match this stylist from table
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
        }
//returns an array of all clients that belong to specific stylist
        function getClients()
        {
            $clients = Array();
            //SQL string queried to return all clients that match this stylist id
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
            foreach ($returned_clients as $client) {
                $name = $client['name'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new client($name, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }
//finds and returns stylists by stylist id
        static function find($search_id)
        {
            $found_stylist = null;
            $stylists_to_search = Stylist::getAll();
            foreach($stylists_to_search as $stylist){
                $stylist_id = $stylist->getId();
                if($stylist_id == $search_id){
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }
//returns an array of all stylists in table
        static function getAll()
        {
            //SQL string queried to return an array of all stylists in table
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach($returned_stylists as $stylist){
                $name = $stylist['name'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }
//deletes all entries from stylist table
        static function deleteAll()
        {
            //SQL string executed to delete all stylists from table
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }
    }
 ?>
