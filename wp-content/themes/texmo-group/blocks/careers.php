<?php
/**
* The template used for displaying careers.
*/

?>

<section class="bkg--cream" style="height: 300px; display: flex; align-items: center; justify-content: center;">
	<h2>Latest Careers</h2>
</section>

<?php
$jobURL = "https://api-qa.texmo.com/api/recruitment-management/jobs";
$jobFilterURL = "https://api-qa.texmo.com/api/recruitment-management/job-filters";

//$jobURL_KEY = "";

function callAPI($url){
$curl = curl_init();
curl_setopt_array( $curl, array(
  CURLOPT_URL => $url,
  CURLOPT_HTTPHEADER => array(
	  "accept: application/json",
	  "TEXMO-KEY: 2c589ffd7309c8679015e0ccc7aea9ee6568ed5f0ae821d5e6522e6cf7d39b23"
  ),
) );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$response = curl_exec( $curl );
 curl_close($curl);	
return $response;
};

$get_data = callAPI($jobURL);
$response = json_decode($get_data, true);
$data = $response['jobs'];

$jobFilter_data = callAPI($jobFilterURL);
$jobFilter_response = json_decode($jobFilter_data, true);
$jobFilter_locations = $jobFilter_response['locations'];

$jobFilter_companies = $jobFilter_response['companies'];
$jobFilter_roles = $jobFilter_response['roles'];

//print_r($jobFilter_response);

//print_r($jobFilter_roles);

//foreach ($jobFilter_result as  $location){
	//echo $location['id'] . $location['name']. "<br>";
//}

//echo $data[0]['title'];
//echo $data[0] ['department'];
//echo $data[0] ['department'][0]; 

//print_r( $data[0] );
//print_r( $data[0]['department'] );
//die();
?>


<section class="carrer-row">
	<div class="filter-career">
	<select>
		<option>COMPANY</option>
	</select>
		<select>
		<option>LOCATION</option>
			<?php 
			foreach ($jobFilter_locations as  $location){
					echo "<option  value='$location[id]'  >$location[name]</option>";
}
			?>
		</select>
		<select>
		<option>JOB ROLE</option>
			<?php 
			foreach ($jobFilter_roles as  $role){
					echo "<option  value='$role[id]' >$role[title]</option>";
}
			?>
		</select>
	</div>

	
<?php  
foreach ($data as $value) { 
?> 
  <div class="career-card">
    <div class="job-title">
      <h3><strong> <?php echo $value['title'] ?> </strong> <?php echo $value['location']['name'] ?></h3>
      <button>New</button>
    </div>
    <div class="job-location">
      <p><?php echo $value['department']['name'] ?></p>
      <img src="" alt="" title=""> </div>
  </div>
<?php  

}
?>
</section>
