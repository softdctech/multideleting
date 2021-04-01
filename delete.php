<?php

$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed:".mysqli_connect_error());
$sql = "SELECT * FROM tbl_app";
$result = mysqli_query($conn,$sql) or die("Query Failed");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Multideleting Table</title>
</head>
<body>
<div>
	<h1>Chose and Delete Multiple links</h1>
</div>
<div>
	<form action="delete_code.php" method="post">
		<table border="1" width="400" cellspacing="1" cellpadding="0">
			<tbody>
				<tr align="center">
					<td>Select All</td>
					<td colspan="3">Delete multiple Links</td>
				</tr>
				<tr align="center">
					<td><input type="checkbox" name="checkall" class="selectall"></td>
					<td><b>First name</b></td>
					<td><b>Phone Number</b></td>
					<td><b>Email</b></td>
				</tr>
				<?php
					if(mysqli_num_rows($result)>0){
					while ($row = mysqli_fetch_assoc($result)) {
					?>
					<tr align="center">
							<td><input type="checkbox" name="check[]" value="<?php echo $row['apoint_id']; ?>"></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><?php echo $row['email']; ?></td>
						</tr>
					<?php
						}
					}
				?>
				<tr align="center">
					<td colspan="4"><button type="submit" name="del_multiple_data" id="delete-btn">Delete</button></td>
				</tr>
			</tbody>
		</table>
	</form>
	</div>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".selectall").click(function(){
				if($(this).is(':checked')){
					$('td input').attr('checked',true);
				}
				else{
					$('td input').attr('checked',false);
				}
			});
		});
	</script>
</body>
</html>