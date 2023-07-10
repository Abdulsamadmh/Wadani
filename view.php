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

?>	<
	<div class="page-wrapper">
			<div class="page-content">
			  	<div class="col-12 ">
						<div class="card">
							<div class="card-body ">
							
                                <h5>Folders</h5>
								<div class="row mt-3">
									<div class="col-12 col-lg-4">
										<div class="card shadow-none border radius-15">
											<div class="card-body">
												<div class="d-flex align-items-center">
													<div class="font-30 text-primary"><i class='bx bxs-folder'></i>
													</div>
													<div class="user-groups ms-auto">
														<img src="assets/images/avatars/avatar-1.png" width="35" height="35" class="rounded-circle" alt="" />
														<img src="assets/images/avatars/avatar-2.png" width="35" height="35" class="rounded-circle" alt="" />
													</div>
													<div class="user-plus">+</div>
												</div>
												<h6 class="mb-0 text-primary">Total Recieved</h6>
												<small>15 files</small>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-4">
										<div class="card shadow-none border radius-15">
											<div class="card-body">
												<div class="d-flex align-items-center">
													<div class="font-30 text-primary"><i class='bx bxs-folder'></i>
													</div>
													<div class="user-groups ms-auto">
														<img src="assets/images/avatars/avatar-4.png" width="35" height="35" class="rounded-circle" alt="" />
													</div>
												</div>
												<h6 class="mb-0 text-primary">Invalid</h6>
												<small>345 files</small>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-4">
										<div class="card shadow-none border radius-15">
											<div class="card-body">
												<div class="d-flex align-items-center">
													<div class="font-30 text-primary"><i class='bx bxs-folder'></i>
													</div>
													<div class="user-groups ms-auto">
														<img src="assets/images/avatars/avatar-7.png" width="35" height="35" class="rounded-circle" alt="" />
														<img src="assets/images/avatars/avatar-8.png" width="35" height="35" class="rounded-circle" alt="" />
													</div>
												</div>
												<h6 class="mb-0 text-primary">Disbuted</h6>
												<small>143 files</small>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-12 col-lg-4">
										<div class="card shadow-none border radius-15">
											<div class="card-body">
												<div class="d-flex align-items-center">
													<div class="fm-icon-box radius-15 bg-primary text-white"><i class='lni lni-google-drive'></i>
													</div>
													<div class="ms-auto font-24"><i class='bx bx-dots-horizontal-rounded'></i>
													</div>
												</div>
												<h5 class="mt-3 mb-0">Google Drive</h5>
												<p class="mb-1 mt-4"><span>45.5 GB</span>  <span class="float-end">50 GB</span>
												</p>
												<div class="progress" style="height: 7px;">
													<div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-4">
										<div class="card shadow-none border radius-15">
											<div class="card-body">
												<div class="d-flex align-items-center">
													<div class="fm-icon-box radius-15 bg-danger text-white"><i class='lni lni-dropbox-original'></i>
													</div>
													<div class="ms-auto font-24"><i class='bx bx-dots-horizontal-rounded'></i>
													</div>
												</div>
												<h5 class="mt-3 mb-0">Dropbox</h5>
												<p class="mb-1 mt-4"><span>1,2 GB</span>  <span class="float-end">3 GB</span>
												</p>
												<div class="progress" style="height: 7px;">
													<div class="progress-bar bg-danger" role="progressbar" style="width: 45%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-4">
										<div class="card shadow-none border radius-15">
											<div class="card-body">
												<div class="d-flex align-items-center">
													<div class="fm-icon-box radius-15 bg-warning text-dark"><i class='bx bxs-door-open'></i>
													</div>
													<div class="ms-auto font-24"><i class='bx bx-dots-horizontal-rounded'></i>
													</div>
												</div>
												<h5 class="mt-3 mb-0">OneDrive</h5>
												<p class="mb-1 mt-4"><span>2,5 GB</span>  <span class="float-end">3 GB</span>
												</p>
												<div class="progress" style="height: 7px;">
													<div class="progress-bar bg-warning" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--end row-->
								
								<!--end row-->
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-0">Recent Files</h5>
									</div>
									<div class="ms-auto"><a href="javascript:;" class="btn btn-sm btn-outline-secondary">View all</a>
									</div>
								</div>
								<div class="table-responsive mt-3">
									<table class="table table-striped table-hover table-sm mb-0">
										<thead>
											<tr>
												<th>Name <i class='bx bx-up-arrow-alt ms-2'></i>
												</th>
												<th>Members</th>
												<th>Last Modified</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file-pdf me-2 font-24 text-danger'></i>
														</div>
														<div class="font-weight-bold text-danger">Competitor Analysis Template</div>
													</div>
												</td>
												<td>Only you</td>
												<td>Sep 3, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file me-2 font-24 text-primary'></i>
														</div>
														<div class="font-weight-bold text-primary">How to Create a Case Study</div>
													</div>
												</td>
												<td>3 members</td>
												<td>Jun 12, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file me-2 font-24 text-primary'></i>
														</div>
														<div class="font-weight-bold text-primary">Landing Page Structure</div>
													</div>
												</td>
												<td>10 members</td>
												<td>Jul 17, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file-pdf me-2 font-24 text-danger'></i>
														</div>
														<div class="font-weight-bold text-danger">Meeting Report</div>
													</div>
												</td>
												<td>5 members</td>
												<td>Aug 28, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file me-2 font-24 text-primary'></i>
														</div>
														<div class="font-weight-bold text-primary">Project Documents</div>
													</div>
												</td>
												<td>Only you</td>
												<td>Aug 17, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file-doc me-2 font-24 text-success'></i>
														</div>
														<div class="font-weight-bold text-success">Review Checklist Template</div>
													</div>
												</td>
												<td>7 members</td>
												<td>Sep 8, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file me-2 font-24 text-primary'></i>
														</div>
														<div class="font-weight-bold text-primary">How to Create a Case Study</div>
													</div>
												</td>
												<td>3 members</td>
												<td>Jun 12, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file me-2 font-24 text-primary'></i>
														</div>
														<div class="font-weight-bold text-primary">Landing Page Structure</div>
													</div>
												</td>
												<td>10 members</td>
												<td>Jul 17, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div><i class='bx bxs-file-doc me-2 font-24 text-success'></i>
														</div>
														<div class="font-weight-bold text-success">Review Checklist Template</div>
													</div>
												</td>
												<td>7 members</td>
												<td>Sep 8, 2019</td>
												<td><i class='bx bx-dots-horizontal-rounded font-24'></i>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>

						<?php
include_once('./includes/footer.php')

?>