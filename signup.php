<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Mind Blogging!-Sign Up</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

</head>

<body>
<!-- this is the php code -->
 <?php
$nameErr = $emailErr  =$passwordErr =$cpasswordErr=$nameErr1=$passwordErr1="";
$name = $email   = $password= $cpassword=$name1=$password1="";

$valid = "false";
$valid1="false";

//echo " terrified";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["signup"]))
    {
    //echo "i m mad"; 

  $valid = "true";
     
   $user = isset($_POST['usernamesignup']) ? $_POST['usernamesignup'] : '';
$emailid = isset($_POST['emailsignup']) ? $_POST['emailsignup'] : '';
  $pass=isset($_POST['passwordsignup']) ? $_POST['passwordsignup'] : '';
 

   if (empty($_POST["usernamesignup"])) {
    $valid="false";

     $nameErr = "First Name is required";
   } else {
     $name = test_input($_POST["usernamesignup"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
       $valid = "false";
     }
   }
   
   
   
   if (empty($_POST["emailsignup"])) {
    $valid="false";
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["emailsignup"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
       $valid = "false";
     }
   }
     


   if (empty($pass)) {
     $passwordErr = "Password is required";
     $valid = "false";
   } 
   if (empty($_POST["passwordsignup_confirm"])) {
     $cpasswordErr = "Confirm Password is required";
     $valid = "false";
   }
    else
    {
        if(!empty($_POST["passwordsignup"]) && ($_POST["passwordsignup"] == $_POST["passwordsignup_confirm"])) {
        $password = test_input($_POST["passwordsignup"]);
        $cpassword = test_input($_POST["passwordsignup_confirm"]);
        if (strlen($_POST["passwordsignup"]) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
        }
    }
    }
    
   
}
else
{
    $valid1 = "true";
  if (empty($_POST["username"])) {
    $valid1="false";
 $nameErr1 = "First Name is required";
   } else {
     $name1 = test_input($_POST["username"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name1)) {
       $nameErr1 = "Only letters and white space allowed"; 
       $valid1 = "false";
     }
   }

   if (empty($_POST["password"])) {
     $passwordErr1 = "Password is required";
     $valid1 = "false";
   } 
   
    else {
        $password1 = test_input($_POST["password"]);
        
        if (strlen($_POST["password"]) <= '8') {
            $passwordErr1 = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password1)) {
            $passwordErr1 = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password1)) {
            $passwordErr1 = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password1)) {
            $passwordErr1 = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            $cpasswordErr1 = "Please Check You've Entered Or Confirmed Your Password!";
        }
    
}
}
}



function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


if($valid !="false"){


$con=mysqli_connect("localhost","root","","pmvh");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL:". mysqli_connect_error();
  }
// Perform queries 
mysqli_query($con,"SELECT * FROM test1");
//mysqli_query($con,"INSERT INTO phplog VALUES ($naav,$aadnv,$emailo,$rajya,$ling,$passa)");
mysqli_query($con,"INSERT INTO test1 VALUES ('$user','$emailid','$pass')");

mysqli_close($con);

header('Location: index.php');
  }

//$query='insert into phplog values($fname1,$fname2,$email,$state,$gender,$password)';




if($valid1 !="false"){


$link=mysqli_connect("localhost","root","","pmvh");
// same here.

//$link = mysqli_connect($host, $user, $password, $database);
        IF (!$link){
        echo ("Unable to connect to database!");
        }

        ELSE{
           session_start();
$query = "SELECT * FROM test1 WHERE user ='$name1' AND pass = '$password1'";
            $result = mysqli_query($link, $query);
            $num_rows = mysqli_num_rows($result);
        //    $row = mysqli_fetch_array($result, MYSQLI_BOTH);

 if ($num_rows) 
  { 
  //  $row = mysql_fetch_assoc($query); 
    $_SESSION['username'] = $name1; 
    $_SESSION['loggedin'] = true; 
    header("Location: user.php");
      }
      else{
    header("Location: signup.php");
     
    
      }}
    }
  ?>


   


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="post.php">Read</a>
                    </li>
					 <li>
                        <a href="index.php">My Account</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/staff-join-hands.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Join Us</h1>
                        <hr class="small">
                        <span class="subheading">Write here, right now.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

 <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
              

                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
         
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                           <form  action="signup.php" autocomplete="on" method="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" type="text" placeholder="myusername or mymail@mail.com"  value="<?php echo $name1;?>"/>
                                    <span class="error">* <?php echo $nameErr1;?></span>
                                  </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password"  type="password" placeholder="eg. X8df!90EO"  value="<?php echo $password1;?>"/> 
                                      <span class="error">* <?php echo $passwordErr1;?></span>
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="login" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <p><span class="error">* mandatory field.</span></p>
                               <form  action="signup.php#toregister" method="POST"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup"  type="text" placeholder="mysuperusername690"  value="<?php echo $name;?>"/>
                                      <span class="error">* <?php echo $nameErr;?></span>
                                       </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" type="text" placeholder="mysupermail@mail.com"  value="<?php echo $email;?>"/> 
                                 <span class="error">* <?php echo $emailErr;?></span>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup"  type="password" placeholder="eg. X8df!90EO"  value="<?php echo $password;?>"/>
                                 <span class="error">* <?php echo $passwordErr;?></span>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm"  type="password" placeholder="eg. X8df!90EO"  value=""/>
                                 <span class="error">* <?php echo $cpasswordErr;?></span>
                                </p>
                                <p class="signin button"> 
									<input type="submit" name="signup" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

   
</body>

</html>
