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
//query
// if (isset($_POST['e'])) {
// 	echo $_POST['e'];
// }

$where="";
//ip
//https://portswigger.net/burp/proxy.html
//http://php.net/manual/en/reserved.variables.server.php
//http://devco.re/blog/2014/06/19/client-ip-detection/


?>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row"><div class="col-md-12">
			<form action="usr.php" method="post">
				<div class="panel panel-info"><div class=panel-heading><h3 class=panel-title>會員管理</h3></div><div class=panel-body>
					<?php if (!empty($_POST['s'])) {$where.=" WHERE status=".trim($_POST['s']);}?>
					<div class=col-sm-3><div class=form-group><label for=s>會員狀態</label><select class=form-control id="s"><option value="1">上線會員</option><option value="0">禁用會員</option></select></div></div>
					<?php if (!empty($_POST['n'])) {$where.=" AND name LIKE '%".trim($_POST['n'])."%'";}?>
					<?php //echo $_POST['n']?>
					<div class=col-sm-3><div class=form-group><label for=n>帳號</label><input class=form-control name="n" id=n></div></div>
					<?php if (!empty($_POST['e'])) {$where.=" AND email LIKE '%".trim($_POST['e'])."%'";}?>
					<div class=col-sm-3><div class=form-group><label for=e>信箱</label><input class=form-control name="e" id=e></div></div>
					<?php $flag=true;?>
					<?php if(!empty($_POST['from']) && !empty($_POST['to'])) {$where.=" AND (cr >'".trim($_POST['from'])."' AND cr<'".trim($_POST['to'])."')"; $flag=false;}?>
					<?php if($flag) {
							if(!empty($_POST['from'])) {$where.=" AND cr >'".trim($_POST['from'])."'";}
							if(!empty($_POST['to'])) {$where.=" AND cr <'".trim($_POST['to'])."'";}
						  }?>
					<div class=col-sm-3><div class=form-group><label for="from">註冊時間:從</label><input class=form-control type="text" id="from" name="from">
					<label for="to">註冊時間:到</label><input class=form-control type="text" id="to" name="to"></div></div>
				</div>
				<div class=panel-footer>
					<button type=submit class="btn btn-default">查詢</button>
				</div></div>
			<?php
			$sql = "SELECT uid,name,email,tel,mobile,address,cr,up,status
					  FROM usr";
			$result = $conn->query($sql.$where);
			//echo $sql.$where;
			if ($result) {
				if ($result->num_rows > 0) {?>
					<table class='table table-bordered table-hover'>
						<tr><th>帳號<button id='oUid'></th><th>電子郵件信箱<button id='oEmail'></th><th>電話</th><th>手機</th><th>地址</th><th>註冊時間<button id='oCr'></button></th><th>最後更新時間<button id='oUp'></button></th><th>會員狀態</th><th></th></tr><?php 
						while($row = $result->fetch_assoc()) {?>
							<tr><td><?php echo $row["name"]?></td><td><?php echo $row["email"]?></td><td><?php echo empty($row["tel"])?"無":$row["tel"]?></td><td><?php echo empty($row["mobile"])?"無":$row["mobile"]?></td><td><?php echo empty($row["address"])?"無":$row["address"]?></td><td><?php echo $row["cr"]?></td><td><?php echo $row["up"]?></td><td><?php echo ($row["status"]==1)?"上線會員":"禁用會員"?></td>
							<td><div class=btn-group role=group>
							<button class="btn btn-primary" name="u" value="<?php echo $row['uid']?>">查看</button>
							<?php if ($row["status"]==1) {?><button class="btn btn-danger" name="d" value="<?php echo $row['uid']?>">停用</button><?php } else{?><button class="btn btn-info" name="d" value="<?php echo $row['uid']?>">啟用</button><?php }?></div></td></tr><?php 
	 					}?>
	 				</table><?php 
	 			} else {?>
	 			<p>目前尚無會員</p><?php
	 			} ?><?php 
			} else {
				echo "<p>無相關查詢,<a href='usr.php'>點我回上一頁</a></p>";
			}?>
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
      dateFormat: 'yy-mm-dd',
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      dateFormat: 'yy-mm-dd',
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    $( "#oUid,#oEmail,#oCr,#oUp" ).button({
        icons: {
      	primary: "ui-icon-triangle-1-s",
        },
        text: false
      })
//     $('#s').change(function() { 
//         $(this).parents('form').submit(); 
//      });

  });
 </script>