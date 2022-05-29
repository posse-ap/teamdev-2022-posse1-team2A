<?php
require "../../dbconnect.php";



    $ageDetail=$_GET['detail'];
    
    $agent_data = "select * from agent_info where name='$ageDetail';";
    $agent_infos = $db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);
    // print_r($ageDetail);
    $agent_info=$agent_infos[0];

    if(isset($_POST)){
        $offer_rate = $_POST['offer_rate'];
        $population = $_POST['population'];
        $Num_of_firm = $_POST['Num_of_firm'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $url = $_POST['url'];
        $address = $_POST['address'];
        $text = $_POST['text'];
        $cv_email = $_POST['cv_email'];
        $indutrys = $_POST['industy'];
        $areas = $_POST['area'];
        $fovos = $_POST['fovo'];

        print_r($indutrys);
        
        
        $sql = "INSERT INTO agent_info (offer_rate,population,Num_of_firm,name,email,phone_number,url,address,text,cv_email) VALUES (:offer_rate,:population,:Num_of_firm,:name,:email,:phone_number,:url,:address,:text,:cv_email)"; // INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
        $stmt = $db->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params = array(':offer_rate'=>$offer_rate,':population'=>$population,':Num_of_firm'=>$Num_of_firm,':name'=>$name,':email'=>$email,':phone_number'=>$phone_number,':url'=>$url,':address'=>$address,':text'=>$text,':cv_email'=>$cv_email); // 挿入する値を配列に格納する
        // $params = array(':student_name' => $student_name, ':category' => $category, ':description' => $description); // 挿入する値を配列に格納する
        $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
        
        // foreach($indutrys as $indutry){
        //     $tagNums="select id from tags where tag='$indutry';";
        //     $agent_nums=$db->query($tagNums)->fetchAll(PDO::FETCH_ASSOC);
        //     $sql3="INSERT INTO info_tags (tag_id,agent_name) VALUE(:tag_id,:agent_name)";
        //     $stmt3 = $db->prepare($sql3); //挿入する値は空のまま、SQL実行の準備をする
        //     foreach($agent_nums as $agent_num){
        //         $agent_numm=$agent_num['id'];
        //         $params3=array(':tag_id'=>$agent_numm,':email'=>$student_email,);
        //         $stmt3->execute($params3); //挿入する値が入った変数をexecuteにセットしてSQLを実行

        //     }

        // }
    }


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業契約情報</title>
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="./adminDetail.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <section class="header_container">admin</section>
    </header>
    <main>
        <section class="admin_detail_option_container">
            <div class="detail_edit">
                <form action="../edit/edit.php" method="GET">
                    <input type="hidden" name="edit" value="<?=$agent_info['name']?>">
                    <button type="submit">編集</button>
                </form>
            </div>
            <div class="detail_close">
                <button>閉じる</button>
            </div>
        </section>
        <section class="admin_detail_container">
            <section class="admin_detail_top">
                <div class="admin_detail_title">
                    <p class="agent_name"><?=$agent_info['name']?></p>
                    <p>契約情報</p>
                </div>
                <img src="../../materials/<?=$agent_info['image']?>" alt="<?=$agent_info['name']?>">
            </section>
            <table class="admin_detail_table">
                <tr>
                    <th>企業名</th>
                    <td><?=$agent_info['name']?></td>
                </tr>
                <tr>
                    <th>契約日時</th>
                    <td colspan="2"><?=$agent_info['contract_date']?></td>
                </tr>
                <tr>
                    <th>HP</th>
                    <td><?=$agent_info['url']?></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td colspan="2"><?=$agent_info['email']?></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td colspan="2"><?=$agent_info['phone_number']?></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td colspan="2"><?=$agent_info['address']?></td>
                </tr>
            </table>
        </section>
    </main>
    <script src=""></script>
</body>
</html>