<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript">
        $(function () {
            $("#mother_in_live").click(function () {
                if ($(this).is(":checked")) {
                    $("#army_id_no").removeAttr("disabled");
                    $("#army_id_no").focus();
                } else {
                    $("#army_id_no").attr("disabled", "disabled");
                }
            });
        });
    </script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Location Information</h3>
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
                    <!--<h2>Member Information</h2>-->
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Members/add_location_details'); ?>" method="post" enctype="multipart/form-data">
					
                     <input type="hidden" value="<?php echo $person_id;?>" name="id">
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">District<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" tabindex="21" name="districts" id="districts" required="required">
                            <option></option>
                            <?php foreach($all_districts as $row){ ?>
                            <option value="<?php echo $row['id']; ?>" <?php //if($get_location[0]['district'] == $row['id']){?> selected="selected" <?php  //} ?>><?php echo $row['district']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_army">AGA Division<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <!-- <input id="ds_division" class="form-control col-md-7 col-xs-12" name="ds_division" placeholder="" tabindex="12" required="required" type="text" value="<?php //echo $get_location[0]['gn_code']; ?>">-->
                          <select class="select4_single form-control" tabindex="21" name="ds_division" id="ds_division">
                            <?php foreach($all_aga_divisions as $row){ ?>
                            <option value="<?php echo $row['agaid']; ?>" <?php //if($get_location[0]['ds_division'] == $row['agaid']){?> selected="selected" <?php //} ?>><?php echo $row['aga_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_army">Grama Niladari Division<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<input id="gn_division" class="form-control col-md-7 col-xs-12" name="gn_division" placeholder="" tabindex="12" required="required" type="text">-->
                          <select class="select5_single form-control" tabindex="21" name="gn_division" id="gn_division">
                           <?php foreach($all_gn_divisions as $row){ ?>
                            <option value="<?php echo $row['gnid']; ?>" <?php //if($get_location[0]['gn_division'] == $row['gnid']){?> selected="selected" <?php //} ?>><?php echo $row['gn_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

					 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_army">Grama Niladari  Code<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="gn_code" class="form-control col-md-7 col-xs-12" name="gn_code" placeholder="" tabindex="12" required="required" type="text" value="<?php //echo $get_location[0]['gn_code']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Grama Niladari Approval<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        Approved:
                        <input type="radio" class="flat" name="gnapproval" id="gnapproval1" value="1" <?php //if($get_location[0]['gn_approval'] == 1){?> checked="checked" <?php //} ?> required /> Not Approved :
                        <input type="radio" class="flat" name="gnapproval" id="gnapproval" value="0" <?php //if($get_location[0]['gn_approval'] == 0){?> checked="checked" <?php //} ?> />
                      </div>
                      </div>
                                           
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Form Date <span class="required">*</span>
                        </label>
                        <fieldset>
                          <div class="control-group col-md-4 col-sm-4 col-xs-12" style="right: 9px;">
                            <div class="controls">
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="" name="form_date" aria-describedby="inputSuccess2Status" required="required" tabindex="23" value="<?php //echo $get_location[0]['application_date']; ?>">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                      
                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <a href="<?php echo site_url('Members/update_parents_details_f/'.$person_id); ?>"><button type="button" class="btn btn-dark">Back</button></a>
                          <button type="submit" class="btn btn-warning">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success" tabindex="44">&nbsp;&nbsp; Next &nbsp;&nbsp;</button>
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
