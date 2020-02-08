<style>
  .dt-buttons {display:none;}
 </style>
 <?php  $session_data = $this->session->all_userdata();  ?>
       <!-- page content -->
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>View All Bills</h3>
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
                   <h2>Bill Details</h2>
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
                         <th width="47" align="center">Job Number</th>
                         <th width="45" align="center">Bill No</th>
                         <th align="center" width="50">Bill Amount</th>

                          <th align="center"  width="107">Bill Date</th>
                          <th align="center"  width="107">Status</th>
                         <th width="72" align="center">View/Edit</th>
                          <th align="center"  width="157">Action</th>
                     </thead>


                     <tbody>
                     <?php
           $i =1;
           foreach($get_all_bills as $row){ ?>
                       <tr <?php if($row['bill_status'] == 0){?> style="background-color:#FFC1C1;"<?php } ?>>
                         <td><?php echo $i; ?></td>
                         <td><?php echo $row['job_number']; ?></td>

                         <td><?php echo $row['bill_no']; ?></td>
                         <td width="50"><?php echo $row['bill_amount']; ?></td>
                        <td width="50"><?php echo $row['bill_date']; ?></td>
                        <td>
                          <?php if($row['bill_status'] ==1){ ?>
                              <span class="badge badge-primary">Pending</span>
                            <?php }elseif($row['bill_status'] ==2){ ?>
                                <span class="badge badge-primary">Accepted</span>
                              <?php }elseif($row['bill_status'] ==6){ ?>
                                  <span class="badge badge-primary">Rejected</span>
                          <?php }else{ ?>
                                <span class="badge badge-secondary">Inactive</span>
                            <?php } ?>
                        </td>
                         <td>
                        <?php if($userlevel == 4 && $row['bill_status'] == 1){ ?>
                         <a href="<?php echo base_url(); ?>Bills/update_bill/<?php echo $row['bill_id']; ?>" class="btn btn-primary">View / Edit</a>
                       <?php }else{ ?>
                         <a href="<?php echo base_url(); ?>Bills/view_bill_details/<?php echo $row['bill_id']; ?>" class="btn btn-primary">View </a>
                       <?php } ?>
                         </td>

                         <td>
                           <?php if($userlevel == 4 && $row['bill_status'] == 1){ ?>
                         <a href="<?php echo base_url(); ?>Bills/delete_bill/<?php echo $row['bill_id']; ?>" onclick="return confirm('Are you sure you want to delete this Record?');" class="btn btn-danger">DELETE</a>
                         <?php } ?>

                         <?php if($userlevel == 3  && $row['bill_status'] == 1){ ?>
                       <a href="<?php echo base_url(); ?>Bills/view_bill_details/<?php echo $row['bill_id']; ?>" class="btn btn-info">Accept</a>

                       <?php } ?>
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
