<?php
$data = $this->session->userdata('user_login_data');
$org_id = $data['org_id'];
$userlevel = $data['user_level'];
?>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Region Details</h3>
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
                    <h2>Region</h2>
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Organization/update_office_details'); ?>" method="post" enctype="multipart/form-data">

<input type="hidden" id="office_id" name="office_id" value="<?php echo $get_office_details[0]['office_id']; ?>" required="required">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Organization <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <?php

                            if($userlevel == 1){ ?>
                          <select class="select2_single form-control" id="org" tabindex="5" required name="org">
                            <option></option>
                            <?php foreach($get_all_organizations as $row){ ?>
                            <option value="<?php echo $row['org_id']; ?>" <?php if($row['org_id'] == $get_office_details[0]['org_id']){ echo "Selected";} ?>><?php echo $row['org_name']; ?></option>
                            <?php } ?>
                          </select>
                        <?php  }else{ ?>
                        <select class="select2_single form-control" id="org" tabindex="5" required name="org" disabled >
                          <option></option>
                          <?php foreach($get_all_organizations as $row){ ?>
                          <option value="<?php echo $row['org_id']; ?>" <?php if($row['org_id'] == $org_id){ echo "Selected";} ?>><?php echo $row['org_name']; ?></option>
                          <?php } ?>
                        </select>
                        <input type="hidden" id="org" name="org" required="required" value="<?php echo $org_id; ?>" >

                        <?php } ?>
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Office Type</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        Head Office
                        <input type="radio" class="flat" name="office" id="genderM" value="1" <?php if($get_office_details[0]['org_type'] == 1){ echo "checked";} ?> required /> Branch
                        <input type="radio" class="flat" name="office" id="genderF" value="2" <?php if($get_office_details[0]['org_type'] == 2){ echo "checked";} ?> />
                      </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Region Code <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="org_code" name="org_code" value="<?php echo $get_office_details[0]['office_code']; ?>" required="required" tabindex="3"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Region Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="org_name" class="form-control col-md-7 col-xs-12" name="org_name" tabindex="8" value="<?php echo $get_office_details[0]['office_name']; ?>" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname"> Short Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="org_short_name" class="form-control col-md-7 col-xs-12" name="org_short_name" tabindex="8" value="<?php echo $get_office_details[0]['office_short_name']; ?>" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name"> Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="org_addr" class="form-control col-md-7 col-xs-12" name="org_addr" value="<?php echo $get_office_details[0]['office_addr']; ?>" tabindex="12" required="required" type="text">
                        </div>
                      </div>





                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Telephone No
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="contact_number_land" name="contact_number_land"  tabindex="3" placeholder="Land Line" value="<?php echo $get_office_details[0]['office_tel1']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="contact_number_mobile" name="contact_number_mobile"  tabindex="3" placeholder="Mobile"  value="<?php echo $get_office_details[0]['office_tel2']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="contact_number_any" name="contact_number_any"  tabindex="3" placeholder="If Any" value="<?php echo $get_office_details[0]['office_tel3']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Fax<span class="required"></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="fax_number" name="fax_number" tabindex="3"  class="form-control col-md-7 col-xs-12" value="<?php echo $get_office_details[0]['office_fax']; ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Email<span class="required"></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="email" name="email" tabindex="3"  class="form-control col-md-7 col-xs-12" value="<?php echo $get_office_details[0]['office_email']; ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Web<span class="required"></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="web" name="web" tabindex="3" value="<?php echo $get_office_details[0]['office_web']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="<?php echo base_url(); ?>Organization/office_manager" class="btn btn-warning" >Cancel </a>
                          <button id="send" type="submit" class="btn btn-success" tabindex="44">&nbsp;&nbsp; Update &nbsp;&nbsp;</button>
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
