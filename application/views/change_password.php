<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Change Password</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                      </li>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				<!-- message box --- -->
				<div class="x_content bs-example-popovers">
				<?php if( $this->session->flashdata('flsh_msg_add_new_s')){ ?>

                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   <?php echo $this->session->flashdata('flsh_msg_add_new_s'); ?>
                  </div>
                 <?php  } ?>
				<?php if( $this->session->flashdata('flsh_msg_add_new_e')){ ?>

                  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   <?php echo $this->session->flashdata('flsh_msg_add_new_e'); ?>
                  </div>
                 <?php  } ?>
                 </div>
				<!-- /message box --- -->


   		<div id="wizard" class="form_wizard wizard_horizontal">

                      <div id="step-1">

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('User_manager/change_password'); ?>" method="post" enctype="multipart/form-data">

                     <input type="hidden" value="<?php echo $all_user_data[0]['emp_id'];?>" name="id">
                     <input type="hidden" value="<?php echo $all_user_data[0]['pass'];?>" name="oldpassword">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">User Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo $all_user_data[0]['user_name']; ?>
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Old Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_oldpassward" class="form-control col-md-7 col-xs-12" data-validate-words="1" tabindex="10" name="txt_oldpassward" placeholder="" type="password">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_passward" class="form-control col-md-7 col-xs-12" data-validate-words="1" tabindex="10" name="txt_passward" placeholder="" type="password">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_init">Retype Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="retype_password" class="form-control col-md-7 col-xs-12" name="retype_password" tabindex="11" placeholder="" type="password">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-warning">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success" tabindex="44">&nbsp;&nbsp; Change &nbsp;&nbsp;</button>
                        </div>
                      </div>
                    </form>
                      </div>
                    </div>
                    <!-- End SmartWizard Content -->
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
