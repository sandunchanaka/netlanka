 <style>
   .dt-buttons {display:none;}
  </style>
  <?php  $session_data = $this->session->all_userdata();  ?>
        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
          <!--  <div class="page-title">
              <div class="title_left">
                <h3>Office Fund Allocation Details</h3>
              </div>

              <div class="row tile_count">
                <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Total Allocate Fund</span>
                  <div class="count"><?php  //echo number_format($get_total_allocation_off,2); ?></div>
                  <!--<span class="count_bottom"><i class="green">4% </i> From last Year</span>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                  <span class="count_top"><i class="fa fa-clock-o"></i> Total Fund Transfer </span>
                  <div class="count"><?php //echo number_format($get_total_transfer_off,2); ?></div>
                  <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Year</span>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                  <span class="count_top"><i class="fa fa-user"></i> Account Balance</span>
                  <div class="count green"><?php
                     //echo number_format($get_total_allocation_off - $get_total_transfer_off,2);  ?></div>
                  <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -
                </div>


              </div>

            </div> -->

            <div class="clearfix"></div>



            </div>

          <div class="page-title">
            <div class="title_left">
              <h3>My Fund Allocation Details</h3>
            </div>

          </div>
          <div class="row tile_count">
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Allocate Fund</span>
              <div class="count"><?php echo number_format($get_total_allocation,2); ?></div>
              <!--<span class="count_bottom"><i class="green">4% </i> From last Year</span> -->
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Fund Transfer </span>
              <div class="count"><?php echo number_format($get_total_transfer,2); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Year</span> -->
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Account Balance</span>
              <div class="count green"><?php echo number_format($get_total_allocation - $get_total_transfer,2); ?></div>
              <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Pending Allocations</span>
              <div class="count green"><?php echo number_format($get_pending_fund_allocation,2);?></div>
              <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Pending Transfers</span>
              <div class="count green"><?php echo number_format($get_pending_fund_transfer,2);?></div>
              <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>

          </div>
<?php if($userlevel == 4){?>
          <div class="page-title">
            <div class="title_left">
              <h3>My Bill Details</h3>
            </div>

          </div>
          <div class="row tile_count">
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Bill Amount</span>
              <div class="count"><?php echo number_format($get_total_bill,2); ?></div>
              <!--<span class="count_bottom"><i class="green">4% </i> From last Year</span> -->
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Pending Bills </span>
              <div class="count"><?php echo number_format($get_pending_bills,2); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Year</span> -->
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Account Balance</span>
              <div class="count green"><?php echo number_format(($get_total_allocation - $get_total_transfer)- $get_total_bill,2); ?></div>
              <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>



          </div>
        <?php } ?>

          <!----    -->


          </div>
        <!-- /page content -->
