<?php
$total = mysql_num_rows($result);

/******************************************************************/
// 分頁程式
$pageNo = (empty($_GET['page'])) ? 1 : $_GET['page'];	// 現在在第幾頁
$pageSplit = 3;									// 每 3 筆分為 1 頁
$pageTotal = ceil($total / $pageSplit);
$pageStart = ($pageNo * $pageSplit) - $pageSplit;


if ($pageNo != 1)
{
	echo '<a href="product.php?page='. ($pageNo - 1) .'">上一頁</a>';
}

if ($pageNo != $pageTotal)
{
	echo '<a href="product.php?page='. ($pageNo + 1) .'">下一頁</a>';
}
?>