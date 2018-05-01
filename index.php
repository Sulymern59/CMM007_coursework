
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <title>Project Experiment Approval </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

  <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<link href="css/rgu.css"  rel="stylesheet" type="text/css" />
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css'/>

  <link href="css/css" type="text/css" rel="stylesheet"/>

  <script type="text/javascript">if(!JAWR){var JAWR = {};};;JAWR.jawr_dwr_path='/dwr';JAWR.app_context_path='';</script>
<script type="text/javascript" src="js/lib.js" ></script>
<script type="text/javascript" src="js/home-page.js" ></script>
<script src="js" type="text/javascript"></script>

  <script src="js/tinymce.min.js" type="text/javascript"></script>

  </head>
<body id="container" class="section-unauthorised-home target-connect login unauthorised ">

<div id="page" class="outerwrap container-fluid">
  <div class="row body">
    <div class="col-md-7 col-lg-8">
      <header class="login-header ">

        <div class="login-logo-container">
              <a href="index.php">
                  <img class="site-logo" title="PEA LOGO" alt="PEA"  src="images/design2.png" />
              </a>
          </div>
        <div class="login-content-container">
        <h2>Welcome to the Project Ethical Approval System</h2>
<p class="text-center"><strong>Making sure every experiment is ethical! </strong></p><strong></strong>
<p class="text-center bottom-margin-lg"></p></div>
      </header>
    </div>
    <div class="col-md-5 col-lg-4 side-section">
      <div class="side-section-body">

        

  <div id="ajax-section" class="selection-box">
    <div class="side-section-body-container">
      <h2>Project Ethical Approval System</h2>
<p class="text-center"><strong>Please login appropriately</strong></p><strong></strong>
<p class="text-center bottom-margin-lg"></p><ul class="pills">
            <br>
        <li data-login-type="student">
            <a href="adminlogin.php">
              <span>Administrator Login</span> <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
          </li>
                <br>
            <li data-login-type="student">
                <a href="eaologin.php">
                    <span>Experimental Approval Officers Login</span> <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
        <br>
        <li data-login-type="student">
            <a href="studentlogin.php">
              <span>Student login</span> <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
    </div>
  </div>

<footer class="hidden-xs hidden-sm">
          
          Project Ethical Approval System, Copyright(R) 2018
</footer>
      </div>
    </div>
  </div>
  <footer class="hidden-md hidden-lg">
    <p class="version">
      &#9400; 2017 | v7.3.6.10
</p>
  </footer>
</div>

<script type="application/javascript">
  
  if (self == top) {
    $('container').setStyle({'display': 'block', 'visibility': 'visible'});
  } else {
    top.location = self.location;
  }
  displayActiveTimeout();
  document.observe("dom:loaded", function() {
    new HomePage();
    var login = $('user.username');
    login && login.focus();
  });
</script>

</body>
</html>
