<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     abstract class UserAbstract{
         abstract public function showInfo();
     }

     class User extends UserAbstract{
         //свойства
         public $name = '';
         public $login = '';
         public $password = '';

         //конструктор
         function __construct($name, $login, $password)
         {
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

     interface ISuperUser{
         public function getInfo();
     }

     interface IAuthorizeUser{
         public function auth($login, $password);
     }

     class SuperUser extends User implements ISuperUser, IAuthorizeUser{
        
        public $role = '';
        
        function __construct($name, $login, $password, $role)
        {
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


     $user = new SuperUser("Unknown Groundhog", "supergroundhog1", "supergroundhog", "boss");
     print_r($user -> getInfo());
     echo "<br>";
     if($user -> auth("supergroundhog1", "supergroundhog")){
         echo "Auth: true";
     } else echo "Auth: false";

     echo "<br><br>";

     $user -> showInfo();

     $user1 = new User("Mark", "mark01", "12345");
     $user1 -> showInfo();
 
     $user2 = new User("Nikola", "nikola02", "54321");     
     $user2 -> showInfo();
 
     $user3 = new User("Konstanta", "konstanta03", "345123");
     $user3 -> showInfo();




    ?>
</body>
</html>