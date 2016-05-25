<?php include('aHeader.php');?>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1>管理者xxx，你好！</h1>
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle
					Menu</a>

<?php
include ('../specSql/db_connection.php');
$sql = "SELECT uid,email FROM usr";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>uid</th><th>email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["uid"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
			</div>
		</div>
	</div>
</div>
<?php include('aFooter.php');?>