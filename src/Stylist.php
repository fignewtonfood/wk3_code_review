<?php
    class Stylist
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->id = $id;
            $this->name = $name;
        }

        function getName()
        {
            return $this->name;
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
            $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}');");
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

        static function deleteAll()
        {
            // $GLOBALS['DB']->exec("DELETE FROM xxxxx;");
        }
    }
 ?>
