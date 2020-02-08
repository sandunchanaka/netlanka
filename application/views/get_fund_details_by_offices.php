<style>
  .dt-buttons {display:none;}
 </style>
 <?php  $session_data = $this->session->all_userdata();  ?>
       <!-- page content -->
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Fund Destribution Details</h3>
             </div>

           </div>

           <div class="clearfix"></div>


             <div class="col-md-12 col-sm-12 col-xs-12">

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

               <div class="x_panel">
                 <div class="x_title">
                   <h2>Fund Destribution</h2>
                   <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     </li>
                   </ul>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

       <table id="datatable-buttons" class="table table-striped table-bordered jambo_table bulk_action">
                     <thead>

                       <tr><th class="bulk-actions" colspan="9"><a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a></th></tr>
                       <tr class="even pointer">
                         <th width="17">&nbsp;</th>
                         <th width="47" align="center">Region Code</th>
                         <!--<th width="45" align="center">Region Name</th>-->
                         <th align="center" width="50">Region Name</th>
                         <th align="center" width="59">Allocated Funds</th>
                         <th align="center" width="59">Bill Amount</th>
                         <th align="center"  width="107">Balance</th>
                         <th align="center"  width="107">Action</th>

                       </tr>
                     </thead>


                     <tbody>
                     <?php
           $i =1;
           foreach($get_offices as $row){ ?>
                       <tr <?php if($row['office_status'] == 0){?> style="background-color:#FFC1C1;"<?php } ?>>
                         <td><?php echo $i; ?></td>
                         <td><?php echo $row['office_code']; ?></td>

                         <!--<td><?php //echo $row['office_name']; ?></td> -->
                         <td width="50"><?php echo $row['office_short_name']; ?></td>
                         <td width="50">
                             <a href="<?php //echo base_url(); ?>Jobs/job_details/<?php //echo $row['job_id']; ?>" class="">
                               <?php
                               $get_allocation = $this->Fund_allocation_model->get_total_allocate_funds_to_office($row['office_id'],3);
                               echo number_format($get_allocation,2);
                               ?>
                             </a>
                         </td>
                         <td width="59">
                           <a href="<?php //echo base_url(); ?>Jobs/job_details/<?php //echo $row['job_id']; ?>" class="">
                             <?php
                             $get_bills = $this->Fund_allocation_model->get_total_expencess_by_office($row['office_id'],2);
                             echo number_format($get_bills,2);
                             ?>
                           </a>
                         </td>
                        <td>
                          <a href="<?php //echo base_url(); ?>Jobs/job_details/<?php //echo $row['job_id']; ?>" class="">
                            <?php echo number_format($get_allocation - $get_bills,2); ?>
                          </a>
                        </td>

                        <td>
                          <a href="<?php echo base_url(); ?>Fund_allocation/view_allocate_fund_by_office_id/<?php echo $row['office_id']; ?>" class="btn btn-primary">View</a>
                        </td>

                       </tr>

                       <?php
           $i++;
           }
           ?>

                     </tbody>
                   </table>
                 </div>
               </div>
             </div>

           </div>
         </div>
       </div>
       <!-- /page content -->
