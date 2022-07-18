<?php
// Template Name: Application
?>
<?php
// POST API calling
$URL = "https://api-qa.texmo.com";
$ResultPage = "/thank-you/";


$jobPostURL = $URL . "/api/recruitment-management/jobs";
//$jobPostURL="http://172.16.187.21:9090/api/recruitment-management/jobs";
//echo( $jobPostURL . "<br />" );
$ansLoopCount = 0;
$anssubLoopCount = 0;
$jobId = "";
$firstName = "";
$lastName = "";
$Email = "";
$Phone = "";
$addtionalInfo = "";
$documentHeader = "";

if ( isset( $_POST[ 'ansLoopCount' ] ) && ( $_POST[ 'ansLoopCount' ] != "" ) ) {
  $ansLoopCount = $_POST[ 'ansLoopCount' ];
  $anssubLoopCount = $_POST[ 'anssubLoopCount' ];
}

//echo "Ans Count :" . $ansLoopCount;

if ( isset( $_POST[ 'ansLoopCount' ] ) ) {
  $jobId = $_POST[ 'jobId' ];
  $firstName = $_POST[ 'firstName' ];
  $lastName = $_POST[ 'lastName' ];
  $Email = $_POST[ 'Email' ];
  $Phone = $_POST[ 'Phone' ];
  $addtionalInfo = $_POST[ 'info' ];
  $resumeFileName = $_FILES[ 'fileName' ][ 'name' ];


  $uploaddir = 'upload/';
  $uploadfile = $uploaddir . basename( $_FILES[ 'fileName' ][ 'name' ] );

  move_uploaded_file( $_FILES[ 'fileName' ][ 'tmp_name' ], $uploadfile );

  $content = file_get_contents( $uploadfile );

  $documentHeader = 'data:' . mime_content_type( $uploadfile ) . ';base64,';

  //echo $documentHeader;

  //	switch (pathinfo($resumeFileName,PATHINFO_EXTENSION))
  //			{
  //				case "pdf" :
  //						$documentHeader ="data:application/pdf;base64," ;
  //						break;
  //				
  //				case "docx" :
  //						$documentHeader ="data:application/vnd.openxmlformats-officedocument.wordprocessingml.document;base64," ;
  //						break;
  //				
  //				case "doc" :
  //						$documentHeader ="data:application/msword;base64," ;
  //						break;
  //			}
  //	


  $resumeData = $documentHeader . base64_encode( $content );

  $questions = [];
  $Choicequestion = [];
  for ( $i = 1; $i <= $ansLoopCount; $i++ ) {
    //echo "<br />".'answer'.$i." - " .$_POST['answer'.$i];
    $question = [
      "id" => $_POST[ 'id' . $i ],
      "questionType" => $_POST[ 'questionType' . $i ],
      "question" => $_POST[ 'title' . $i ],
    ];
    if ( $_POST[ 'questionType' . $i ] == "multiple_choice" ) {
      for ( $j = 1; $j <= $anssubLoopCount; $j++ ) {
        if ( !empty( $_POST[ 'answer' . $i . '-' . $j ] ) ) {
          array_push( $Choicequestion, ( object )[
            "id" => strval( $j ),
            "text" => $_POST[ 'answer' . $i . '-' . $j ]
          ] );
        }
      }
    }
    switch ( $_POST[ 'questionType' . $i ] ) {
      case "boolean":
        //$question["questionType"] = 0 ;
        $question[ "booleanAnswer" ] = filter_var( $_POST[ 'answer' . $i ], FILTER_VALIDATE_BOOLEAN );
        break;

      case "date":
        $question[ "dateAnswer" ] = $_POST[ 'answer' . $i ];
        break;

      case "multiple_choice":
        $question[ "answerChoices" ] = $Choicequestion;
        break;

      case "long_text":
        $question[ "textAnswer" ] = $_POST[ 'answer' . $i ];
        break;

      case "URL":
        $question[ "questionType" ] = 0;
        $question[ "urlAnswer" ] = $_POST[ 'answer' . $i ];
        break;
      case "Document":
        $question[ "documentAnswerFilename" ] = $_POST[ 'answer' . $i ];
        $question[ "documentAnswerData" ] = $_POST[ 'answer' . $i ];
        break;
    }
    array_push( $questions, $question );
  }

  $Inputdata = [
    "jobId" => $jobId,
    "firstName" => $firstName,
    "lastName" => $lastName,
    "email" => $Email,
    "phone" => $Phone,
    "additionalInfo" => $addtionalInfo,
    "resumeFileName" => $resumeFileName,
    "resumeData" => $resumeData,
    "qa" => $questions
  ];

  //print_r($Inputdata);

  $InputJSON = json_encode( $Inputdata );

  print_r( $InputJSON );

  $curl = curl_init();
  curl_setopt_array( $curl, array(
    CURLOPT_URL => $jobPostURL,
    CURLOPT_HTTPHEADER => array(
      "accept: text/plain",
      "TEXMO-KEY: 2c589ffd7309c8679015e0ccc7aea9ee6568ed5f0ae821d5e6522e6cf7d39b23",
      "Content-Type: application/json"
    ),
  ) );

  curl_setopt( $curl, CURLOPT_POST, true );
  curl_setopt( $curl, CURLOPT_POSTFIELDS, $InputJSON );
  curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
  $postresponse = curl_exec( $curl );
  curl_close( $curl );


  $result = json_decode( $postresponse, true );
  if ( $result[ 'statusCode' ] == "400" ) {
    echo "<br /> Result : " . $postresponse;
  } else {
    header( "location:" . $ResultPage );
  }
}
?>
<?php
$jobURL = $URL . "/api/recruitment-management/job/" . $_GET[ 'id' ];

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

