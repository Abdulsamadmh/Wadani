	<?php
include_once('./includes/header.php')

?>


<div class="wrapper">
		<?php
include_once('./includes/nav.php')

?>	
	<div class="page-wrapper">
			<div class="page-content">
			 <div class="row">
					<div class="col-xl-7 mx-auto">
                        <?php
        require('Includes/Connection.php');
         $id=$_GET['id'];
        $stmt1=$conn->prepare("SELECT  B.ID,a.REGION,a.DiSTRICT,A.POLLING_CENTER_NO,B.PS_ID,A.POLLING_CENTER_NAME,A.VALID_VOTERS,B.WADDANI,B.KULMIYE,B.UCID,B.STATUS,PRP.RECEIVED,PRP.USED,PRP.CORUPTED,PRP.DISPUTED
        FROM PS AS A  JOIN pr_rms   AS B 
        ON B.PS_ID=A.ID
         JOIN users ON B.ASSIGNED_TO=users.ID 
         JOIN pr_polling_papers PRP
         on PRP.REF=B.ID WHERE B.ID=$id ");
        $stmt1->execute();
        $result = $stmt1->get_result();

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
       
          ?>

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

                            $stmt2=$conn->prepare("UPDATE pr_rms SET WADDANI=?, KULMIYE=?, UCID=?,T_TOTAL=?,T_INVALID=?, T_DISPUTED=?,STATUS=? WHERE id=?");     
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
						<h6 class="mb-0 text-uppercase">Polling Station Information</h6>
                        <hr/>
                        	 <div class="card radius-10 border-start border-0 border-3 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary"><?php echo $row['REGION']?></p>
									<h4 class="my-1 text-info"><?php echo $row['POLLING_CENTER_NAME']?></h4>
									<p class="mb-0 font-13"><?php echo $row['DiSTRICT']?>  <?php echo $row['POLLING_CENTER_NO']?></p>
                                 <div class="font-20 text-primary"> <i class="fadeIn animated bx bx-user-check"></i>Valid Voters <?php echo $row['VALID_VOTERS']?> </div>
								</div>
								<div class="widgets-icons-2  ms-auto">
                                    <?php $status=$row['STATUS']; if ($status==0){?><button class="btn btn-primary font-weight-bold btn-sm  float-right" >Start<i class="fas fa-play"></i></button><?php } ?> 
								
                                </div>
							</div>
						</div>
					 </div>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div>
									</div>
										<h6 class="mb-0 text-primary">Paper Information / Xogta Waraaqaa</h6>
								</div>
								<hr>
								<form class="row g-3" method="POST">
<div class="col-md-6">
<label for="inputFirstName" class="form-label">Received</label>
										<input type="text" name="papers" class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-6">
										<label for="inputLastName" class="form-label">Used</label>
										<input type="text"  name="" class="form-control" id="inputLastName">
									</div>
									<div class="col-md-6">
										<label for="inputEmail" class="form-label">Corrupted</label>
										<input type="email" class="form-control" id="inputEmail">
									</div>
									<div class="col-md-6">
										<label for="inputPassword" class="form-label">Disputed</label>
										<input type="password" class="form-control" id="inputPassword">
									</div>
									
<div class="card-title d-flex align-items-center">
									<div>
									</div>
								
                                    <h6 class="mb-0 text-primary">Parties Information / Xogta Xisbiyada</h6>
								</div>

										
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Waddani</label>
										<input type="email" class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-6">
										<label for="inputLastName" class="form-label">Kulmiye</label>
										<input type="password" class="form-control" id="inputLastName">
									</div>
									<div class="col-md-6">
										<label for="inputEmail" class="form-label">Ucid</label>
										<input type="email" class="form-control" id="inputEmail">
									</div>
									
									<div class="col-12">
									<?php $status=$row['STATUS']; if ($status==0){ ?> 	<button type="submit" class="btn btn-primary px-5">Save / Kaydi</button><?php } ?>
									</div>
								</form>
                                 <?php } ?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>

						<?php
include_once('./includes/footer.php')

?>