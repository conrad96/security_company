<?php include("logo_header.php"); ?>
<?php if(isset($_GET['empid'])){?>
<?php $empid=$_GET['empid'];?>
<div>
<ul class="nav nav-tabs">
	<li class="active"><a href=<?php echo "employer.php?empid=$empid";?>>Dashboard</a></li>
	<li><a href=<?php echo "scan.php?empid=$empid";?>>Search</a></li>
	<li><a href=<?php echo "create.php?empid=$empid";?>>Register Employee</a></li>
	<li><a href="../index.php">Logout</a></li>
</ul>
</div>
<?php
$str="SELECT * FROM employer WHERE emp_ID='$empid'";
 $emp=$db->query($str);
$emp_f=$db->getrow($emp);
if($emp_f){
	$path=$emp_f['url'];
 ?>
<div>
<h4 class="well"><img src=<?php echo "$path"; ?> width='100' height='95' alt='Pic' /> &nbsp; &nbsp; &nbsp;<?php echo $emp_f['emp_uname']?></h4>
</div>
<!-- section displays the employers details-->
<?php
$company="SELECT * FROM company WHERE company_ID={$emp_f['company_ID']}";
$company_q=$db->query($company);
$company_f=$db->getrow($company_q);
?>
<div>
<h4>Employers Details:</h4>
<table class="table">
	<tr><td><b>Employer's Names:</b></td><td><?php echo $emp_f['emp_fname']."&nbsp;&nbsp;".$emp_f['emp_lname'];?></td><td><a href=<?php echo "edit.php?empid=$empid&emp=name";?>>Edit</a></td></tr>
	<tr><td><b>Employer's Rank:</b></td><td><?php echo $emp_f['rank'];?></td><td><a href=<?php echo "edit.php?empid=$empid&rank=rank";?>>Edit</a></td></tr>
	<tr><td><b>Employer's Company:</b></td><td><b><?php echo $company_f['company_name'];?></b></td><td>&nbsp;</td></tr>
	<tr><td><b>Company Description:</b></td><td><?php echo $company_f['company_description'];?></td><td><a href=<?php echo "edit.php?empid=$empid&description=description&compid={$company_f['company_ID']}";?>>Edit</a></td></tr>
</table>
</div>
</body>
<?php } }?>
</html>
