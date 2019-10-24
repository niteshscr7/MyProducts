<html>
	

<form action=""  method="POST">
<br/>
<table>
<tr style="width:auto;">
	<td style="width:100%"><h1 style="float:left">PRODUCT ADD</h1></td>
	<td><input  style="float:right;font-size: 16px;padding: 5px 20px;" type="submit" name="submit1" value="Save" onSubmit="return validate();" /><br/></td>
</tr>
</table>
	<hr/>
	<table cellspacing="5" cellpadding="5">
		<tr >
			<td>SKU</td>
			<td><input name="sku"  id="sku" type="text" required/></td>
		</tr>
		<tr >
			<td>Name</td>
			<td><input name="name" id="name" type="text" required/></td>
		</tr>
		<tr >
			<td>Price</td>
			<td><input name="price" id="price" type="text" required/></td>
		</tr>
		<tr >
			<td>Type Switcher</td>
			<td>
				<select name="type" id="type" onchange="showDynamicContent()">
					<option value="none">Type switcher</option>
					<option value="DVD-Disc">DVD-Disc</option>
					<option value="Book">Book</option>
					<option value="Furniture">Furniture</option>
				</select>
			</td>
		</tr>
		<tr id="size" style="display:none">
			<td>Size</td>
			<td ><input name="size"  type="text"/></td>
		</tr>
		<tr  id="weight" style="display:none">
			<td>Weight</td>
			<td ><input  name="weight" type="text"/></td>
		</tr>
		<tr  id="height" style="display:none">
			<td>Height</td>
			<td ><input  name="height" type="text"/></td>
		</tr>
		<tr  id="width" style="display:none">
			<td>Width</td>
			<td ><input name="width" type="text"/></td>
		</tr>
		<tr  id="length" style="display:none">
			<td>Length</td>
			<td ><input name="length" type="text"/></td>
		</tr>
	</table>
	<br/>
	<p id="special_attribute" style="margin-left:10px"></p>
</form>
	<script>
		function showDynamicContent(){
			 //hide all attributes
			 document.getElementById("size").style.display="none";
			 document.getElementById("weight").style.display="none";
			 document.getElementById("height").style.display="none";
			 document.getElementById("width").style.display="none";
			 document.getElementById("length").style.display="none";
		
			 var type=document.getElementById("type").value;
			if(type=='DVD-Disc'){
				document.getElementById("size").style.display="table-row";
				document.getElementById("special_attribute").innerHTML="<b>Note: Please provide size in bytes</b>";
			}
			if(type=='Book'){
				document.getElementById("weight").style.display="table-row";
				document.getElementById("special_attribute").innerHTML="<b>Note: Please provide weight in kilograms</b>";
			}
			if(type=='Furniture'){
				document.getElementById("height").style.display="table-row";
				document.getElementById("width").style.display="table-row";
				document.getElementById("length").style.display="table-row";
				document.getElementById("special_attribute").innerHTML="<b>Note: Please provide dimensions in Height * Width * Length format</b>";
			}
		}
		
	</script>

<?php



	if(isset($_POST["submit1"])){
			$sku=$_POST['sku'];
			$name=$_POST['name'];
			$price=$_POST['price'];
			$type=$_POST['type'];
			$valid=1;
			if(!(preg_match("/^[0-9a-zA-Z]+$/",$sku))){
				echo "<font size='3' color='red'>Only alphanumeric characters are allowed for SKU</font>";
				$valid=0;
			}
			else if(!(preg_match("/^[0-9a-zA-Z ]+$/",$name))){
				echo "<font size='3' color='red'>Only Alphanumeric characters and spaces are allowed for Name</font>";
				$valid=0;
			}
			else if(!(preg_match("/^[0-9a-zA-Z .,]+$/",$price))){
				echo "<font size='3' color='red'>Invalid characters entered in Price field</font>";
				$valid=0;
			}
			else if($type!='none'){
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
				$sql ="";
				$pattern="/^[0-9a-zA-Z ]+$/";
				if($type=='DVD-Disc'){
					$size=$_POST['size'];
					if($size==''){
						echo "<font size='3' color='red'>Size can't be blank</font>";
						$valid=0;
					}
					else if(preg_match($pattern,$size))
						$sql = "INSERT INTO product (sku, name, price,size) VALUES ('$sku', '$name', '$price','$size')";
					else{
						echo "<font size='3' color='red'>Only alphanumeric characters and spaces are allowed for size</font>";
						$valid=0;
					}
				}
				else if($type=="Book"){
					$weight=$_POST['weight'];
					if($weight==''){
						echo "<font size='3' color='red'>Weight can't be blank</font>";
						$valid=0;
					}
					else if(preg_match($pattern,$weight))
						$sql = "INSERT INTO product (sku, name, price,weight) VALUES ('$sku', '$name', '$price','$weight')";
					else{
						echo "<font size='3' color='red'>Only alphanumeric characters and spaces are allowed for weight</font>";
						$valid=0;
					}
				}
				else if($type=="Furniture"){
					$pattern="/^[0-9]+$/";
					$height=$_POST['height'];
					$width=$_POST['width'];
					$length=$_POST['length'];
					
					if($height=='' || $width=='' || $length==''){
						echo "<font size='3' color='red'>Dimensions can't be blank</font>";
						$valid=0;
					}
					else if((preg_match($pattern,$height)) && (preg_match($pattern,$width)) && (preg_match($pattern,$length)) )
						$sql = "INSERT INTO product (sku, name, price,height,width,length) VALUES ('$sku', '$name', '$price','$height','$width','$length')";
					else{
						echo "<font size='3' color='red'>Only numerics are allowed for dimensions</font>";
						$valid=0;
					}
				}
				if($valid==1)
				if ($conn->query($sql) === TRUE) {
					echo "<br/><font size='3' color='green'>New record created successfully</font>";
				} 
				else {
					echo "<font size='3' color='red'>Error: Invalid Insert!</font>";
				}

				$conn->close();
				
			}
			else{
				echo "<font size='3' color='red'>Please select type of product!</font>";
			}
	}
?>



</html>