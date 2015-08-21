<?php
    class Client
    {
        private $name;
        private $stylist_id;
        private $id;

        function __construct($name, $stylist_id, $id = null)
        {
            $this->name = $name;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        // function setxxxxx($new_type)
        // {
        //     $this->type = $new_type;
        // }

        // function getId()
        // {
        //     return $this->id;
        // }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        // function update($new_type)
        // {
        //     $GLOBALS['DB']->exec("UPDATE xxxxx SET xxxxx = '{$new_xxxxx}' WHERE id = {$this->getId()};");
        //     $this->setxxxxx($new_xxxxx);
        // }

        // function deleteOne()
        // {
        //     $GLOBALS['DB']->exec("DELETE FROM xxxxx WHERE id = {$this->getId()};");
        // }
        // static function find($search_id)
        // {
        //     $found_xxxxx = null;
        //     $xxxxx_to_search = xxxxx::getAll();
        //     foreach($xxxxx_to_search as $xxxxx){
        //         $xxxxx_id = $xxxxx->getId();
        //         if($xxxxx_id=== $search_id){
        //             $found_xxxxx = $xxxxx;
        //         }
        //     }
        //     return $found_xxxxx;
        // }

        static function getAll()
        {
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

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }
    }
 ?>
