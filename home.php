<?php
include("connection.php");
if(isset($_REQUEST["del"])){
	$del = $_REQUEST["del"];
	$s = mysqli_query($con,"select * from project where id = '$del'");
	$f = mysqli_fetch_array($s);
	$img = $f["img"];
	$delete_img = unlink("photos/".$img);
	$delete_data = mysqli_query($con,"delete from project where id='$del'");
	if($delete_img && $delete_data){
		header("location:home.php?msg=Data Deleted..");
	}
}
if(isset($_REQUEST["update"])){
	$id = $_REQUEST["id"];
	$un = $_REQUEST["userid"];
	$ps = $_REQUEST["pass"];
	$fn = $_REQUEST["fname"];
	$mn = $_REQUEST["mname"];
	$ln = $_REQUEST["lname"];
	$em = $_REQUEST["em"];
	$pn = $_REQUEST["pn"];
	$ad = $_REQUEST["adrs"];
	$up = mysqli_query($con,"UPDATE `project` SET `dev_id`='$un',`pass`='$ps',`fname`='$fn',`mname`='$mn',`lname`='$ln',`email`='$em',`mnumber`='$pn',`address`='$ad' WHERE id ='$id'");
	if($up){
		header("location:home.php?msg=Data Updated..");
	}
}
?>
<html>
<head>
	<title>Home</title>
    <style>
		img{
			height:60px;
			width:60px;
			border:solid #000 4px;
			border-radius:4px;}
		.delete{
			height:30px;
			width:100px;
			border:solid #000 1px;
			background-color:#F00;
			border-radius:5px;
			color:#000;
		}
		.edit{
			height:30px;
			width:100px;
			border:solid #000 1px;
			background-color:#0C0;
			border-radius:5px;
			color:#000;
		}
		.thu{border:2px inset #000;
		background-color:#CCC;
		color:#000;
		font-weight:bold;
		border-radius:5px;
			}
		.t{
			border:1px solid #000;
			text-align:center;
			color:#003;
			background-color:#C5C5C5;
			border-radius:5px}
		.hm{
			background-color:#999;
			border:2px solid #009;
			border-radius:25px 25px 25px 25px ;
			width:250px;
			height:30px;
			margin-left:500px;
			text-align:center;
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
		.div1{height:auto;
		width:35%;
		margin-left:380px;
		border:solid #00F 3px;
		border-radius:10px;
		background-color:#999;
		padding:10px;
		}
		.btn5{
			height:30px;
			width:100px;
			border:solid #00F 1px;
			background-color:#00F;
			border-radius:5px;
			color:#CCC;
		}
		.btn5:hover{
			height:30px;
			width:100px;
			border:solid #000 1px;
			border-radius:10px;
			color:#000;
			background-color:#CCC;
		}
		body{
			background-image:url(photos/brown-wooden.jpg);
			background-repeat:no-repeat;
			background-size:cover;
		}
	</style>
</head>
<body>
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
	header("refresh:1;url=home.php"); 
	} ?>
</script>
<h2 align="center" class="hm">Home</h2>
<form method="post">
<table class="table" align="center" cellpadding="5" cellspacing="0" border="0">
<tr><td class="thu">Developer Id</td><td class="thu">First Name</td><td class="thu">Middle Name</td><td class="thu">Last Name</td><td class="thu">Email</td><td class="thu">Mobile Number</td><td class="thu">Addreess</td><td class="thu">Profile Photo</td>
<td colspan="2" class="thu" align="center"><a href="index.php"><input type="button" value="Log Out" class="btn5"></a></td></tr>
<?php
$sel = mysqli_query($con,"select * from project");
while($ar = mysqli_fetch_array($sel)){
?>
<tr>
	<td class="t"><?php echo $ar["dev_id"]; ?></td>
    <td class="t"><?php echo $ar["fname"]; ?></td>
    <td class="t"><?php echo $ar["mname"]; ?></td>
    <td class="t"><?php echo $ar["lname"]; ?></td>
    <td class="t"><?php echo $ar["email"]; ?></td>
    <td class="t"><?php echo $ar["mnumber"]; ?></td>
    <td class="t"><?php echo $ar["address"]; ?></td>
    <td class="t"><img src="photos/<?php echo $ar["img"]; ?>" height="50px" width="50px"></td>
    <td class="t"><a href="?del=<?php echo $ar["id"]; ?>"><input type="button" value="Delete" class="delete"></a></td>
    <td class="t"><a href="?ed=<?php echo $ar["id"]; ?>"><input type="button" value="Edit" class="edit"></a>
    </td>
</tr>
<?php } ?> 
</table>
</form>
<?php
if(isset($_REQUEST['ed'])){
	$ed = $_REQUEST['ed'];
	$sele = mysqli_query($con,"select * from project where id = '$ed' ");
	$fetch = mysqli_fetch_array($sele); ?>
<form method="post">
	<div class="div1">
    <table align="center" cellpadding="5" cellspacing="0">
        <tr><td>No.</td><td><input class="tds" type="number" name="id" value="<?php echo $fetch["id"]; ?>" readonly></td></tr>
        <tr><td>User Id:</td><td><input class="tds" type="text" name="userid" value="<?php echo $fetch["dev_id"]; ?>"></td></tr>
        <tr><td>Password:</td><td><input class="tds" type="text" name="pass" value="<?php echo $fetch["pass"]; ?>"></td></tr>
        <tr><td>First Name:</td><td><input class="tds" type="text" name="fname" value="<?php echo $fetch["fname"]; ?>"></td></tr>
        <tr><td>Middle Name:</td><td><input class="tds" type="text" name="mname" value="<?php echo $fetch["mname"]; ?>"></td></tr>
        <tr><td>Last Name:</td><td><input class="tds" type="text" name="lname" value="<?php echo $fetch["lname"]; ?>"></td></tr>
        <tr><td>Email</td><td><input class="tds" type="text" name="em" value="<?php echo $fetch["email"]; ?>"></td></tr>
        <tr><td>Mobile Number:</td><td><input class="tds" type="text" name="pn" value="<?php echo $fetch["mnumber"]; ?>"></td></tr>
        <tr><td>Address:</td><td><input class="tds" type="text" name="adrs" value="<?php echo $fetch["address"]; ?>"></td></tr>
        <tr><td colspan="2" align="center"><input class="btn5" type="submit" name="update" value="Update Data"></td></tr> 
    </table>
    </div>
</form>
<?php  } ?>

</body>
</html>