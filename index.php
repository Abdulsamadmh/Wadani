

	<?php
include_once('./includes/header.php')

?>


<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-4">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mt-5 mt-lg-0">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
									<?php
if(isset($_POST['loginbtn'])){
    require('Includes/Connection.php');
    $email=$_POST['email'];
    $password=$_POST['password'];
    $ST=1;
$stmt = $conn->prepare("SELECT U.ID,E.FIRSTNAME,E.MIDDLENAME,E.LASTNAME,E.PHONE,E.ADDRESS,E.IMAGE,ACTIVATED
FROM users AS U INNER JOIN EMP AS E ON U.EMP_ID=E.ID WHERE  E.PHONE = ? and U.PASSWORD=sha1(?) AND U.STATUS=? ");
$stmt->bind_param("sss", $email, $password,$ST);
$stmt->execute();
$stmt->bind_result($ID,$FIRSTNAME,$MIDDLENAME,$LASTNAME,$PHONE,$ADDRESS,$IMAGE,$ACTIVATED);
    $rs= $stmt->fetch ();
    $stmt->close();
    if (!$rs) {
        echo"<span class='text-danger font-weight-bold'>Invalid Cridentials / <a href='hep' title='send request'>Disabled Account</a></span> ";
    } 
    else {
      session_start();  
      $_SESSION['ID']=$ID;
      $_SESSION['FIRSTNAME']=$FIRSTNAME;
      $_SESSION['MIDDLENAME']=$MIDDLENAME;
      $_SESSION['LASTNAME']=$LASTNAME;
      $_SESSION['FULLNAME']=$FIRSTNAME." ".$MIDDLENAME." ".$LASTNAME;
      $_SESSION['PHONE']=$PHONE;
      $_SESSION['ADDRESS']=$ADDRESS;
      $_SESSION['IMAGE']=$IMAGE;
      $_SESSION['ACTIVATED']=$ACTIVATED; 
     header('location: Dashboard'); 

      
    }
}
?>


									</div>
									
									<div class="login-separater text-center mb-4"> <span>SIGN IN WITH PHONE NUMBER</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST" >
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Enter Phone</label>
												<input type="text" name="email" class="form-control" id="inputFirstName" placeholder="Email Address">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword"  placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="loginbtn" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
								<?php
include_once('./includes/footer.php')

?>