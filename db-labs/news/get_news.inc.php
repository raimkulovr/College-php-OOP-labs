<?php
$data = $news->getNews();
if(gettype($data) == "array"){
    echo "<h3>Количество записей: ".count($data)."</h3>";
} else $errMsg = "Произошла ошибка при выводе новостной ленты";

foreach ($data as $row) {
    print "<div style='display: flex; flex-direction: column;width: 800px; max-height: 400px; border: 2px solid black; margin-bottom: 30px; padding-left: 10px; padding-bottom: 10px;'>";
    print "<h4 style='text-transform: uppercase; font-size: 20px; margin: 0; padding-top: 10px'>".$row['title']."</h4>";
    print "<i>".$row['category']."</i>";
    print "<p>".$row['description']."</p>";
    print "<cite >".$row['source']."</cite>";
    print "<form method='get'>";
    print "<input name='msgId' type='hidden' value='$row[id]'>";
    print "<input type='submit' value='Перейти к статье' style='margin-top: 30px;'/>";
    print "</form>";
    print "</div>";
    
}

