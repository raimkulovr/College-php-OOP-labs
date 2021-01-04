<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     
    spl_autoload_register(function ($class_name) {
        include $class_name . '.class.php';
    });
    
     interface IAuthorizeUser{
         public function auth($login, $password);
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

     print "Всего обычных пользователей: ".User::$countUser."; <br>";
     print "Всего супер-пользователей: ".SuperUser::$countSuperUser."; <br>";

     echo "<br><br>";
    ?>
</body>
</html>