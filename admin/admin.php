<?php
include("../include/session.php");
global $database;
?>
<html>
<head>
<title>Talent Hunt:administration</title>
  <link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link type="text/css" href="../css/jquery-ui-1.7.1.custom.css" rel="stylesheet" />	
<link rel="stylesheet" type="text/css" href="../css/flexigrid/flexigrid.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.7.1.custom.min.js"></script>
		<script type="text/javascript" src="../js/flexigrid.js"></script>
		<script>
		$(document).ready(function(){ 
		$("#tabs").tabs();
		$("#flex1").flexigrid
			(
			{
			url: 'brandb.php',
			dataType: 'json',
			colModel : [
				{display: 'branch Id', name : 'bran_id', width : 80, sortable : true, align: 'center'},
			  {display: 'branch name', name : 'bran_name', width : 120, sortable : true, align: 'left'}
				],
			buttons : [
				{name: 'Add', bclass: 'add', onpress : test1},
				{name: 'Delete', bclass: 'delete', onpress : test1},
				{separator: true}
				],
				searchitems : [
				{display: 'Branch', name : 'bran_name'}

				],
			sortname: "bran_id",
			sortorder: "asc",
			usepager: true,
			title: 'Branches',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 700,
			singleSelect:true,
			height: 200,
			method: 'POST'
			}
			); 
			
			function test1(com,grid)
			{
				   if (com=='Delete')
                         {
                          if(confirm('Are u sure to delete this Branch'))
                           {
                             var items = $('.trSelected',grid); var vbranid=items[0].id.substr(3);
                             $.post("adminprocess.php",{delbran:1,branid:vbranid});
                             $("#flex1").flexReload();
                           }
                         }			
        	else if (com=='Add')
					{
					  $("#form1").toggle();
					  $("#brn").focus();
					}			
			}
			$("#flex2").flexigrid
			(
			{
			url: 'qsdb.php',
			dataType: 'json',
			colModel : [
				{display: 'Question Id', name : 'q_id', width : 40, sortable : true, align: 'center'},
				{display: 'Question', name : 'q_text', width : 180, sortable : true, align: 'left'},
				{display: 'Option1', name : 'q_op1', width : 120, sortable : false, align: 'left'},
				{display: 'Option2', name : 'q_op2', width : 120, sortable : false, align: 'left'},
				{display: 'Option3', name : 'q_op3', width : 120, sortable : false, align: 'left'},
				{display: 'Option4', name : 'q_op4', width : 120, sortable : false, align: 'left'},
				{display: 'Correct ans', name : 'q_ans', width : 120, sortable : true, align: 'left'},
				{display: 'Under Topic', name : 'top_id', width : 120, sortable : true, align: 'left'}
				],
			buttons : [
				{name: 'Add', bclass: 'add', onpress : test2},
				{name: 'Delete', bclass: 'delete', onpress : test2},
				{separator: true}
				],
				searchitems : [
				{display: 'subject', name : 'sub_id'}

				],
			sortname: "q_id",
			sortorder: "asc",
			usepager: true,
			title: 'Questions',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 1000,
			singleSelect:true,
			height: 200,
			resizable: true
			}
			); 
			function test2(com,grid)
			{
                        if (com=='Delete')
                         {
                          if(confirm('Are u sure to delete this question'))
                           {
                             var items = $('.trSelected',grid); var vqid=items[0].id.substr(3);
                             $.post("adminprocess.php",{delq:1,qid:vqid});
                             $("#flex2").flexReload();
                           }
                         }

				else if (com=='Add')
					{
					  $("#form2").slideToggle();
					  $("#qtext").focus();
					}			
			}
			
			$("#flex3").flexigrid
			(
			{
			url: 'subjectsdb.php',
			dataType: 'json',
			colModel : [
				{display: 'Subject Id', name : 'sub_id', width : 40, sortable : true, align: 'center'},
				{display: 'Subject Title', name : 'sub_title', width : 180, sortable : true, align: 'left'},
				{display: 'under Branch', name : 'bran2_id', width : 120, sortable : true, align: 'left'}
				],
			buttons : [
				{name: 'Add', bclass: 'add', onpress : test3},
				{name: 'Delete', bclass: 'delete', onpress : test3},
				{separator: true}
				],
				searchitems : [
				{display: 'subject', name : 'sub_id'}

				],
			sortname: "sub_id",
			sortorder: "asc",
			usepager: true,
			title: 'Subjects',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 700,
			singleSelect:true,
			height: 200,
  		resizable: true
			}
			); 
			function test3(com,grid)
			{
                              if (com=='Delete')
                         {
                          if(confirm('Are u sure to delete this subject'))
                           {
                             var items = $('.trSelected',grid); var vsubid=items[0].id.substr(3);
                             $.post("adminprocess.php",{delsubj:1,subid:vsubid});
                             $("#flex3").flexReload();
                           }
                         }
				else if (com=='Add')
					{
					  $("#form3").slideToggle();
					  $("#subname").focus();
					}			
			}
		$("#flex4").flexigrid
			(
			{
			url: 'topicsdb.php',
			dataType: 'json',
			colModel : [
				{display: 'Id', name : 'top_id', width : 40, sortable : true, align: 'center'},
				{display: 'Topic Title', name : 'top_title', width : 180, sortable : true, align: 'left'},
				{display: 'under subject', name : 'sub_id', width : 120, sortable : true, align: 'left'}
				],
			buttons : [
				{name: 'Add', bclass: 'add', onpress : test4},
				{name: 'Delete', bclass: 'delete', onpress : test4},
				{separator: true}
				],
				searchitems : [
				{display: 'subject', name : 'sub_id'}

				],
			sortname: "top_id",
			sortorder: "asc",
			usepager: true,
			title: 'Topics',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 700,
			singleSelect:true,
			height: 200,
  		resizable: true
			}
			); 
			function test4(com,grid)
			{
				   if (com=='Delete')
                         {
                          if(confirm('Are u sure to delete this topic'))
                           {
                             var items = $('.trSelected',grid); var vtopid=items[0].id.substr(3);
                             $.post("adminprocess.php",{deltop:1,topid:vtopid});
                             	$("#flex4").flexReload();
                           }
                         }
				else if (com=='Add')
					{
					  $("#form4").slideToggle(1000);
					  $("#topname").focus();
					}			
			}
			$("#flex5").flexigrid
			(
			{
			url: 'usersdb.php',
			dataType: 'json',
			colModel : [
				{display: 'Username', name : 'username', width : 100, sortable : true, align: 'center'},
				{display: 'Level', name : 'userlevel', width : 40, sortable : true, align: 'left'},
				{display: 'Emailid', name : 'email', width : 120, sortable : true, align: 'left'},
				{display: 'Last Active', name : 'timestamp', width : 130, sortable : true, align: 'left'},
				{display: 'Results', name : 'viewresults', width : 130, sortable : false, align: 'left'},
				{display: 'Branch', name : 'branch_id', width : 45, sortable : true, align: 'right'}
				],
			buttons : [
				{name: 'Delete', bclass: 'delete', onpress : test5},
        {name: 'ChangePass', bclass: 'pass', onpress : test5},
        {name: 'update userlevel', bclass: 'updlevel', onpress : test5},
				{separator: true}
				],
		
			sortname: "username",
			sortorder: "asc",
			usepager: true,
			title: 'Users',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 700,
			singleSelect:true,
			height: 200,
			resizable: true
			}
			); 
      function test5(com,grid)
			{
				  if (com=='Delete')
        {
           if($('.trSelected',grid).length>0){
			   if(confirm('are you sure to delete this user')){
		     var items = $('.trSelected',grid); var vusername=items[0].id.substr(3);
         $.post("adminprocess.php",{deluser:vusername,subdeluser:1},function(data){$("#flex5").flexReload();alert("successfully deleted "+vusername)});

				}
			} else {
				return false;
			} 
        }
							
                         else if (com=='ChangePass')
                          {
                  		     var items = $('.trSelected',grid); var vusername=items[0].id.substr(3);
                           $("#passform").slideToggle(1000);
                           $("#subuser").val(vusername);
                          }
                          
                         else if (com=='update userlevel')
                          {
                  		     var items = $('.trSelected',grid); var vusername=items[0].id.substr(3);
                           $("#upduser").slideToggle(1000);
                           $("#upduser #subuser").val(vusername);
                          }
			}
			$("#chgpass").click(
			function(){
			$.post("adminprocess.php",{chgpass:1,subnewpass:$("#newpass").val(),subuser:$("#subuser").val()},function(data){if(data)alert("successfully changed"); else alert("not changed");});
                  $("#passform").slideToggle(1000);
                  $("#newpass").val("");
			});
			$("#subq").click(function(){
			$.post("adminprocess.php",{addq:1,qtext:$("#qtext").val(),qop1:$("#op1").val(),qop2:$("#op2").val(),qop3:$("#op3").val(),qop4:$("#op4").val(),qans:$("#corans").val(),topid:$("#topid").val()});
			$("#flex2").flexReload();
			$("#form2").hide();
			});
			$("#brsub").click(function(){
			$.post("adminprocess.php",{addbran:1,branname:$("#brn").val()});
				$("#flex1").flexReload();
			$("#form1").hide();
			});
			$("#subjsub").click(function(){
			$.post("adminprocess.php",{addsub:1,branid:$("#branid").val(),subname:$("#subname").val()});
				$("#form3").hide();
				$("#flex3").flexReload();
			});
			$("#topsub").click(function(){
			$.post("adminprocess.php",{addtop:1,topname:$("#topname").val(),subid:$("#subn").val()});
				$("#form4").hide();
				$("#flex4").flexReload();
			});
			$("#subupd").click(function(){
			$.post("adminprocess.php",{subupdlevel:1,updlevel:$("#updlevel").val(),upduser:$("#upduser #subuser").val()});
			$("#upduser").slideToggle(1000);
				$("#flex5").flexReload();
			});

		});
		</script>
		<style>
		#tabs{font-size:75%;}
		.flexigrid div.fbutton .add
		{
			background: url(../css/images/add.png) no-repeat center left;
		}	

	.flexigrid div.fbutton .delete
		{
			background: url(../css/images/close.png) no-repeat center left;
		}	
                 .flexigrid div.fbutton .pass
                            { 
                            background: url(../css/images/password.png) no-repeat center left;
                            padding-left:12px;
                            }
                  .flexigrid div.fbutton .updlevel
                            { 
                            background: url(../css/images/upduser.png) no-repeat center left;
                            padding-left:12px;
                            }            
		body{background:url(../images/banner.jpg) top center no-repeat ;margin-top:275px;}
		</style>
