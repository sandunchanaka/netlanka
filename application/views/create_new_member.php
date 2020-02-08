<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript">
        $(function () {
            $("#chk_armyid").click(function () {
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
                <h3>Create New Member</h3>
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
                    <h2>Member Information</h2>
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Members/add_member_details'); ?>" method="post" enctype="multipart/form-data">

                    <div id="actions">

                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">File No <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         <select class="select2_single form-control" tabindex="1" required name="file_no" id="file_no">
                            <option></option>
                           <?php foreach($get_files as $row){ ?>
                            <option value="<?php echo $row['file_ref_id']; ?>" ><?php echo $row['file_ref']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Folio No <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <select class="select2_single form-control" tabindex="1" required name="folio_no" id="folio_no">
                            <option></option>
                           <?php for($i =1; $i<=100; $i++){ ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <hr/>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Service Type <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select8_single form-control" tabindex="1" required name="service_type" id="service_type">
                            <option></option>
                           <?php foreach($all_service_type as $row){ ?>
                            <option value="<?php echo $row['service_type_id']; ?>"><?php echo $row['service_type']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>


                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Service No <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="service_number" name="service_number" required="required" tabindex="3"  class="form-control col-md-7 col-xs-12"><div id="eact1"> </div>
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Rank <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select8_single form-control" tabindex="1" required name="rank" id="rank">
                            <option></option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Regiment <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" tabindex="6" name="regiment_name" id="regiment_name">
                            <option value="0">-</option>

                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" tabindex="7" name="unit" id="unit">
                            <option></option>
							<option value="0">-</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Present Status <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select8_single form-control" tabindex="1" required name="service_status">
                            <option></option>
                           <?php foreach($all_service_status as $row){ ?>
                            <option value="<?php echo $row['status_id']; ?>"><?php echo $row['status_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_army">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="full_name" class="form-control col-md-7 col-xs-12" name="full_name" placeholder="" tabindex="12" required="required" type="text">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_army">Name With Initial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name_with_initial" class="form-control col-md-7 col-xs-12" name="name_with_initial" placeholder="" tabindex="12" required="required" type="text">
                        </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NIC <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="nic_number" name="nic_number" required="required" tabindex="3"  class="form-control col-md-7 col-xs-12"><div id="eact2"> </div>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Date Of Birth
                        </label>
                        <fieldset>
                          <div class="control-group col-md-4 col-sm-4 col-xs-12" style="right: 9px;">
                            <div class="controls">
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="" name="dob" aria-describedby="inputSuccess2Status" tabindex="23">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Birth Certificate No <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="bc_number" name="bc_number" tabindex="3"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">if Death, Death Certificate No
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="dc_number" name="dc_number" tabindex="3"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>




					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">District<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" tabindex="21" name="districts" id="districts" required="required">
                            <option></option>
                            <?php foreach($all_districts as $row){ ?>
                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['district']; ?></option>
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
                            <option value="1" >NOT SPECIFIED</option>
                          </select>
                        </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_army">Grama Niladari Division<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<input id="gn_division" class="form-control col-md-7 col-xs-12" name="gn_division" placeholder="" tabindex="12" required="required" type="text">-->
                          <select class="select5_single form-control" tabindex="21" name="gn_division" id="gn_division">
                           <?php //foreach($all_gn_divisions as $row){ ?>
                            <option value="1" >NOT SPECIFIED</option>
                            <?php //} ?>
                          </select>
                        </div>
                      </div>


					 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Application Date <span class="required">*</span>
                        </label>
                        <fieldset>
                          <div class="control-group col-md-6 col-sm-4 col-xs-12" style="right: 9px;">
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

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Application Process Date <span class="required">*</span>
                        </label>
                        <fieldset>
                          <div class="control-group col-md-6 col-sm-4 col-xs-12" style="right: 9px;">
                            <div class="controls">
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="" name="process_date" aria-describedby="inputSuccess2Status" required="required" tabindex="23" value="<?php //echo $get_location[0]['application_date']; ?>">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contact No
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="contact_number_home" name="contact_number_home"  tabindex="3" placeholder="Home"  class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="contact_number_mobile" name="contact_number_mobile"  tabindex="3" placeholder="Mobile"  class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="contact_number_any" name="contact_number_any"  tabindex="3" placeholder="If Any"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Remarks
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="remarks" name="remarks" tabindex="3"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Confirm by Service (P&R List)</label>
                        <div class="col-md-3 col-sm-3 col-xs-12" style="float:left;">
                         <input name="chk_pnr_list" id="chk_pnr_list" class="form-control col-md-7 col-xs-12" type="checkbox" value="1" />
                        </div>
                        </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Retired Date <span class="required">*</span>
                        </label>
                        <fieldset>
                          <div class="control-group col-md-6 col-sm-4 col-xs-12" style="right: 9px;">
                            <div class="controls">
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="" name="retired_date" aria-describedby="inputSuccess2Status" tabindex="23" value="">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>

                      <div class="ln_solid"></div>
                      <h2>Documents Avilable</h2>
                       <div class="ln_solid"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Application </label>
                        <div class="col-md-3 col-sm-3 col-xs-12" style="float:left;">
                         <input name="app_avl" id="app_avl" class="form-control col-md-7 col-xs-12" type="checkbox" value="1" />
                        </div>
                        </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">GS Certification </label>
                        <div class="col-md-3 col-sm-3 col-xs-12" style="float:left;">
                         <input name="gs_certi" id="gs_certi" class="form-control col-md-7 col-xs-12" type="checkbox" value="1" />

                        </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Birth Certificate </label>
                        <div class="col-md-3 col-sm-3 col-xs-12" style="float:left;">
                         <input name="bc_aval" id="bc_aval" class="form-control col-md-7 col-xs-12" type="checkbox" value="1" />

                        </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">If Death, Death Certificate </label>
                        <div class="col-md-3 col-sm-3 col-xs-12" style="float:left;">
                         <input name="death_aval" id="death_aval" class="form-control col-md-7 col-xs-12" type="checkbox" value="1" />

                        </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Presentage Cerficicate </label>
                        <div class="col-md-3 col-sm-3 col-xs-12" style="float:left;">
                         <input name="disable_aval" id="disable_aval" class="form-control col-md-7 col-xs-12" type="checkbox" value="1" />

                        </div>
                        </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                          <a href="<?php echo base_url(); ?>Employeer/employeer_manager" class="btn btn-warning" >Cancel </a>
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
<script type="text/javascript">

 $('#service_number').on('change',function(){

                  var soldierno = $('#service_number').val();
				  //alert(soldierno);
				  $('#actions').html("");
				  $('#eact1').html("");

                    $.ajax({
                            type: 'POST',
                            url:'<?php echo site_url('Members/check_soldier_exist_deatils'); ?>',
                            dataType: 'json',
                            data:{'soldierno':soldierno},
                            success: function(response){
                                console.log(response[0])

								 $(response[0]).each(function(index, action) {

                                    $('#actions').append("<div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Service Type :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.service_type+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Rank  :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.rank_abbr+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Reg No :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.sno+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Name with Initial :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.soldier_name+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Full Name :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.soldier_full_name+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Soldier NIC :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.soldier_nic+"</font></label></div><div class='ln_solid'></div>");
									$('#eact1').append("<div class='profile-info-value'><span><font color='red'> * - "+action.soldier_name+"</font></span></div>");
                                 });





                            },
                            error: function(e){
                             console.log(e);
                            }
                    });

                });


 				$('#nic_number').on('change',function(){

                  var soldiernic = $('#nic_number').val();
				  //alert(soldierno);
				  if(soldiernic != '-'){
				  $('#actions').html("");
                   $('#eact2').html("");

                    $.ajax({
                            type: 'POST',
                            url:'<?php echo site_url('Members/check_soldier_exist_deatils_from_nic'); ?>',
                            dataType: 'json',
                            data:{'soldiernic':soldiernic},
                            success: function(response){
                                console.log(response[0])

								 $(response[0]).each(function(index, action) {

                                    $('#actions').append("<div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Service Type :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.service_type+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Rank  :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.rank_abbr+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Reg No :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.sno+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Name with Initial :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.soldier_name+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Full Name :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.soldier_full_name+"</font></label></div><div class='item form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'><font color='red'>Soldier NIC :</font></label><label class='control-label' style='text-align:left;'><font color='red'>"+action.soldier_nic+"</font></label></div><div class='ln_solid'></div>");
									$('#eact2').append("<div class='profile-info-value'><span><font color='red'> * - "+action.soldier_name+"</font></span></div>");
                                 });


                            },
                            error: function(e){
                             console.log(e);
                            }
                    });

				  }

                });
</script>
