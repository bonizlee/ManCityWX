<?php
	require_once("./inc/EnrollDAO.php");
	header('Content-type:text/json;charset=utf-8');//
	/*
	$pname='Tom';
	$room='4-1701';
	$mobile='1333333333';
	$idno='533213';
	$wxid='bonizlee';
	$drawId='1';
	*/
	
	if (isset($_POST["addEnroll"])) {
            if (!isset($_POST["pname"])||$_POST["pname"] == "") {
                $json = array('result'=>'faild','msg'=>'未填写姓名');
            }else if (!isset($_POST["room"])||$_POST["room"] == "") {
                $json = array('result'=>'faild','msg'=>'未填写房间号');
            }else if (!isset($_POST["mobile"])||$_POST["mobile"] == "") {
                $json = array('result'=>'faild','msg'=>'未填写手机');
            }else if (!isset($_POST["idno"])||$_POST["idno"] == "") {
                $json = array('result'=>'faild','msg'=>'未填写身份证后8位');
            }else if (!isset($_POST["wxid"])||$_POST["wxid"] == "") {
                $json = array('result'=>'faild','msg'=>'未填写微信号');
            }else if (!isset($_POST["drawId"])||$_POST["drawId"] == "") {
                $json = array('result'=>'faild','msg'=>'未提供正确抽奖活动');
            }
            else{
            	$pname=$_POST["pname"]; 
            	$room=$_POST["room"]; 
            	$mobile=$_POST["mobile"]; 
            	$idno=$_POST["idno"]; 
            	$wxid=$_POST["wxid"]; 
            	$drawId=$_POST["drawId"];	
				$json=addEnroll($pname,$room,$mobile,$idno,$wxid,$drawId);
		}
	
		echo json_encode($json);
	}
	
	function addEnroll($pname,$room,$mobile,$idno,$wxid,$drawId){
		$enrollDao=new EnrollDAO();
		if(!$enrollDao->checkRoom($room,$drawId)){
			$json = array('result'=>'faild','msg'=>'同一户只能两人参与');
			return $json;
		}
		if(!$enrollDao->checkName($pname,$room,$drawId)){
			$json = array('result'=>'faild','msg'=>'你已经报名本次抽奖');
			return $json;
		}
	
	
		if($enrollDao->addEnroll($pname,$room,$mobile,$idno,$wxid,$drawId)){
			$json = array('result'=>'success','msg'=>$pname.'，你已经报名成功');
		}	
		else{
			$json = array('result'=>'faild','msg'=>'报名失败，请联系管理员');
		}	
		return $json;
	}
	
?>