<?php
include '../../public/common/config.php';
$name=$_POST['name'];
$class_id=$_POST['class_id'];
$sql="insert into brand(name,class_id) values('{$name}','{$class_id}')";
$aa=mysqli_query($link,$sql);
if($aa){
	echo '<script>location="index.php"</script>';
}
?>