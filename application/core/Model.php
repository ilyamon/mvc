<?php

class Model
{

    /*
        Модель обычно включает методы выборки данных, это могут быть:
        > методы нативных библиотек pgsql или mysql;
        > методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
        > методы ORM;
        > методы для работы с NoSQL;
        > и др.
    */
    // Метод подключения к базе данных

    public function connect()
    {
        $connect = '';
        try {
            $connect =  new PDO('mysql:host=' . HOST .'; charset=utf8; 
        dbname=' . DATABASE, USERNAME, PASSWORD);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $connect;
    }


    /**
     *
     */
    public function getPosts()
    {
        $data = null;
        try {
            $data = $this->connect()->query("SELECT * FROM  articles")->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $data;
    }







}