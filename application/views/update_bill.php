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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Bills/update_bill_details'); ?>" method="post" enctype="multipart/form-data">


<input type="hidden" id="bill_id" name="bill_id" required="required" value="<?php echo $get_bill_details[0]['bill_id']; ?>" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Bill No<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="bill_code" name="bill_code" required="required" tabindex="3" value="<?php echo $get_bill_details[0]['bill_no']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Job Completed Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <fieldset class="control-group col-md-7 col-xs-12">
                             <div class="" style="right: 9px;">
                               <div class="controls">
                                 <div class="xdisplay_inputx form-group has-feedback">
                                   <input type="text" class="form-control has-feedback-left" id="single_cal1" value="<?php echo $get_bill_details[0]['bill_date']; ?>" name="job_date" aria-describedby="inputSuccess2Status" tabindex="23">
                                   <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                   <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                 </div>
                               </div>
                             </div>
                           </fieldset>
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Job No<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" id="job_id" tabindex="5" required name="job_id">
                            <option value="0" >NOT SPECIFIED</option>
                            <?php foreach($get_jobnos as $row){ ?>
                            <option value="<?php echo $row['job_id']; ?>" <?php if($row['job_id'] == $get_bill_details[0]['job_id']){ echo "Selected";} ?>><?php echo $row['job_number']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>



                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Bill Amount<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="bill_amount" name="bill_amount" required="required" data-validate-minmax="0,10000000" value="<?php echo $get_bill_details[0]['bill_amount']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Remarks <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="3" name="remarks" placeholder="" ><?php echo $get_bill_details[0]['remarks']; ?></textarea>
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
