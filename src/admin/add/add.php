<?php
require "../../dbconnect.php";





/* データベースへ登録 */
// foreach($getcolumns as $getcolumn){
//     if(!empty($_POST["input_$getcolumn"])){
//         try{
//         $sql  = "INSERT INTO agent_contract_info($getcolumn) VALUES(:A_$getcolumn)";
//         $stmt = $db->prepare($sql);
    
//         $stmt($getcolumn)->bindParam(":A_$getcolumn", $_POST["input_$getcolumn"], PDO::PARAM_STR);
        
    
//         // header('location: http://localhost:81/admin/add/add.php');
//         continue;
//         } catch (PDOException $e) {
//             echo 'データベースにアクセスできません！'.$e->getMessage();
//         }
//     }

// }
// foreach($getcolumns as $getcolumn){
//     $stmt("$getcolumn")->execute();
// }

try {
    //input_post.phpの値を取得
    if(isset($_POST['contract_date'],$_POST['name'],$_POST['url'],$_POST['address'],$_POST['representative'],$_POST['phone_number'],$_POST['email'],$_POST['image'],$_POST['text'],$_POST['responsible_division'],$_POST['cv_email'])){

        // $id = $_POST['id'];
        $contract_date = $_POST['contract_date'];
        $name = $_POST['name'];
        $url = $_POST['url'];
        $address = $_POST['address'];
        $representative = $_POST['representative'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $image = $_POST['image'];
        $text = $_POST['text'];
        $responsible_division = $_POST['responsible_division'];
        $cv_email = $_POST['cv_email'];
        
    
        $sql = "INSERT INTO agent_contract_info (contract_date,name,url,address,representative,phone_number,email,image,text,responsible_division,cv_email) VALUES (:contract_date,:name,:url,:address,:representative,:phone_number,:email,:image,:text,:responsible_division,:cv_email)"; // INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
        $stmt = $db->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params = array(':contract_date'=>$contract_date,':name'=>$name,':url'=>$url,':address'=>$address,':representative'=>$representative,':phone_number'=>$phone_number,':email'=>$email,':image'=>$image,':text'=>$text,':responsible_division'=>$responsible_division,':cv_email'=>$cv_email); // 挿入する値を配列に格納する
        // $params = array(':name' => $name, ':category' => $category, ':description' => $description); // 挿入する値を配列に格納する
        $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    }

} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>エージェント追加ページ</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">

<div id="input_form">
    <form action="add.php" method="POST">

        <div>
            <h4>date</h4>
            <input type="text" name="contract_date">
        </div>
        <div>

            <h4>name</h4>
            <input type="text" name="name">
        </div>
        <div>
            
            <h4>url</h4>
            <input type="text" name="url">
        </div>
        <div>

            <h4>address</h4>
            <input type="text" name="address">
        </div>
        <div>

            <h4>representatives</h4>
            <input type="text" name="representative">
        </div>
        <div>

            <h4>phone</h4>
            <input type="text" name="phone_number">
        </div>
        <div>

            <h4>email</h4>
            <input type="text" name="email">
        </div>
        <div>

            <h4>image</h4>
            <input type="text" name="image">
        </div>
        <div>

            <h4>text</h4>
            <input type="text" name="text">
        </div>
        <div>

            <h4>division</h4>
            <input type="text" name="responsible_division">
        </div>
        <div>

            <h4>cv_email</h4>
            <input type="text" name="cv_email">
        </div>

        <input type="submit" value="登録">
    </form>
</div>

<a href="../../student/agentList/agentList.php">エージェント一覧</a>
</div>
</body>
</html>