<?php include('vtr_header.php');?>
    <?php include('vtr_top_menu.php');?>
        <?php include('vtr_side_nav.php');?>
          <?php if($_SESSION['desig']=="Intern"){
            echo "<script>window.location.href='vtr_index_view.php';</script>";
        } ?>
            <div class="container-fluid" style="margin-top: 5%;">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10 " style="background: #fff; color:rgb(0,0,51); min-height:70vh; overflow: scroll;">
                        <!--<div class="row">
        <div class="col-md-6  "  style="margin-top: 20px;">
          <div class="row">
            <div class="col-md-12" style="background: #fff;color:rgb(0,0,51);">
              <label>Date of Registration...</label><br/>

            </div>
          </div>
          <div class="row">
            <div class="col-md-12 input-group" style="backgroud:#fff;color:rgb(0,0,51);">
              <label>&nbsp;From</label>&nbsp;
                  <input type="date" placeholder="dd/mm/yyyy" class="form-control" style=" border: 1px solid rgb(0,0,51);">
                  <label>&nbsp;to</label>&nbsp;
                 <input type="date" placeholder="dd/mm/yyyy" class="form-control"  style="border: 1px solid rgb(0,0,51);" >  
                       <div class="input-group-append">
                            <button class="btn btn-xs btn-info ">&#x1F50D;</button>
                 </div>
            </div>
          </div>
         </div>
         <div class="col-md-2"></div>
            <div class=" col-md-4" style="margin-top: 20px;">
              <div class="row">
                <div class="col-md-12" style="background:#fff;color:rgb(0,0,51);"><label>Search</label></div>
              </div>
              <div class="row">
               <div class="col-md-12 input-group "> 
                <input type="text" class="form-control" placeholder="Enter Name.." style="border: 1px solid rgb(0,0,51);">
               <div class="input-group-append">
                <button class="btn btn-xs btn-info">&#x1F50D;</button>
              </div>
              </div>

          </div>
          </div>
        </div> -->

                        <div class="row" style="border-bottom: 2px solid rgb(0,0,51);padding-top:10px;">
                            <div class="col-sm-3" style="background: #fff; color:rgb(0,0,51); border:0px;">
                                <i class="fa fa-edit" aria-hidden="true"></i> &nbsp;<b>Edit User</b></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-2">
                                <label><b><?php echo date('d-m-Y');?></b><label>
                            </div>
                            <div class="col-sm-3">
                              <b><div id="time-cont"></div></b>
                                <!-- <label><?php echo date('H:i:s a');?></label>  -->
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12 table-responsive" style="background:#fff;">
                                <table class="table table-bordered dataTable" id="" style=" width:100%;  ">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>User Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile.no</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php      $query ="SELECT * FROM `user_details` ";
               $con = mysqli_connect('localhost','root','','task_management');
               $result =  mysqli_query($con,$query);
               $s_no=1;
               while ($row = mysqli_fetch_array($result)) {
           echo'<tr>
                    <td align="center">'.$s_no.'</td>
                    <td>'.$row["user_id"].'</td>
                    <td align="center">'.$row["name"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["mobile_no"].'</td>
                    <td align="center"><a href="#" class="view_user" data-toggle="modal" style="color:rgb(0,0,51);" data-id="'.$row['email'].'" data-but="#edit_user" data-sno='.$row["s_no"].' data-page="edit">Edit</a></td>
                </tr>';
                $s_no++;} 
    ?>
                                    </tbody>
                                </table>
                                <br/>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-1"></div>
                </div>
            </div>
            <?php include('vtr_footer.php');?>