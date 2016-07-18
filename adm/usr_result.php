<?php
include ('../specSql/db_connection.php');
//$sql = "SELECT uid,name,email,tel,mobile,address,cr,up,status,crIP,upIP
//		  FROM usr";
//echo var_dump($where)."-----------";
//$result = $conn->query($sql.$where);
$result = $conn->query("SELECT COUNT(*) FROM usr".(empty($where)?'':$where));
/******************************************************************/
// 分頁程式
$total = $result->fetch_row();
//echo "num:".$total[0]." ";
$pageNo = (empty($_POST['page'])) ? 1 : $_POST['page'];
$pageSplit = 5;
$pageTotal = ceil($total[0] / $pageSplit);
$pageStart = ($pageNo * $pageSplit) - $pageSplit;
$limit = " LIMIT " . $pageStart .", ". $pageSplit." ";
$sql = "SELECT uid,name,email,tel,mobile,address,cr,up,status,crIP,upIP
					  FROM usr";
$result = $conn->query($sql.(empty($where)?'':$where).$limit);
/******************************************************************/
echo $sql.(empty($where)?'':$where).$limit;
if ($result) {
	if ($result->num_rows > 0) {?>
					<table id="myTable" class='tablesorter table table-bordered table-hover'>
						<!-- <thead><tr><th>帳號<button id='oUid' class="o" name="ob" value="1"></th><th>電子郵件信箱<button id='oEmail' class="o" name="ob" value="2"></th><th>電話</th><th>手機</th><th>地址</th><th>註冊時間<button id='oCr' class="o" name="ob" value="3"></button></th><th>最後更新時間<button id='oUp' class="o" name="ob" value="4"></button></th><th>會員狀態</th><th>最後登入IP</th><th></th></tr></thead><tbody> -->
						<thead><tr><th>帳號</th><th>電子郵件信箱</th><th>電話</th><th>手機</th><th>地址</th><th>註冊時間</th><th>最後更新時間</th><th>會員狀態</th><th>最後登入IP</th><th></th></tr></thead><tbody><?php
						while($row = $result->fetch_assoc()) {?>
							<tr><td><?php echo $row["name"]?></td><td><?php echo $row["email"]?></td><td><?php echo empty($row["tel"])?"無":$row["tel"]?></td><td><?php echo empty($row["mobile"])?"無":$row["mobile"]?></td><td><?php echo empty($row["address"])?"無":$row["address"]?></td><td><?php echo $row["cr"]?></td><td><?php echo $row["up"]?></td><td><?php echo ($row["status"]==1)?"上線會員":"禁用會員"?></td><td><?php echo $row["crIP"]?></td>
							<td><div class=btn-group role=group><input type="hidden" name="mn" value="<?php echo $row['name']?>"/><input type="hidden" name="me" value="<?php echo $row['email']?>"/>
							<button class="btn btn-primary v" name="v" value="<?php echo $row['uid']?>">查看</button>
							<?php if ($row["status"]==1) {?><button class="btn btn-warning da" value="<?php echo $row['uid']?>">停用</button><?php } else{?><button class="btn btn-info da" value="<?php echo $row['uid']?>">啟用</button><button class="btn btn-danger d" name="d" value="<?php echo $row['uid']?>">刪除</button><?php }?></div></td></tr><?php 
	 					}?>
	 				</tbody></table>
					<!-- pager -->
					<nav><ul class="pager"><?php if($pageNo > 1) {?><li><a href='#' data-where='<?php echo $where?>'>第一頁</a></li><?php } if($pageNo > 1) {?><li><a href='usr_result.php?page='($pageNo - 1)' data-page='<?php echo $pageNo-1?>' data-where='<?php echo $where?>'> 上一頁</a></li><?php } if($pageNo != $pageTotal) {?><li><a href='#' data-page='<?php echo $pageNo+1?>' data-where='<?php echo $where?>'> 下一頁</a></li><?php } if($pageNo != $pageTotal) {?><li><a href='#' data-where='<?php echo $where?>'> 最後一頁</a></li><?php }?></ul></nav>
	 				<!-- pager --><?php 
		  		} else {?>
	 			<p>無查詢結果,<a href='usr.php'>點我回上一頁</a></p><?php
	 			} ?><?php 
			} else {
				echo "Database Error";
			}?>