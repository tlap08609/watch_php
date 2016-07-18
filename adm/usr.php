<?php include('aHeader.php');?>
<?php 
if (isset($_POST['v'])) {
//TODO 編輯
}
if (isset($_POST['d'])) {
//TODO 刪除
}
if (isset($_POST['status'])) {
	include ('../specSql/db_connection.php');
	$stmt = $conn->prepare("UPDATE usr SET status=CASE WHEN status=0 THEN 1 ELSE 0 END WHERE uid=?");
	$stmt->bind_param("s", $_POST['status']);
	$stmt->execute();
}
?>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row"><div class="col-md-12">
			<form action="usr.php" method="post">	
				<div class="panel panel-info"><div class=panel-heading><h3 class=panel-title>會員管理</h3></div><div class=panel-body><div class="row">
					<?php $where=""; if (isset($_POST['s'])) {if (trim($_POST['s']) == 2){$where.=" WHERE status>=0";}else {$where.=" WHERE status=".trim($_POST['s']);}}?>  
					<div class=col-md-3><div class=form-group><label for="s">會員狀態</label><select class=form-control id="s" name="s"><option value="2">全部</option><option value="1">上線會員</option><option value="0">禁用會員</option></select></div></div>
					<?php if (!empty($_POST['n'])) {$where.=" AND name LIKE '%".trim($_POST['n'])."%'";}?>
					<div class=col-md-3><div class=form-group><label for=n>帳號</label><input class=form-control name="n" id=n></div></div>
					<?php if (!empty($_POST['e'])) {$where.=" AND email LIKE '%".trim($_POST['e'])."%'";}?>
					<div class=col-md-3><div class=form-group><label for=e>信箱</label><input class=form-control name="e" id=e></div></div>
					<?php if (!empty($_POST['c'])) {$where.=" AND crIP LIKE '%".trim($_POST['c'])."%'";}?>
					<div class=col-md-3><div class=form-group><label for=c>最後登入IP</label><input class=form-control name="c" id=c></div></div></div>
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
				<div id="results">
			
			<?php include('usr_result.php');?>
			
			
			</div>
 			</div>
			</form>
			<div class="test"></div>
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
	<div class="col-xs-10 co	grandalice@livemail.tw	無	l-sm-10"><input class=form-control name=h></div>
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


    $("#results").on('click','.v',function(e){
		e.preventDefault();
		var modal = $('#m');
		var data = $(this).parent().parent().find($('input[name^=mn]')).val();
		modal.find(".modal-title").text("會員資料");
		modal.find('input[name=e]').val(data);
		modal.modal('show');
    })
//     $('.v').click(function(e){
//         alert('clicked');
// 		e.preventDefault();
// 		var modal = $('#m');
// 		var data = $(this).parent().parent().find($('input[name^=mn]')).val();
// 		modal.find(".modal-title").text("會員資料");
// 		modal.find('input[name=e]').val(data);
// 		modal.modal('show');
        
//     })
    $('.d').click(function(e){
		e.preventDefault();
		var modal = $('#m');
		modal.find(".modal-title").text("刪除");
		modal.modal('show');
        
    })
//     $('.da').click(function(e){
//         e.preventDefault();
//         $status = $(this).attr('value');
//    		$.post("usr.php","status="+$status);a 
//    		$.ajax({
// 			type:"POST",
// 			data:"status="+$status,
// 			success:function(data){console.log(data);}

//    	   		})
//    		location.reload();
//     }) 
   	$("#results").on("click",".da",function(e){
   	   	e.preventDefault();
   	 	$status = $(this).attr('value');
   	   	console.log($status);
   	 	//$("#results").load("usr_result.php?page="+$page);
   	 	$.post("usr.php",{"status":$status});
   		location.reload();
   	})	
	$("#myTable").tablesorter();
   	$("#results").on("click",".pager a",function(e){
   	   	e.preventDefault();
   	   	$page = $(this).data('page');
   	   	//console.log($page);
   	 	//$("#results").load("usr_result.php?page="+$page);
   	   	$("#results").load("usr_result.php",{"page":$page},function(){$("#myTable").tablesorter();});
   	   	
   	})
//    	$('.before').click(function(e){
// 		e.preventDefault();
// 		$wh = $(this).data('where');
// 		$be = $(this).data('before');
// 		//alert('before');
// 		if ($wh=='') {
// 			//alert("empty");
// 			$.get("usr.php","page="+$be);
// 			location.reload();
// 		} else {
// // 			$.post("usr.php","page="$be"&where="+$wh);
// // 			location.reload();
// 		}
//    	}) 
   	//$('.after').click(function(e){
		//e.preventDefault();
		//$wh = $(this).data('where');
		//$af = $(this).data('after');
		//console.log($wh);
		//console.log($af);
		//if ($wh=='') {
			//alert("empty");
			//$.get("","page="+$af);
 //$("table").remove('tr');
//$("table").load("usr.php?page="+$af+"#myTable");
// $.ajax({
//    type: "GET",
//    url: "usr.php",
//    data: "page="+$af,
//    //error: function (xhr) { alert('xhr'+xhr); },      // 錯誤後執行的函數
//    success: function (data) { 
// 	   //console.log(data);
// 	   //$('form').remove('table');
// // 	   $data = $(data).filter('table');
//  	   $('.test').html(data);
// 	   //console.log(data);
	   
// 	}// 成功後要執行的函數
   
// });		
//location.reload();
			//location.reload();
		//} else{
// 			$.get("usr.php","page="+$af);
// 			$.post("usr.php","page="+$af"&where="+$wh);
// 			location.reload();
		//}	
   //	}) 
//     $('#s').change(function() { 
//         $(this).parents('form').submit(); 
//      });
		
  });
 </script>