<?php
/**
* The template used for displaying careers.
*/
$intro = get_field('careers_intro');
$bkg = get_field('bkg-colour');
?>
<?php if ( ! is_admin() ){ ?>
<a name="JobCard" id="JobCard"></a>
<?php
$jobURL = "https://api-qa.texmo.com/api/recruitment-management/jobs";
$jobFilterURL = "https://api-qa.texmo.com/api/recruitment-management/job-filters";
$dateDiff = 15;
$pageNumber = 1;
$pageSize = 12;
$totalJobs = 60;
$pageCount = 1;

//$jobURL_KEY = "";

function callAPI( $url ) {
  $curl = curl_init();
  curl_setopt_array( $curl, array(
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => array(
      "accept: application/json",
      "TEXMO-KEY: 2c589ffd7309c8679015e0ccc7aea9ee6568ed5f0ae821d5e6522e6cf7d39b23"
    ),
  ));
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
$jobURL = $jobURL . "?PageSize=" . $pageSize;
$queryString = "&";
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


if ( isset( $_POST[ 'company' ] ) && ( $_POST[ 'company' ] != "" && $_POST[ 'company' ] != "COMPANY" ) ) {
  $var = str_replace( ' ', '%20', $_POST[ 'company' ] );
  $jobURL = $jobURL . $queryString . "Company=" . $var;

}

if ( isset( $_POST[ 'pageNumber' ] ) && ( $_POST[ 'pageNumber' ] != "" && $_POST[ 'pageNumber' ] != "" ) ) {
  $pageNumber = $_POST[ 'pageNumber' ];
  $var = str_replace( ' ', '%20', $pageNumber );
  $jobURL = $jobURL . $queryString . "pageNumber=" . $var;
}

//echo $jobURL;

$get_data = callAPI( $jobURL );
$response = json_decode( $get_data, true );
$data = $response[ 'jobs' ];

$totalJobs = $response[ 'count' ];
$pageCount = ceil( ( $totalJobs / $pageSize ) );
?>
<?php /*?>
echo( "Record per page: " . $pageSize . "<br />" );
echo( "Total Jobs: " . $totalJobs . "<br />" );
echo( "Pages: " . $pageCount . "<br />" );
echo( "Current Page: " . $pageNumber );
<?php */?>
<form name="jobForm" id="jobForm" action="#JobCard", method="post">
  <?php /*?>Result ID : <?php echo $_POST['location'] ; ?>: <?php echo $_POST['role']; ?><?php */?>
  <section class="<?php echo $bkg; ?>">
    <div class="careers">
      <?php if ( $intro ) { ?>
      <?php echo $intro; ?>
      <?php } ?>
      <div class="careers__filter">
        <div class="careers__filter-item">
          <select name="company" id="company" onChange="this.form.submit()">
<!--            <option>COMPANY</option>-->
			  <option value="" disabled selected hidden>COMPANY</option>
			   <option value="">All Company</option>
            <?php
            foreach ( $jobFilter_companies as $company ) {
              $selected = ( isset( $_POST[ 'company' ] ) && $_POST[ 'company' ] == $company[ id ] ) ? 'selected' : '';
              echo "<option  value='$company[id]' $selected >$company[title]</option>";
            }
            ?>
          </select>
        </div>
        <div class="careers__filter-item">
          <select name="location" id="location" onChange="this.form.submit()">
            <option value=""  disabled selected hidden>LOCATION</option>
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
            <option value=""  disabled selected hidden>JOB ROLE</option>
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
        <a href="/career-details?id=<?php echo $value['id'] ?>&&title=<?php echo $value['title'] ?>" class="careers-item">
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
            <p class="label"><?php echo $value['location']['country'] ?></p>
            <p class="label"><?php echo $value['department']['name'] ?></p>
          </div>
          <div>
            
          <?php if( have_rows('company', 'options') ) { ?>
            <?php while( have_rows('company', 'options') ): the_row();
              $name = get_sub_field('company_name', 'options');
              $logo = get_sub_field( 'company_icon', 'options' );
            ?>
            <?php if ( $value['company']['title'] == $name ) { ?><img class="careers-item__image" loading="lazy" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" /><?php } ?>
            
            <?php endwhile; ?>
          <?php } ?>


  <!-- <img src="<?php echo get_template_directory_uri(); ?>/src/images/logo-taro.svg" alt="Texmo Group logo" />  -->
        </div>
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
        <div><a href="#" class="<?php  echo ( $pageNumber == $i ) ?  'active' : ''; ?>"  onClick="PageClick('<?php echo $i ?>');"><?php echo $i ?></a></div>
        <?php } ?>
      </div>
      <input type="hidden"  name="pageNumber" id="pageNumber" />
      <?php } ?>
    </div>
  </section>
</form>
<?php } ?>
<?php if ( is_admin() ){ ?>
<section class="bkg--cream">
  <div class="careers">
    <h2>Latest careers show here</h2>
  </div>
</section>
<?php } ?>
<script type='text/javascript'>
function PageClick(pageNo)
{
	document.getElementById('pageNumber').value = pageNo;
	document.getElementById('pageNumber').text = pageNo;
	document.getElementById('jobForm').submit();
    return false;
}
</script> 
