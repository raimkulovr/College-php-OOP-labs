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
                $this->_db = new PDO("sqlite:".NewsDB::DB_NAME);
                
                try{
                    $this->_db->beginTransaction();
                    $this->_db->exec("CREATE TABLE msgs(id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, category INTEGER, description TEXT, source TEXT, datetime INTEGER)");
                    $this->_db->exec("CREATE TABLE category(id INTEGER, name TEXT)");
                    $this->_db->exec("INSERT INTO category(id, name) SELECT 1 as id, 'Политика' as name UNION SELECT 2 as id, 'Культура' as name UNION SELECT 3 as id, 'Спорт' as name ");
                    $this->_db->commit();
                } catch(PDOException $e){
                    $this->_db->rollBack();
                    echo 'запрос не удался: '. $e->getMessage();
                }       
            } else $this->_db = new PDO("sqlite:".NewsDB::DB_NAME);
            
        }

        function saveNews($title, $category, $description, $source){
            $dt = time();
            //$_SERVER['REQUEST_TIME']
            
            $sql = "INSERT INTO msgs(title, category, description, source, datetime) 
                    VALUES('$title', '$category', '$description', '$source', '$dt')";
                    //echo $sql;
                         
            if($this->_db->exec($sql)){
                return true;
            }else return false;
            
        }

        function getNews(){
            $sql = "SELECT msgs.id as id, title, category.name as category, description, source, 
                datetime FROM msgs, category WHERE category.id = msgs.category ORDER BY msgs.id DESC";
            $data = $this->_db->query($sql);
            return($data->fetchAll());

        }
        function showNews($id){

        }
        function __destruct()
        {
            $_db = NULL;
        }
    }
