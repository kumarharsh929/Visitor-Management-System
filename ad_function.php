<?php
function profile($user_id,$page){
        $query = "SELECT * FROM `user_details` WHERE `email`= '".$user_id."' ";
        $con = mysqli_connect('localhost','root','','task_management');
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
        echo '<div class="row " style="padding: 10px; border-bottom: 2px solid rgb(0,0,51);">
                <div class="col-sm-2" align="center">
                    <img src="img/Picture.png" style="height: 85px; border-radius: 600px; border:1px solid rgb(0,0,51);">
                </div>
                <div class="col-sm-4">
                    <label><b>Name:</b></label>
                    <label>'.$row['name'].'</label><br/>
                    <label><b>Email:</b></label>
                    <label>'.$row['email'].'</label>
                </div>
                <div class="col-sm-3">
                    <label><b>User Id:</b></label>
                    <label>'.$row['user_id'].'</label><br/>
                    <label><b>Designation:</b></label>
                    <label>'.$row['desig'].'</label>
                </div>
                <div class="col-sm-3">
                    <label><b>Registration Date:</b></label>
                    <label>'.date('d-m-y',strtotime($row['registration_date'])).'</label><br/>
                    <label><b>Moblie.No:</b></label>
                    <label>'.$row['mobile_no'].'</label>
                </div>
             </div>';
           
            
    }
    function profile_details($user_id){
        $query = "SELECT * FROM `user_details` WHERE `email`= '".$user_id."' ";
        $con = mysqli_connect('localhost','root','','task_management');
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
              echo' <div class="row" style="margin-top: 10px;">
                        <div class="col-md-1"></div>  
                        <div class="col-md-5 card" >
                            <h3 class="card-header">Personal Detail...</h3>
                            <p class="list-group list-group-item">
                            <label><b>Father Name:</b></label>
                            <label>'.$row['father_name'].'</label></p>
                            
                            <p class="list-group list-group-item">
                            <label><b>DOB:</b></label>
                            <label>'.date("d-m-Y",strtotime($row['dob'])).'</label>
                            
                            <p class="list-group list-group-item">
                            <label><b>Address:</b></label>
                            <label>'.$row['address'].'</label>

                            <p class="list-group list-group-item">
                            <label><b>Aadhar.No:</b></label>
                            <label>'.$row['aadhar'].'</label>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-4 card" >
                            <h3 class="card-header">Educational Detail...</h3>
                            <p class="list-group list-group-item">
                            <label><b>Highest Qualification:</b></label>
                            <label>'.$row['qualification'].'</label></p>
                            <br/>
                            <p class="list-group list-group-item">
                            <label><b>CGPA/Percent:</b></label>
                            <label>'.$row['percentage_cgpa'].'</label></p>
                            <br/>
                            <p class="list-group list-group-item">
                            <label><b>School/College:</b></label>
                            <label>'.$row['college_school'].'</label>
                            <br/></p>
                            <p class="list-group list-group-item" >
                            <label><b>University/Board:</b></label>
                            <label>'.$row['university_board'].'</label></p>
                        </div>
                        <div class="col-md-1"></div>
                    </div>';
    }

    function profile_edit($user_id){
        $query = "SELECT * FROM `user_details` WHERE `email`= '".$user_id."' ";
        $con = mysqli_connect('localhost','root','','task_management');
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
              echo' <form method="post" id="update_user_details_form">
                    <div class="row" style="margin-top: 10px; padding:0px 10px 0px 10px"> 
                        <input type="hidden" id="update_sno" value="'.$row['s_no'].'">
                        <div class="col-md-6 card" >
                            <h3 class="card-header">Personal Detail...</h3>
                            <p class="list-group list-group-item">
                            <label><b>Father Name:</b></label>
                            <input type="text" required="true" class="form-control" id="update_fname" value="'.$row['father_name'].'" >
                            
                            <p class="list-group list-group-item">
                            <label><b>DOB:</b></label>
                            <input type="date" required="true" class="form-control" id="update_dob" value="'.date("Y-m-d",strtotime($row['dob'])).'">
                            
                            <p class="list-group list-group-item">
                            <label><b>Address:</b></label>
                            <input type="text" placeholder="Enter Your Address.." class="form-control" required="true" id="update_address" value="'.$row['address'].'" />
                            </p>

                            <p class="list-group list-group-item">
                            <label><b>Aadhar.No:</b></label>
                            <input type="text"  placeholder="aadhar number.." class="form-control" minlength="12" maxlength="12" required="true" id="update_aadhar" value="'.$row['aadhar'].'" />
                            </p>

                            <p class="list-group list-group-item">
                            <label><b>Moblie.No:</b></label>
                            <input type="text" class="form-control" width="auto" pattern="[1-9]{1}[0-9]{9}" placeholder="  Your Mobile-no.." minlength="10" maxlength="10" required="true" id="update_mobileno" value="'.$row['mobile_no'].'"/>
                            </p>
                        </div>
                        <div class="col-md-6 card" >
                            <h3 class="card-header">Educational Detail...</h3>
                            <p class="list-group list-group-item">
                            <label><b>Highest Qualification:</b></label>
                            <input type="text" placeholder="Enter Your Highest Qualification" class="form-control" required="true" id="update_quali" value="'.$row['qualification'].'">
                            </p>
                            <br/>
                            <p class="list-group list-group-item">
                            <label><b>CGPA/Percent:</b></label>
                            <input type="number" placeholder="Enter Your CGPA/Percent" class="form-control" required="true" id="update_cgpa" value="'.$row['percentage_cgpa'].'">
                            </p>
                            <br/>
                            <p class="list-group list-group-item">
                            <label><b>School/College:</b></label>
                            <input type="text" placeholder="Enter Your School/College" class="form-control" required="true" id="update_sch" value="'.$row['college_school'].'">
                            </p>

                            <p class="list-group list-group-item" >
                            <label><b>University/Board:</b></label>
                            <input type="text" placeholder="Enter Your Board/University" class="form-control" required="true" id="update_board" value="'.$row['university_board'].'">
                            </p>
                            <p class="list-group list-group-item btn-group" align="right">
                                <input type="submit" class="btn" style="color:rgb(0,0,51);; border:1px solid rgb(0,0,51);" value="Submit" id="update_user_details">
                                <input type="button" class="btn" data-dismiss="modal" value="Close"style="color:rgb(0,0,51);; border:1px solid rgb(0,0,51);">
                            </p>
                        </div>
                    </div></form>';
    }
