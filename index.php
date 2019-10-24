<html>
<form action=""  method="post">
<br/>
<table><tr style="width:auto">
	<td style="width:80%"><h1>PRODUCT LIST</h1></td>
	<td style="width:10%"><select name="action_button" >
		<option value="none">--Select Action--</option>
		<option value="delete_product">Mass Delete Action</option>
	</select>
	</td>
	<td style="width:10%"><input type="submit" name="submit1" value="Apply" /><br/></td>
</tr></table>
	<hr/>
	   
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "products";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div style='display:inline-block;width:200px;height:160px;border-style:groove;border-width:1px:margin-top: 5%;margin-bottom: 5%;margin-right:3%;;margin-left:3%;line-height: 1.8;'>". 
		"<input type='checkbox' name='del_ids[]' value='".$row["SKU"]."'/><br/><center>".
		$row["SKU"]. "</br>" .
		$row["NAME"]. "</br>" .
		$row["PRICE"]. "</br>";
		if($row["SIZE"]!=null)
			echo "Size: ".$row["SIZE"]. "</br>";
		if($row["WEIGHT"]!=null)
			echo "Weight: ".$row["WEIGHT"]. "</br>";
		if($row["HEIGHT"]!=null && $row["WIDTH"]!=null && $row["LENGTH"]!=null )
			echo "Dimensions: ".$row["HEIGHT"]."*".$row["WIDTH"]."*".$row["LENGTH"]."</br>";
		echo "</center></div>";
    }
	
} else {
    echo "No record found in product table";
}

?>  
</form>

<?php 

if(isset($_POST["submit1"])){
		$box=$_POST['del_ids'];
		$btn_action=$_POST['action_button'];
		if($btn_action=="delete_product"){
			
			while(list ($key,$val)= @each($box))
			{
				$del_sql = "delete from product where SKU='".$val."'";
				$conn->query($del_sql);
				
			}
		}
}

$conn->close();
?>
<script type="text/javascript">
	window.location.href="index.php";
</script>



</html>