//echo( $jobURL . "<br />" );

//print_r( $data[ "question" ] );

$datas = $data[ "question" ];
//echo " Test ";
//print_r( $datas[0]["title"] );

//$datas = ( $datas[ "statusCode" ] == "404" ) ? "" : $datas;
//print_r($datas);
//echo ($data['hiringManager']);
?>
<?php get_header(); ?>
<?php
	$imagemobile = get_field( 'story_image_mobile', get_the_ID() );
?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="fade banner" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'Large' ); ?>')">

	<div class="banner--overlay" style="background-color: rgba(0,0,0,0.40);">&nbsp;</div>
	<div class="banner--content fade fade--delay__1">
		<h1>Job Title</h1>
		<h3>Company Name</h3>
		<p><strong>City, Country • Department • Apply by</strong></p>
	</div>
	<img loading="lazy" class="banner--image hidemobile" src="<?php echo get_the_post_thumbnail_url( get_the_ID()); ?>" alt="">
	<?php if ( $imagemobile ) { ?>
		<img loading="lazy" class="banner--image hidedesktop" src="<?php echo $imagemobile['url']; ?>" alt="<?php echo $imagemobile['alt']; ?>" />
	<?php } ?>
</section>

<article>
	<form action="#" method="POST" enctype="multipart/form-data">
		<input type="hidden" name = "jobId" value="<?php echo $_GET[ 'id' ] ?>">
		<div class="application-form">
			<div>
				<h3>Application</h3>
			</div>
			<div class="application-form--form">
				<ul>
					<li>
					<label>Resume/CV</label>
						<input type="file" name="fileName">
					</li>
					<li>
						<label>First Name</label>
						<input type="text" name="firstName" placeholder="First Name"  value="<?php echo $firstName ?>">
					</li>
					<li>
						<label>Last Name</label>
						<input type="text" name="lastName" placeholder="Last Name"  value="<?php echo $lastName ?>">
					</li>
					<li>
						<label>Email</label>
						<input type="text" name="Email" placeholder="Email Address"  value="<?php echo $Email ?>">
					</li>
					<li>
						<label>Phone</label>
						<input type="text" name="Phone" placeholder="Phone Number"  value="<?php echo $Phone ?>">
					</li>
					<li>
						<label>Additional Information</label>
						<textarea name="info" placeholder="Cover letter or anything else you'd like to add"><?php echo $addtionalInfo ?></textarea>
					</li>
					<?php

					function QuestionType_Display( $input, $num ) {
						switch ( $input ) {
							case "boolean":
							echo "<input type='radio' name='answer$num'  value=true>" . "Yes";
							echo "<input type='radio' name='answer$num'  value=false>" . "No";
							break;
							case "date":
							echo "<input type='date' name='answer$num' placeholder='Day | Month | Year' value=''  min='1997-01-01' max='2030-12-31'>";
							break;
							case "multiple_choice":
							echo "<input type='checkbox' name='answer$num' value='Checked'> ";
							break;
							case "long_text":
							echo "<textarea  name='answer$num' value=''></textarea> ";
							break;
							case "URL":
							echo "<input  name='answer$num' value=''>";
							break;
							case "Document":
							echo "<input type='file' name='answer$num' value=''> ";
							break;
						}
					}
					$ansLoop = 0;
					foreach ( $datas as $value ) {
					$ansLoop = $ansLoop + 1;
					?>
						<input type="hidden" name = "id<?php echo $ansLoop ?>" value="<?php echo $value['id'] ?>">
						<input type="hidden" name = "questionType<?php echo $ansLoop ?>" value="<?php echo $value['questionType'] ?>">
						<input type="hidden" name = "title<?php echo $ansLoop ?>" value="<?php echo $value['title'] ?>">
					<li>
					<label></label>
					<p>
					<?php
						echo $value[ 'title' ] . "<br />";
						if ( $value[ 'questionType' ] == "multiple_choice" ) {
							$anssubLoop = 0;
							foreach ( $value[ 'multipleChoiceOptions' ] as $values ) {
							$anssubLoop = $anssubLoop + 1;
							echo "<input type='checkbox' name='answer$ansLoop-$anssubLoop' value='$values'>";
							echo $values . " <br />";
						}
						} else {
							QuestionType_Display( $value[ 'questionType' ], $ansLoop );
						}
					?>
					</p>
					</li>
					<?php } ?>
					<li>
						<label></label>
						<p>In order to contact you with future jobs that you may be interested in, we need to store your personal data. If you are happy for us to do so please click the checkbox below<br>
						<br>
						Our GDPR &amp; privacy notice can be found here<br>
						<br>
						</p>
					</li>
					<li>
						<input class="btn btn--primary" type="submit" value="Submit Application" name="">
					</li>
					<input type="hidden" name = "ansLoopCount" value="<?php echo $ansLoop ?>">
					<input type="hidden" name = "anssubLoopCount" value="<?php echo $anssubLoop ?>">
				</ul>
			</div>
		</div>
	</form>
</article>
<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
