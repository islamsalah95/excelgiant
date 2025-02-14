<?php
	require'../connections/conn.php';
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM `form1` WHERE `exp_date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['saidly_name']?></td>
		<td><?php echo $fetch['nekaba']?></td>
		<td><?php echo $fetch['exp_date']?></td>
		<td><?php echo $fetch['print_by']?></td>
		<td><?php echo $fetch['sanad_id']?></td>
		<td><?php echo $fetch['form_type']?></td>
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "6"><center>Record Not Found</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `form1`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['saidly_name']?></td>
		<td><?php echo $fetch['nekaba']?></td>
		<td><?php echo $fetch['exp_date']?></td>
		<td><?php echo $fetch['print_by']?></td>
		<td><?php echo $fetch['sanad_id']?></td>
		<td><?php echo $fetch['form_type']?></td>
	</tr>
<?php
		}
	}
?>
