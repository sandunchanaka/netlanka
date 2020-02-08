<style>
  .dt-buttons {display:none;}
 </style>
 <?php  $session_data = $this->session->all_userdata();  ?>
       <!-- page content -->
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Organization Manager</h3>
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
                   <h2>Organization Details</h2>
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
                         <th width="47" align="center">Org Code</th>
                         <th width="45" align="center">Org Name</th>
                         <th align="center" width="50">Short Name</th>

                          <th align="center" width="59">Address</th>
                          <th align="center"  width="107">Status</th>
                         <th width="72" align="center">View/Edit</th>
                          <th align="center"  width="157">Delete</th>

                       </tr>
                     </thead>


                     <tbody>
                     <?php
           $i =1;
           foreach($get_all_organizations as $row){ ?>
                       <tr <?php if($row['org_status'] == 0){?> style="background-color:#FFC1C1;"<?php } ?>>
                         <td><?php echo $i; ?></td>
                         <td><?php echo $row['org_code']; ?></td>

                         <td><?php echo $row['org_name']; ?></td>
                         <td width="50"><?php echo $row['org_short_name']; ?></td>

                         <td width="59"><?php echo $row['org_address']; ?></td>
                        <td><?php if($row['org_status'] ==1){ ?>
                            <span class="badge badge-primary">Active</span>
                          <?php }else{ ?>
                              <span class="badge badge-secondary">Inactive</span>
                          <?php } ?>
                        </td>
                         <td>

                         <a href="<?php echo base_url(); ?>Organization/update_Organization/<?php echo $row['org_id']; ?>" class="btn btn-primary">View / Edit</a>

                         </td>

                         <td>

                         <a href="<?php echo base_url(); ?>Organization/delete_organization/<?php echo $row['org_id']; ?>" onclick="return confirm('Are you sure you want to delete this Record?');" class="btn btn-danger">DELETE</a>

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
