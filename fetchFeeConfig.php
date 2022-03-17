<?php
  
  include("database/db_conection.php");//make connection here
  $request=$_POST['request'];
  $query="select * from feesconfig where class='$request'";
  $output=mysqli_query($dbcon,$query);
//echo '<table border="1"'

echo '<tr>
<th>#</th>												
<th>Academic</th>
<th>Class</th>
<th>Gender</th>
<th>Fees Name</th>
<th>Amount</th>
<th>Due Date</th>
<th>Status</th>
<th>Actions</th>
</tr>';
 
while($row = mysqli_fetch_assoc($output))
{    
    echo "<tr>";
    echo '<td>' .$row['id'] . '</td>';
    echo '<td>'.$row['academic'].' </td>';
    echo '<td>'.$row['class'].' </td>';
    echo '<td>'.$row['gender'].' </td>';
    echo '<td>'.$row['feesname'].' </td>';
    echo '<td>'.$row['amount'].' </td>';
    echo '<td>'.$row['duedate'].' </td>';
    echo '<td>'.$row['status'].' </td>';
    

echo '<td><a href="editFeesConfig.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a href="javascript:deleteRecord_8(' . $row['id'] . ');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
													echo "</tr>";
													}
													
													?>															
															<script>
															function deleteRecord_8(RecordId)
															{
																if (confirm('Confirm delete')) {
																	window.location.href = 'deleteFeesConfig.php?id='+RecordId;
																}
															}
													</script>
														
                                                        </div>
