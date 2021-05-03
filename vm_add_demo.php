<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<?php 
    $date = date("Y-m-d");
    $query ="SELECT * FROM `worksheet` WHERE `date_of_insertion` = '".$date."' AND `user_id` = '".$_SESSION['username']."'  ";

    $con = mysqli_connect('localhost','root','','task_management');
    $result =  mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>window.location.href='tm_edit.php';</script>";
    }
?>
	<div class="container-fluid" >
        <div class="row" style="margin-top: 5%; min-height: 60vh;">
        	<div class="col-md-2"></div>
        	<form class="col-md-8 container" style="background: #fff; color:rgb(0,0,51); padding-top:10px;" method="POST" id="addvisitor_form">
                <!-- heading of -->
        		<div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
        			<div class="col-md-3"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;<b>Add MOM  </b></div>
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
            		    <div class="col-md-1"></div>
            		    <div class="col-md-5">
                                <label> Meeting Type</label><br/>
                                <select name="visitor_type" id="visitor_type"class="form-control" required="true"/>
                                <option>Select</option> 
                                <option>Business</option> 
                                <option>Student</option> 
                                </select> 
                            </div>
                		<div class="col-md-5">
                                <label> Meeting With</label><br/>
                                <select name="meeting_with" id="meeting_with"class="form-control" required="true"/>
                                <?php
                                    $query ="SELECT * FROM `user_details` ";
                                    $con = mysqli_connect('localhost','root','','task_management');
                                    $result = mysqli_query($con,$query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo'<option value="'.$row["email"].'">'.$row["name"].'</option>';
                                    }     
                                ?>
                                </select>
                        </div>
                        <div class="col-md-1"></div>
                </div><br/>
                
                <div class="row">
                		<div class="col-md-1"></div>
                		<div class="col-md-10">
                			<label> Objective</label><br/>
                			<textarea class="form-control" name="objective" id="objective" placeholder="Enter The Objective Of Meeting"></textarea>
                		</div>
                		<div class="col-md-1"></div>
               	</div><br/>

               	<div class="row">
                		<div class="col-md-1"></div>
                		<div class="col-md-10">
                			<label> Discussion</label><br/>
                			<textarea class="form-control" name="discussion" id="discussion" placeholder="Enter The Discussion Held In The Meeting"></textarea>
                		</div>
                		<div class="col-md-1"></div>
               	</div><br/>

                <div class="row">
                		<div class="col-md-1"></div>
                		<div class="col-md-10">
                			<label> Conclusion</label><br/>
                			<textarea class="form-control" name="conclusion" id="conclusion" placeholder="Enter The Conclusion Of Meeting"></textarea>
                		</div>
                		<div class="col-md-1"></div>
               	</div><br/>
            	<div class="row">
        			<div class="col-md-8"></div><br/>
        			<div class="col-md-3 btn-group">
                        <input type="reset" class="btn btn-danger" style="color:rgb(0,0,51); border:1px solid rgb(0,0,51);" value="Reset">&nbsp;
                        <input type="submit" class="btn btn-success" style="color:rgb(0,0,51);; border:1px solid rgb(0,0,51);" id="addmom" value="Submit" name="addvisitor">
        			</div>	
        			<div class="col-md-1"></div>
            	</div><br/>
            </form>
        	<div class="col-md-2"></div>
      </div>
  </div>
 <?php include('vtr_footer.php');?>