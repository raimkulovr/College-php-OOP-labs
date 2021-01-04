<?php
    spl_autoload_register(function ($class_name) {
        include $class_name . '.class.php';
    });
    class NewsDB implements INewsDB{
        const DB_NAME = 'news.db';
        protected $_db;
        
        
        function __construct()
        {
            $_db = new PDO("sqlite:".NewsDB::DB_NAME);
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