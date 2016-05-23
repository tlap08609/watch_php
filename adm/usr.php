<?php include('aHeader.php');include ('../specSql/db_connection.php');?>
<?php 



?>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row"><div class="col-lg-12">
			<form action="usr.php" method="POST">
			<div class="panel panel-info"><div class=panel-heading><h3 class=panel-title>會員管理</h3></div><div class=panel-body>
			</div>
			<?php 
			$sql = "SELECT uid,name,email,tel,mobile,address,cr,up
        			FROM usr";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {?>
				<table class='table table-bordered table-hover'>
					<tr><th>名字</th><th>電子郵件信箱</th><th>電話</th><th>手機</th><th>地址</th><th>註冊時間</th><th>最後更新時間</th><th></th></tr><?php 
					while($row = $result->fetch_assoc()) {?>
					<tr><td><?php echo $row["name"]?></td><td><?php echo $row["email"]?></td><td><?php echo $row["tel"]?></td><td><?php echo $row["mobile"]?></td><td><?php echo $row["address"]?></td><td><?php $row["cr"]?></td><td><?php echo $row["up"]?></td>
					<td><div class=btn-group role=group>
					<button class="btn btn-primary" name="crud" value="<?php echo $row['uid']?>">編輯</button>
					<button class="btn btn-danger" name="crud" value=""<?php echo $row['uid']?>">停用</button></div></td><?php 
 					}?>
 				</table><?php 
 			} else {?>
 			<p>目前尚無會員</p><?php
 			} ?>
 			</div>
			</form>
			</div>
		</div>
	</div>
</div>


			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>	



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php include('aFooter.php');?>