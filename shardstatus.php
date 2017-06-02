<?php
$ServerID = 127;
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,"https://www.servuo.com/shards/".$ServerID."/export");

$result=curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);

$online = isset($result['status']) && $result['status'] == 'online';
$current = $result["players"];
$max = $result["peak"];

?>

<p>Status: <span style="color:<?= $online ? 'green' : 'red'?>;"><?= $online ? 'Online' : 'Offline' ?></span></p>
<p>Players online: <?= $current ?></p>
<p>Players max: <?= $max ?></p>

<iframe src="https://discordapp.com/widget?id=294957106182750209&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>