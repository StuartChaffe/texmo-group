<?php
/**
 * The template used for displaying careers.
 */
?>
<style>
.no-record {
	text-align: center;
	background: #fff;
	padding: 10px;
	border: solid 1px #e7e7e7;
	color: #e52d2d;
}
.pagination {
	margin-top: 70px;
}
.pagination div {
	display: inline-block;
	margin: 0 2px;
}
.pagination div a {
	border-radius: 50%;
	border: solid 1px #f8f7f1;
	padding: 2px;
	width: 32px;
	height: 32px;
	display: block;
	text-decoration: none;
	font-size: 18px;
	color: #505050;
}
.pagination div a.active, .pagination div a:hover {
	border: solid 1px #e55e20;
}
</style>

<a name="JobCard" id="JobCard"></a>
<?php
$jobURL = "https://api-qa.texmo.com/api/recruitment-management/jobs";
$jobFilterURL = "https://api-qa.texmo.com/api/recruitment-management/job-filters";
$dateDiff = 15;
$pageNumber = 1;
$pageSize = 12 ;
$totalJobs = 60;
$pageCount = 1 ;

//$jobURL_KEY = "";

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

//$get_data = callAPI($jobURL);
//$response = json_decode($get_data, true);
//$data = $response['jobs'];

$jobFilter_data = callAPI( $jobFilterURL );
$jobFilter_response = json_decode( $jobFilter_data, true );
$jobFilter_locations = $jobFilter_response[ 'locations' ];

$jobFilter_companies = $jobFilter_response[ 'companies' ];
$jobFilter_roles = $jobFilter_response[ 'roles' ];

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
if ( isset( $_POST[ 'location' ] ) && ( $_POST[ 'location' ] != "" ) ) {
  $jobURL = $jobURL . $queryString . "Location=" . $_POST[ 'location' ];
  $queryString = "&";
  //$response = json_decode($get_data, true);
  //$data = $response['jobs'];
  //echo "1".$jobURL."?Location=".$_POST['location'];
}


if ( isset( $_POST[ 'role' ] ) && ( $_POST[ 'role' ] != "" && $_POST[ 'role' ] != "JOB ROLE" ) ) {
  $var = str_replace( ' ', '%20', $_POST[ 'role' ] );
  $jobURL = $jobURL . $queryString . "Role=" . $var;
  //$response = json_decode($get_data, true);
  //$data = $response['jobs'];
  //echo $jobURL."?Role=".$_POST['role'];
}

$get_data = callAPI( $jobURL );
$response = json_decode( $get_data, true );
$data = $response[ 'jobs' ];

$totalJobs = $response['count'];
$pageCount = ceil(($totalJobs / $pageSize) );

echo( "Record per page: " . $pageSize . "<br />");
echo( "total: " . $totalJobs. "<br />");
echo( "pages: " . $pageCount. "<br />");

