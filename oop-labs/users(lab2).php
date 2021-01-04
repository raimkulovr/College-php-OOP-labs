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

     $user1 = new User("Mark", "mark01", "12345");
     $user1 -> showInfo();

    $user2 = new User("Nikola", "nikola02", "54321");     
    $user2 -> showInfo();

    $user3 = new User("Konstanta", "konstanta03", "345123");
    $user3 -> showInfo();




    ?>
</body>
</html>