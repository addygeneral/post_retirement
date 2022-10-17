<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<body>

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="page-header">
				<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Post Retirement Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Not Approved Post Retirement</li>
								</ol>
							</nav>
						</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">NOT APPROVED POST RETIREMENT</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover ">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">STAFF NAME</th>
								<th>RANK</th>
								<th>INST.</th>
								<th>AGE</th>
								<th>DATE OF APPLICATION</th>
								<th>EFFECTIVE DATE</th>
								<th>END DATE</th>
								<th>INST. STATUS</th>
								<th>GTEC STATUS</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$status=1;
								$reg_status=2;
								$sql = "SELECT tblpostretirements.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.location,tblemployees.emp_id,tblemployees.Institution,tblemployees.Age,tblemployees.Rank,tblpostretirements.PostingDate,tblpostretirements.FromDate,tblpostretirements.ToDate,tblpostretirements.Status, tblpostretirements.admin_status from tblpostretirements join tblemployees on tblpostretirements.empid=tblemployees.emp_id where tblpostretirements.Status= '$status' and tblpostretirements.admin_status= '$reg_status' order by lid desc";
									$query = mysqli_query($conn, $sql) or die();
									while ($row = mysqli_fetch_array($query)) {
								 ?>  

								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										
										<div class="txt">
											<div class="weight-600"><?php echo $row['FirstName']." ".$row['LastName'];?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['Rank']; ?></td>
	                            <td><?php echo $row['Institution']; ?></td>
								<td><?php echo $row['Age']; ?></td>
	                            <td><?php echo $row['PostingDate']; ?></td>
								<td><?php echo $row['FromDate']; ?></td>
								<td><?php echo $row['ToDate']; ?></td>
								
								<td><?php $stats=$row['Status'];
	                             if($stats==1){
	                              ?>
	                                  <span style="color: green">Approved</span>
	                                  <?php } if($stats==2)  { ?>
	                                 <span style="color: red">Not Approved</span>
	                                  <?php } if($stats==0)  { ?>
	                             <span style="color: blue">Pending</span>
	                             <?php } ?>
	                            </td>
	                            <td><?php $stats=$row['admin_status'];
	                             if($stats==1){
	                              ?>
	                                  <span style="color: green">Approved</span>
	                                  <?php } if($stats==2)  { ?>
	                                 <span style="color: red">Not Approved</span>
	                                  <?php } if($stats==0)  { ?>
	                             <span style="color: blue">Pending</span>
	                             <?php } ?>
	                            </td>
								<td>
									<div class="table-actions">
										<a title="VIEW" href="postretirement_details.php?postretirementid=<?php echo $row['lid'];?>"><i class="dw dw-eye" data-color="#265ed7">Act</i></a>	
									</div>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="text-center">
						<button onclick="window.print()" class="btn btn-primary">Print Report</button>
					</div>
			   </div>
			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	
	<script src="../vendors/scripts/datatable-setting.js"></script></body>
</body>
</html>