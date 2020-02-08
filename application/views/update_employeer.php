<?php
$data = $this->session->userdata('user_login_data');
$org_id = $data['org_id'];
$userlevel = $data['user_level'];
$office_id = $data['office_id'];
$depot_id = $data['depot_id'];
?>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Member</h3>
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
                    <h2>Update Member</h2>
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Employeer/save_update_data'); ?>" method="post" enctype="multipart/form-data">

<input type="hidden" id="emp_id" name="emp_id" required="required" value="<?php echo $get_all_employeers[0]['emp_id']; ?>" >

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Organization <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <?php

                           if($userlevel == 1){ ?>
                             <select class="select2_single form-control" id="org" tabindex="5" required name="org">
                               <option value="0" >NOT SPECIFIED</option>
                               <?php foreach($get_all_organizations as $row){ ?>
                               <option value="<?php echo $row['org_id']; ?>" <?php if($get_all_employeers[0]['org_id'] == $row['org_id']){?> selected="selected" <?php } ?>><?php echo $row['org_name']; ?></option>
                               <?php } ?>
                             </select>
                        <?php }else{ ?>
                          <select class="select2_single form-control" id="org" tabindex="5" required name="org" disabled>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Region <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <?php
                          if($userlevel == 1){ ?>
                            <select class="select4_single form-control" id="branch" tabindex="5" name="branch" >
                              <option value="0" >NOT SPECIFIED</option>
                              <?php foreach($get_all_branches as $row){ ?>
                              <option value="<?php echo $row['office_id']; ?>" <?php if($row['office_id'] == $get_all_employeers[0]['branch_id'] ){?> selected="selected" <?php } ?> ><?php echo $row['office_name']; ?></option>
                              <?php } ?>
                            </select>
                          <?php }elseif($userlevel == 2){
                            $get_all_branches = $this->Organization_model->get_active_offices($org_id);
                            ?>
                            <select class="select4_single form-control" id="branch" tabindex="5" name="branch" >
                              <option value="0" >NOT SPECIFIED</option>
                              <?php foreach($get_all_branches as $row){ ?>
                              <option value="<?php echo $row['office_id']; ?>" <?php if($row['office_id'] == $get_all_employeers[0]['branch_id'] ){?> selected="selected" <?php } ?> ><?php echo $row['office_name']; ?></option>
                              <?php } ?>
                            </select>
                          <?php }else{
                            $get_all_branches = $this->Organization_model->get_active_offices($org_id);
                          //    ?>
                            <select class="select4_single form-control" id="branch" tabindex="5" name="branch" disabled>
                              <option value="0" >NOT SPECIFIED</option>
                              <?php foreach($get_all_branches as $row){ ?>
                              <option value="<?php echo $row['office_id']; ?>" <?php if($row['office_id'] == $get_all_employeers[0]['branch_id'] ){?> selected="selected" <?php } ?> ><?php echo $row['office_name']; ?></option>
                              <?php } ?>
                            </select>
                            <input type="hidden" id="branch" name="branch" required="required" value="<?php echo $get_all_employeers[0]['branch_id']; ?>" >
                          <?php } ?>



                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Depot <span class="required"></span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select4_single form-control" id="depot" tabindex="5" required name="depot">
                            <option value="0" >NOT SPECIFIED</option>
                            <?php foreach($get_all_depot as $row){ ?>
                            <option value="<?php echo $row['depot_id']; ?>" <?php if($get_all_employeers[0]['depot_id'] == $row['depot_id']){?> selected="selected" <?php } ?> ><?php echo $row['depot_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Emp No <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="emp_no" name="emp_no" required="required" tabindex="3" value="<?php echo $get_all_employeers[0]['emp_code']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Name with Initial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name_with_initial" class="form-control col-md-7 col-xs-12" name="name_with_initial" tabindex="8" value="<?php echo $get_all_employeers[0]['emp_name']; ?>" required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Full Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="full_name" class="form-control col-md-7 col-xs-12" name="full_name" tabindex="8" value="<?php echo $get_all_employeers[0]['emp_full_name']; ?>" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="emp_addr" class="form-control col-md-7 col-xs-12" name="emp_addr" value="<?php echo $get_all_employeers[0]['emp_address']; ?>" tabindex="12" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">NIC <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="nic" name="nic" required="required" tabindex="3" value="<?php echo $get_all_employeers[0]['emp_nic']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Date Of Birth
                        </label>
                       <fieldset class="control-group col-md-4 col-sm-4 col-xs-12">
                          <div class="" style="right: 9px;">
                            <div class="controls">
                              <div class="xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal1" value="<?php echo $get_all_employeers[0]['emp_birth']; ?>" name="dob" aria-describedby="inputSuccess2Status" tabindex="23">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                       <div class="ln_solid"></div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contact No
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="contact_number_home" name="contact_number_home"  tabindex="3" value="<?php echo $get_all_employeers[0]['emp_contact1']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="contact_number_mobile" name="contact_number_mobile"  tabindex="3" value="<?php echo $get_all_employeers[0]['emp_contact2']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>

                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Email<span class="required"></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="email" name="email" tabindex="3" value="<?php echo $get_all_employeers[0]['emp_email']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="ln_solid"></div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">NOK Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="spouse_name" class="form-control col-md-7 col-xs-12" name="spouse_name" tabindex="8" value="<?php echo $get_all_employeers[0]['spouse_name']; ?>" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">NOK Contact No <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="spouse_nic" name="spouse_nic" required="required" tabindex="3" value="<?php echo $get_all_employeers[0]['spouse_nic']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="ln_solid"></div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">User Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_user_name" class="form-control col-md-7 col-xs-12" data-validate-words="1" tabindex="9" name="txt_user_name" value="<?php echo $get_all_employeers[0]['user_name']; ?>" type="text" required="required">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Appoinment <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" tabindex="22" required name="appoinment">
                            <option></option>
                            <?php foreach($get_all_appoinment as $rowapp){ ?>
                            <option value="<?php echo $rowapp['appointment_id']; ?>" <?php if($get_all_employeers[0]['appointment'] == $rowapp['appointment_id']){?> selected="selected" <?php } ?> ><?php echo $rowapp['appointment_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Level <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" tabindex="22" required name="userlevel">
                            <option></option>
                            <?php foreach($get_all_user_levels as $rowusrlevel){ ?>
                            <option value="<?php echo $rowusrlevel['id']; ?>" <?php if($get_all_employeers[0]['user_type'] == $rowusrlevel['id']){?> selected="selected" <?php } ?>><?php echo $rowusrlevel['user_level']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>Employeer/employeer_manager" class="btn btn-warning" >Cancel </a>
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
