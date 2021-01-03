<?php
class User extends UserAbstract{
         //свойства
         static public $countUser = 0;
         public $name = '';
         public $login = '';
         public $password = '';

         //конструктор
         function __construct($name, $login, $password)
         {
            self::$countUser++;

            $this->name = $name;
            $this->login = $login; 
            $this->password = $password; 
         }
        
         //методы
         public function showInfo(){
             echo "Name: ".$this->name."<br>"."Login: ".$this->login."<br>"."Password: ".$this->password."<br><br>";
         }

         function __destruct()
         {
             print "Пользователь ".$this->login." удален <br><br>";
         }
     }
     ?>