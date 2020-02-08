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
                    <h2>Fund Allocation Update</h2>
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Fund_allocation/save_update_fund_allocations'); ?>" method="post" enctype="multipart/form-data">

                      <input type="hidden" id="fund_allocation_id" name="fund_allocation_id" required="required" value="<?php echo $get_fund_allocation_data[0]['fund_allocation_id']; ?>" >


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Employeer Name</label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <?php $empid = $get_fund_allocation_data[0]['emp_id_to']; ?>
                        <select class="select2_single form-control" id="emp_id" tabindex="5" required name="emp_id">
                          <option></option>
                          <?php foreach($get_active_employeers as $row){ ?>
                          <option value="<?php echo $row['emp_id']; ?>" <?php if($row['emp_id'] == $empid){?> selected="selected" <?php } ?>><?php echo $row['emp_name']; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Allocation Type <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" id="allocation_type" tabindex="5" required name="allocation_type">
                            <option></option>
                            <?php foreach($get_fund_allocation_types as $rowfat){ ?>
                            <option value="<?php echo $rowfat['fund_allocation_type_id']; ?>" <?php if($get_fund_allocation_data[0]['fund_allocation_type'] == $rowfat['fund_allocation_type_id']){?> selected="selected" <?php } ?>><?php echo $rowfat['fund_allocation_type_name']; ?></option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Allocate Amount<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="number" id="all_amount" name="all_amount" required="required" data-validate-minmax="0,10000000" value="<?php echo $get_fund_allocation_data[0]['allocate_amount']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Remarks<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="remarks" class="form-control col-md-7 col-xs-12" name="remarks" tabindex="8"  value="<?php echo $get_fund_allocation_data[0]['remarks']; ?>" required="required" type="text">
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
