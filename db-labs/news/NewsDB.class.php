<?php
    spl_autoload_register(function ($class_name) {
        include $class_name . '.class.php';
    });
    class NewsDB implements INewsDB{
        const DB_NAME = 'news.db';
        protected $_db;
        
        
        function __construct()
        {
            if(!file_exists(NewsDB::DB_NAME)){
                $_db = new PDO("sqlite:".NewsDB::DB_NAME);
                
                try{
                $_db->beginTransaction();
                $_db->exec("CREATE TABLE msgs(id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, category INTEGER, description TEXT, source TEXT, datetime INTEGER)");
                $_db->exec("CREATE TABLE category(id INTEGER, name TEXT)");
                $_db->exec("INSERT INTO category(id, name) SELECT 1 as id, 'Политика' as name UNION SELECT 2 as id, 'Культура' as name UNION SELECT 3 as id, 'Спорт' as name ");
                $_db->commit();
                } catch(PDOException $e){
                    $_db->rollBack();
                    echo 'запрос не удался: '. $e->getMessage();
                }
                
            }
            
        }
        function saveNews($title, $category, $description, $source){

        }
        function getNews(){

        }
        function showNews($id){

        }
        function __destruct()
        {
            $_db = NULL;
        }
    }

    $news = new NewsDB;