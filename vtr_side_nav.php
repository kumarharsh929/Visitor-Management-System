<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">

        <div class="list-group list-group-flush">
            <a href="ad_index.php" class="list-group-item list-group-item-action " style="background: #fff; color:rgb(0,0,51);"><?php echo $_SESSION['desig']; ?> Dashboard</a>
<?php

if($_SESSION['desig']=="Admin"){
     echo'<ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">

                    <a class="side-link dropdown-toggle" style="text-decoration-line:none; color: rgb(0,0,51);" href="#"  id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp; User
                    </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown">
                    <a class="dropdown-item" href="ad_add_user.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add User</a>
                        <a class="dropdown-item" href="ad_view_user.php">
                            <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View User</a>
                        <a class="dropdown-item" href="ad_edit_user.php">
                            <i class="fa fa-edit" aria-hidden="true"></i>&nbsp; Edit User </a>
                  </div>
                    
                </li>
            </ul>
            <div class="dropdown-divider"></div>
            <ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">

                    <a style="text-decoration-line:none; color: rgb(0,0,51);" href="#" class="side-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:rgb(0,0,51);">
                        <i class="fa fa-vcard-o" aria-hidden="true"></i>&nbsp; Visitor
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown">
                        <a class="dropdown-item" href="vm_add_visitor.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add Visitor</a>
                        <a class="dropdown-item" href="vm_view_visitor.php">
                            <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View User</a>
                        <a class="dropdown-item" href="vm_edit_visitor.php">
                            <i class="fa fa-edit" aria-hidden="true"></i>&nbsp; Edit User </a>
                        <a class="dropdown-item" href="vm_add_mom.php">
                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add MOM </a>
                        <a class="dropdown-item" href="vm_rescheduled_meeting.php">
                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Rescheduled Meeting </a>
                        <a class="dropdown-item" href="vm_view_meeting.php">
                            <i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View Meeting </a>
                        <a class="dropdown-item" href="vm_assign_employee.php">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp;Assign Employee</a>

                    </div>
                    
                      
                </li>
            </ul>';
      }
      else if($_SESSION['vis_status']==1){
          echo'<ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">      
                  <a href="#" class="side-link dropdown-toggle"  id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:rgb(0,0,51);"> 
                    <i class="fa fa-file" aria-hidden="true"></i>&nbsp; Visitor
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown">
                        <a class="dropdown-item" href="vm_add_visitor.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add Visitor</a>
                        <a class="dropdown-item" href="vm_view_visitor.php">
                            <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View Visitor</a>
                        <a class="dropdown-item" href="vm_edit_visitor.php">
                            <i class="fa fa-edit" aria-hidden="true"></i>&nbsp; Edit Visitor </a>
                        <a class="dropdown-item" href="vm_view_meeting.php">
                            <i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View Meeting </a>
                    </div>
                </li>
            </ul>';
      }
      

?>      
          
        </div>
    </div>