<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     class User{
         //свойства
         public $name = '';
         public $login = '';
         public $password = '';

         //методы
         public function showInfo(){
             echo "Name: ".$this->name."<br>"."Login: ".$this->login."<br>"."Password: ".$this->password."<br><br>";
         }
     }

     $user1 = new User;
        $user1 -> name = "Mark";
        $user1 -> login = "mark01";
        $user1 -> password = "12345";
     $user1 -> showInfo();

     $user2 = new User;
        $user2 -> name = "Nikola";
        $user2 -> login = "nikola02";
        $user2 -> password = "54321";
     $user2 -> showInfo();

     $user3 = new User;
        $user3 -> name = "Konstanta";
        $user3 -> login = "konstanta03";
        $user3 -> password = "345123";
     $user3 -> showInfo();




    ?>
</body>
</html>