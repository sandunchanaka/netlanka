<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Site</h3>
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
                    <h2>Create new Site</h2>
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

                    <form class="form-horizontal form-label-left input-append" id="taskForm" novalidate action="<?php echo site_url('Tower/save_tower'); ?>" method="post" enctype="multipart/form-data">


					<input type="hidden" id="org_id" name="org_id" required="required" value="<?php echo $org_id;?>">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Site ID <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="tower_code" name="tower_code" required="required" tabindex="3"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Site Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>



                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Site Location <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_location" class="form-control col-md-7 col-xs-12" name="tower_location" placeholder="" tabindex="12" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Region<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Depot<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">District<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Tower Operator<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Infra Owner (DAP/DBN)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Tower Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Cabin Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">On Air Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">On Air date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <fieldset class="control-group col-md-7 col-xs-12">
                             <div class="" style="right: 9px;">
                               <div class="controls">
                                 <div class="xdisplay_inputx form-group has-feedback">
                                   <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="" name="on_air_date" aria-describedby="inputSuccess2Status" tabindex="23">
                                   <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                   <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                 </div>
                               </div>
                             </div>
                           </fieldset>
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">GPS Location<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="Longitudes" required="required" type="text">
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="Latitude" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">DNS Depot<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Depot Officer Contact Details<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Permission Requirment<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">4Wheel Drive Requirment (Yes/No)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Tower Hight<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Genarator Details<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Heat Control System <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">EPL Report  (Values) <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input id="tower_name" class="form-control col-md-2 col-xs-12" name="tower_name" tabindex="8" placeholder="A" required="required" type="text">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input id="tower_name" class="form-control col-md-2 col-xs-12" name="tower_name" tabindex="8" placeholder="B" required="required" type="text">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input id="tower_name" class="form-control col-md-2 col-xs-12" name="tower_name" tabindex="8" placeholder="C" required="required" type="text">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input id="tower_name" class="form-control col-md-2 col-xs-12" name="tower_name" tabindex="8" placeholder="D" required="required" type="text">
                        </div>
                      </div>
                      
						<div class="ln_solid"></div>
                                           
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">PG Manual (m)<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Fuel Manual (m)<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                                           
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Transport (Km) <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Rectifier Model <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Care Taker  Details
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         <label>Availability   </label>
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         
                         <label> Name  </label>
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         
                         <label>Contact Number  </label>
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="ln_solid"></div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Target Month
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         <label>PIS   </label>
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="PIS" required="required" type="text">
                        </div>
                        
                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         
                         <label> Gen Service  </label>
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="Gen Service" required="required" type="text">
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         
                         <label>Civil  </label>
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="Civil" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      
                                          
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">FTG Service Date<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Frequency (days)<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Gen Service Date<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Gen Service Frequency <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Diesel Filling Date<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Diesel Filling Frequency <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Free Cooling Date<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Free Cooling Frequency <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Pest control Date <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Pest control Frequency <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Outdoor BTS Cleaning<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Outdoor BTS Cleaning Frequency <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Tower &  Cabin Inspection<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">Tower &  Cabin Inspection Frequency <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                     						
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">EPL<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fullname">EPL Frequency <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="tower_name" class="form-control col-md-7 col-xs-12" name="tower_name" tabindex="8" placeholder="" required="required" type="text">
                        </div>
                      </div>
                      						
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Remarks <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="remarks" class="form-control col-md-7 col-xs-12" name="remarks" placeholder="" tabindex="12" required="required" type="text">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-warning">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success" tabindex="44">&nbsp;&nbsp; Create &nbsp;&nbsp;</button>
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
