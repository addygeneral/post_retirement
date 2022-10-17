<?php error_reporting(0);?>
<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
	$connect = mysqli_connect("localhost","root", "", "post_retirement");
	$_id = $_GET['postretirementid'];
	$res = mysqli_query($connect, "SELECT * FROM tblpostretirements where id='$_id'");
?>


<?php
	// code for update the read notification status
	$isread=1;
	$did=intval($_GET['postretirementid']);  
	date_default_timezone_set('Asia/Kolkata');
	$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
	$sql="update tblpostretirements set IsRead=:isread where id=:did";
	$query = $dbh->prepare($sql);
	$query->bindParam(':isread',$isread,PDO::PARAM_STR);
	$query->bindParam(':did',$did,PDO::PARAM_STR);
	$query->execute();

	// code for action taken on postretirement
	if(isset($_POST['update']))
	{ 
		$did=intval($_GET['postretirementid']);
		$description=$_POST['description'];
		$status=$_POST['status'];   
		$av_postretirement=$_POST['av_postretirement'];
		$num_days=$_POST['num_days'];

		$REMPOSTRETIREMENT = $av_postretirement - $num_days;

		date_default_timezone_set('Asia/Kolkata');
		$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));

		if ($status === '2') {
			$sql="update tblpostretirements set registra_remarks=:description,admin_status=:status,AdminRemarkDate=:admremarkdate where id=:did";

			$query = $dbh->prepare($sql);
			$query->bindParam(':description',$description,PDO::PARAM_STR);
			$query->bindParam(':status',$status,PDO::PARAM_STR);
			$query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
			$query->bindParam(':did',$did,PDO::PARAM_STR);
			$query->execute();
			echo "<script>alert('Post Retirement updated Successfully');</script>";
		}
		elseif ($status === '1') {
				$result = mysqli_query($conn,"update tblpostretirements, tblemployees set tblpostretirements.registra_remarks='$description',tblpostretirements.admin_status='$status',tblpostretirements.AdminRemarkDate='$admremarkdate', tblemployees.Av_postretirement='$REMPOSTRETIREMENT' where tblpostretirements.empid = tblemployees.emp_id AND tblpostretirements.id='$did'");

				if ($result) {
			     	echo "<script>alert('Post Retirement updated Successfully');</script>";
					} else{
					  die();
				   }
		}
	}

		// date_default_timezone_set('Asia/Kolkata');
		// $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));

		// $sql="update tblpostretirements set AdminRemark=:description,Status=:status,AdminRemarkDate=:admremarkdate where id=:did";

		// $query = $dbh->prepare($sql);
		// $query->bindParam(':description',$description,PDO::PARAM_STR);
		// $query->bindParam(':status',$status,PDO::PARAM_STR);
		// $query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
		// $query->bindParam(':did',$did,PDO::PARAM_STR);
		// $query->execute();
		// echo "<script>alert('Post Retirement updated Successfully');</script>";

?>

<style>
	input[type="text"]
	{
	    font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
	}

	.btn-outline:hover {
	  color: #fff;
	  background-color: #524d7d;
	  border-color: #524d7d; 
	}

	textarea { 
		font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
	}

	textarea.text_area{
        height: 8em;
        font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
      }

	</style>

