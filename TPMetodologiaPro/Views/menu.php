<?php 
 include('header.php');

 include('nav-bar.php');
?>
<!-- ################################################################################################ -->




<div style="float: right; display: flex; justify-content: center;">
<a href="<?php echo FRONT_ROOT?>User/ShowLogin" rel="nofollow" class="button" ><img src="https://www.cinemarkhoyts.com.ar/images/res/user-outline.png"> </img></a>';


<?php
//fb inic

//config
########## app ID and app SECRET (Replace with yours) #############
$appId = '527391147827891'; //Facebook App ID
$appSecret = '4d02cd4e8bce0b6e1a48b72888b3601c'; // Facebook App Secret
$url = VIEWS_PATH."User-menu.php";
$return_url = '$';  //path to script folder
$fbPermissions = 'publish_actions,email'; //more permissions : https://developers.facebook.com/docs/authentication/permissions/

########## MySql details (Replace with yours) #############
$db_username = "xxxxxx"; //Database Username
$db_password = "xxxxxx"; //Database Password
$hostname = "localhost"; //Mysql Hostname
$db_name = 'database_name'; //Database Name
###################################################################




if(!isset($_SESSION['logged_in']))
{
    echo '<div id="results">';
    echo '<!-- results will be placed here -->';
    echo '</div>';
    echo '<div id="LoginButton">';
	echo '<a href="#" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;"><img src="https://www.cinemacenter.com.ar/images/icon-facebook-likebox.png"> </img></a>';
    echo '</div>';

}
else
{
	echo 'Hi '. $_SESSION['user_name'].'! You are Logged in to facebook, <a href="?logout=1">Log Out</a>.';
}




/* Detect HTTP_X_REQUESTED_WITH header sent by all recent browsers that support AJAX requests. */
if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
{		

	//initialize facebook sdk
	$facebook = new Facebook(array(
		'appId' => $appId,
		'secret' => $appSecret,
	));
	
	$fbuser = $facebook->getUser();
	
	if ($fbuser) {
		try {
			// Proceed knowing you have a logged in user who's authenticated.
			$me = $facebook->api('/me'); //user
			$uid = $facebook->getUser();
		}
		catch (FacebookApiException $e) 
		{
			//echo error_log($e);
			$fbuser = null;
		}
	}
	
	// redirect user to facebook login page if empty data or fresh login requires
	if (!$fbuser){
		$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$return_url, false));
		header('Location: '.$loginUrl);
	}
	
	//user details
	$fullname = $me['first_name'].' '.$me['last_name'];
	$email = $me['email'];

	/* connect to mysql using mysqli */
	
	$mysqli = new mysqli($hostname, $db_username, $db_password,$db_name);
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	//Check user id in our database	
	$UserCount = $mysqli->query("SELECT COUNT(id) as usercount FROM usertable WHERE fbid=$uid")->fetch_object()->usercount; 
	
	if($UserCount)
	{	
		//User exist, Show welcome back message
		echo 'Ajax Response :<br /><strong>Welcome back '. $me['first_name'] . ' '. $me['last_name'].'!</strong> ( Facebook ID : '.$uid.') [<a href="'.$return_url.'?logout=1">Log Out</a>]';
		
		//print user facebook data
		echo '<pre>';
		print_r($me);
		echo '</pre>';

		//User is now connected, log him in
		login_user(true,$me['first_name'].' '.$me['last_name']);
	}
	else
	{
		//User is new, Show connected message and store info in our Database
		echo 'Ajax Response :<br />Hi '. $me['first_name'] . ' '. $me['last_name'].' ('.$uid.')! <br /> Now that you are logged in to Facebook using jQuery Ajax [<a href="'.$return_url.'?logout=1">Log Out</a>].
		<br />the information can be stored in database <br />';
		//print user facebook data
		echo '<pre>';
		print_r($me);
		echo '</pre>';
		
		// Insert user into Database.
		$mysqli->query("INSERT INTO usertable (fbid, fullname, email) VALUES ($uid, '$fullname','$email')");
				
	}
	
	$mysqli->close();
}

function login_user($loggedin,$user_name)
{
	/*
	function stores some session variables to imitate user login. 
	We will use these session variables to keep user logged in, until s/he clicks log-out link.
	*/
	$_SESSION['logged_in']=$loggedin;
	$_SESSION['user_name']=$user_name;
}

?>

<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false" onlogin="javascript:CallAfterLogin();" scope="publish_actions,email"></div>
</div>
<?php
use DAO\MovieDAODB as MovieDAODB;
$repo = new MovieDAODB();
$list = $repo->GetAll();
$peli1 = array();
foreach($list as $movieList)
{
  array_push($peli1,$movieList);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="carousel-inner">
                <div class="item active">
                    <img class="d-block w-100" src="https://image.tmdb.org/t/p/w300<?php echo $peli1[1]->getPoster_path() ?>" alt="<?php echo $peli1[1]->getTitle();?>" width="300" height="200">

                </div>
                <?php
                foreach($list as $movieList)
                {
                    ?>
                    <div class="item">

                        <img class="d-block w-100" src="https://image.tmdb.org/t/p/w300<?php echo $movieList->getPoster_path() ?>" alt="<?php echo $movieList->getTitle();?>" width="300" height="350">
                    </div>


                    <?php
                }
                ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>


</body>
</html>


<!-- ################################################################################################ -->

<!-- ################################################################################################ -->

<?php 
  include('footer.php');
?>