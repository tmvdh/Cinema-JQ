<?php

use PDO;
require_once("DBconfig.php");


class ScreenDAO
{
    public function getScreen($Show_ID)
    {
        $sql = "select Seats, Width from screens inner join shows on screens.Screen_ID = shows.Screen_ID where shows.Show_ID = $Show_ID";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $resultSet = $dbh->query($sql);
            $result = $resultSet->fetch();
            return $result;
            $dbh = null;

}
}