<?php
	include('connection.php');
	
	$query = "SELECT * FROM `customers`";
	$result = mysqli_query($con, $query);

	$customerData = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<html> 
<head>
	<title>Retrieve customer data from database</title>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="row m-5">
		<div class="col-md-4">
			<form action="" method="POST">
				<h5>Consume a REST API in PHP - <a href="https://www.cluemediator.com" target="_blank">Clue Mediator</a></h5>
				<select name="customer_id" class="form-control mt-3" id="customer_id">
					<option value="0">Select Customer</option>
					<?php foreach($customerData as $customer) { ?>
						<option value="<?php echo $customer['customer_id']?>"><?php echo $customer['customer_name']?></option>
					<?php } ?>
				</select>
				 <button type="submit" class="btn btn-primary mt-3" id="datasubmit" >Submit</button>				
			</form>
			<div id="result" class="mt-4">
			</div>
		</div>
	</div>
</body>
</html>

<script>
	$(document).ready(function() {
		$("#datasubmit").on("click", function(e) {
			e.preventDefault();
			var customer_id = $("#customer_id").val();		
			$.ajax({
				url: "getData.php",
				type: "POST",     
				data: { customer_id: customer_id },
				success:function(data) {
					$("#result").html(data);
				}
			});
		}); 
	})
</script>