<?php
    class User{
        private $username;
        private $role;
        public function __construct(){
        $this->username = "unset";
        $this->role = "0";
        }
        public function setUser($username,$role){
            $this->username = $username;
            $this->role = $role;
        }
        public function getUser(){
            return $this->username;
        }
        public function getRole(){
            return $this->role;
        }
    }
?>