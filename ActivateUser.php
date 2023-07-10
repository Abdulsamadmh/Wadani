

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
										


									</div>
									
									<div class="login-separater text-center mb-4"> <span>ACTIVATE USER</span>
										<hr/>
									</div>
									<div class="form-body">
										<p class="login-box-msg  "><center><h5>Change Default password</h5> <h6 class="text-danger"> To Activate User</h6></center></p>

      <form  method="post">
     
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="loginbtn" class="btn btn-success btn-block">Save <i class="fas fa-save"></i></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<?php
 
  $ST=$_GET['UID'];
if(isset($_POST['loginbtn'])){
     require('Includes/Connection.php');
    $password=$_POST['password'];
    $act_status=1;
$stmt = $conn->prepare("UPDATE USERS SET  PASSWORD=SHA1(?),ACTIVATED=? WHERE ID=? ");
$stmt->bind_param("sss",$password,$act_status,$ST);
$stmt->execute();
exit(header("Location: Index"));
}
?>
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