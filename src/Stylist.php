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

        // function getxxxxx()
        // {
        //     return $this->type;
        // }

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
            // $GLOBALS['DB']->exec("INSERT INTO xxxxx (xxxxx2) VALUES ('{$this->getxxxxx()}');");
            // $this->id = $GLOBALS['DB']->lastInsertId();
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
        //     $returned_xxxxx = $GLOBALS['DB']->query("SELECT * FROM xxxxx;");
        //     $xxxxx = array();
        //     foreach($returned_xxxxx as $xxxxx){
        //         $type = $xxxxx['xxxxx'];
        //         $id = $xxxxx['id'];
        //         $new_xxxxx = new xxxxx($xxxxx, $id);
        //         array_push($xxxxx, $new_xxxxx);
        //     }
        //     return $xxxxx;
        // }
        // static function deleteAll()
        // {
        //     $GLOBALS['DB']->exec("DELETE FROM xxxxx;");
        }
    }
 ?>
