<?php include('aHeader.php');include ('../specSql/db_connection.php')?>
<?php 
if (isset($_POST['v'])) {
//TODO 編輯
}
if (isset($_POST['d'])) {
//TODO 刪除
}
if (isset($_POST['da'])) {
	include ('../specSql/db_connection.php');
	$stmt = $conn->prepare("UPDATE usr SET status=CASE WHEN status=0 THEN 1 ELSE 0 END WHERE uid=?");
	$stmt->bind_param("s", $_POST['da']);
	$stmt->execute();
}
//ip
//https://portswigger.net/burp/proxy.html
//http://php.net/manual/en/reserved.variables.server.php
//http://devco.re/blog/2014/06/19/client-ip-detection/

//http://rettamkrad.blogspot.tw/2013/04/ajaxandhistoryapi.html
//http://140.115.236.72/demo-personal/xd702/web/C1300152/front/pageLink(jquery)_test.html#page=2
//time picker
//http://trentrichardson.com/examples/timepicker/
?>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row"><div class="col-md-12">
			<form action="usr.php" method="post">
				<div class="panel panel-info"><div class=panel-heading><h3 class=panel-title>會員管理</h3></div><div class=panel-body><div class="row">
					<?php $where=""; if (isset($_POST['s'])) {if (trim($_POST['s']) == 2){$where.=" WHERE status>=0";}else {$where.=" WHERE status=".trim($_POST['s']);}}?>
					<div class=col-md-4><div class=form-group><label for=s>會員狀態</label><select class=form-control id="s" name="s"><option value="2">全部</option><option value="1">上線會員</option><option value="0">禁用會員</option></select></div></div>
					<?php if (!empty($_POST['n'])) {$where.=" AND name LIKE '%".trim($_POST['n'])."%'";}?>
					<div class=col-md-4><div class=form-group><label for=n>帳號</label><input class=form-control name="n" id=n></div></div>
					<?php if (!empty($_POST['e'])) {$where.=" AND email LIKE '%".trim($_POST['e'])."%'";}?>
					<div class=col-md-4><div class=form-group><label for=e>信箱</label><input class=form-control name="e" id=e></div></div></div>
					<?php $crFlag=true;?>
					<?php if(!empty($_POST['crFrom']) && !empty($_POST['crTo'])) {$where.=" AND (cr >'".trim($_POST['crFrom'])."' AND cr<'".trim($_POST['crTo'])."')"; $crFlag=false;}?>
					<?php if($crFlag) {
							if(!empty($_POST['crFrom'])) {$where.=" AND cr >'".trim($_POST['crFrom'])."'";}
							if(!empty($_POST['crTo'])) {$where.=" AND cr <'".trim($_POST['crTo'])."'";}
						  }?>
					<?php $upFlag=true;?>
					<?php if(!empty($_POST['upFrom']) && !empty($_POST['upTo'])) {$where.=" AND (up >'".trim($_POST['upFrom'])."' AND up<'".trim($_POST['upTo'])."')"; $upFlag=false;}?>
					<?php if($upFlag) {
							if(!empty($_POST['upFrom'])) {$where.=" AND up >'".trim($_POST['upFrom'])."'";}
							if(!empty($_POST['upTo'])) {$where.=" AND up <'".trim($_POST['upTo'])."'";}
						  }?>
					<div class="row"><div class=col-md-3><div class=form-group><label for="crFrom">註冊時間:從</label><input class=form-control type="text" id="crFrom" name="crFrom"></div></div>
					<div class=col-md-3><label for="crTo">註冊時間:到</label><input class=form-control type="text" id="crTo" name="crTo"></div><div class=col-md-3><div class=form-group><label for="upFrom">最後更新時間:從</label><input class=form-control type="text" id="upFrom" name="upFrom"></div></div>
					<div class=col-md-3><label for="upTo">最後更新時間:到</label><input class=form-control type="text" id="upTo" name="upTo"></div></div>
				</div>
				<div class=panel-footer>
					<button type=submit class="btn btn-default">查詢</button>
				</div></div>
			<?php
			$orderBy = "";
			if (!empty($_POST["ob"])) {
				if (trim($_POST["ob"])==1) {
					$orderBy=" ORDER BY name DESC";
				}
				if (trim($_POST["ob"])==2) {
					$orderBy=" ORDER BY email DESC";
				}
				if (trim($_POST["ob"])==3) {
					$orderBy=" ORDER BY cr DESC";
				}
				if (trim($_POST["ob"])==4) {
					$orderBy=" ORDER BY up DESC";
				}			
			}
			$sql = "SELECT uid,name,email,tel,mobile,address,cr,up,status
					  FROM usr";
			$result = $conn->query($sql.$where);
			/******************************************************************/
			// 分頁程式
			$total = $result->num_rows;
			$pageNo = (empty($_GET['page'])) ? 1 : $_GET['page'];
			$pageSplit = 3;	
			$pageTotal = ceil($total / $pageSplit);
			$pageStart = ($pageNo * $pageSplit) - $pageSplit;
			$limit = " LIMIT " . $pageStart .", ". $pageSplit." ";
			$result = $conn->query($sql.$where.$orderBy.$limit);
			/******************************************************************/
			echo $sql.$where.$orderBy.$limit;
			if ($result) {
				if ($result->num_rows > 0) {?>
					<table class='table table-bordered table-hover'>
						<tr><th>帳號<button id='oUid' name="ob" value="1"></th><th>電子郵件信箱<button id='oEmail' name="ob" value="2"></th><th>電話</th><th>手機</th><th>地址</th><th>註冊時間<button id='oCr' name="ob" value="3"></button></th><th>最後更新時間<button id='oUp' name="ob" value="4"></button></th><th>會員狀態</th><th></th></tr><?php 
						while($row = $result->fetch_assoc()) {?>
							<tr><td><?php echo $row["name"]?></td><td><?php echo $row["email"]?></td><td><?php echo empty($row["tel"])?"無":$row["tel"]?></td><td><?php echo empty($row["mobile"])?"無":$row["mobile"]?></td><td><?php echo empty($row["address"])?"無":$row["address"]?></td><td><?php echo $row["cr"]?></td><td><?php echo $row["up"]?></td><td><?php echo ($row["status"]==1)?"上線會員":"禁用會員"?></td>
							<td><div class=btn-group role=group><input type="hidden" name="mn" value="<?php echo $row['name']?>"/><input type="hidden" name="me" value="<?php echo $row['email']?>"/>
							<button class="btn btn-primary v" name="v" value="<?php echo $row['uid']?>">查看</button>
							<?php if ($row["status"]==1) {?><button class="btn btn-warning" name="da" value="<?php echo $row['uid']?>">停用</button><?php } else{?><button class="btn btn-info" name="da" value="<?php echo $row['uid']?>">啟用</button><button class="btn btn-danger d" name="d" value="<?php echo $row['uid']?>">刪除</button><?php }?></div></td></tr><?php 
	 					}?>
	 				</table>
					<!-- pager -->
					<nav><ul class="pager"><?php if($pageNo > 1) {?><li><a href='usr.php?page=1' /><span aria-hidden="true">&larr;</span> 第一頁</a></li><?php } if($pageNo > 1) {?><li><a href='usr.php?page=<?php echo $pageNo-1?>' /> 上一頁</a></li><?php } if($pageNo != $pageTotal) {?><li><a href='usr.php?page=<?php echo $pageNo+1?>' /> 下一頁</a></li><?php } if($pageNo != $pageTotal) {?><li><a href='usr.php?page=<?php echo $pageTotal?>' /> 最後一頁</a></li><?php }?></ul></nav>
	 				<!-- pager --><?php 
		  		} else {?>
	 			<p>無查詢結果,<a href='usr.php'>點我回上一頁</a></p><?php
	 			} ?><?php 
			} else {
				echo "Database Error";
			}?>
 			</div>
			</form>
			</div>
		</div>
	</div>
