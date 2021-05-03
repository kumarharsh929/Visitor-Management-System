</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content" style="background: #fff; color:rgb(0,0,51);">
            <div class="modal-body">
                <p>
                    <br/>
                    <b> Do you really want to Log-out?</b> </p>
                <br/>
                <p style="float: left;">
                    <a href="vtr_logout.php" class="btn btn-md" style="border:1px solid rgb(0,0,51); color:rgb(0,0,51);">Yes</a>
                </p>
                <p style="float: right;">
                    <button class="btn btn-md" style="border:1px solid rgb(0,0,51); color:rgb(0,0,51);" data-dismiss="modal">No</button>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="color:rgb(0,0,51);">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for View User -->
<div class="modal fade" id="viewuser" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background: #fff; color:rgb(0,0,51);">
            <div class="modal-body">
                <div class="container col-md-12" style="background: #fff; color:rgb(0,0,51);"> 
                    <div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
                        <div class="col-md-3"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;<b>View User</b></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <label><b><?php echo date('d-m-Y');?></b></label>
                        </div>
                        <div class="col-md-3">
                            <b><div class="time-cont-footer"></div></b>
                            <!-- <label><?php //echo date('H:i:s a');?></label>  -->
                        </div>
                    </div>      
                    <div class="view_profile"></div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="color:rgb(0,0,51);">Close</button>
            </div>
        </div>
    </div>
</div>












<!--
<div class="modal fade" id="edittask" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background: #fff; color:rgb(0,0,51);">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row" style="margin-top: 0%; height: 70vh;">
                        <form class="col-md-12 container" style="background:white ; color:rgb(0,0,51);">
                            <div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
                                <div class="col-md-3"> &#x270E; &nbsp;<b>Edit Task</b></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    <label><b><?php echo date('d-m-Y');?></b></label>
                                </div>
                                <div class="col-md-3">
                                    <label><b><?php echo date('H:i:s a');?></b></label>
                                </div>
                            </div>
                            <div class="view_profile"></div><br/>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <lable> Work Title</lable>
                                    <br/>
                                    <input type="text" placeholder="Enter work Title" class="form-control"  id="title"/>
                                </div>
                                <div class="col-md-2"></div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <label>Description</label>
                                    <br/>
                                    <textarea class="form-control" placeholder="Enter Work Description" id="details"></textarea>
                                </div>
                                <br/>
                                <div class="col-md-2 "></div>
                            </div><br/><br/>
                            <div class="row">
                                <div class="col-md-8"></div>
                                <br/>
                                <div class="col-md-3 btn-group">
                                    <input type="hidden" id="sno" name="">
                                    <input type="reset" class="btn" style="color:rgb(0,0,51);; border:1px solid rgb(0,0,51);">&nbsp;
                                    <input type="submit" class="btn" id="ad_workupdate" style="color:rgb(0,0,51);; border:1px solid rgb(0,0,51);" value="Update" >
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <br/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="color:rgb(0,0,51);">Close</button>
            </div>
        </div>
    </div>
</div>  -->

<div class="modal fade" id="changepassword" role="dialog">
    <form class="modal-dialog">
        <div class="modal-content" style="background: #fff; color:rgb(0,0,51);">
            <div class="modal-body">
                <label>Current password</label>
                <br/>
                <input type="password" id="C_pass" name="C_pass" required="true" placeholder="Current password" class="form-control">
                <br/>
                <label>New password</label>
                <input type="password" id="N1_pass" name="N1_pass" required="true" placeholder="New password" class="form-control">
                <br/>
                <label>Confirm password</label>
                <input type="password" id="N2_pass" name="N2_pass" required="true" placeholder="Confirm password" class="form-control">
                <br/>
                <p style="float: right;">
                    <input type="button" id="Ch_pass" name="Ch_passs" value="Change Password" class="btn btn-md" style="border:1px solid rgb(0,0,51); color:rgb(0,0,51);">
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="color:rgb(0,0,51);">Close</button>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="edit_user" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background: #fff; color:rgb(0,0,51);">
            <div class="modal-body">
                <div class="container col-md-12" style="background: #fff; color:rgb(0,0,51);"> 
                    <div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
                        <div class="col-md-3"><i class="fa fa-edit" aria-hidden="true"></i> &nbsp;<b>Edit User</b></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <label><b><?php echo date('d-m-Y');?></b></label>
                        </div>
                        <div class="col-md-3">
                            <b><div class="time-cont-footer"></div></b>
                            <!-- <label><?php //echo date('H:i:s a');?></label>  -->
                        </div>
                    </div>      
                    <div class="view_profile"></div>
                </div> 
            </div>
    <!--    <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="color:rgb(0,0,51);">Close</button>
            </div>   -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#pageOneNextButton').click(function() {
        $('#a').css('display', 'none');
        $('#b').css('display', 'block');

    });

    $('#TwoNext1Button').click(function() {
        $('#a').css('display', 'none');
        $('#b').css('display', 'none');
        $('#c').css('display', 'block');
    });
    $('#TwoNext2Button').click(function() {
        $('#b').css('display', 'none');
        $('#a').css('display', 'block');

    });
    $('#btn3').click(function() {
        $('#c').css('display', 'none');
        $('#b').css('display', 'block');

    });

    $('#Next').click(function() {
        $('#c').css('display', 'none');
        $('#d').css('display', 'block');

    });

    $('#btn4').click(function() {
        $('#c').css('display', 'block');
        $('#d').css('display', 'none');

    });
</script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="vendor/datatables/datatables-demo.js"></script>
<script src="tm_worksheet.js"></script>
<script src="ad_custom.js"></script>
<script src="ad_register.js"></script>
<script src="js/sweetalert2.js"></script>
<script src="vm_custom.js"></script>
<script src="vm_register.js"></script>
<script src="vm_formvalid.js"></script>
<script src="js/clock.js"></script>
</body>

</html>