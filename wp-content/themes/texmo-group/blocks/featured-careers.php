<?php
/**
* The template used for displaying careers.
*/
$title = get_field('featured_careers_title');
$bkg = get_field('bkg-colour');
$location = get_field('location');
?>
<?php if ( ! is_admin() ){ ?>
<a name="JobCard" id="JobCard"></a>
<?php
$jobURL = "https://api-qa.texmo.com/api/recruitment-management/jobs";
$dateDiff = 15;
$pageNumber = 1;
$pageSize = 12;
$totalJobs = 60;
$pageCount = 1;

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

$jobURL = $jobURL . "?PageSize=" . $pageSize;
$queryString = "&";


  $jobURL = $jobURL . $queryString . "LocationName=" . $location;
  $queryString = "&";
  

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
      <?php if ( $title ) { ?>
        <h2><?php echo $title; ?> </h2>
      <?php } ?>
		  <!-- <h2>Career in  <?php echo $data[0]['location']['name'] ?></h2> -->
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
            <p class="label red">UK</p>
            <p class="label"><?php echo $value['department']['name'] ?></p>
          </div>
          <div> <img class="b-red" src="<?php echo get_template_directory_uri(); ?>/src/images/logo-taro.svg" alt="Texmo Group logo" /> </div>
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
        <div><a href="#" class="<?php  echo ( $pageNumber == $i ) ?  'active' : ''; ?>"  onClick="check('<?php echo $i ?>');"><?php echo $i ?></a></div>
        <?php } ?>
      </div>
      <input type="hidden"  name="pageNumber" id="pageNumber" />
      <?php } ?>
    </div>
  </section>
</form>
<?php } ?>
<?php if ( is_admin() ){ ?>
<section class="<?php echo $bkg; ?>">
  <div class="careers">
    <h2>Similar careers show here</h2>
  </div>
</section>
<?php } ?>
<script type='text/javascript'>
function check(p)
{
	document.getElementById('pageNumber').value = p;
	document.getElementById('pageNumber').text = p;
	document.getElementById('jobForm').submit();
    return false;
}
</script> 
