<?php
/**
 * The template used for displaying careers.
 */

?>
<style>
	.carrer-row{
		width: 1200px;
    margin: auto;
	}
.career-card {
	background: #fff;
	width: 32%;
	padding: 1.5%;
	    float: left;
	margin: 0 2% 2% 0;
}
	.career-card:nth-child(3n+1){
		margin-right: 0;
	}
.job-title {
	text-align: left;
	float: left;
	width: 100%;
}
.job-title h3 {
	font-size: 0.8em;
	color: #333;
	float: left;
	    line-height: 20px;
}
.job-title button {
	background: #d46635;
	color: #fff;
	text-transform: uppercase;
	border-radius: 20px;
	float: right;
	border: none;
	height: 27px;
	width: 60px;
	font-size: 13px;
	cursor: pointer;
	    line-height: 24px;
}
.career-card strong {
	display: block;
}
.job-location {
	display: block
}
.job-location p {
	text-transform: uppercase;
	font-size: 10px;
}
	.job-location {
    float: left;
}
	.filter-career{
		margin-bottom: 3em;
	}
	.filter-career select{
		width: 31.7%;
		font-size: 0.8em;
		color: #333;
		background: none;
		border: none;
		padding: 0;
		margin: 0 2% 0 0;
		border-bottom: solid 1px #727272;
		border-radius: 0;
	}
	.filter-career select:last-child{
		margin-right: 0;
	}
	.no-record{
		text-align: center;
    background: #fff;
    padding: 10px;
    border: solid 1px #e7e7e7;
    color: #e52d2d;
	}
</style>

<a name="JobCard" id="JobCard"></a>
<section class="bkg--cream 123" style="display: flex; align-items: center; justify-content: center; margin-top: 5em;">
<h2>Latest Careers</h2>
<?php if ( $title ) { ?>
<div class="link-list--title">
  <h2 style="padding-bottom: 0;
    margin-bottom: 20px;"><?php echo $title; ?></h2>
</div>
	</h2>
<?php } ?>
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

//$get_data = callAPI($jobURL);
//$response = json_decode($get_data, true);
//$data = $response['jobs'];

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

$queryString = "?";
if (isset($_POST['location']) && ($_POST['location'] != "" && $_POST['location'] != "LOCATION") )
{
$jobURL = $jobURL.$queryString."Location=".$_POST['location'];
$queryString = "&";	
//$response = json_decode($get_data, true);
//$data = $response['jobs'];
	//echo "1".$jobURL."?Location=".$_POST['location'];
}


if (isset($_POST['role'])  && ($_POST['role'] != "" && $_POST['role'] != "JOB ROLE"))
{
$jobURL =$jobURL.$queryString."Role=".$_POST['role'];
//$response = json_decode($get_data, true);
//$data = $response['jobs'];
//	echo $jobURL."?Role=".$_POST['role'];
}

$get_data = callAPI($jobURL);
$response = json_decode($get_data, true);
$data = $response['jobs'];

?>

<form name="jobForm" action="#JobCard", method="post">
	Result ID : <?php echo $_POST['location'] ; ?>
	 : <?php echo $_POST['role']; ?>
<section class="carrer-row">
	<div class="filter-career">
	<select>
		<option>COMPANY</option>
	</select>
		<select name="location" id="location" onChange="this.form.submit()">
		<option vlaue="">LOCATION</option>
			<?php 
			foreach ($jobFilter_locations as  $location){
				$selected = (isset($_POST['location']) && $_POST['location'] ==  $location[id]) ? 'selected' : '';
				echo "<option  value='$location[id]' $selected >$location[name]</option>";
}
			?>
		</select>
		<select  name="role" id="role" onChange="this.form.submit()">
		<option vale="">JOB ROLE</option>
			<?php 
			foreach ($jobFilter_roles as  $role){
				$selected = (isset($_POST['role']) && $_POST['role'] ==  $role[id]) ? 'selected' : '';
					echo "<option  value='$role[id]' $selected>$role[title]</option>";
}
			?>
		</select>
	</div>
 <?php if (count($data) == 0) {  ?>
	  <div class="no-record">No Job Found</div> <?php } ?>	
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
</form>