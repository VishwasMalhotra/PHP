<?php 
  session_start();
  require 'facebook-sdk-v5/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Website Layout</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/basic-template.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="stylesheet.css" />
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
      <nav class="navbar navbar-default" role="navigation">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-container">
               <span class="sr-only"> Show and Hide navigation </span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">
               <img src="companyLogo.png" class="logo" />
               </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-container">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                  <li><a href="StudentInformationForm.php"><span class="glyphicon glyphicon-edit"></span> Student Information Form </a></li>
                  <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin Login </a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container">
         <div class="jumbotron">
            <div class="row">
               <div class="col-sm-12">
                  <h1>Company Name</h1>
                  <p>
                     Please select any one of the following option: <br /> 
                  </p>
               </div>
            </div>
            <div class="btn-group">
               <a href="StudentInformationForm.php" class="btn btn-primary"> Fill the Form </a>
            </div>
            <div class="btn-group">
               <a href="login.php" class="btn btn-danger"> Admin Login </a>
            </div>
            <div class="btn-group">
              <?php 
              if (!isset($_SESSION['fb_access_token'])) {
              $fb = new Facebook\Facebook ([
              'app_id' => '1418910954831586',
              'app_secret' => 'b262ab99f96d8d2287aee9a6b89029d9',
              'default_graph_version' => 'v2.5',
              ]);

              $helper = $fb->getRedirectLoginHelper();
              $permissions = ['email']; 
              $loginUrl = $helper->getLoginUrl('http://52.40.58.82/fb-callback.php', $permissions);
              echo '<a class="btn btn-info" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
              }
              ?>
            </div>
         </div>
      </div>
</body>
</html>