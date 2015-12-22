<!DOCTYPE html>
<html lang="ja">
<head>
		<meta charset="utf-8">
		<title>{$page_title}</title>
		<link rel="stylesheet" href="{'/'|base_url}css/common.css" type="text/css" />
</head>
<body>
 
{include file=$content_tpl}

<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script>
var url = "{'signup/check_nickname'|base_url}";
</script> 
<script src="{'/'|base_url}js/check_duplicate.js"></script>
</body>
</html>
