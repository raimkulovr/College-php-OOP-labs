<?php
$namesArray = ['title', 'category', 'description', 'source'];
for($i=0; $i<sizeOf($namesArray); $i++){
    if($_POST[$namesArray[$i]]==""){
        
        $errMsg = "<b style='color: #F20C10'>Заполните все поля формы!</b>";
    }
}

if($errMsg==""){
        
        if($news->saveNews($_POST['title'], $_POST['category'], $_POST['description'], $_POST['source'])){
            header("Refresh: 0");
        } else {
            $errMsg = "Произошла ошибка при добавлении новости";
        }
    
}
