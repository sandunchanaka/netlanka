 <style>
   .dt-buttons {display:none;}
  </style>
  <?php  $session_data = $this->session->all_userdata();  ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fund Allocation Types</h3>
              </div>

            </div>

            <div class="clearfix"></div>


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fund Allocation Types</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
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
                  <a href="#" class="open-AddBookDialogNew btn btn btn-warning" data-id="" data-toggle="modal" data-target=".bs-example-modal-sm">Add New Fund Allocation Types</a>
                  <div class="x_content">

 				 <table id="datatable-buttons" class="table table-striped table-bordered jambo_table bulk_action" width="100%">
                      <thead>

                        <tr><th class="bulk-actions" colspan="9"><a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a></th></tr>
                        <tr class="even pointer">
                        	<th>&nbsp;</th>
                          <th align="center">Fund Allocation Types Name </th>
                          <!--<th align="center">Service Providers Code</th> -->
                          <th align="center">Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
					  $i =1;
					  foreach($get_all_fat as $row){ ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['fund_allocation_type_name']; ?></td>
                          <!-- <td><?php //echo $row['sp_code']; ?></td> -->
                          <td><?php if($row['act'] == 1){ ?> <img src="<?php echo base_url('assets/images/tick_green.png');?>" width="25" height="25" /> <?php } ?></td>

                          <td>
                           <?php if($row['act'] ==1 ){  ?>
                          <a href="<?php echo base_url(); ?>/Master_data/Delete_fund_allocation_types/<?php echo $row['fund_allocation_type_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this Record?');"><i class="fa fa-trash-o"></i> Deactivate </a>
                          <?php }else{ ?>
                         <a href="<?php echo base_url(); ?>/Master_data/Activate_fund_allocation_types/<?php echo $row['fund_allocation_type_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Active </a>
                          <?php }?>
                          </td>
                        </tr>

                        <?php
						$i++;
						}
						?>
    </table>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->




  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" >
     <div class="modal-dialog modal-sm">
     <div class="modal-content">
	 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Fund Allocation Types </h4>
     </div>


     <form name="retireform" id="retireform" action="<?php echo site_url('Master_data/add_new_fund_allocation_types'); ?>" method="post">

     <div class="modal-body" style="float:left; text-align:left;">

        <input type="hidden" name="hdnsoldierId" id="hdnsoldierId" value=""/>
        <input type="hidden" name="hdnrelationId" id="hdnrelationId" value=""/>
       <br/>
      <label>Fund Allocation Types Name</label>
       <br/>
       <input id="fat_name" class="form-control col-md-7 col-xs-12" name="fat_name" placeholder="" tabindex="14"  type="text" >


          <br/><br/><br/>
      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Save </button>
      </div>
</form>
  </div>
  </div>
</div>
