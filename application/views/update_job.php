<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Job</h3>
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
                    <h2>Update Job</h2>
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Jobs/update_job_details'); ?>" method="post" enctype="multipart/form-data">

<input type="hidden" id="job_id" name="job_id" required="required"  value="<?php echo $get_job_details[0]['job_id']; ?>" >


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Job ID <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="job_code" name="job_code" required="required" tabindex="3" value="<?php echo $get_job_details[0]['job_number']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Site Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" id="site" tabindex="5" required name="site">
                            <option></option>
                            <?php
                            $siteid = $get_job_details[0]['site_id'];
                            foreach($get_sites as $row){ ?>
                            <option value="<?php echo $row['tower_id']; ?>" <?php if($row['tower_id'] == $siteid){ echo "Selected";} ?>><?php echo $row['tower_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>



                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Job Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" id="job_type" tabindex="5" required name="job_type">
                            <option></option>
                            <?php
                              $jobtype = $get_job_details[0]['job_type'];
                            foreach($get_job_types as $rowjt){ ?>
                            <option value="<?php echo $rowjt['job_type_id']; ?>" <?php if($rowjt['job_type_id'] == $jobtype){ echo "Selected";} ?>><?php echo $rowjt['job_type_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Job Details <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="3" name="job_details" placeholder="" ><?php echo $get_job_details[0]['job_details'];?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Service Person</label>
                      <div class="col-md-7 col-xs-12">
                        <select class="select2_single form-control" id="emp_id" tabindex="5" required name="emp_id">
                          <option></option>
                          <?php
                          $service_person = $get_job_details[0]['service_person'];
                          foreach($get_active_employeers as $row){ ?>
                          <option value="<?php echo $row['emp_id']; ?>" <?php if($row['emp_id'] == $service_person){ echo "Selected";} ?>>
                            <?php
                            echo $row['emp_name']." - ";
                            if($row['appointment'] != 0){
                              $get_appname = $this->Employeer_model->get_appoinment_name($row['appointment']);
                              echo $get_appname[0]['appointment_name']." - ";
                            }
                            if($row['branch_id'] != 0){
                              $get_officename = $this->Organization_model->get_office_byid($row['branch_id']);
                              echo $get_officename[0]['office_short_name']." - ";
                            }
                            if($row['depot_id'] != 0){
                              $get_depotname = $this->Organization_model->get_depot_byid($row['depot_id']);
                              echo $get_depotname[0]['depot_short_name'];
                            }
                            ?>

                          </option>
                        <?php } ?>
                        </select>
                      </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-warning">Cancel</button>
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