if(isset($_POST['user']) && $_POST['user'] == 'details'){
    $id = $_POST['id'];
    $page = $_POST['page'];
    profile($id,$page);
    if($page =='view'){
        profile_details($id);
    }
    if($page =='edit'){
        profile_edit($id);
    }
}

function change($user_id,$C_pass,$N1_pass){
    $query = "SELECT * FROM `user_details` WHERE `email`= '".$user_id."' ";
    $con = mysqli_connect('localhost','root','','task_management');
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    if(md5($C_pass)==$row['password']){
       $query1=" UPDATE `user_details` SET `password`='".md5($N1_pass)."' WHERE `email`='".$user_id."' ";
       $res = mysqli_query($con,$query1);
       if($res)
       echo "ok";
    //   echo "Password Changed Successfully";
    }
    else{
        echo "not_ok";
    }
}

if(isset($_POST['ch']) == 'change_pass'){
    session_start();
    $con = mysqli_connect('localhost','root','','task_management');
    $C_pass = mysqli_real_escape_string($con, $_POST['C_pass']);
    $N1_pass = mysqli_real_escape_string($con, $_POST['N1_pass']);
    $id = $_SESSION['username'];
    change($id,$C_pass,$N1_pass);
}


if(isset($_POST['key']) && $_POST['key'] == 'updatework' ){
    $con = mysqli_connect('localhost','root','','task_management');
    $title = $_POST['titlekey']; 
    $details = mysqli_real_escape_string($con, $_POST['detailskey']);
    $s_no = $_POST['s_nokey']; 
   // $query = "INSERT INTO `worksheet`(`s_no`,`user_id`, `date_of_insertion`, `title`, `description`) VALUES ('".$s_no."','".$_SESSION['username']."','".$date."', '".$title."', '".$details."') 
   // ON DUPLICATE KEY UPDATE  
   //  `title`= '".$title."' ,
   //  `description` = '".$details."'  "; 
    $query = "UPDATE `worksheet` SET `title`= '".$title."',`description`= '".$details."' WHERE `s_no` = '".$s_no."' ";
    //$query = "INSERT INTO `worksheet`(`s_no`, `user_id`, `date_of_insertion`, `title`, `description`) VALUES ('".$_SESSION['username']."','".$date."', '".$title."', '".$details."')"

    $result =  mysqli_query($con,$query);
    if ($result) {
        echo "your Worksheet is Saved Successfully";
    }
    else echo "Error";
}
?>