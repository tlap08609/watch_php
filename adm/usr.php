<?php include('aHeader.php');?>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
	<h1>會員管理<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle
	Menu</a></h1>				
		<div class="row"><div class="col-lg-12">
<?php
include ('../specSql/db_connection.php');
$sql = "SELECT uid,email FROM usr";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    "<table class='table table-bordered table-hover'><tr><th>uid</th><th>email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["uid"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "目前尚無會員";
}
?>
			</div>
		</div>
	</div>
</div>
<?php include('aFooter.php');?>