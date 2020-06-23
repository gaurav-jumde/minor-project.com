<?php
$connect = mysqli_connect("localhost", "root", "", "doctor");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM medicine
	WHERE mname LIKE '%".$search."%'";
	/*OR Address LIKE '%".$search."%' 
	OR City LIKE '%".$search."%' 
	OR PostalCode LIKE '%".$search."%' 
	OR Country LIKE '%".$search."%'
	";*/
}
else
{
	$query = "
	SELECT * FROM medicine ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Medicine Name</th>
							<th>Batch No.</th>
							<th>MRP</th>
							<th>Quantity</th>
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["mname"].'</td>
				<td>'.$row["batchno"].'</td>
				<td>'.$row["mrp"].'</td>
				<td>'.$row["quantity"].'</td>
		
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>