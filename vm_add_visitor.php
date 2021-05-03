<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<!--<?php 
    $date = date("Y-m-d");
    $query ="SELECT * FROM `worksheet` WHERE `date_of_insertion` = '".$date."' AND `user_id` = '".$_SESSION['username']."'  ";

    $con = mysqli_connect('localhost','root','','task_management');
    $result =  mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>window.location.href='tm_edit.php';</script>";
    }
?>-->
	<div class="container-fluid " style="overflow-y:scroll;padding-top: 10px;height:95vh;">
        <div class="row" style="margin-top: 5%; min-height: 60vh;">
        	<div class="col-md-2"></div>
        	<form class="col-md-8 container" style="background: #fff; color:rgb(0,0,51);" method="POST" id="addvisitor_form" onsubmit="return validation()" enctype="multipart/form-data">
                <p id="head"></p>
                <!-- heading of -->
        		<div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
        			<div class="col-md-3"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;<b>Add Visitor</b></div>
        			<div class="col-md-4"></div>
        			<div class="col-md-2">
        				<label><b><?php echo date('d-m-Y');?></b></label>
        			</div>
        			<div class="col-md-3">
                        <b><div id="time-cont"></div></b>
        				<!-- <label><?php echo date('H:i:s a');?></label>  -->  	
        			</div>		
        	    </div><br/>
            	<div class="row">
            		    <div class="col-md-1"></div>
            		    <div class="col-md-5">
                            <div>
                                <label> Visitor Type</label><br/>
                                <select name="visitor_type" id="visitor_type"class="form-control" required="true"/>
                                <option>Student</option> 
                                <option>Business</option>  
                                </select> 
                            </div><br/>
                			<div>
                                <label>Visitor Name</label>
                                <input  type="text" name="visitor_name" id="visitor_name" placeholder="Enter Visitor Name" class="form-control" required="true"/> 
                                <span id="name_check" class="text-danger"></span> 
                            </div><br/>
                            <div>
                                <label> Visitor Company</label>
                                <input type="text" name="visitor_company" id="visitor_company" placeholder="Enter Visitor Company" class="form-control" required="true"/>
                                <span id="company_check" class="text-danger"></span> 
                            </div><br/>
                            <div>
                                <label> Visitor Email</label><br/>
                                <input type="email" name="visitor_email" id="visitor_email" placeholder="Enter Visitor Email" class="form-control" required="true"/> 
                                <span id="email_check" class="text-danger"></span>
                            </div><br/>
                            <div>
                                <label> Visitor Address</label><br/>
                                <textarea class="form-control" name="visitor_address" id="visitor_address" placeholder="Enter Visitor Address"></textarea>
                                <span id="address_check" class="text-danger"></span>
                            </div><br/>
            			</div>
                        <div class="col-md-5" >
                            <div>
                                <label> Meeting With</label><br/>
                                <select name="meeting_with" id="meeting_with"class="form-control" required="true"/>
                                <?php
                                    $query ="SELECT * FROM `user_details` ";
                                    $con = mysqli_connect('localhost','root','','task_management');
                                    $result = mysqli_query($con,$query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo'<option value="'.$row["name"].'">'.$row["name"].'</option>';
                                    }     
                                ?>
                                </select> 
                            </div><br/>
                           
                            <div>
                                <label> Meeting Date</label><br/>
                                <input type="date" name="meeting_date" id="meeting_date" class="form-control" required="true" min="<?php echo date('Y-m-d');?>"/>
                                

                            </div><br/>

                            <div>    
                                <label> Visitor Contact</label><br/>
                                <input type="text" width="auto" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" name="visitor_contact" id="visitor_contact" placeholder="Enter Visitor Contact" class="form-control" required="true"/> 
                                <span id="contact_check" class="text-danger"></span>
                            </div><br/>
                            <div>
                                <label> Visitor Aadhar</label><br/>
                                <input type="text" width="auto" minlength="10" maxlength="12" name="visitor_aadhar" id="visitor_aadhar" placeholder="Enter Visitor Aadhar Number" class="form-control" required="true"/>
                                <span id="aadhar_check" class="text-danger"></span> 
                            </div><br/>
                            <div>
                                <label> Visitor Description</label><br/>
                                <textarea class="form-control" name="visitor_description" id="visitor_description" placeholder="Enter Visitor Description"></textarea>
                            <div><br/>
                        </div>
                        <div class="col-md-1"></div>	
            	</div>
            
                <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                             <label> Upload Photo:</label><br/>
                             <input type="file" id="upload_image" name="upload_image"/>   
                        </div>
                        <div class="col-md-6"></div>
                </div>
            	<div class="row">
        			<div class="col-md-8"></div><br/>
        			<div class="col-md-3 btn-group">
                        <input type="reset" class="btn btn-danger" style="color:white;" value="Reset">&nbsp;
                        <input type="submit" class="btn btn-success" style="color:white;" id="addvisitor" value="Submit" name="addvisitor">
        			</div>	
        			<div class="col-md-1"></div>
            	</div><br/>
            </form>
        	<div class="col-md-2"></div>
      </div>
  </div>
 <?php include('vtr_footer.php');?>


                            