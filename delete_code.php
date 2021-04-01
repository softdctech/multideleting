<?php
$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed:".mysqli_connect_error());
if(isset($_POST['del_multiple_data'])){
	if(isset($_POST['checkall'])){
		$all_id = array();
		$query = "SELECT apoint_id FROM tbl_app";
		$res = mysqli_query($conn,$query);
		while($row=mysqli_fetch_array($res)){
			$all_id[] = $row['apoint_id'];
		}
		$total_id = implode(",",$all_id);
		$sql = "DELETE FROM tbl_app WHERE apoint_id IN($total_id)";
		$result = mysqli_query($conn,$sql) or die("Query Failed");
		if($result){
			header("Location:delete.php");
		}
		else{
			echo "Data Not Deleted";
		}

	}
	else{
		$check = $_POST['check'];
		$check_id = implode(",",$check);

		$sql = "DELETE FROM tbl_app WHERE apoint_id IN($check_id)";
		$result = mysqli_query($conn,$sql) or die("Query Failed");
		if($result){
			header("Location:delete.php");
		}
		else{
			echo "Data Not Deleted";
		}
	}
	
}

?>