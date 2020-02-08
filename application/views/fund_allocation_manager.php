<style>
  .dt-buttons {display:none;}
 </style>
 <?php  $session_data = $this->session->all_userdata();  ?>
       <!-- page content -->
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Fund Allocations</h3>
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
                   <h2>Fund Allocation Details</h2>
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
                         <th width="47" align="center">Employeer Name</th>
                         <th width="45" align="center">Region</th>
                         <th align="center" width="50">Fund Allocation Type</th>
                         <th align="center" width="59">Allocate Amount</th>
                         <th align="center"  width="107">Status</th>
                         <th width="72" align="center">View/Edit</th>
                         <th align="center"  width="157">Delete</th>

                       </tr>
                     </thead>


                     <tbody>
                     <?php
           $i =1;
           foreach($get_all_fund_allocations as $row){ ?>
                       <tr <?php if($row['fund_allocation_status'] == 0){?> style="background-color:#FFC1C1;"<?php } ?>>
                         <td><?php echo $i; ?></td>
                         <td><?php echo $row['emp_name']; ?></td>

                         <td><?php if($row['branch_id'] != 0){
                           $get_office_name = $this->Organization_model->get_office_byid($row['branch_id']);
                           echo $get_office_name[0]['office_short_name'];
                         } ; ?></td>
                         <td width="50"><?php echo $row['fund_allocation_type_name']; ?></td>

                         <td width="59"><?php echo $row['allocate_amount']; ?></td>
                        <td><?php if($row['fund_allocation_status'] ==3){ ?>
                            <span class="badge badge-primary">Confirmed</span>
                          <?php }elseif($row['fund_allocation_status'] ==4){ ?>
                            <span class="badge badge-secondary">rejected</span>
                          <?php  }else{ ?>
                              <span class="badge badge-secondary">Pending</span>
                          <?php } ?>
                        </td>
                         <td>
                           <?php if($row['fund_allocation_status'] ==3){ ?>

                             <?php  }else{ ?>
                                 <a href="<?php echo base_url(); ?>Fund_allocation/update_allocate_fund/<?php echo $row['fund_allocation_id']; ?>" class="btn btn-primary">View / Edit</a>
                             <?php } ?>


                         </td>

                         <td>
                           <?php if($row['fund_allocation_status'] ==3){ ?>

                          <?php  }else{ ?>
                                 <a href="<?php echo base_url(); ?>Fund_allocation/delete_fund_allocations/<?php echo $row['fund_allocation_id']; ?>" onclick="return confirm('Are you sure you want to delete this Record?');" class="btn btn-danger">DELETE</a>
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
