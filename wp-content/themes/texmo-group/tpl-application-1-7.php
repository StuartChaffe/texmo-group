<style>
	.application ul li{
		display: flex;
		flex-direction: row;
		margin-bottom: 25px;
	}
	.application ul li:first-child{
		margin-bottom: 10px;
	}
	.carousel-full--content.application div:first-child{
		width: 35%;
	}
	.carousel-full--content.application div
	{
		width: 65%;
	}
	.carousel-full--content.application ul li label{
		width: 20%;
		    margin-right: 5%;
		font-weight: none;
	}
	.carousel-full--content.application ul li p{
		width: 100%;
	}
	.carousel-full--content.application ul li input[type="text"]{
		width: 100%;
		height: 60px;
		border-radius: 25px;
		border: solid 1px #000;
	}
	.carousel-full--content.application ul li textarea{
		width: 100%;
		border-radius: 25px;
		border: solid 1px #000;
		height: 250px;
	}
	.carousel-full--content.application ul li input[type="submit"]{
		background-color: #e55e20;
		cursor: pointer;
		border: solid 1px #e55e20 !important;
		border-radius: 40px;
		border: solid 1px #000;
		    padding: 20px 60px;
		color: #fff;
		transition: 0.3s;
		margin-top: 40px;
	}
	.carousel-full--content.application ul li input[type="submit"]:hover{
		background-color: #fff;
	color: #e55e20;
	}
</style>

<?php
// Template Name: Application 2
?>
<?php 
	// POST API calling
	$jobPostURL="https://api-qa.texmo.com/api/recruitment-management/jobs";
	$ansLoopCount = 0 ;
	$jobId="";
		$firstName ="";
        $lastName = "";
		$Email="";
		$Phone="";
		$addtionalInfo="";
		
	if ( isset( $_POST[ 'ansLoopCount' ] ) && ( $_POST[ 'ansLoopCount' ] != "" ) ) {
		$ansLoopCount = $_POST[ 'ansLoopCount' ];
	}
	
	//echo "Ans Count :" . $ansLoopCount;
	
	if ( isset( $_POST[ 'ansLoopCount' ] ) ) {
		echo "<br />".'First Name'.$i." : " .$_POST['firstName'];
		echo "<br />".'Last Name'.$i." : " .$_POST['lastName'];
		echo "<br />".'Email '.$i." : " .$_POST['Email'];
		echo "<br />".'Phone '.$i." : " .$_POST['Phone'];
		echo "<br />".'Additional Info'.$i." : " .$_POST['info'];
		
		for ( $i=1; $i <= $ansLoopCount; $i++) {
    	echo "<br />".'answer'.$i." - " .$_POST['answer'.$i];
		}

		$jobId=$_POST['jobId'];
		$firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
		$Email=$_POST['Email'];
		$Phone=$_POST['Phone'];
		$addtionalInfo=$_POST['info'];
		$resumeFileName=$_FILES["fileName"]["name"];
		
//		print_r(base64_encode($content));
		
		$uploaddir = 'upload/';	
		$uploadfile = $uploaddir . basename($_FILES['fileName']['name']);

		move_uploaded_file($_FILES['fileName']['tmp_name'], $uploadfile);
		
		$content = file_get_contents($_FILES["fileName"]["name"]);
		$resumeData= "data:application/pdf;base64,".base64_encode($content);

		//print_r($content);
		
		$question=[];

		$Inputdata = [
			"jobId" => $jobId, 
			"firstName" => $firstName, 
            "lastName" => $lastName, 
			"email" => $Email, 
			"phone" => $Phone,
			"additionalInfo" => $addtionalInfo,
			"resumeFileName" => $resumeFileName, 
			"resumeData" => $resumeData,
			"qa" => $question
		];

        //print_r($Inputdata);

        $InputJSON = json_encode($Inputdata);

        print_r($InputJSON);

        $curl = curl_init();
        curl_setopt_array( $curl, array(
          CURLOPT_URL => $jobPostURL,
          CURLOPT_HTTPHEADER => array(
            "accept: text/plain",
            "TEXMO-KEY: 2c589ffd7309c8679015e0ccc7aea9ee6568ed5f0ae821d5e6522e6cf7d39b23",
            "Content-Type: application/json" 
          ),
        ) );
       
        curl_setopt ($curl, CURLOPT_POST, true);
        curl_setopt ($curl, CURLOPT_POSTFIELDS, $InputJSON);
        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
        $postresponse = curl_exec( $curl );
        curl_close($curl); 
		  
 		echo "<br /> ";
 		echo "<br /> ";
        echo "<br /> Result : ". $postresponse;
}
	?>
<?php
$jobURL = "https://api-qa.texmo.com/api/recruitment-management/job/" . $_GET[ 'id' ];

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

print_r( $data[ "question" ] );

$datas = $data[ "question" ];
//echo " Test ";
//print_r( $datas[0]["title"] );

//$datas = ( $datas[ "statusCode" ] == "404" ) ? "" : $datas;
//print_r($datas);
//echo ($data['hiringManager']);
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<article>
  
	<form action="#" method="POST" enctype="multipart/form-data">
	<input type="hidden" name = "jobId" value="<?php echo $_GET[ 'id' ] ?>">
	<div class="carousel-full--content application" style="margin-top: 5em;">
    <div>
      <h3>Application</h3>
    </div>
    <div>
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
		   function QuestionType_Display($input,$num){
				  switch ($input) {
				  case "boolean" :
					  echo "<input type='radio' name='answer$num'  value='Yes'>". "Yes" ;
					  echo "<input type='radio' name='answer$num'  value='No'>". "No" ;
					  break;
					case "date" :
					  echo "<input type='date' name='answer$num' placeholder='Day | Month | Year' value=''  min='1997-01-01' max='2030-12-31'>" ;
					  break;
					  case  "multiple_choice" :
						  echo "<input type='checkbox' name='answer$num' value='Checked'> ";
						  break;
					  case "long_text" :
						  echo "<textarea  name='answer$num' value=''></textarea> ";
						  break;
						 case "URL" :
						  echo "<input  name='answer$num' value=''>";
						  break;
						  case "Document" :
						  echo "<input type='file' name='answer$num' value=''> ";
						  break;
			  		}
				  
			  }
		 $ansLoop = 0; 
        foreach ( $datas as $value ) {
			$ansLoop = $ansLoop + 1 ;
          ?>
        <li>
          <label></label>
          <p><?php ($value['questionType'] == "multiple_choice" ) ? QuestionType_Display($value['questionType'],$ansLoop) : "" ; 
			   echo $value['title'] ;?><br>
			  <?php ($value['questionType'] == "multiple_choice" ) ? "" : QuestionType_Display($value['questionType'],$ansLoop) ;   ?>
      </li><?php  
		
		}  ?>
		
		  <li><label></label>
		  <p>In order to contact you with future jobs that you may be interested in, we need to store your personal data. If you are happy for us to do so please click the checkbox below<br><br>
Our GDPR &amp; privacy notice can be found here<br><br>
</p></li>
		  <li><input type="submit" value="Submit Application" name=""></li>
		  <input type="hidden" name = "ansLoopCount" value="<?php echo $ansLoop ?>">
      </ul>
    </div>
  </div>
		</form>
  <?php the_content(); ?>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>
