
<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
   <div class="card" style="width:400px;height:200px;color:#000033;border-radius:15px;text-align:center;margin-top:250px;margin-left:450px;">
   		<h1><b><u>Total No. Of Visitor</u></b><br/><br/>
   			<?php
   				$query ="SELECT * FROM `visitor_details`";
      			$con = mysqli_connect('localhost','root','','task_management');
      			$result =  mysqli_query($con,$query);
      			$sno=0;
      			while ($row = mysqli_fetch_array($result)) {
      				$sno++;
      			}
   				echo $sno;?>
   				Visitors</h1>
   </div>

<?php include('vtr_footer.php');?>