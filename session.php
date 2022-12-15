<?php
    class User{
        private $username;
        private $role;
        private $name;
        public function __construct(){
        $this->username = "unset";
        $this->name="unset";
        $this->role = "0";
        }
        public function setUser($username,$role,$name){
            $this->username = $username;
            $this->role = $role;
            $this->name = $name;
        }
        public function getUser(){
            return $this->username;
        }
        public function getRole(){
            return $this->role;
        }
        public function getName(){
            return $this->name;
        }
    }
?>