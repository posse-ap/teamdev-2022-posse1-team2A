<?php
require "../../dbconnect.php";

$agent_data="select * from agent_contract_info;";

$agent_infos=$db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>エージェントリスト</title>
</head>
<body>
    
<?php foreach($agent_infos as $agent_info):?>
    <div class="ranking_card">
        <p>--------</p>
        <h4><?= $agent_info['contract_date']?></h3>
        <h4><?= $agent_info['name']?></h3>
        <h4><?= $agent_info['url']?></h3>
        <h4><?= $agent_info['address']?></h3>
        <h4><?= $agent_info['representative']?></h3>
        <h4><?= $agent_info['phone_number']?></h3>
        <h4><?= $agent_info['email']?></h3>
        <h4><?= $agent_info['image']?></h3>
        <h4><?= $agent_info['text']?></h3>
        <h4><?= $agent_info['responsible_division']?></h3>
        <h4><?= $agent_info['cv_email']?></h3>
        <p>---------</p>
    </div>
<?php endforeach;?>
<a href="../../admin/add/add.php">追加画面</a>

</body>
</html>