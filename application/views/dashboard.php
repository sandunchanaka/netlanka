
			<div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user green"></i></div>
                  <div class="count">Soldiers</div>
                  <h3><a href="<?php echo base_url(); ?>Dashboard/soldiers" class="btn btn-success">View</a></h3>
                  <p> Beneficiary soldier Accounts - <?php echo $total_beni_soldier;?></p>
                  <p>total Pending Registration Soldiers - <?php echo $pending_registration;?></p>
                  <p>total Soldier Accounts - <?php echo $total_soldier;?></p>
                </div>
              </div>
              
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users blue"></i></div>
                  <div class="count">Parents</div>
                  <h3><a href="<?php echo base_url(); ?>Dashboard/parents" class="btn btn-success">View</a></h3>
                  <p>Total Parent Accounts - <?php echo $total_parents;?></p>
                  <p>Active Parent Accounts - <?php echo $total_active_parents;?></p>
                  <p>Suspend Parent Accounts - <?php echo $suspended_parent_acc;?></p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                 <div class="icon"><i class="fa fa-user red"></i></div>
                  <div class="count">Suspension</div>
                  <h3><a href="<?php echo base_url(); ?>Dashboard/suspension" class="btn btn-success">View</a></h3>
                  <p>total Suspended Parent - <?php echo $suspended_acc;?></p>
                  <p>Pending Suspension Account - <?php echo $pending_suspension;?></p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                   <div class="icon"><i class="fa fa-doller"></i></div>
                  <div class="count"><?php echo "Rs ".number_format($last_pay_amount, 2); ?></div>
                  <h3>Last Month payment</h3>
                  <p>Each Parent Account 750 subscription.</p>
                </div>
              </div>
             
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count">Bank Slip</div>
                   <h3><a href="<?php echo base_url(); ?>Dashboard/BankSlip" class="btn btn-success">View</a></h3>
                  <p>Pending bank Slip - <?php echo $tobe_approval_slip;?></p>
                </div>
             </div>
             
             <div class="clearfix"></div>
             <div class="clearfix"></div>
          <!-- Forces Vs Solders -->    
        <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Forces vs Soldiers</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <!--<h4>App Usage across versions</h4>--><br /><br />
                  <?php 
				  $total_army_soldiers = $this->Dashboard_model->get_no_of_soldiers_by_service_type(1);
				  $army_p = (($total_army_soldiers/$total_beni_soldier) * 100);
				  //echo ROUND($army_p,2);
				  ?>
                  <div class="widget_summary">
                 
                    <div class="w_left w_25">
                      <span> ARMY</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php  echo ROUND($army_p,2); ?>%;">
                          <span class="sr-only"><?php  echo ROUND($army_p,2); ?>% </span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?php echo $total_army_soldiers; ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="widget_summary">
                 	 <?php 
				  $total_navy_soldiers = $this->Dashboard_model->get_no_of_soldiers_by_service_type(2);
				  $navy_p =  ROUND((($total_navy_soldiers/$total_beni_soldier) * 100),2);
				  //echo ROUND($army_p,2);
				  ?>
                    <div class="w_left w_25">
                      <span> NAVY</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $navy_p; ?>%;">
                          <span class="sr-only"><?php echo $navy_p; ?>% </span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?php echo $total_navy_soldiers; ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="widget_summary">
                  <?php 
				  $total_af_soldiers = $this->Dashboard_model->get_no_of_soldiers_by_service_type(3);
				  $af_p =  ROUND((($total_af_soldiers/$total_beni_soldier) * 100),2);
				  //echo ROUND($army_p,2);
				  ?>
                    <div class="w_left w_25">
                      <span> AIR FORCE</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $af_p; ?>%;">
                          <span class="sr-only"><?php echo $af_p; ?>% </span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?php echo $total_af_soldiers; ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="widget_summary">
                 <?php 
				  $total_police_soldiers = $this->Dashboard_model->get_no_of_soldiers_by_service_type(4);
				  $police_p =  ROUND((($total_police_soldiers/$total_beni_soldier) * 100),2);
				  //echo ROUND($army_p,2);
				  ?>
                    <div class="w_left w_25">
                      <span> POLICE</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $police_p; ?>%;">
                          <span class="sr-only"><?php echo $police_p; ?>% </span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?php echo $total_police_soldiers; ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <?php //} ?>

                  
                </div>
              </div>
            </div>
        
      		<!-- Bank vise Accounts-->
            
            
         <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Bank vs Accounts</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <!--<h4>App Usage across versions</h4>--><br /><br />
                   <?php 
				  $total_boc_accounts = $this->Dashboard_model->get_no_of_acc_by_bank(1);
				  $boc_p =  ROUND((($total_boc_accounts/$total_active_parents) * 100),2);
				  echo $total_active_parents;
				  ?>
                  <div class="widget_summary">
                 
                    <div class="w_left w_25">
                      <span>BOC</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $boc_p; ?>%;">
                          <span class="sr-only"><?php echo $boc_p; ?>% </span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span><?php echo $total_boc_accounts; ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <?php //} ?>

                  
                </div>
              </div>
            </div>
        
      
            
            </div>
            
          </div>
        </div><!-- /.main-content -->
        
        