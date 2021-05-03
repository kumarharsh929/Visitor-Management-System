<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<?php if($_SESSION['desig']=="Intern"){
            echo "<script>window.location.href='vtr_index_view.php';</script>";
        } ?>
 <div class="container-fluid" style="margin-top: 5%; min-height: 60vh;">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 "style="background: #fff; color:rgb(0,0,51); min-height:70vh; overflow: scroll;" >

        <div class="row" style="border-bottom: 2px solid rgb(0,0,51); padding-top: 10px;">
            <div class="col-md-3" style="background: #fff; color:rgb(0,0,51); border:0px;">
            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;<b>Assign Employee</b></div>
            <div class="col-md-4"></div>
            <div class="col-md-2">
              <label><b><?php echo date('d-m-Y');?></b></label>
            </div>
            <div class="col-md-3">
              <b><div id="time-cont"></div></b>
                <!-- <label><?php echo date('H:i:s a');?></label>  --> 
            </div>    
        </div>
  <!--    <div class="row">
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
        </div> --><br/>

      <div class="row">
        <div class="col-md-12 table-responsive" style="background:#fff;">
          <table  class="table table-bordered dataTable" id="" style=" width:100%;  ">
            <thead>
              <tr>
                <th>S.no</th>
                <th>Employee Name</th> 
                <th>Employee ID</th>
                <th>Designation</th>
                <th>More</th>
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
                <td align="center">'.$row["name"].'</td>
                <td align="center">'.$row["user_id"].'</td>
                <td align="center">'.$row["desig"].'</td>';
            if ($row['vis_status']==1) {
              echo'<td align="center"><a href="#" class="btn btn-danger" data-type="deactivate" data-fig="'.$row['user_id'].'" data-toggle="modal" id="assign_employee_butt">Deactivate</a></td>
            </tr>';
            }
            if ($row['vis_status']==0) {
              echo'<td align="center"><a href="#" class="btn btn-info"data-type="activate" data-fig="'.$row['user_id'].'" data-toggle="modal" id="deassign_employee_butt">Activate</a></td>
            </tr>';
            }
            
            $s_no++;}

?>
            </tbody>
          </table><br/>
        </div>
      </div>

    </div>
    
    <div class="col-md-1"></div>
  </div>
 </div>

<!-- Modal For Deactivate Employee -->
<div class="modal fade" id="assign_employee_modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content" style="background: #fff; color:rgb(0,0,51);">
            <div class="modal-body">
                <p>
                    <br/>
                    <b> Do you really want to Deactivate The Employee?</b> </p>
                <br/>
                <p style="float: left;">
                    <a href="vtr_login_view.php" id="activate" name="activate" class="btn btn-md" style="border:1px solid rgb(0,0,51); color:rgb(0,0,51);">Yes</a>
                    <input type="hidden" id="active"/>
                </p>
                <p style="float: right;">
                    <button class="btn btn-md" style="border:1px solid rgb(0,0,51); color:rgb(0,0,51);" data-dismiss="modal">No</button>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="color:white;">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deassign_employee_modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content" style="background: #fff; color:rgb(0,0,51);">
            <div class="modal-body">
                <p>
                    <br/>
                    <b> Do you really want to Activate The Employee?</b> </p>
                <br/>
                <p style="float: left;">
                    <a href="vtr_login_view.php" id="deactivate" name="activate" class="btn btn-md" style="border:1px solid rgb(0,0,51); color:rgb(0,0,51);">Yes</a>
                    <input type="text" id="deactive"/>
                </p>
                <p style="float: right;">
                    <button class="btn btn-md" style="border:1px solid rgb(0,0,51); color:rgb(0,0,51);" data-dismiss="modal">No</button>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="color:white;">Close</button>
            </div>
        </div>
    </div>
</div>

 <?php include('vtr_footer.php');?> 