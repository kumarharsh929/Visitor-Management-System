<div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light  border-bottom" style="background: white;color:rgb(0,0,51);">
        <button class="btn " id="menu-toggle" style="background: #fff;color:rgb(0,0,51);">&#9776;</button>
         <a href="#" style="position: absolute;left: auto;right:10px; text-decoration-line:none; color: rgb(0,0,51);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <b style="color:rgb(0,0,51);"><?php echo $_SESSION['name']; ?> </b>
               <i class="fa fa-caret-down" aria-hidden="true"></i>    
         </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <?php echo'<a class="dropdown-item view_user" href="#" data-id="'.$_SESSION['username'].'" data-but="#viewuser" data-page="view">Profile</a>';  ?>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepassword">Change Password</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal">Logout</a>
              </div>
      </nav>
   