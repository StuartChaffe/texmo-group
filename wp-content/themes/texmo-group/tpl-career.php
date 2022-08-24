<?php
// Template Name: Career
?>
<?php
$jobURL = "https://api-qa.texmo.com/api/recruitment-management/job/" . $_GET[ 'id' ];
$jobFilterURL = "https://api-qa.texmo.com/api/recruitment-management/similar-jobs";
$dateDiff = 1;

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
$data = $response;

$var = str_replace( ' ', '%20', $data[ 'title' ] );
//$var = "Engineer";
$jobFilterURL = $jobFilterURL . "?RoleId=" . $data[ 'id' ] . "&RoleName=" . $var;

$get_datas = callAPI( $jobFilterURL );
$responses = json_decode( $get_datas, true );
$datas = $responses;

//echo( $jobURL . "<br />" );
//echo( $jobFilterURL );
//print_r( $datas[ "statusCode" ] );
$datas = ( $datas[ "statusCode" ] == "404" ) ? "" : $datas;
//print_r($datas);
//echo ($data['hiringManager']);
?>
<?php
$imagemobile = get_field( 'story_image_mobile', get_the_ID() );
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="fade banner" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'Large' ); ?>')">

<div class="banner--overlay" style="background-color: rgba(0,0,0,0.40);">&nbsp;</div>
<div class="banner--content fade fade--delay__1">
	<h1><?php echo  $_GET['title'] ; ?></h1>
</div>
<img loading="lazy" class="banner--image hidemobile" src="<?php echo get_the_post_thumbnail_url( get_the_ID()); ?>" alt="">
<?php if ( $imagemobile ) { ?>
<img loading="lazy" class="banner--image hidedesktop" src="<?php echo $imagemobile['url']; ?>" alt="<?php echo $imagemobile['alt']; ?>" />
<?php } ?>
</section>
<div class="career-details">
	<div class="career-details-inner">
		<a href="/job-application/?id=<?php echo $data['id'] ?>" class="btn btn--primary">Apply Now</a>
		<div>
			<p><strong><?php echo  $_GET['title'] ; ?> • <?php echo $data['company']['title'] ?></strong><br />
			<?php
				echo  $data['location']['name'] .", ".$data['location']['country'] ." • ". $data['department']['name'] . " • Apply by ".date_format(date_create($data['deadlineAt']),'d/m/Y');
			?></p>
		</div>
 	</div>
</div>
<article>
<div class="bkg--cream">
	<section class="career-details--list">
		<?php /*?><?php echo "Job ID: ". $_GET['id'] ."
		<br />";
		echo "Job Title: ". $_GET['title'] ;
		?><?php */?>
		<ul class="accordion-list">
			<li>
				<button class="accordion--title" aria-expanded="false"><?php echo $title ?> <svg class="icon icon--open"><use xlink:href="#accordion-arrow"></use></svg>Job Description</button>
				<div class="accordion--content">
					<div class="career-details-item--content">
						<p><?php echo $data['description'] ; ?> </p>
					</div>
				</div>
			</li>

			<li>
				<button class="accordion--title" aria-expanded="false"><?php echo $title ?> <svg class="icon icon--open"><use xlink:href="#accordion-arrow"></use></svg>Responsibilities</button>
				<div class="accordion--content">
					<div class="career-details-item--content">
						<p><?php echo $data['keyResponsibilities'] ; ?> </p>
					</div>
				</div>
			</li>

			<li>
				<button class="accordion--title" aria-expanded="false"><?php echo $title ?> <svg class="icon icon--open"><use xlink:href="#accordion-arrow"></use></svg>Requirements</button>
				<div class="accordion--content">
					<div class="career-details-item--content">
						<p><?php echo $data['skillsKnowledgeExpertise'] ; ?> </p>
					</div>
				</div>
			</li>
		</ul>
	</section>
</div>
<div class="bkg--white career-details--additional">
	<h2>More Information</h2>
	<section class="career-details-item">
		
		<h3>About the Hiring Team</h3>
		<div class="career-details-item--content">
			<p><?php echo $data['hiringManager']['firstName']."  ".$data['hiringManager']['lastName'] ; ?> </p>
		</div>
	</section>
	<?php 	if (count($datas) != 0 && $datas != "") {  ?>
	<section class="similar-jobs bkg--grey">
		<div class="careers">
			<h2 style="text-align: center">Similar Careers</h2>
			<div class="careers-list mb-l">
				<?php
					$loop = 1;
					foreach ( $datas as $value ) {
				?>
				<a href="/career-details?id=<?php echo $value['id'] ?>&&title=<?php echo $value['title'] ?>" class="careers-item">
					<div class="careers-item__header">
						<div>
							<p><strong><?php echo $value['title'] ?></strong></p>
							<p><?php echo $value['location']['name'] ?></p>
						</div>
						<div>
							<?php
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
							<p class="label red">UK / INDIA needs adding</p>
							<p class="label red"><?php echo $value['department']['name'] ?></p>
						</div>
						<div>
							<img src="<?php echo get_template_directory_uri(); ?>/src/images/logo-taro.svg" alt="Texmo Group logo" />
						</div>
					</div>
				</a>
				<?php
					$loop = $loop + 1;
					if ( $loop == 4 ) {
						break;
					}
					}
				?>
			</div>
			<a class="btn" href="/careers">View careers</a>
		</div>
	</section>
	<?php } ?>
</div>
</article>
<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
