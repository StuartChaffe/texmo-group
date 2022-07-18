<?php
/**
* The template used for displaying careers.
*/

?>

<section class="bkg--cream" style="height: 300px; display: flex; align-items: center; justify-content: center;">
	<h2>Latest Careers</h2>
</section>

<?php 
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api-qa.texmo.com/api/recruitment-management/jobs",
	CURLOPT_HTTPHEADER => array(
		"accept: text/plain",
		"TEXMO-KEY: 2c589ffd7309c8679015e0ccc7aea9ee6568ed5f0ae821d5e6522e6cf7d39b23"
	),
	));
	$response = curl_exec($curl);
	print_r($response);
	die();
?>
