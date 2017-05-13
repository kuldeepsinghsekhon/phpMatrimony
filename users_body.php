<?php 


$error="";

?>
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           
							 <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Add User
                            </button>					
                        </h1>
						<?php include ('add_user_modal.php');?>
						
						<div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Users Table</strong>
                                </div>
                                <thead>
                                    <tr>
									<th>Id</th>
                                        <th>Name</th>
										<th>email</th>
										<th>image</th>
										<th>Actions</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php 
									$sql="select * from members";
									$result= mysqli_query($conn,$sql);
                                    
                                   while($row=mysqli_fetch_assoc($result))
	{
										$id=$row['id'];
                                        ?>			
                                        <tr class="warning">
										<td width="150"><?php echo $row['id']; ?></td> 
                                            <td width="150"><?php echo $row['first_name']; ?></td> 
                                            <td width="150"><?php echo $row['email']; ?></td>
                                            <td width="150" align="center"><img src="<?php echo $row['image1']; ?>" class="img-rounded" width="50" height="40"></td> 
                                            
                                            <td width="160">
                                                <a href="#delete_category<?php echo $id; ?>" role="button"  data-target = "#delete_user<?php echo $id;?>"?id=".'<?php echo $id;?>'."data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                                <a href="admin_edit_profile.php?id=<?php echo $id; ?>"  class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                                            </td>
<!-- product delete modal --> <?php include ('edit_user_modal.php');?>
                                   <?php include ('delete_user_modal.php');?>
                                    <!-- end delete modal -->
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

</div>
