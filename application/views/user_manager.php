 <style>
   .dt-buttons {display:none;}
  </style>
  <?php  $session_data = $this->session->all_userdata();  ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Manager</h3>
              </div>

            </div>

            <div class="clearfix"></div>


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User manager</h2>
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
                          <th width="47" align="center">Staff ID</th>
                          <th width="45" align="center">Name</th>
                          <th align="center" width="50">Usre Name</th>

                           <th align="center" width="50">Position</th>
                           <th align="center"  width="50">&nbsp;</th>
                          	<th width="72" align="center">View/Edit</th>
                            <?php if($user_level == 0){?>
                           <th align="center"  width="50">&nbsp;</th>
                           <?php } ?>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
					  $i =1;
					  foreach($all_users as $row){ ?>
                        <tr <?php if($row['emp_status'] == 0){?> style="background-color:#FFC1C1;"<?php } ?>>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['emp_code']; ?></td>

                          <td><?php echo $row['emp_name']; ?></td>
                          <td width="50"><?php echo $row['user_name']; ?></td>

                          <td width="50"><?php echo $row['user_level']; ?></td>
                         <td>
                          <a href="<?php echo base_url(); ?>user_manager/update_password_view/<?php echo $row['emp_id']; ?>" class="btn btn-primary">Change password</a>
                          </td>
                          <td>

                          <a href="<?php echo base_url(); ?>user_manager/update_user_view/<?php echo $row['emp_id']; ?>" class="btn btn-primary">View / Edit</a>

                          </td>
                           <?php if($user_level == 0){?>
                          <td>
                           <?php if($row['active_status'] == 1){?>
                          <a href="<?php echo base_url(); ?>user_manager/inactive_user/<?php echo $row['emp_id']; ?>" class="btn btn-danger">Inactive</a>
                         <?php }else{ ?>

                          <a href="<?php echo base_url(); ?>user_manager/activate_user/<?php echo $row['emp_id']; ?>" class="btn btn-success">Active</a>
                          <?php } ?>
                          </td>
                          <?php } ?>
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
