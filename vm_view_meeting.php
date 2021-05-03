<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>

 <div class="container-fluid" style="margin-top: 4%; height: 60vh;">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10" style="background: #fff; color:rgb(0,0,51); min-height:70vh; padding-top:10px;" >
     <!--<div class="row">
        <div class="col-md-8 input-group "  style="margin-top: 20px;">
          <label>From</label>&nbsp;
          <input type="date" placeholder="dd/mm/yyyy" class="form-control" style=" border: 1px solid rgb(0,0,51);">
          <label>to</label>&nbsp;
         <input type="date" placeholder="dd/mm/yyyy" class="form-control"  style="border: 1px solid rgb(0,0,51);" >  
               <div class="input-group-append">

                    <button class="btn btn-xs btn-info ">&#x1F50D;</button>
         </div>
          
        </div>
            <div class="input-group col-md-4" style="margin-top: 20px;">
              <input type="text" class="form-control" placeholder="Search Title.." style="border: 1px solid rgb(0,0,51);">
               <div class="input-group-append">
                <button class="btn btn-xs btn-info">&#x1F50D;</button>
              </div>
          </div>
      </div><br/> -->
      <div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
        <div class="col-md-3"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;<b>View Meeting</b></div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
          <label><?php echo date('d-m-Y');?></label>
        </div>
        <div class="col-md-3">
          <div id="time-cont"></div>
            <!-- <label><?php echo date('H:i:s a');?></label>  -->  
        </div>    
      </div><br/>
      <div class="row">
        <div class="col-md-12 table-responsive" style="background:#fff;">
          <table class="table table-bordered dataTable" cellspacing="0" cellpadding="0"  width="100%">
            <thead>
            <tr>
              <th>S.no</th>
              <th>Visitor ID</th>
              <th>Visitor Name</th> 
              <th>Visitor Description</th> 
              <th>View Meeting</th>
            </tr>
            </thead>
            <tbody>
<?php
      $query ="SELECT * FROM `visitor_details`  ORDER BY `visit_date` desc ";
      $con = mysqli_connect('localhost','root','','task_management');
      $result =  mysqli_query($con,$query);
      $s_no=1;
      while ($row = mysqli_fetch_array($result)) {
       echo'<tr>
              <td align="center">'.$s_no.'</td>
              <td align="center">'.$row["visitor_id"].'</td>
              <td align="center">'.$row["visitor_name"].'</td>
              <td align="center">'.$row["visitor_description"].'</td>
              <td align="center"><a href="#" id="view_meeting_butt" class="btn btn-info" data-toggle="modal" style="color:white;" data-id="'.$row['visitor_id'].'">View meeting</a></td>
            </tr>'  ;
            $s_no++;
      }     
?>
            </tbody>
          </table>
        </div>
      </div><br/>

    </div>
    <div class="col-md-1"></div>
  </div>
 </div>

<!-- Modal For View Meeting -->
<div class="modal fade" id="view_meeting" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background: #fff; color:rgb(0,0,51);">
            <div class="modal-body">
                <div class="container col-md-12" style="background: #fff; color:rgb(0,0,51);"> 
                    <div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
                        <div class="col-md-3"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;<b>View meeting</b></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <label><b><?php echo date('d-m-Y');?></b></label>
                        </div>
                        <div class="col-md-3">
                            <b><div class="time-cont-footer"></div></b>
                            <!-- <label><?php //echo date('H:i:s a');?></label>  -->
                        </div>
                    </div>      
                    <div class="view_meeting"></div>
                </div> 
            </div>
        </div>
    </div>
</div>

 
<?php include('vtr_footer.php');?> 

 