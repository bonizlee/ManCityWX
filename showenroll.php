<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>查看报名情况</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    -->
    <link href="assets/fonts/googlefonts/fonts.css" rel="stylesheet" type='text/css' />
</head>
<body>
    <div id="wrapper">
        <!-- include nav -->
        <?php
        	include_once("nav.php");
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">报名情况清单</h1>
                       <!-- <h1 class="page-subhead-line">报名详情 </h1>-->

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	报名详情 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered table-hover" data-tableName="EnrollList">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>房号</th>
                                            <th>姓名</th>
                                            <th>电话</th>
                                            <th>微信号</th>
                                            <th>报名时间</th>
                                            <th>是否中奖</th>
                                        </tr>
                                    </thead>
                                    <tbody id="enrolltable">
                                        <!--
                                        <tr>
                                            <td>1</td>
                                            <td>1-1001</td>
                                            <td>测试</td>
                                            <td>13313313311</td>
                                            <td>ad</td>
                                            <td>2018</td>
                                        </tr>                                        
                                        -->
                                    </tbody>
                                </table>
                                <button class="btn btn-info" id="export" type="button" disabled="true">导出</button>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                   </div>
                </div>                
            </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <?php
    	include_once("footer.html");
    ?>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jquery.table2excel.min.js"></script>
    <script language="JavaScript">
    	$.post(
    		"enrollDo.php",
    		{queryEnrollByDraw: "TRUE", drawId: "2" },
    		function(data){
    			if(data.result){
    				$(".panel-body").append("<h3 style='color:red'>"+data.msg+"</h3>");
    				return;	
    			}		
    			for( var i = 0; i < data.length; i++ ) {
               		//动态创建一个tr行标签,并且转换成jQuery对象
                	var $trTemp = $("<tr></tr>");
                	//往行里面追加 td单元格
                	$trTemp.append("<td>"+ data[i]._enrollId +"</td>");
                	$trTemp.append("<td>"+ data[i]._room +"</td>");
                	$trTemp.append("<td>"+ data[i]._pname +"</td>");
                	$trTemp.append("<td>"+ data[i]._mobile +"</td>");
                	$trTemp.append("<td>"+ data[i]._wxid +"</td>");
                	$trTemp.append("<td>"+ data[i]._eDate +"</td>");
                	var isWin=data[i]._isWin==1?'Y':'N';
                	$trTemp.append("<td>"+ isWin +"</td>");
                	$trTemp.appendTo("#enrolltable");
                	$("#export").attr("disabled",false);
            }
    	});
    	$("#export").on("click",function(){
    		$("#datatable").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "enroll" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
					fileext: ".xlsx",
					exclude_img: false,
					exclude_links: false,
					exclude_inputs: false
				});
    	});
    </script>
</body>
</html>
