<?php

class Configdb
{

public static function GetConnection()
    {
    try 
    {
    
        $dsn="mysql:dbname=system";
        $user="root";
        $pw="";
        $conn=new PDO($dsn,$user,$pw);
        return $conn;
    } 
    catch (Exception $e) //Special Exception class
        {
        
            throw $e;
        }
    }
}
?>