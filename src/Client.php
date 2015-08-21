<?php
    class Client
    {
        private $name;
        private $stylist_id;
        private $id;
//constructor
        function __construct($name, $stylist_id, $id = null)
        {
            $this->name = $name;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }
//getters
        function getName()
        {
            return $this->name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function getId()
        {
            return $this->id;
        }
//the only setter required
        function setName($new_name)
        {
            $this->name = $new_name;
        }
//function to save to table
        function save()
        {
            //SQL string executed to insert clients and their stylist into table
            $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()});");
            //auto-incremented id
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
//function to update entry in table
        function update($new_name)
        {
            //SQL string executed to update clients names in the table
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }
//deletes one entry in table
        function deleteOne()
        {
            //SQL string executed to delete one client from table
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }
//finds and returns clients by stylist id
        static function find($search_id)
        {
            $found_clients = null;
            $clients_to_search = Client::getAll();
            foreach($clients_to_search as $client){
                $stylist_id = $client->getStylistId();
                if($stylist_id == $search_id){
                    $found_clients = $client;
                }
            }
            return $found_clients;
        }

//finds and returns clients by client id
        static function findByClientId($search_id)
        {
            $found_clients = null;
            $clients_to_search = Client::getAll();
            foreach($clients_to_search as $client){
                $client_id = $client->getId();
                if($client_id == $search_id){
                    $found_clients = $client;
                }
            }
            return $found_clients;
        }
//returns an array of all clients in table
        static function getAll()
        {
            //SQL string queried to return an array of all clients in table
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client){
                $name = $client['name'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($name, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }
//deletes all entries from client table
        static function deleteAll()
        {
            //SQL string executed to delete all clients from table
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }
    }
 ?>
