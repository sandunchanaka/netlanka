<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bill</h3>
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
                    <h2>Update Bill</h2>
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Bills/accept_bill'); ?>" method="post" enctype="multipart/form-data">


<input type="hidden" id="bill_id" name="bill_id" required="required" value="<?php echo $get_bill_details[0]['bill_id']; ?>" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Bill No<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label class="form-control col-md-7 col-xs-12"><?php echo $get_bill_details[0]['bill_no']; ?></label>
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Job Completed Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="form-control col-md-7 col-xs-12">
                            <?php echo $get_bill_details[0]['bill_date']; ?>
                          </label>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Job Id<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="form-control col-md-7 col-xs-12">
                          <?php echo $get_bill_details[0]['job_number']; ?>
                          </label>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Bill Amount<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="form-control col-md-7 col-xs-12">
                          <?php echo $get_bill_details[0]['bill_amount']; ?>
                          </label>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Bill Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="form-control col-md-7 col-xs-12">
                              <?php if($get_bill_details[0]['bill_status'] ==1){ ?>
                                  <span class="badge badge-primary">Pending</span>
                                <?php }elseif($get_bill_details[0]['bill_status'] ==2){ ?>
                                    <span class="badge badge-primary">Accepted</span>
                                  <?php }elseif($get_bill_details[0]['bill_status'] ==6){ ?>
                                      <span class="badge badge-primary">Rejected</span>
                              <?php }else{ ?>
                                    <span class="badge badge-secondary">Inactive</span>
                                <?php } ?>
                          </label>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Remarks <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="form-control col-md-7 col-xs-12"><?php echo $get_bill_details[0]['remarks']; ?></label>
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <?php if($get_bill_details[0]['bill_status'] == 1){ ?>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-warning">Reject</button>
                          <button id="send" type="submit" class="btn btn-success" tabindex="44">&nbsp;&nbsp; Accept &nbsp;&nbsp;</button>
                        </div>
                      </div>
                    <?php } ?>
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
