<?php
include('connection.php');

if (isset($_POST['customer_id']) && $_POST['customer_id']!="") {
	$customer_id = $_POST['customer_id'];

	// path of the REST API URL
	$url = "http://localhost/demo/api/".$customer_id;

	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client); 
	$result = json_decode($response);	
	
	if(!$result) {	
		echo "No data found";
		exit;
	}

	echo "<h3>Customer Details</h3>";
	echo "<b>Name: </b>". $result->customers->customer_name."<br>";
	echo "<b>Email: </b>". $result->customers->customer_email."<br>";
	echo "<b>Contact: </b>". $result->customers->customer_contact."<br>";
	echo "<b>Address: </b>". $result->customers->customer_address."<br>";
	echo "<b>Country: </b>". $result->customers->country."<br>";
	exit;
}
?>