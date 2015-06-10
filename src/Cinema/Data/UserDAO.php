<?php

use PDO;
require_once("DBConfig.php");


class UserDAO
{

    public function addUser($fname, $sname, $email)
    {
        $sql = "insert into users (Fname, Sname, Email) values ('$fname', '$sname', '$email')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $id = $dbh->lastInsertId();
        $dbh = null;
        return $id;
    }
}