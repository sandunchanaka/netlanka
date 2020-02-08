<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Management System</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css');?>">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/font-awesome.min.css');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/simple-line-icons.css');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/animate.min.css');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/plugins/icheck/skins/flat/aero.css');?>"/>
  <link href="<?php echo base_url('asset/css/style.css');?>" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="<?php //echo base_url('asset/img/sri_lanka_army_logo.png');?>">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('asset/js/html5shiv.min.js');?>"></script>
      <script src="<?php echo base_url('asset/js/1.4.2/respond.min.js');?>"></script>
      <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container">

        <form class="form-signin" method="post" action="Login/login_validation">
          <div class="panel periodic-login">

            <div class="panel-body text-center">
                  <h1 class="element-name">NET LANKA -IMS</h1>
                   <br/><br/>
                <p class="atomic-mass"><img src="<?php echo base_url('assets/images/netlanka_logo.png');?>" width="164" height="129"></p>
                <p class="element-name"></p>

                  <i class="icons "></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="uname" required>
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" class="form-text" name="password" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <label class="pull-left">
                  <input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me
                  </label>
                  <input type="submit" class="btn col-md-12" value="Sign In"/>
              </div>
                <div class="text-center" style="padding:5px;">

                </div>
          </div>
        </form>

      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
      <script src="<?php echo base_url('asset/js/jquery.ui.min.js');?>"></script>
      <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>

      <script src="<?php echo base_url('asset/js/plugins/moment.min.js');?>"></script>
      <script src="<?php echo base_url('asset/js/plugins/icheck.min.js');?>"></script>

      <!-- custom -->
      <script src="<?php echo base_url('asset/js/main.js');?>"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>
