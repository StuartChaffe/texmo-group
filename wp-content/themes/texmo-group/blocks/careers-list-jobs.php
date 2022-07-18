<?php
?>
<style>
.carrer-row {
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
.career-card:nth-child(3n+1) {
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
.filter-career {
	margin-bottom: 3em;
}
.filter-career select {
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
.filter-career select:last-child {
	margin-right: 0;
}
</style>
<section class="bkg--cream 123" style="height: 300px; display: flex; align-items: center; justify-content: center;">

<h2>Latest Careers</h2>
<?php if ( $title ) { ?>
<div class="link-list--title">
  <h2><?php echo $title; ?></h2>
</div>
</h2>
<?php } ?>
</section>
<?php
$jobURL = "https://api-qa.texmo.com/api/recruitment-management/jobs";
$jobFilterURL = "https://api-qa.texmo.com/api/recruitment-management/job-filters";

function callAPI( $url ) {
  $curl = curl_init();
  curl_setopt_array( $curl, array(
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => array(
      "accept: application/json",
      "TEXMO-KEY: 2c589ffd7309c8679015e0ccc7aea9ee6568ed5f0ae821d5e6522e6cf7d39b23"
    ),
  ) );
  curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt( $curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
  $response = curl_exec( $curl );
  curl_close( $curl );
  return $response;
};

$get_data = callAPI( $jobURL );
$response = json_decode( $get_data, true );
$data = $response[ 'jobs' ];

$jobFilter_data = callAPI( $jobFilterURL );
$jobFilter_response = json_decode( $jobFilter_data, true );
$jobFilter_locations = $jobFilter_response[ 'locations' ];

$jobFilter_companies = $jobFilter_response[ 'companies' ];
$jobFilter_roles = $jobFilter_response[ 'roles' ];
?>
<section class="carrer-row">
  <div class="filter-career">
    <select>
      <option>COMPANY</option>
    </select>
    <select>
      <option>LOCATION</option>
      <?php
      foreach ( $jobFilter_locations as $location ) {
        echo "<option  value='$location[id]'  >$location[name]</option>";
      }
      ?>
    </select>
    <select>
      <option>JOB ROLE</option>
      <?php
      foreach ( $jobFilter_roles as $role ) {
        echo "<option  value='$role[id]' >$role[title]</option>";
      }
      ?>
    </select>
  </div>
  <?php
  foreach ( $data as $value ) {
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
