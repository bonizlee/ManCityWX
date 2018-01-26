<?php

require_once 'DBUtility.php';

class DrawDAO {

    function queryDraw() {
        $db = new ConnectionMySQL();
        $sql = "SELECT * FROM draw order by drawId desc";

        $result = $db->query($sql);
        $row = $db->fetch_array($result);
        if ($row['Name'] == '') {
            return NULL;
        } else {
            return $row;
        }
    }

    

}
