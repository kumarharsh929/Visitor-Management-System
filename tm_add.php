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
        <div class="row" style="margin-top: 5%; height: 60vh;">
        	<div class="col-md-2"></div>
        	<form class="col-md-8 container" style="background: #fff; color:rgb(0,0,51); padding-top:10px;">
        		<div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
        			<div class="col-md-3"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;<b>Add Task  </b></div>
        			<div class="col-md-4"></div>
        			<div class="col-md-2">
        				<label><?php echo date('d-m-Y');?></label>
        			</div>
        			<div class="col-md-3">
                        <div id="time-cont"></div>
        				<!-- <label><?php echo date('H:i:s a');?></label>  -->  	
        			</div>		
        	    </div><br/><br/>
            	<div class="row">
            		    <div class="col-md-2"></div>
            		    <div class="col-md-8" >
                			<lable> Work Title</lable><br/>
                			<input type="text" id="title" placeholder="Enter work Title" class="form-control"/> 
                            
            			</div>
            			<div class="col-md-2">	
            			</div>		
            	</div><br/>
            	<div class="row">
            			<div class="col-md-2"></div>
            			<div class="col-md-8" >
                            <label>Description</label><br/>
            		        <textarea class="form-control" id="details" placeholder="Enter Work Description"></textarea>	
            			</div><br/>	
            			<div class="col-md-2"></div>	
            	</div><br/>
            	<div class="row">
        			<div class="col-md-8"></div><br/>
        			<div class="col-md-3 btn-group">
                        <input type="reset" class="btn" style="color:rgb(0,0,51); border:1px solid rgb(0,0,51);" value="Reset" name="">&nbsp;
                        <input type="submit" class="btn" style="color:rgb(0,0,51);; border:1px solid rgb(0,0,51);" id="submitwork" value="Submit" name="submitwork">
        			</div>	
        			<div class="col-md-1"></div>
            	</div><br/>
            </form>
        	<div class="col-md-2"></div>
      </div>
  </div>
 <?php include('vtr_footer.php');?>