<body>

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>POST RETIREMENT DETAILS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Post Retirement</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Post Retirement Details</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<form method="post" action="">

						<?php 
						if(!isset($_GET['postretirementid']) && empty($_GET['postretirementid'])){
							header('Location: admin_dashboard.php');
						}
						else {
						
						$lid=intval($_GET['postretirementid']);
						$sql = "SELECT tblpostretirements.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.emp_id,tblemployees.Gender,tblemployees.Age,tblemployees.dob,tblemployees.Rank,tblemployees.Institution,tblemployees.Phonenumber,tblemployees.EmailId,tblemployees.Av_postretirement,tblpostretirements.PostretirementType,tblpostretirements.ToDate,tblpostretirements.FromDate,tblpostretirements.File,tblpostretirements.Description,tblpostretirements.PostingDate,tblpostretirements.Status,tblpostretirements.AdminRemark,tblpostretirements.admin_status,tblpostretirements.registra_remarks,tblpostretirements.AdminRemarkDate,tblpostretirements.num_days from tblpostretirements join tblemployees on tblpostretirements.empid=tblemployees.emp_id where tblpostretirements.id=:lid";
						$query = $dbh -> prepare($sql);
						$query->bindParam(':lid',$lid,PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{         
						?>  

						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Full Name</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->FirstName." ".$result->LastName);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Email Address</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->EmailId);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Rank</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->Rank);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Age</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->Age);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Date of Birth</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->dob);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Institution</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->Institution);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Gender</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-success" readonly value="<?php echo htmlentities($result->Gender);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Phone Number</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->Phonenumber);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Post Retirement Type</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->PostretirementType);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Application Date</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-success" readonly value="<?php echo htmlentities($result->PostingDate);?>">
								</div>
							</div>

							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Applied No. of Years</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly name="num_days" value="<?php echo htmlentities($result->num_days);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Available No. of Years</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly name="av_postretirement" value="<?php echo htmlentities($result->Av_postretirement);?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label style="font-size:16px;"><b>Post Retirement Period</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="From <?php echo htmlentities($result->FromDate);?> to <?php echo htmlentities($result->ToDate);?>">
								</div>
							</div>
							<div class="col-md-8">		
								<div class=" form-group">
									<label style="font-size:16px;"><b>Attachment</b></label>
									<input name="file" class=" form-control-file" readonly value="<?php echo htmlentities($result->File);?>">
									<!-- <a href="uploads/" target="_blank">view file</a> -->
								<?php
									while($row=mysqli_fetch_array($res)){
										$pid = $row['id'];
										echo "<button class='btn btn-xs btn-link form-control' onclick='detailsmodal($pid)'>View File</button>";
									}
								?>
								</div>
							</div>

						</div>
						<div class="form-group row">
								<label style="font-size:16px;" class="col-sm-12 col-md-2 col-form-label"><b>Post Retirement Justification</b></label>
								<div class="col-sm-12 col-md-10">
									<textarea name=""class="form-control text_area" readonly type="text"><?php echo htmlentities($result->Description);?></textarea>
								</div>
						</div>
						<div class="form-group row">
								<label style="font-size:16px;" class="col-sm-12 col-md-2 col-form-label"><b>Institution Remarks</b></label>
								<div class="col-sm-12 col-md-10">
									<?php
									if ($result->AdminRemark==""): ?>
									  <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "Waiting for Approval"; ?>">
									<?php else: ?>
									  <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->AdminRemark); ?>">
									<?php endif ?>
								</div>
						</div>
						<div class="form-group row">
								<label style="font-size:16px;" class="col-sm-12 col-md-2 col-form-label"><b>GTEC Remarks</b></label>
								<div class="col-sm-12 col-md-10">
									<?php
									if ($result->registra_remarks==""): ?>
									  <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "Waiting for Approval"; ?>">
									<?php else: ?>
									  <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->registra_remarks); ?>">
									<?php endif ?>
								</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
								   <label style="font-size:16px;"><b>Action Taken Date</b></label>
								   <?php
									if ($result->AdminRemarkDate==""): ?>
									  <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "NA"; ?>">
									<?php else: ?>
									  <input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->AdminRemarkDate); ?>">
									<?php endif ?>

								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size:16px;"><b>Status From Institution</b></label>
									<?php $stats=$result->Status;?>
									<?php
									if ($stats==1): ?>
									  <input type="text" style="color: green;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "Approved"; ?>">
									<?php
									 elseif ($stats==2): ?>
									  <input type="text" style="color: red; font-size: 16px;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "Not Approved"; ?>">
									  <?php
									else: ?>
									  <input type="text" style="color: blue;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "Pending"; ?>">
									<?php endif ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size:16px;"><b>Status from GTEC</b></label>
									<?php $stats=$result->admin_status;?>
									<?php
									if ($stats==1): ?>
									  <input type="text" style="color: green;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "Approved"; ?>">
									<?php
									 elseif ($stats==2): ?>
									  <input type="text" style="color: red; font-size: 16px;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "Not Approved"; ?>">
									  <?php
									else: ?>
									  <input type="text" style="color: blue;" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo "Pending"; ?>">
									<?php endif ?>
								</div>
							</div>

							<?php 
							if(($stats==0 AND $ad_stats==0) OR ($stats==2 AND $ad_stats==0) OR ($stats==2 AND $ad_stats==2))
							  {

							 ?>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size:16px;"><b></b></label>
									<div class="modal-footer justify-content-center">
										<button class="btn btn-primary" id="action_take" data-toggle="modal" data-target="#success-modal">Take&nbsp;Action</button>
									</div>
								</div>
							</div>
							
							<form name="adminaction" method="post">
  								<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body text-center font-18">
												<h4 class="mb-20">Take Action on Post Retirement</h4>
												<select name="status" required class="custom-select form-control">
													<option value="">Choose your option</option>
				                                          <option value="1">Approved</option>
				                                          <option value="2">Not Approved</option>
												</select>

												<div class="form-group">
													<label></label>
													<textarea id="textarea1" name="description" class="form-control" required placeholder="Your Justification Goes Here..." length="300" maxlength="300"></textarea>
												</div>
											</div>
											<div class="modal-footer justify-content-center">
												<input type="submit" class="btn btn-primary" name="update" value="Submit">
											</div>
										</div>
									</div>
								</div>
  							</form>

							<?php }?>
						</div>

						<?php $cnt++;} } }?>
					</form>
				</div>

			</div>
			
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
	<script>
      function detailsmodal(id) {
        var data = {"id" : id};
        $.ajax({
        url : 'modal.php',
        method : "POST",
        data : data,
        success : function(data) {
          $('body').append(data);
          $('#details-modal').modal('toggle');
        },
        error: function() { alert("Something went wrong!"); }
        });
      }
	</script>
</body>
</html>