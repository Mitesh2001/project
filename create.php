<?php
include("connection.php");
if(isset($_REQUEST["submit"])){
	$un = $_REQUEST["userid"];
	$ps = $_REQUEST["pass"];
	$fn = $_REQUEST["fname"];
	$mn = $_REQUEST["mname"];
	$ln = $_REQUEST["lname"];
	$em = $_REQUEST["em"];
	$pn = $_REQUEST["pn"];
	$ad = $_REQUEST["adrs"];
		$photo = $_FILES["pp"];
		$p_name = $photo["name"];
		$tmp_name = $photo["tmp_name"];
		$location = "photos/";
	if($un == "" || $ps == ""){
		header("location:create.php?msg=Developer Id and Password both are compulsory ..");
	}else if($p_name == ""){
		header("location:create.php?msg=Please select your profile photo...");
	}else{
	$ins = mysqli_query($con,"INSERT INTO `project`(`dev_id`, `pass`, `fname`, `mname`, `lname`, `email`, `mnumber`, `address`, `img`) VALUES ('$un','$ps','$fn','$mn','$ln','$em','$pn','$ad','$p_name')");
	$move = move_uploaded_file($tmp_name,$location.$p_name);
		if($ins && $move){
			header("location:create.php?msg=Data Saved Successfully..!");
		}
	}
}
?>
<html>
<head>
	<title>Sign Up</title>
	<style>
		.title{
			background-color:#999;
			border:2px solid #009;
			border-radius:25px 25px 25px 25px ;
			width:250px;
			height:30px;
			margin-left:500px;
			text-align:center;
			}
		.div1{height:auto;
		width:35%;
		margin-left:380px;
		border:solid #00F 3px;
		border-radius:10px;
		background-color:#999;
		padding:10px;
		}
		.tds{
			border:1px #000000 solid;
			background-color:#CCC;
			color:#000;
			border-radius:10px;
			height:25px;
			width:auto;
			text-align:center;
		}
		.btn4{
			height:30px;
			width:70px;
			border:solid #00F 1px;
			background-color:#00F;
			border-radius:5px;
			color:#CCC;
		}
		.btn4:hover{
			height:30px;
			width:70px;
			border:solid #000 1px;
			border-radius:10px;
			color:#000;
			background-color:#CCC;
			font-size:14px;
		}
		.btn3{
			height:30px;
			width:70px;
			border:solid #00F 1px;
			background-color:#00F;
			border-radius:5px;
			color:#CCC;
		}
		.btn3:hover{
			height:30px;
			width:70px;
			border:solid #000 1px;
			border-radius:10px;
			color:#000;
			background-color:#CCC;
			font-size:14px;
		}
	</style>
</head>
<body bgcolor="#C5C5C5">
	<?php
	if(isset($_REQUEST["msg"])){
		$msg =	$_REQUEST["msg"];
	}
	?>
	<script>
	<?php 
	if($msg) { ?>
	alert("<?php echo $msg; ?>");
	<?php
	header("refresh:1;url=create.php"); 
	} ?>
</script>
	<h2 align="center" class="title">Insert Operation</h2>
	<form method="post" enctype="multipart/form-data">
 		<div class="div1">
    	<table align="center" cellpadding="5" cellspacing="0">
    	<tr><td><label>Developers Id :</label></td><td><input class="tds" type="text" name="userid"></td></tr>
        <tr><td><label>Choose Your Password:</label></td><td><input class="tds" type="text" name="pass"></td></tr>
        <tr><td><label>First Name :</label></td><td><input class="tds" type="text" name="fname"></td></tr>
    	<tr><td><label>Middle Name:</label></td><td><input class="tds" type="text" name="mname"></td></tr>
        <tr><td><label>Last Name:</label></td><td><input class="tds" type="text" name="lname"></td></tr>
        <tr><td><label>Email:</label></td><td><input class="tds" type="text" name="em"></td></tr>
        <tr><td><label>Phone Number:</label></td><td><input class="tds" type="text" name="pn"></td></tr>
        <tr><td><label>Address:</label></td><td><textarea class="tds" name="adrs">Address...</textarea></td></tr>
        <tr><td><label>Profile Photo:</label></td><td><input class="tds" type="file" name="pp"></td></tr>
        <tr><td colspan="2" align="center">
        		<input class="btn4" type="submit" name="submit" value="Submit">
                <input class="btn3" type="reset" value="Clear">
                <a href="index.php"><input class="btn3" type="button" value="Sign In"></a>
        </td></tr>
        </table>
    	</div>
    </form>

</body>
</html>

