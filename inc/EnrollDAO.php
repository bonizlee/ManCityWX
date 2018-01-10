<?php

require_once 'DBUtility.php';

class EnrollDAO {

    function loginCheck($username, $password) {
        $db = new ConnectionMySQL();
        $sql = "SELECT * FROM UserInfo where name='" . $username . "' and password='" . $password . "'";

        $result = $db->query($sql);
        $row = $db->fetch_array($result);
        if ($row['Name'] == '') {
            return NULL;
        } else {
            return $row;
        }
    }

    function checkRoom($room,$drawId) {
        $db = new ConnectionMySQL();

        $sql = "SELECT count(*) C from enroll where room='" . $room . "' and drawid='".$drawId ."'";
        $result = $db->query($sql);
        $row = $db->fetch_array($result);
        if ($row['C'] < 2) {            
            return TRUE;
        } else {
            return FALSE;
        }        
    }
    
    function checkName($pname,$room,$drawId) {
        $db = new ConnectionMySQL();

        $sql = "SELECT count(*) C from enroll where room='" . $room . "' and drawid='".$drawId ."' and pname='".$pname."'";
        $result = $db->query($sql);
        $row = $db->fetch_array($result);
        if ($row['C'] < 1) {            
            return TRUE;
        } else {
            return FALSE;
        }        
    }

    function addEnroll($pname,$room,$mobile,$idno,$wxid,$drawId) {
        $db = new ConnectionMySQL();
        $dt = new DateTime();
		$eDate = $dt->format('Y-m-d H:i:s');
		
        $sql = "insert into enroll(pname,room,mobile,idno,wxid,drawid,eDate) values('$pname','$room','$mobile','$idno','$wxid',$drawId,'$eDate')";
        $result = $db->query($sql);
        if ($result > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
