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
			  <h6 class="mb-0 text-uppercase">Assigned Polling Stations for <?php echo $_SESSION["Name"] ?></h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Region</th>
										<th>PSN</th>
										<th>Polling Station</th>
										
                                        <th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
							
									<?php
 require('./Includes/Connection.php');
$user=$_SESSION['Username'];
        $stmt1=$conn->prepare("SELECT B.DATE,A.ID,A.REGION,A.DESTRICT,A.ps,A.psN,A.VOTERS,B.STATUS,B.WADDANI,B.UCID,B.KULMIYE,B.T_TOTAL,B.T_INVALID,B.T_DISPUTED,users.FIRSTNAME,users.MIDDLENAME,users.LASTNAME,users.phoneNumber,B.ASSIGNED FROM ps AS A JOIN rms AS B ON B.psN=A.ID JOIN users ON B.ASSIGNED=users.ID WHERE users.PhoneNumber = $user ");
        $stmt1->execute();
        $result = $stmt1->get_result();

while($row = $result->fetch_array(MYSQLI_ASSOC)){

?>
								
									<tr>
										<td><?php echo $row['REGION']; ?></td>
										<td><?php echo $row['psN']; ?></td>
										<td><?php echo $row["ps"]; ?></td>
                                        
										<td>

										 <?php
              if ($row['STATUS']==1){
               echo"<span class='badge bg-gradient-blooker text-white shadow-sm w-100'>"."Started"."</span>";
              }elseif($row['STATUS']==2){
                echo"<span class='badge bg-gradient-quepal text-white shadow-sm w-100'>"."Finished"."</span>";
              }elseif($row['STATUS']==3){
				 echo"<span class='badge bg-gradient-bloody text-white shadow-sm w-100'>"."Cancelled"."</span>";
			  }
			  else
			  {
				echo"<span class='badge bg-gradient-bloody text-white shadow-sm w-100'>"."Not Started"."</span>";
			  }
			  ?>
										</td>
										<td>
                                            <button type="button" class="btn btn-outline-primary px-5">Edit</button>
                                        </td>
										
									</tr>
									
									<?php }?>

								</tbody>
								<tfoot>
									<tr>
										<th>Region</th>
										<th>PSN</th>
										<th>Polling Station</th>
										
                                        <th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						
						</div>
					</div>
				</div>
			</div>
		</div>

						<?php
include_once('./includes/footer.php')

?>