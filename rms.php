<!doctype html>

<?php
require('session.php');
if(!$_SESSION['ID'])
{
	header("Location:login.php");
}
?>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>Result Management System</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
	<?php
include_once('./includes/nav.php')

?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php
include_once('./includes/subheader.php')
		?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				
				<h6 class="mb-0 text-uppercase">Polling stations assigned to <div class="chip chip-md bg-light text-dark">
							<img src="assets/images/avatars/avatar-2.png" alt="Contact Person"><?php echo $_SESSION['FULLNAME'] ?></div></h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
					 
                  <h5> <i class="fas fa-sympol"></i> Tasks Assigned</h5><hr>
                  <table class="table table-sm table-bordered table-striped" id="example2">
                    <thead>
                      <tr>
                      <th>NO</th>
                        <th>REGION</th>
                        <th>STATION</th>
						<th>STATUS</th>
                        <th>WADDANI</th>
                        <th>KULMIYE</th>
                        <Th>UCID</Th>
                        <Th>RECEIVED</Th>
                        <th>USED</th>
                        <th>CORUPTED</th>
                        <th>DISPUTED</th>
                        <th>ACTION</th>
                      </tr>
                      </tr>
                    </thead>
                    <tfoot>
                    <th>NO</th>
                        <th>REGION</th>
                        <th>STATION</th>
						<th>STATUS</th>
                        <th>WADDANI</th>
                        <th>KULMIYE</th>
                        <Th>UCID</Th>
                        <Th>RECEIVED</Th>
                        <th>USED</th>
                        <th>CORUPTED</th>
                        <th>DISPUTED</th>
                        <th>ACTION</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    
                    <?php
        require('Includes/Connection.php');
        $user=$_SESSION['ID'];
        $stmt1=$conn->prepare("SELECT  B.ID,a.REGION,a.DiSTRICT,A.POLLING_CENTER_NO,B.PS_ID,A.POLLING_CENTER_NAME,A.VALID_VOTERS,B.WADDANI,B.KULMIYE,B.UCID,b.STATUS,PRP.RECEIVED,PRP.USED,PRP.CORUPTED,PRP.DISPUTED
        FROM PS AS A  JOIN pr_rms   AS B 
        ON B.PS_ID=A.ID
         JOIN users ON B.ASSIGNED_TO=users.ID 
         JOIN pr_polling_papers PRP
         on PRP.REF=B.ID WHERE users.ID=? ");
         $stmt1->bind_param("s",$user);
        $stmt1->execute();
        $result = $stmt1->get_result();

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
       
          ?>
          <Tr>
            <td><?php echo $row['POLLING_CENTER_NO'];?></td>
            <td><span class="text-primary font-weight-bold"><?php echo $row['REGION'];?></span>-<?php echo $row['DiSTRICT'];?></td>
            <td><?php echo $row['POLLING_CENTER_NAME'];?> <?php $status=$row['STATUS']; if ($status==2){ echo ' <span class="float-right">Done <i class="fas fa-check-circle   text-success" title="done"></i></span>';} elseif($status==1){echo  ' <span class="float-right">Started <i class="fas fa-info-circle  text-warning" title="started"></i></span>';}else{echo ' <span class="float-right">Stuck <i class="text-primary" data-feather="alert-circle"></i></span>';}?></td>
            <td>
<?php
$status=$row['STATUS']; 

if($status==2)
{
echo '<div class="font-18 text-success">	<i class="fadeIn animated bx bx-comment-check"></i>
						Done	</div>';
}
elseif($status==1)
{
echo '<div class="font-18 text-info">	<i class="fadeIn animated bx bx-x-circle"></i>
							Started</div>';
}
else
{
	echo '<div class="font-18 text-danger">	<i class="fadeIn animated bx bx-x-circle"></i>
							Stuck</div>';
}

?>


			</td>
			<td><?php echo $row['WADDANI'];?></td>
            <td><?php echo $row['KULMIYE'];?></td>
            <td><?php echo $row['UCID'];?></td>
            <td><?php echo $row['RECEIVED'];?></td>
            <td><?php echo $row['USED'];?></td>
            <td><?php echo $row['CORUPTED'];?></td>
            <td><?php echo $row['DISPUTED'];?></td>
            <tD> <a class="btn btn-success w-100 btn-sm" href="Edit?id=<?php echo $row['ID'];?>">Open <i class="fas fa-cog"></i></a></tD>
          </Tr>
           <?php }?>
                      
                    </tbody>
                  </table>
						</div>
					</div>
				</div>
			
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>