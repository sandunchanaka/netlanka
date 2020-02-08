<?php  $session_data = $this->session->all_userdata(); ?>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">

    <!-- left -->
      <div class="col-md-3 left_col">
     <div class="left_col scroll-view">
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix"></div>
          <div class="navbar nav_title" style="border: 0;" align="center">
           <img src="<?php echo base_url('assets/images/netlanka_logo.png');?>" height="75" width="75"/>
           <?php //echo $session_data['user_login_data']['user_level']; ?>
          </div>
          <div class="clearfix"></div>
          <br />
<!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">



       <div class="menu_section">



          <ul class="nav side-menu">

          <?php if($session_data['user_login_data']['user_level'] == 1){?>
            <li><a href="<?php //echo base_url('dashboard/homepage')?>"><i class="fa fa-home"></i> DashBoard <span class=""></span></a></li>


            <li><a><i class="fa fa-edit"></i> Organization<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                   <li><a href="<?php echo base_url('Organization/Create_Organization')?>">Create New Organization</a></li>
                   <li><a href="<?php echo base_url('Organization/organization_manager')?>">View Organizations</a></li>
              </ul>
            </li>


            <li><a><i class="fa fa-edit"></i> Region<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="<?php echo base_url('Organization/Create_office')?>">Create New Regions</a></li>

               <li><a href="<?php echo base_url('Organization/office_manager')?>">View All Regions</a></li>

             </ul>
            </li>

            <li><a><i class="fa fa-edit"></i> Depot<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="<?php echo base_url('Organization/Create_depot')?>">Create Depot</a></li>
               <li><a href="<?php echo base_url('Organization/depot_manager')?>">View All Depot</a></li>
             </ul>
            </li>

            <li><a><i class="fa fa-edit"></i> Members<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="<?php echo base_url('Employeer/Create_employeer')?>">Add New Member</a></li>

               <li><a href="<?php echo base_url('Employeer/employeer_manager')?>">View All Members</a></li>

             </ul>
           </li>


           <li><a ><i class="fa fa-pencil"></i>Sites<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('Sites/Create_site')?>">Add New Site</a></li>
              <li><a href="<?php echo base_url('Sites/tower_manager')?>">View All Sites</a></li>
              <!--<li><a href="<?php //echo base_url('Sites/add_services_providers')?>">Add Service Providers</a></li>
              <li><a href="<?php //echo base_url('Sites/tower_data_manager')?>">Tower Data</a></li> -->


              </ul>
          </li>



          <li><a ><i class="fa fa-pencil"></i>Fund Destribution<span class="fa fa-chevron-down"></span></a>

         </li>

         <li><a ><i class="fa fa-pencil"></i>Master Data<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="<?php echo base_url('User_manager/create_new_user')?>">Create User</a></li>
            <li><a href="<?php echo base_url('User_manager')?>">User Management</a></li>
            <li><a href="<?php echo base_url('Master_data/Service_providers')?>">Service Providers</a></li>
            <li><a href="<?php echo base_url('Master_data/fund_allocation_types')?>">Fund Allocation Types</a></li>
            <li><a href="<?php echo base_url('Master_data/crops')?>">Services</a></li>

          </ul>
        </li>
          <?php } ?>


          <!-- Organization user-->

          <?php if($session_data['user_login_data']['user_level'] == 2){?>
            <li><a href="<?php //echo base_url('dashboard/homepage')?>"><i class="fa fa-home"></i> DashBoard <span class=""></span></a></li>


            <li><a><i class="fa fa-edit"></i> Organization<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                   <li><a href="<?php echo base_url('Organization/update_Organization/'.$session_data['user_login_data']['org_id'])?>">View Organization</a></li>
              </ul>
            </li>


            <li><a><i class="fa fa-edit"></i> Region<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="<?php echo base_url('Organization/Create_office')?>">Create New Region</a></li>

               <li><a href="<?php echo base_url('Organization/office_manager')?>">View All Regions</a></li>
             </ul>
            </li>

            <li><a><i class="fa fa-edit"></i> Depot<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
                 <li><a href="<?php echo base_url('Organization/Create_depot')?>">Create Depot</a></li>
               <li><a href="<?php echo base_url('Organization/depot_manager')?>">View All Depot</a></li>
             </ul>
            </li>

            <li><a><i class="fa fa-edit"></i> Employeers<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="<?php echo base_url('Employeer/Create_employeer')?>">Add New Member</a></li>

               <li><a href="<?php echo base_url('Employeer/employeer_manager')?>">View All Members</a></li>

               <li><a href="<?php echo base_url('Fund_allocation/view_allocate_fund_by_region')?>">Member Funds</a></li>
             </ul>
           </li>


           <li><a ><i class="fa fa-pencil"></i>Sites<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('Sites/Create_site')?>">Add New Site</a></li>
              <li><a href="<?php echo base_url('Sites/tower_manager')?>">View All Sites</a></li>
              <li><a href="<?php echo base_url('Accounts/Create_account')?>">Account</a>
              <li><a href="<?php //echo base_url('Sites/tower_data_manager')?>">Tower Data</a></li>


              </ul>
          </li>



          <li><a ><i class="fa fa-pencil"></i>Fund Destribution<span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
             <li><a href="<?php echo base_url('Fund_allocation/fund_allocation_dashboard')?>">Fund Allocation Dashboard</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/allocate_fund')?>">Allocate Fund</a></li>
             <li><a href="<?php echo base_url('Fund_allocation')?>">View All Allocations</a></li>
             <!--<li><a href="<?php //echo base_url('Fund_allocation/my_allocations')?>">View My Allocations</a></li>-->
             <li><a href="<?php echo base_url('Fund_allocation/pending_fund_allocations')?>">Pending Allocation</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/rejected_fund_allocations')?>">Rejected Allocation</a></li>
             <!--<li><a href="<?php echo base_url('Fund_allocation/view_my_fund_transfers')?>">View My Fund Transfers</a></li>-->
             <li><a href="<?php echo base_url('Fund_allocation/view_pending_fund_transfers')?>">Pending Transfers</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/view_accept_fund_transfers')?>">Accept Transfers</a></li>
            <li><a href="<?php echo base_url('Fund_allocation/view_rejected_fund_transfers')?>">Rejected Transfers</a></li>



           </ul>
         </li>

         <li><a ><i class="fa fa-pencil"></i>Master Data<span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
             <li><a href="<?php echo base_url('User_manager')?>">User Management</a></li>
           </ul>
        </li>

          <?php } ?>

          <?php if($session_data['user_login_data']['user_level'] == 3){?>
            <li><a href="<?php //echo base_url('dashboard/homepage')?>"><i class="fa fa-home"></i> DashBoard <span class=""></span></a></li>



            <li><a><i class="fa fa-edit"></i> Regions<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">

               <li><a href="<?php echo base_url('Organization/update_Office/'.$session_data['user_login_data']['office_id'])?>">View Region Details</a></li>
             </ul>
            </li>

            <li><a><i class="fa fa-edit"></i> Depot<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="<?php echo base_url('Organization/Create_depot')?>">Create Depot</a></li>
               <li><a href="<?php echo base_url('Organization/depot_manager')?>">View All Depot</a></li>
             </ul>
            </li>

            <li><a><i class="fa fa-edit"></i> Members<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
               <li><a href="<?php echo base_url('Employeer/Create_employeer')?>">Add New Member</a></li>

               <li><a href="<?php echo base_url('Employeer/employeer_manager')?>">View All Members</a></li>
               <li><a href="<?php echo base_url('Fund_allocation/view_allocate_fund_by_depot')?>">Member Funds</a></li>
             </ul>
           </li>


           <li><a ><i class="fa fa-pencil"></i>Sites<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('Sites/Create_site')?>">Add New Site</a></li>
              <li><a href="<?php echo base_url('Sites/tower_manager')?>">View All Sites</a></li>
              <!--<li><a href="<?php //echo base_url('Tower/add_services_providers')?>">Add Service Providers</a></li>
              <li><a href="<?php //echo base_url('Tower/tower_data_manager')?>">Tower Data</a></li> -->


              </ul>
          </li>



          <li><a ><i class="fa fa-pencil"></i>Fund Destribution<span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
             <li><a href="<?php echo base_url('Fund_allocation/fund_allocation_dashboard')?>">Fund Allocation Dashboard</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/allocate_fund')?>">Allocate Fund</a></li>
             <!-- <li><a href="<?php //echo base_url('Fund_allocation')?>">View All Allocations</a></li> -->
             <li><a href="<?php echo base_url('Fund_allocation/my_allocations')?>">View My Allocations</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/pending_fund_allocations')?>">Pending Allocation</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/rejected_fund_allocations')?>">Rejected Allocation</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/view_my_fund_transfers')?>">View My Fund Transfers</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/view_pending_fund_transfers')?>">Pending Transfers</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/view_accept_fund_transfers')?>">Accept Transfers</a></li>
            <li><a href="<?php echo base_url('Fund_allocation/view_rejected_fund_transfers')?>">Rejected Transfers</a></li>
            <li><a href="<?php echo base_url('Fund_allocation/my_transactions')?>">Transcations</a></li>

           </ul>
         </li>

         <li><a ><i class="fa fa-pencil"></i>Jobs<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="<?php echo base_url('Jobs/Create_job')?>">Create a Job</a></li>
            <li><a href="<?php echo base_url('Jobs/job_manager')?>">View All Jobs</a></li>
             <li><a href="<?php echo base_url('Bills/bill_manager')?>">Bill Details</a></li>



            </ul>
        </li>

         <li><a ><i class="fa fa-pencil"></i>Master Data<span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
             <li><a href="<?php echo base_url('User_manager')?>">User Management</a></li>
           </ul>
        </li>

          <?php } ?>

          <?php if($session_data['user_login_data']['user_level'] == 4){?>
            <li><a href="<?php //echo base_url('dashboard/homepage')?>"><i class="fa fa-home"></i> DashBoard <span class=""></span></a></li>

            <li><a><i class="fa fa-edit"></i> Depot<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">

               <li><a href="<?php echo base_url('Organization/update_depot/'.$session_data['user_login_data']['depot_id'])?>">View All Depot</a></li>
             </ul>
            </li>

            <li><a><i class="fa fa-edit"></i> Employeers<span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu">
                <li><a href="<?php echo base_url('Employeer/employeer_manager')?>">View My Details</a></li>
                <li><a href="<?php echo base_url('Fund_allocation/view_team_mem_fund_details')?>">My Funds</a></li>
             </ul>
           </li>



          <li><a ><i class="fa fa-pencil"></i>Fund Destribution<span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
             <li><a href="<?php echo base_url('Fund_allocation/fund_allocation_dashboard')?>">Fund Allocation Dashboard</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/allocate_fund')?>">Allocate Fund</a></li>
            <!-- <li><a href="<?php //echo base_url('Fund_allocation')?>">View All Allocations</a></li> -->
             <li><a href="<?php echo base_url('Fund_allocation/my_allocations')?>">View My Allocations</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/pending_fund_allocations')?>">Pending Allocation</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/rejected_fund_allocations')?>">Rejected Allocation</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/view_my_fund_transfers')?>">View My Fund Transfers</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/view_pending_fund_transfers')?>">Pending Transfers</a></li>
             <li><a href="<?php echo base_url('Fund_allocation/view_accept_fund_transfers')?>">Accept Transfers</a></li>
            <li><a href="<?php echo base_url('Fund_allocation/view_rejected_fund_transfers')?>">Rejected Transfers</a></li>
            <li><a href="<?php echo base_url('Fund_allocation/my_transactions')?>">Transcations</a></li>

           </ul>
         </li>

         <li><a ><i class="fa fa-pencil"></i>Jobs<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="<?php echo base_url('Jobs/pending_jobs')?>">Pending Jobs</a></li>
            <li><a href="<?php echo base_url('Jobs/accepted_jobs')?>">Accepted Jobs</a></li>
            <!--<li><a href="<?php //echo base_url('Tower/tower_data_manager')?>">Tower Data</a></li>-->


            </ul>
        </li>

        <li><a ><i class="fa fa-pencil"></i>Bills<span class="fa fa-chevron-down"></span></a>
         <ul class="nav child_menu">
           <li><a href="<?php echo base_url('Bills/Create_bill')?>">Create a Bill</a></li>
           <li><a href="<?php echo base_url('Bills/bill_manager')?>">Bill Details</a></li>
           <!--<li><a href="<?php //echo base_url('Tower/tower_data_manager')?>">Tower Data</a></li>-->


           </ul>
       </li>

         <li><a ><i class="fa fa-pencil"></i>Master Data<span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
             <li><a href="<?php echo base_url('User_manager')?>">User Management</a></li>
           </ul>
        </li>
          <?php } ?>
            </ul>

            </div>





          </div>
          <!-- /sidebar menu -->

        </div>
      </div>
      <!-- /left -->
