<?php

class AppDBConnection
{
    public function __construct()
    {
    }

    public static function getConnection()
    {
        $connection = new mysqli("localhost", "root" , "" ,"address_book_manager");
        if ($connection->connect_error)
        {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
}