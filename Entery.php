	<?php
    session_start();
if(!$_SESSION["Username"])
{
	header("Location:login.php");
}
include_once('./includes/header.php')

?>


<div class="wrapper">
		<?php
include_once('./includes/nav.php')

?>	
	<div class="page-wrapper">
			<div class="page-content">
			 	<div class="card border-top border-0 border-4 border-danger">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-danger"></i>
									</div>
									<h5 class="mb-0 text-danger">Data Entery Form</h5>
                                    <?php
                                    
if(@$_POST)
                                {
                                    echo "Update";
require('./Includes/Connection.php');
                                 $id = $_GET['id'];
                                $date = date("Y-m-d");
                             
                                $partyone = $_POST["partone"];
                                $partytwo = $_POST["parttwo"];
                                $partythree = $_POST["partthree"];
                                $Tpapers = $_POST["papers"];
                                $invalid =$_POST["invalid"];
                                $disbuted = $_POST["disbuted"];
                                $status=2;

                            $stmt2=$conn->prepare("UPDATE rms SET WADDANI=?, KULMIYE=?, UCID=?,T_TOTAL=?,T_INVALID=?, T_DISPUTED=?,STATUS=? WHERE id=?");     
                                 $stmt2->bind_param("ssssssss", $partyone,$partytwo,$partythree,$Tpapers,$invalid,$disbuted,$status,$id);
       if($stmt2->execute()) 
       {
     ?>
<script>
    window.location = 'rms.php';
</script>
     <?php
       }
       else
       {
        echo "Not Done";
       }
                                }
                                

?>
								</div>
								<hr>
                                <?php
                                if (isset($_GET['id'])) {
                                   $id = $_GET['id'];
 require('./Includes/Connection.php');
$user=$_SESSION['Username'];
        $stmt1=$conn->prepare("SELECT B.DATE,A.ID,A.REGION,A.DESTRICT,A.ps,A.psN,A.VOTERS,B.ID,B.STATUS,B.WADDANI,B.UCID,B.KULMIYE,B.T_TOTAL,B.T_INVALID,B.T_DISPUTED,users.FIRSTNAME,users.MIDDLENAME,users.LASTNAME,users.phoneNumber,B.ASSIGNED FROM ps AS A JOIN rms AS B ON B.psN=A.ID JOIN users ON B.ASSIGNED=users.ID WHERE B.ID = ? ");
         $stmt1->bind_param("s", $id);
        $stmt1->execute();
        $result = $stmt1->get_result();

while($row = $result->fetch_array(MYSQLI_ASSOC)){

?>
								<form class="row g-3" method="POST" >
									<div class="col-md-6">
										<label for="inputLastName1" class="form-label">Gobolka</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
											<input type="text" value="<?php echo $row['REGION']?>" disabled class="form-control border-start-0" id="inputLastName1" placeholder="First Name" />
										</div>
									</div>
									<div class="col-md-6">
										<label for="inputLastName2" class="form-label">Degmada</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
											<input type="text" disabled value="<?php echo $row['DESTRICT']?>" class="form-control border-start-0" id="inputLastName2" placeholder="Last Name" />
										</div>
									</div>
									<div class="col-6">
										<label for="inputPhoneNo" class="form-label">Number-ka Goobta</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-microphone' ></i></span>
											<input type="text" name="psn" disabled value="<?php echo $row['psN']?>" class="form-control border-start-0" id="inputPhoneNo" placeholder="Phone No" />
										</div>
									</div>
									<div class="col-6">
										<label for="inputEmailAddress" class="form-label">Goobta</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
											<input type="text" disabled value="<?php echo $row['ps']?>" class="form-control border-start-0" id="inputEmailAddress" placeholder="Email Address" />
										</div>
									</div>
									<div class="col-6">
										<label for="inputChoosePassword" class="form-label">Tirada Codbixiyayaasha</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock-open' ></i></span>
											<input type="text" disabled value="<?php echo $row['VOTERS']?>" class="form-control border-start-0" id="inputChoosePassword" placeholder="Choose Password" />
										</div>
									</div>
									<div class="col-6">
										<label for="inputConfirmPassword" class="form-label">Cida Loo qoondeeyey</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
											<input type="text"  disabled value="<?php echo $row['FIRSTNAME']?>" class="form-control border-start-0" id="inputConfirmPassword" placeholder="Confirm Password" />
										</div>
									</div>
									<div class="col-6">
										<label for="inputChoosePassword" class="form-label">Tirada Codka goobta</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock-open' ></i></span>
											<input type="text" name="papers" class="form-control border-start-0" id="inputChoosePassword" placeholder="Codka goobta" />
										</div>
									</div>
									<div class="col-6">
										<label for="inputConfirmPassword" class="form-label">Tirada codadka xumaaday</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
											<input type="text" name="invalid"  class="form-control border-start-0" id="inputConfirmPassword" placeholder="Tirada codka xumaaday" />
										</div>
									</div>
                                    <div class="col-6">
										<label for="inputConfirmPassword" class="form-label">Tirada codadka lagu muransan yahay</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
											<input type="text" name="disbuted"  class="form-control border-start-0" id="inputConfirmPassword" placeholder="Tirada codadka lagu muransan yahay" />
										</div>
									</div>
                                     <div class="col-6">
										<label for="inputConfirmPassword" class="form-label">Party One</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
											<input type="text" name="partone"  class="form-control border-start-0" id="inputConfirmPassword" placeholder="Part One" />
										</div>
									</div>
                                     <div class="col-6">
										<label for="inputConfirmPassword" class="form-label">Part Two</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
											<input type="text" name="parttwo"  class="form-control border-start-0" id="inputConfirmPassword" placeholder="Part Two" />
										</div>
									</div>
                                     <div class="col-6">
										<label for="inputConfirmPassword" class="form-label">Part Three</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock' ></i></span>
											<input type="text"  name="partthree"  class="form-control border-start-0" id="inputConfirmPassword" placeholder="Part three" />
										</div>
									</div>
									<div class="col-12">
										<button type="submit" name="btnupdate" class="btn btn-danger px-5">submit</button>
									</div>
								</form>
                                <?php }}
                                
        
                                
                                
                                ?>
							</div>
						</div>
			</div>
		</div>

						<?php
include_once('./includes/footer.php')

?>