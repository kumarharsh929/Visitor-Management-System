<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<?php 
    $date = date("Y-m-d");
    $query ="SELECT * FROM `worksheet` WHERE `date_of_insertion` = '".$date."' AND `user_id` = '".$_SESSION['username']."'  ";
    $con = mysqli_connect('localhost','root','','task_management');
    $result =  mysqli_query($con,$query);
    if(mysqli_num_rows($result)<1){
        echo "<script>window.location.href='tm_add.php';</script>";
    }
    $row = mysqli_fetch_array($result);
    $s_no = $row["s_no"];
	echo '<div class="container-fluid">
        <div class="row" style="margin-top: 5%; height: 60vh;">
        	<div class="col-md-2"></div>
        	<form class="col-md-8 container" style="background:white ; color:rgb(0,0,51); padding-top:10px;">
                <div class="row" style="border-bottom: 2px solid rgb(0,0,51);;">
                    <div class="col-md-3"><i class="fa fa-edit" aria-hidden="true"></i> &nbsp;<b>Edit Task</b></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <label>'.date("d-m-Y").'</label>
                    </div>
                    <div class="col-md-3">
                        <div id="time-cont"></div>    
                    </div>      
                </div><br/><br/>
                <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" >
                            <lable> Work Title</lable><br/>
                            <input type="text" id="update_title" placeholder="Enter work Title" class="form-control" value="'.$row["title"].'"/> 
                            <input type="hidden" id="s_no" value="'.$s_no.'" name="s_no"/> 
                        </div>
                        <div class="col-md-2">  
                        </div>      
                </div><br/>
                <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" >
                            <label>Description</label><br/>
                            <textarea id="update_details" class="form-control" placeholder="Enter Work Description">'.$row["description"].'</textarea> 
                        </div><br/> 
                        <div class="col-md-2"></div>    
                </div><br/>
                <div class="row">
                    <div class="col-md-8"></div><br/>
                    <div class="col-md-3 btn-group">
                        <input type="reset" class="btn" style="color:rgb(0,0,51);; border:1px solid rgb(0,0,51);">&nbsp;
                        <input type="submit" class="btn" style="color:rgb(0,0,51);; border:1px solid rgb(0,0,51);" value="Submit" id="updatework" name="updatework">
                    </div>  
                    <div class="col-md-1"></div>
                </div><br/>
            </form>
        	<div class="col-md-2"></div>
      </div>

  </div>';

  ?>
 <?php include('vtr_footer.php');?>