<?php
include("connection.php");
if(isset($_REQUEST["login"])){
$un = $_REQUEST["un"];
$ps = $_REQUEST["ps"];
$sel = mysqli_query($con,"select * from project where dev_id = '$un'");
$fet = mysqli_fetch_array($sel);
	if($un == "" || $ps == ""){
		header("location:index.php?msg=Please fill both fieds");
	}else if(mysqli_num_rows($sel) == 0){
		header("location:index.php?msg=No Record Found..!");
	}else if($fet["pass"] != $ps){
		header("location:index.php?msg=Incorrect Password..");
	}else if($fet["pass"] == $ps){
		header("location:home.php");
	}
}
?>
<html>
<head>
	<title>Login</title>
    <style>
		.tab{background:#999;
		border:solid #000 1.5px;
		border-radius : 7px;
		padding:20px;
		}
		.btn1{
			height:30px;
			width:70px;
			border:solid #00F 1px;
			background-color:#00F;
			border-radius:5px;
			color:#CCC;
		}
		.btn1:hover{
			height:30px;
			width:70px;
			border:solid #000 1px;
			border-radius:10px;
			color:#000;
			background-color:#CCC;
			font-size:14px;
		}
		.btn2{
			height:30px;
			width:70px;
			border:solid #00F 1px;
			background-color:#00F;
			border-radius:5px;
			color:#CCC;
		}
		.btn2:hover{
			height:30px;
			width:70px;
			border:solid #000 1px;
			border-radius:10px;
			color:#000;
			background-color:#CCC;
			font-size:14px;
		}
		.td1{
			background-color:#9CF;
			height:30px;
			text-align:center;
			border:solid #000 0.5px;
			border-radius:3px;
			color:#000;
		}
		.lgn{
			background-color:#999;
			border:2px solid #333;
			border-radius:25px 25px 25px 25px ;
			width:200px;
			height:30px;
			margin-left:570px;
			text-align:center;
			}
	</style>
</head>
<body bgcolor="#CCCCCC">
<?php
if(isset($_REQUEST["msg"])){
	$msg = $_REQUEST["msg"];
}
?>
<script>
	<?php 
	if($msg) { ?>
	alert("<?php echo $msg; ?>");
	<?php
	header("refresh:1;url=index.php"); 
	} ?>
</script>
<br>
<h2 align="center" class="lgn">LOGIN</h2>
<br>
<form method="post">
<table align="center" cellpadding="5" cellspacing="0" class="tab"q	>
<tr><td>Developer Id : </td><td><input class="td1" type="text" name="un" ></td></tr>
<tr><td>Password : </td><td><input class="td1" type="password" name="ps"></td></tr>
<tr><td colspan="2" align="center">
			<input type="submit" name="login" value="Sign In" class="btn1">
            <a href="create.php"><input type="button" value="Sign Up" class="btn2"></a>
            <input type="reset" value="Clear" class="btn2">
</td></tr>
</table>
</form>
</body>
</html>