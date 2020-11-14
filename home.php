<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tài Khoản</title>
<link href="style.css" rel="stylesheet">
</head>
<body>
<?php 
include 'db.php';

$sql = "SELECT * FROM `home_slideshow`;";
		
$list = db_q($sql);

?>



<?php if ($_SESSION['SUCCESS_MSG']) { ?>
<div style="background: green;">
	<?php echo $_SESSION['SUCCESS_MSG']; $_SESSION['SUCCESS_MSG']=null; ?>
</div>
<?php } ?>

<?php include 'menu.php' ?>

<table>
	<caption>Text Text Text</caption>
	<tr>
		<th>Tên_Cột_1</th>
		<th>Tên_Cột_2</th>
		<th>Tên_Cột_3</th>
		<th>Tên_Cột_4</th>
	</tr>
	<?php foreach($list as $obj) {?>
	<tr>
		<td><?php echo $obj['title'];?></td>
		<td><?php echo $obj['caption'];?></td>
		<td><?php echo '******';//$obj['password_hash'];?></td>
		<td><?php echo $obj['img_order'];?></td>
	</tr>
	<?php }?>
	
</table>
<?php include 'footer.php';?>
</body>
</html>