?>
<form name="jobForm" action="#JobCard", method="post">
  <?php /*?>Result ID : <?php echo $_POST['location'] ; ?>: <?php echo $_POST['role']; ?><?php */?>
  <section class="<?php echo $bkg; ?>">
    <div class="careers">
      <h2>Latest Careers</h2>
      <?php if ( $intro ) { ?>
      <?php echo $intro; ?>
      <?php } ?>
      <div class="careers__filter">
        <div class="careers__filter-item">
          <select>
            <option>COMPANY</option>
          </select>
        </div>
        <div class="careers__filter-item">
          <select name="location" id="location" onChange="this.form.submit()">
            <option value="">LOCATION</option>
            <option value="">All Location</option>
            <?php
            foreach ( $jobFilter_locations as $location ) {
              $selected = ( isset( $_POST[ 'location' ] ) && $_POST[ 'location' ] == $location[ id ] ) ? 'selected' : '';
              echo "<option  value='$location[id]' $selected >$location[name]</option>";
            }
            ?>
          </select>
        </div>
        <div class="careers__filter-item">
          <select  name="role" id="role" onChange="this.form.submit()">
            <option value="">JOB ROLE</option>
            <option value="">All Job Role</option>
            <?php
            foreach ( $jobFilter_roles as $role ) {
              $selected = ( isset( $_POST[ 'role' ] ) && $_POST[ 'role' ] == $role[ title ] ) ? 'selected' : '';
              echo "<option  value='$role[title]' $selected>$role[title]</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="careers-list">
        <?php
        foreach ( $data as $value ) {
          ?>
        <a href="single-careers.php" class="careers-item">
        <div class="careers-item__header">
          <div>
            <p><strong><?php echo $value['title'] ?></strong></p>
            <p><?php echo $value['location']['name'] ?></p>
          </div>
          <div>
            <?php
            $dateDiff = 1;
            $v = date_diff( date_create( $value[ 'openedAt' ] ), date_create( date( 'Y-m-d' ) ) );
            $v1 = $v->format( '%R%a' );
            if ( $v1 < $dateDiff && $v1 >= 0 ) {
              ?>
            <span class="careers-item__new label">New</span>
            <?php } ?>
          </div>
        </div>
        <div class="careers-item__footer">
          <div>
            <p class="label">UK / INDIA needs adding</p>
            <p class="label"><?php echo $value['department']['name'] ?></p>
          </div>
          <div> <img src="<?php echo get_template_directory_uri(); ?>/src/images/logo-taro.svg" alt="Texmo Group logo" /> </div>
        </div>
        </a>
        <?php
        }
        ?>
      </div>
      <?php if (count($data) == 0) {  ?>
      <div class="no-record">No Job Found</div>
      <?php }  else { ?>
      <div class="pagination">
		<?php for($i=1 ; $i <= $pageCount ; $i++)	{ ?>  
        <div><a href="#" class="active"><?php echo $i ?></a></div>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
  </section>
</form>
<?php if ( is_admin() ){ ?>
<section class="bkg--cream">
  <div class="careers">
    <h2>Latest careers show here</h2>
  </div>
</section>
<?php } ?>
<section class="job-details">
  <div class="carousel-full--content">
    <div>
      <h3>Job Description</h3>
    </div>
    <div>
      <p><?php echo $data[2]['description'] ; ?> </p>
      <!--
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
		<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
--> 
    </div>
  </div>
  <div class="carousel-full--content separater"></div>
  <div class="carousel-full--content">
    <div>
      <h3>Responsibilities</h3>
    </div>
    <div class="job-responsibility">
      <p><?php echo $data[2]['keyResponsibilities'] ; ?> </p>
      <!--
		<ul class="job-responsibility">
		<li>Ensure high levels of customer satisfaction through excellent sales service</li>
<li>Maintain outstanding store condition and visual merchandising standards</li>
<li>Maintain a fully stocked store</li>
<li>Ascertain customers’ needs and wants</li>
<li>Recommend and display items that match customer needs</li>
<li>Welcome and greet customers</li>
<li>Manage point-of-sale processes</li>
<li>Actively involve in the receiving of new shipments</li>
<li>Keep up to date with product information</li>
<li>Accurately describe product features and benefits</li>
			<li>Follow all companies policies and procedures</li>		
		</ul>
--> 
    </div>
  </div>
  <div class="carousel-full--content separater"></div>
  <div class="carousel-full--content">
    <div>
      <h3>Requirements</h3>
    </div>
    <div class ="job-responsibility">
		<p><?php echo $data[2]['skillsKnowledgeExpertise'] ; ?> </p>
    <!--  <ul>
        <li>Proven working experience in retail sales</li>
        <li>Basic understanding of sales principles and customer service practices</li>
        <li>Proficiency in English</li>
        <li>Track record of over-achieving sales quota</li>
        <li>Solid communication and interpersonal skills</li>
        <li>Customer service focus</li>
        <li>Friendly, helpful, confident and engaging personality</li>
        <li>Basic administration skills</li>
        <li>High school degree</li>
      </ul>-->
    </div>
  </div>
  <div class="carousel-full--content separater"></div>
</section>
<style>
.separater
{
	border-top: solid 1px #c4c4c4;
}
	.job-responsibility ul li{
        list-style: disc;
    padding-bottom: 8px;
    line-height: 27px;
	}
</style>
