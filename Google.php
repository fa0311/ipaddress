<html>
<body>
	<?php
$output = file_get_contents('ip.json');
$ip = (array)json_decode($output, true);
$unix = time();
$userip = $_SERVER['REMOTE_ADDR'];
$japanesetime = date("Y/m/d H:i:s");
$ip[$unix] = array(
    "ip" => $userip,
    "protocol" => $_SERVER['SERVER_PROTOCOL'],
    "agent" => $_SERVER['HTTP_USER_AGENT'],
    "japanesetime" => $japanesetime,
    "time" => $_SERVER['REQUEST_TIME']
);
$ip = json_encode($ip,(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
file_put_contents('ip.json', $ip, LOCK_EX);
?>
<script>
setTimeout(function(){
	window.location.href = 'http://google.com';
}, 0);
</script>
</body>
</html>