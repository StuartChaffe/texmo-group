<?php
/**
* The template used for displaying careers.
*/
$intro = get_field('careers_intro');
?>

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


<section class="careers bkg--cream">

	<?php if ( $intro ) { ?>
		<?php echo $intro; ?>
	<?php } ?>
	<div class="careers__filter">
		<div class="careers__filter-item">
			<select>
				<option>Company</option>
			</select>
		</div>
		<div class="careers__filter-item">
			<select>
				<option>Location</option>
				<?php foreach ($jobFilter_locations as  $location){
					echo "<option  value='$location[id]'  >$location[name]</option>";
				} ?>
			</select>
		</div>
		<div class="careers__filter-item">
			<select>
				<option>Job role</option>
				<?php foreach ($jobFilter_roles as  $role){
					echo "<option  value='$role[id]' >$role[title]</option>";
				} ?>
			</select>
		</div>
	</div>

	<div class="careers-list">
		<?php foreach ($data as $value) { ?> 
		<a href="" class="careers-item">
			<div class="careers-item__header">
				<div>
					<p><strong><?php echo $value['title'] ?></strong></p>
					<p><?php echo $value['location']['name'] ?></p>
				</div>
				<div>
					<span class="careers-item__new label">New</span>
				</div>
			</div>

			<div class="careers-item__footer">
				<div>
					<p class="label">UK / INDIA needs adding</p>
					<p class="label"><?php echo $value['department']['name'] ?></p>
				</div>
				<div>
				<img src="<?php echo get_template_directory_uri(); ?>/src/images/logo-taro.svg" alt="Texmo Group logo" />
				</div>
			</div>
		</a>
		<?php } ?>
	</div>
</section>