</head>
<body>
<div id="tabs">
<ul>
<li><a href="#tabs1">Branches</a></li>
<li><a href="#tabs2">Questions</a></li>
<li><a href="#tabs3">Subjects</a></li>
<li><a href="#tabs4">topics</a></li>
<li><a href="#tabs5">Users</a></li>
</ul>
<div id="tabs1"><table id="flex1" style="display:none"></table><div id="form1" style="display:none;"><b>Branch name:</b><input type="text" id="brn"><input type="button" value="submit" id="brsub"></div></div>
<div id="tabs2"><table id="flex2" style="display:none"></table><div id="form2" style="display:none;"><table><tr><td>Question text</td><td><textarea name="qtext" id="qtext"></textarea></td></tr><tr><td>option1</td><td><input type="text" id="op1" name="qop1"></td></tr><tr><td>option2</td><td><input type="text" id="op2" name="qop2"></td></tr><tr><td>option3</td><td><input type="text" id="op3" name="qop3"></td></tr><tr><td>option4</td><td><input type="text" id="op4" name="qop4"></td></tr><tr><td>correct option</td><td><select id="corans"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td></tr><tr><td>topic</td><td><select id="topid"><?php $database->topicslist();?></select></td></tr><tr><td><input type="button" value="submit" id="subq"></td><td></td></tr></table></div></div>
<div id="tabs3"><table id="flex3" style="display:none"></table><div id="form3" style="display:none;"><table><tr><td>subject name:</td><td><input type="text" id="subname"></td></tr><tr><td>branch id:</td><td><select id='branid'><?php $database->pbrnches();?></select></td></tr><tr><td><input type="button" value="submit" id="subjsub"></td></tr></table></div></div>
<div id="tabs4"><table id="flex4" style="display:none"></table><div id="form4" style="display:none;"><table><tr><td>topic title:</td><td><input type="text" id="topname"></td></tr><tr><td>subject name:</td><td><select id="subn"><?php $database->psubs();?></select></td></tr><tr><td><input type="button" value="submit" id="topsub"></td></tr></table></div></div>
<div id="tabs5"><table id="flex5" style="display:none"></table><div id="upduser" style="display:none;"><select id="updlevel">
<option value="1">1
<option value="9">9
</select>
<input type="hidden" id="subuser"><input type="button" value="submit" id="subupd"></div><div id="passform" style="display:none;"><b>new password:<input type="password" id="newpass"><input type="hidden" id="subuser"><input type="button" id="chgpass" value="change"></div>
</div>
</body>
</html>
