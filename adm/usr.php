<?php include('aHeader.php');include ('../specSql/db_connection.php')?>
<?php 
if (isset($_POST['u'])) {
//TODO 編輯
}
if (isset($_POST['d'])) {
	include ('../specSql/db_connection.php');
	$stmt = $conn->prepare("UPDATE usr SET status=CASE WHEN status=0 THEN 1 ELSE 0 END WHERE uid=?");
	$stmt->bind_param("s", $_POST['d']);
	$stmt->execute();
}
$sql = "SELECT uid,name,email,tel,mobile,address,cr,up,status
         FROM usr";
$where = " WHERE status=1";


?>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row"><div class="col-md-12">
			<form action="usr.php" method="post">
				<div class="panel panel-info"><div class=panel-heading><h3 class=panel-title>會員管理</h3></div><div class=panel-body>
					<div class=col-sm-4><div class=form-group><label for=f>帳號</label><input class=form-control id=f></div></div>
					<div class=col-sm-4><div class=form-group><label for=f>信箱</label><input class=form-control id=f></div></div>
					<div class=col-sm-4><div class=form-group><label for="from">註冊時間:從</label><input class=form-control type="text" id="from" name="from">
					<label for="to">註冊時間:到</label><input class=form-control type="text" id="to" name="to"></div></div>
				</div>
				<div class=panel-footer>
					<button type=submit class="btn btn-default">查詢</button>
				</div></div>
			<?php 
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {?>
				<table class='table table-bordered table-hover'>
					<tr><th>帳號<button id='oUid'></th><th>電子郵件信箱<button id='oEmail'></th><th>電話</th><th>手機</th><th>地址</th><th>註冊時間<button id='oCr'></button></th><th>最後更新時間<button id='oUp'></button></th><th>會員狀態</th><th></th></tr><?php 
					while($row = $result->fetch_assoc()) {?>
					<tr><td><?php echo $row["name"]?></td><td><?php echo $row["email"]?></td><td><?php echo empty($row["tel"])?"無":$row["tel"]?></td><td><?php echo empty($row["mobile"])?"無":$row["mobile"]?></td><td><?php echo empty($row["address"])?"無":$row["address"]?></td><td><?php echo $row["cr"]?></td><td><?php echo $row["up"]?></td><td><?php echo ($row["status"]==1)?"上線會員":"禁用會員"?></td>
					<td><div class=btn-group role=group>
					<button class="btn btn-primary" name="u" value="<?php echo $row['uid']?>">編輯</button>
					<button class="btn btn-danger" name="d" value="<?php echo $row['uid']?>">停用</button></div></td></tr><?php 
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
<script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    $( "#oUid" ).button({
        icons: {
      	primary: "ui-icon-triangle-1-s",
        },
        text: false
      })
    $( "#oEmail" ).button({
        icons: {
      	primary: "ui-icon-triangle-1-s",
        },
        text: false
      })
    $( "#oCr" ).button({
        icons: {
      	primary: "ui-icon-triangle-1-s",
        },
        text: false
      })
    $( "#oUp" ).button({
        icons: {
      	primary: "ui-icon-triangle-1-s",
        },
        text: false
      })

  });
 </script>