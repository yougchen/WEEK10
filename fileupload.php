<!DOCTYPE html>
<html>
<head>
	<title>fileupload.php</title>
</head>
<body>
<?php
	if(isset($_POST["number"])){
	$num=$_POST["number"];
	echo "<form action='fileupload.php' method='post' enctype='multipart/form-data'>";
	echo "<input type='hidden' name='number2' value='".$num."'>"."<br>";
		for($n=1;$n<=$num;$n++){
		echo $n.":"."<input type=\"file\" name=\"upload".$n."\"><br>";
		}
	echo "<input type=\"submit\" value=\"送出\">
		<input type=\"reset\" name=\"重設\"></form>";
	}
	if(isset($_POST["number2"])){
	$num=$_POST["number2"];
		for($n=1;$n<=$num;$n++){
		
			$name="upload".$n;
			if(isset($_FILES[$name])){
				echo $_FILES[$name]["name"]."<br/>";
				echo $_FILES[$name]["tmp_name"]."<br/>";
				echo $_FILES[$name]["size"]."<br/>";
				echo $_FILES[$name]["type"]."<br/>";
	
				$a=pathinfo($_FILES[$name]["name"]);
				if(copy($_FILES[$name]["tmp_name"],$_FILES[$name]["name"])){
					echo "檔案上傳成功"."<br/>";
				}else{
					echo "檔案上傳失敗"."<br/>";
				}
			}
		}
	}
?>
