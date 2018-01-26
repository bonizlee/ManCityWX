<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>抽奖报名</title>
    <link rel="stylesheet" href="css/weui.min.css"/>
    <link rel="stylesheet" href="css/jquery-weui.min.css"/>
    <link rel="stylesheet" href="css/demos.css"/>
</head>
<body ontouchstart>
	<header class="demos-header">
		<h1 class="demos-title">晾霸晾衣架抽奖报名</h1>
    </header>
    <div class="page__bd">
    	<article class="weui-article">
    		<section>
    			<p>晾霸晾衣架团购，抽奖送手机话费推广活动</p>  
    		</section>
			<section>
    			<p style="color:#FF0000">声明：填写以下信息并提交，代表您同意在中奖时本公众号将报名信息提供给奖品赞助商进行信息核对</p>  
    		</section>
    		<div class="weui-media-box weui-media-box_text">    				
    				
    		</div>
    		<h3>报名登记</h3>
    		<div class="weui-cells weui-cells_form">    			
    			<div class="weui-cell">
    				<div class="weui-cell__hd"><label class="weui-label">房号</label></div>
    				<div class="weui-cell__bd">    					
    					<input class="weui-input" id="room" placeholder="Y-XXXX格式。例：2-0901">
    				</div>    				
    			</div>
    			<div class="weui-cell">
    				<div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
    				<div class="weui-cell__bd">    					
    					<input class="weui-input" id="pname" placeholder="需真实姓名，以兑奖验证">
    				</div>    				
    			</div>
    			<div class="weui-cell">
    				<div class="weui-cell__hd">
    					<label class="weui-label">手机号</label>
    				</div>
    				<div class="weui-cell__bd">
    					<input class="weui-input" id="mobile" pattern="^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$" placeholder="请输入手机号">
    				</div>
    			</div>    			
    			<div class="weui-cell">
    				<div class="weui-cell__hd"><label class="weui-label">微信号</label></div>
    				<div class="weui-cell__bd">    					
    					<input class="weui-input" id="wxid" placeholder="请输入微信号">
    				</div>    				
    			</div>
    			<div class="weui-btn-area">
    				<a class="weui-btn weui-btn_primary" href="javascript:" id="postMsg">提交</a>    				
    			</div>
    		</div>    		
		</article>
    </div>
    
    
	<script src="js/jquery-2.1.4.js"></script>
	
	<script src="js/fastclick.js" ></script>
	<script>
		var check=0;
		/**/
		
		$(document).on("blur","#pname",function(){
			var pname=$("#pname").val();
			var re = new RegExp("^[\\u4e00-\\u9fa5]+$");
			var r=re.exec(pname);
			if(r==null){			
				showMessage("格式错误","请输入中文名");
				$("#pname").focus();				
			}
			else{
				check++;
			}					
		});
		
		$(document).on("blur","#room",function(){
			var room=$("#room").val();
			var re = new RegExp("[1-4]-[0-3]\\d{1}0[1-8]");
			var r=re.exec(room);
			if(r==null){			
				showMessage("格式错误","Y-XXXX，栋号-房号。房号为4位");
				$("#room").focus();				
			}
			else{
				check++;
			}					
		});
		
		$("#mobile").on("blur",function(){
			var mobile=$("#mobile").val();
			var re = new RegExp("^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\\d{8}$");
			var r=re.exec(mobile);
			if(r==null){
				showMessage("格式错误","11位手机号码");
				$("#mobile").focus();				
			}
			else{
				check++;
			}					
		});
		
		$("#wxid").on("blur",function(){
			var wxid=$("#wxid").val();
			
			if(wxid==null||wxid==""){			
				showMessage("格式错误","请填写微信号");
				$("#wxid").focus();				
			}
			else{
				check++;
			}					
		});
		
		$("#postMsg").on("click",function(){
			if(check>=4) {
			rjson=JSON.parse($.ajax({
				url:"./enrollDo.php",
				type:"POST",
				data:{addEnroll:"true",
					pname:$("#pname").val(),
					room:$("#room").val(),
					mobile:$("#mobile").val(),					
					wxid:$("#wxid").val(),
					drawId:"2"
				},		
				async:false}).responseText);	
					
			showMessage(rjson.result,rjson.msg); 
			}
		});	
		$(function(){
			FastClick().attach(document.body);	
      });
      
      function showMessage(r,msg){      	
      	if(r=='success'){
      		title='成功'
      		$.toptip('报名成功', 2000, 'success');
      	}
      	else{
      		title='错误'
      		$.toptip('报名失败', 2000, 'error');
      	}
      	$.alert(msg,title);
      }
	</script>
	
	<script src="js/jquery-weui.min.js" ></script>
	
</body>
</html>