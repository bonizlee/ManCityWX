<?php
	class EnrollModel{
		public $_enrollId;	
		public $_pname;
		public $_room;
		public $_mobile;
		public $_idno;
		public $_wxid;
		public $_drawId;
		public $_eDate;
		public $_isWin;	

		public function __construct() {
			$this->_enrollId="";
			$this->_pname="";
			$this->_room="";
			$this->_mobile="";
			$this->_idno="";
			$this->_wxid="";
			$this->_drawId="";
			$this->_eDate="";
			$this->_isWin="";		
		}

		public function __construct0($pname,$room,$mobile,$idno,$wxid,$drawid,$eDate,$isWin) {
			$this->_pname=$pname;
			$this->_room=$room;
			$this->_mobile=$mobile;
			$this->_idno=$idno;
			$this->_wxid=$wxid;
			$this->_drawId=$drawid;
			$this->_eDate=$eDate;
			$this->_isWin=$isWin;
		}
	}
?>