</div>


			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>	



<!-- Modal -->
<div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document"><form action="usr.php" method="post">
	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"><div class=container-fluid>
<div class="row mar-bottom10">
	<div class="col-xs-2 col-sm-2"></div>
	<div class="col-xs-10 col-sm-10 text-danger"></div>
</div>
<div class="row mar-bottom10">
	<div class="col-xs-2 col-sm-2"><label>會員帳號</label></div>
	<div class="col-xs-10 col-sm-10"><input class=form-control name=e></div>
</div>
<div class="row mar-bottom10">
	<div class="col-xs-2 col-sm-2"><label>收件地址</label></div>
	<div class="col-xs-10 col-sm-10">
		<div class=input-group>
			<span class=input-group-btn><button class="btn bg-lightgray zip">郵遞區號</button></span>
			<input type=hidden name=zip><input class=form-control name=f>
		</div>
	</div>
</div>
<div class="row mar-bottom10">
	<div class="col-xs-2 col-sm-2"><label>電話</label></div>
	<div class="col-xs-10 col-sm-10"><input class=form-control name=h></div>
</div>
<div class="row mar-bottom10">
	<div class="col-xs-2 col-sm-2"><label>手機</label></div>
	<div class="col-xs-10 col-sm-10"><input class=form-control name=j></div>
</div>
</div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div></form>
  </div>
</div>




<?php include('aFooter.php');?>
<script>
  $(function() {
    $( "#crFrom" ).datepicker({
      dateFormat: 'yy-mm-dd',
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#crTo" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#crTo" ).datepicker({
      dateFormat: 'yy-mm-dd',
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#crFrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    $( "#upFrom" ).datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function( selectedDate ) {
          $( "#upTo" ).datepicker( "option", "minDate", selectedDate );
        }
      });
      $( "#upTo" ).datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function( selectedDate ) {
          $( "#upFrom" ).datepicker( "option", "maxDate", selectedDate );
        }
      });
    $( "#oUid,#oEmail,#oCr,#oUp" ).button({
        icons: {
      	primary: "ui-icon-circle-triangle-s",
        },
        text: false
      })
    $('.v').click(function(e){
		e.preventDefault();
		var modal = $('#m');
		var data = $(this).parent().parent().find($('input[name^=mn]')).val();
		modal.find(".modal-title").text("會員資料");
		modal.find('input[name=e]').val(data);
		modal.modal('show');
        
    })
    $('.d').click(function(e){
		e.preventDefault();
		var modal = $('#m');
		modal.find(".modal-title").text("刪除");
		modal.modal('show');
        
    })    
//     $('#s').change(function() { 
//         $(this).parents('form').submit(); 
//      });

  });
 </script>