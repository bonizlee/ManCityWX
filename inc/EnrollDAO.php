<?php

require_once 'DBUtility.php';
require_once 'EnrollModel.php';

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
		$isWin = 0;
        $sql = "insert into enroll(pname,room,mobile,idno,wxid,drawid,eDate,isWin) values('$pname','$room','$mobile','$idno','$wxid',$drawId,'$eDate',$isWin)";
        $result = $db->query($sql);
        if ($result > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function queryEnrollAllByDrawid($drawId){
        $db = new ConnectionMySQL();
        $sql = "SELECT * FROM enroll where drawid='$drawId'";

        $result = $db->query($sql);
        $arrayEnroll = array();
        while($row = $db->fetch_array($result)){            
            //$enroll=new EnrollModel('$row["pName"]','$row["room"]','$row["mobile"]','$row["idno"]','$row["wxid"]','$row["drawId"]','$row["eDate"]','$row["isWin"]');
            $enroll =new EnrollModel();
            $enroll->_enrollId=$row["enrollId"];
            $enroll->_pname=$row["pName"];
            $enroll->_room=$row['room'];
            $enroll->_mobile=$row["mobile"];
            $enroll->_wxid=$row["wxid"];
            $enroll->_drawId=$row["drawId"];
            $enroll->_eDate=$row["eDate"];
            $enroll->_isWin=$row["isWin"];            
            $arrayEnroll[]=$enroll;        
        }
    	return $arrayEnroll;
    }

}
