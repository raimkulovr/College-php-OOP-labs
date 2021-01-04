<?php
class SuperUser extends User implements ISuperUser, IAuthorizeUser{
        static public $countSuperUser = 0;
        public $role = '';
        
        function __construct($name, $login, $password, $role)
        {
           self::$countSuperUser++;

           $this->name = $name;
           $this->login = $login; 
           $this->password = $password; 
           $this ->role = $role;
        }
        
        public function showInfo(){
            echo "Name: ".$this->name."<br>"."Login: ".$this->login."<br>"."Password: ".$this->password."<br>"."Role: ".$this->role."<br><br>";
        }
        public function getInfo()
        {
            return array("\$name"=>"$this->name", "\$login"=>"$this->login", "\$password"=>"$this->password", "\$role"=>"$this->role");
        }

        public function auth($login, $password){
            if($login == $this->login && $password == $this->password){
                return true;
            } else return false;
        }
        
     }