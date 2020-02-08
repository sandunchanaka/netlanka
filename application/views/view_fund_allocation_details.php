<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fund Allocation</h3>
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
                    <h2>Fund Allocation Details</h2>
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="" method="post" enctype="multipart/form-data">

                      <input type="hidden" id="fund_allocation_id" name="fund_allocation_id" required="required" value="<?php echo $get_fund_allocation_data[0]['fund_allocation_id']; ?>" >


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Fund Allocate From</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="col-md-12">
                        <?php $empid = $get_fund_allocation_data[0]['emp_id_from'];
                        $get_emp_data = $this->Employeer_model->get_my_details($empid);
                        echo $get_emp_data[0]["emp_name"];
                        echo " ( ";
                        echo $get_emp_data[0]["appointment_name"];
                         echo " - ";
                         if($get_emp_data[0]["branch_id"] != 0){
                        $get_office_name = $this->Organization_model->get_office_byid($get_emp_data[0]["branch_id"]);
                        echo $get_office_name[0]['office_short_name'];
                         echo " - ";
                       }
                       if($get_emp_data[0]["depot_id"] != 0){
                      $get_depot_name = $this->Organization_model->get_depot_byid($get_emp_data[0]["depot_id"]);
                      echo $get_depot_name[0]['depot_name'];

                     }
                     echo " ) ";
                        ?>
                      </label>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Fund Allocate To</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="col-md-12">
                        <?php $empid = $get_fund_allocation_data[0]['emp_id_to'];
                        $get_emp_data = $this->Employeer_model->get_my_details($empid);
                        echo $get_emp_data[0]["emp_name"];
                        echo " ( ";
                        echo $get_emp_data[0]["appointment_name"];
                         echo " - ";
                         if($get_emp_data[0]["branch_id"] != 0){
                        $get_office_name = $this->Organization_model->get_office_byid($get_emp_data[0]["branch_id"]);
                        echo $get_office_name[0]['office_short_name'];
                         echo " - ";
                       }
                       if($get_emp_data[0]["depot_id"] != 0){
                      $get_depot_name = $this->Organization_model->get_depot_byid($get_emp_data[0]["depot_id"]);
                      echo $get_depot_name[0]['depot_name'];

                     }
                     echo " ) ";

                        ?>
                          <label>
                      </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Allocation Type  <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">

                          <label class="col-md-12">
                            <?php
                             if($get_fund_allocation_data[0]['emp_id_to'] == $memid){
                               echo "Allocation";
                             }else{
                               echo "Transfer";
                             }
                             ?>
                          </label>

                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Allocation Type Name <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">

                          <label class="col-md-12"><?php echo $get_fund_allocation_data[0]['fund_allocation_type_name']; ?></label>

                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Allocate Amount<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="col-md-12">
                          <?php echo $get_fund_allocation_data[0]['allocate_amount']; ?>
                          <label>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Remarks<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="col-md-12">
                          <?php echo $get_fund_allocation_data[0]['remarks']; ?>
                        </label>
                        </div>
                      </div>




                      <div class="ln_solid"></div>

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
