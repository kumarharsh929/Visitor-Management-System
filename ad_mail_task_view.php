<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<?php if($_SESSION['desig']=="Intern"){
            echo "<script>window.location.href='vtr_index_view.php';</script>";
        } ?>
            <div class="container-fluid" style="margin-top: 5%; color: #fff;">
                <div class="row" style="margin-bottom: 5px;">
                  <div class="col-sm-2">To:</div>
                  <div class="col-sm-10">
                    <input type="email" value="sarveshchandra" name="">
                    <input type="email" value="Nitishanand" name="">
                    <input type="email" value="vikashmishra" name="">
                  </div>
                </div>      
                <div class="row" style="margin-bottom: 5px;">
                  <div class="col-sm-2">Cc:</div>
                  <div class="col-sm-10">
                    <input type="email" value="sanyukta" name="">
                  </div>
                </div>  
                <div class="row" style="margin-bottom: 5px;">
                  <div class="col-sm-2">Subject:</div>
                  <div class="col-sm-10">
                    <input type="text" value="Daily Work Update" name="">
                  </div>
                </div> 
                <hr/>

                <div class="row" style="margin-bottom: 5px;">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10">
                    Hello to All,<br/>
                    Good Evening<br/><br/>
                    Please find below the work update for <input type="date" name="">.<br/>

                    Sanyukta:
                  </div>
                </div>
              <div>
                <div><b>Sanyukta :-</b></div>
                <table style="color: #fff;border: 1px solid #fff;">
                  <tr>
                    <td style="color: #fff;">30-07-2019</td>
                    <td style="color: #fff;">TMS</td>
                    <td style="color: #fff;">Work on blah blah....</td>
                  </tr>
                </table>
              </div>
            </div>
<?php include('vtr_footer.php');?>