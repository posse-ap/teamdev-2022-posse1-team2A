<?php
require "../../dbconnect.php";

$agent_data="select * from agent_info;";

$agent_infos=$db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);


session_start();
$name = isset($_POST['name'])? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
$agentLists = isset($_SESSION['agentLists'])? $_SESSION['agentLists']:[];
print_r($agentLists);




// foreach($agent_infos as $agent_info){
//     if(isset($_POST["$agent_info"])){
    //         array_push($apply_agents,"$agent_info");
    //     }
// }
// print_r($apply_agents);


try {
    //input_post.phpの値を取得
    if(isset($_POST['apply_time'],$_POST['student_name'],$_POST['student_email'],$_POST['student_phone'],$_POST['college'],$_POST['department'],$_POST['graduation_year'],$_POST['student_address'])){

        // $id = $_POST['id'];
        $apply_time = $_POST['apply_time'];
        $student_name = $_POST['student_name'];
        $student_email = $_POST['student_email'];
        $student_phone = $_POST['student_phone'];
        $college = $_POST['college'];
        $department = $_POST['department'];
        $graduation_year = $_POST['graduation_year'];
        $student_address = $_POST['student_address'];
        
        
        
        $sql = "INSERT INTO student_list (apply_time,student_name,student_email,student_phone,college,department,graduation_year,student_address) VALUES (:apply_time,:student_name,:student_email,:student_phone,:college,:department,:graduation_year,:student_address)"; // INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
        $stmt = $db->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params = array(':apply_time'=>$apply_time,':student_name'=>$student_name,':student_email'=>$student_email,':student_phone'=>$student_phone,':college'=>$college,':department'=>$department,':graduation_year'=>$graduation_year,':student_address'=>$student_address); // 挿入する値を配列に格納する
        // $params = array(':student_name' => $student_name, ':category' => $category, ':description' => $description); // 挿入する値を配列に格納する
        $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
        
        

        if(isset($_POST['regist'])){
            echo "good";
            
            $sql2="INSERT INTO agent_count (apply_time,agent_name) VALUES(:apply_time,:agent_name)";
            $stmt2 = $db->prepare($sql2); //挿入する値は空のまま、SQL実行の準備をする
            foreach($agentLists as $name => $agentList){
                $params2=array(':apply_time'=>$apply_time,':agent_name'=>$name);
                $stmt2->execute($params2); //挿入する値が入った変数をexecuteにセットしてSQLを実行
            }
            unset($_POST['regist']);
        }
    }
    
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>申し込み画面</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">

<div id="input_form">
    <form action="application.php" method="POST">
        <div>
            <h4>apply_time</h4>
            <input type="text" name="apply_time">
        </div>
        <div>

            <h4>name</h4>
            <input type="text" name="student_name">
        </div>
        <div>
            
            <h4>student_email</h4>
            <input type="text" name="student_email">
        </div>
        <div>

            <h4>student_phone</h4>
            <input type="text" name="student_phone">
        </div>
        <div>

            <h4>college</h4>
            <input type="text" name="college">
        </div>
        <div>

            <h4>department</h4>
            <input type="text" name="department">
        </div>
        <div>

            <h4>graduation_year</h4>
            <input type="text" name="graduation_year">
        </div>
        <div>

            <h4>student_address</h4>
            <input type="text" name="student_address">
        </div>
        <!-- <?php foreach($agent_infos as $agent_info):?>
            <?php foreach($agentLists as $agentList):?>
                <?php if($agentList = $agent_info):?>
                    <input type="hidden" name="<?=$agent_info?>">
                <?php endif;?>
            <?php endforeach;?>
        <?php endforeach;?> -->
        <button type="submit" name="regist">登録</button>

    </form>
    <a href="../../client/studentDetail/studentDetail.php">学生詳細へ</a>
</div>



</div>
</body>
</html>