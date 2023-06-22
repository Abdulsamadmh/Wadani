

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
  
    $message="";
    if(@$_POST) {
 session_start();
	 echo "Welcome";
         require('./includes/Connection.php');
		  $email=$_POST['user_name'];
    $password=$_POST['password'];
$stmt = $conn->prepare("SELECT ID,FIRSTNAME,MIDDLENAME,LASTNAME,ROLE,image,PhoneNumber,dep_id FROM users WHERE  PhoneNumber = ? and PASSWORD=? AND status=1");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

$stmt->bind_result($ID,$FIRSTNAME,$MIDDLENAME,$LASTNAME,$ROLE,$image,$PhoneNumber,$dep_id);
$rs= $stmt->fetch ();
    $stmt->close();
    if (!$rs){
 echo "<div class='alert alert-danger'>"."Invalid Username or Password!"."</div>";
}else{
       $_SESSION["Username"]=$PhoneNumber;
	   $_SESSION["Name"]=$FIRSTNAME;
    header("Location:index.php");
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
												<input type="text" name="user_name" class="form-control" id="inputFirstName" placeholder="Email Address">
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
													<button type="submit" name="login" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
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