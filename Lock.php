	
	<?php 

session_start();
if (isset($_SESSION['EMAIL'])){
	
}else{
	session_destroy();
	header('location: Lock');
}

session_destroy();

?>
	
	<?php
include_once('./includes/header.php')

?>

<body class="bg-lock-screen">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-lock-screen d-flex align-items-center justify-content-center">
			<div class="card shadow-none bg-transparent">
				<div class="card-body p-md-5 text-center">
					<h2 class="text-white">10:53 AM</h2>
					<h5 class="text-white">Tuesday, January 14, 2021</h5>
					<div class="">
						<img src="assets/images/icons/user.png" class="mt-5" width="120" alt="" />
					</div>
					<p class="mt-2 text-white"><?php $lockphone=$_SESSION['PHONE']; echo $_SESSION['FULLNAME'];?></p>
					<div class="mb-3 mt-3">
						<input type="password" class="form-control" placeholder="Password" />
					</div>
					<div class="d-grid">
						<button type="button" name="unlockbtn" class="btn btn-white">Login</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
if(isset($_POST['unlockbtn'])){
   require('Includes/Connection.php');
    $email=$lockphone;
    $password=$_POST['password'];
$stmt = $conn->prepare("SELECT ID,FIRSTNAME,MIDDLENAME,LASTNAME,EMAIL,ROLE,TITLE,image,PhoneNumber,dep_id FROM users WHERE  PhoneNumber = ? and PASSWORD=sha1(?) ");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->bind_result($ID,$FIRSTNAME,$MIDDLENAME,$LASTNAME,$EMAIL,$ROLE,$TITLE,$image,$PhoneNumber,$dep_id);
    $rs= $stmt->fetch ();
    $stmt->close();
    if (!$rs) {
        echo"<span class='text-danger font-weight-bold'>Invalid Cridentials</span> ";
    } 
    else {
      
        session_start();   
     $_SESSION['ID']=$ID;
      $_SESSION['FIRSTNAME']=$FIRSTNAME;
      $_SESSION['MIDDLENAME']=$MIDDLENAME;
      $_SESSION['LASTNAME']=$LASTNAME;
      $_SESSION['EMAIL']=$EMAIL;
      $_SESSION['ROLE']=$ROLE;
      $_SESSION['image']=$image;
      $_SESSION['FULLNAME']=$FIRSTNAME." ".$MIDDLENAME." ".$LASTNAME;
      $_SESSION['log']=1;
      $_SESSION['TITLE']=$TITLE;
      $_SESSION['PHONE']=$PhoneNumber;
      $_SESSION['dep_id']=$dep_id;
      $date=date('d-M-Y ss');
      $_SESSION['rand']=rand(1000,10000);

     

     header('location: index');
    }
}
?>
	
	<!-- end wrapper -->
</body>