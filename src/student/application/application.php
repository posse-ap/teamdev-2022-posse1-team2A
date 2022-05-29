<?php
require "../../dbconnect.php";

$agent_data="select * from agent_info;";

$agent_infos=$db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);


session_start();
$name = isset($_POST['name'])? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
$applyagents = isset($_SESSION['agentLists'])? $_SESSION['agentLists']:[];
// print_r($applyagents);




// foreach($agent_infos as $agent_info){
    //     if(isset($_POST["$agent_info"])){
        //         array_push($apply_agents,"$agent_info");
        //     }
        // }
        // print_r($apply_agents);
        
        
        try {
            //input_post.phpの値を取得
            if(isset($_POST['last_name'],$_POST['first_name'],$_POST['student_email'],$_POST['student_phone'],$_POST['birth_year'],$_POST['birth_month'],$_POST['birth_day'],$_POST['college'],$_POST['faculty'],$_POST['department'],$_POST['graduation_year'],$_POST['post_code'],$_POST['address1'],$_POST['address2'],$_POST['address3'],$_POST['address4'])){
                
                // $id = $_POST['id'];
                // $apply_time = $_POST['apply_time'];
                $last_name = $_POST['last_name'];
                $first_name = $_POST['first_name'];
                $student_email = $_POST['student_email'];
                $student_phone = $_POST['student_phone'];
                $birth_year = $_POST['birth_year'];
                $birth_month = $_POST['birth_month'];
                $birth_day = $_POST['birth_day'];
                $college = $_POST['college'];
                $faculty = $_POST['faculty'];
                $department = $_POST['department'];
                $graduation_year = $_POST['graduation_year'];
                $post_code = $_POST['post_code'];
                $address1 = $_POST['address1'];
                $address2 = $_POST['address2'];
                $address3 = $_POST['address3'];
                $address4 = $_POST['address4'];
                
                
                
                $sql = "INSERT INTO student_list (last_name,first_name,student_email,student_phone,birth_year,birth_month,birth_day,college,faculty,department,graduation_year,post_code,address1,address2,address3,address4) VALUES (:last_name,:first_name,:student_email,:student_phone,:birth_year,:birth_month,:birth_day,:college,:faculty,:department,:graduation_year,:post_code,:address1,:address2,:address3,:address4)"; // INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
                $stmt = $db->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
                $params = array(':last_name'=>$last_name,':first_name'=>$first_name,':student_email'=>$student_email,':student_phone'=>$student_phone,':birth_year'=>$birth_year,':birth_month'=>$birth_month,':birth_day'=>$birth_day,':college'=>$college,':faculty'=>$faculty,':department'=>$department,':graduation_year'=>$graduation_year,':post_code'=>$post_code,':address1'=>$address1,':address2'=>$address2,':address3'=>$address3,':address4'=>$address4); // 挿入する値を配列に格納する
                // $params = array(':student_name' => $student_name, ':category' => $category, ':description' => $description); // 挿入する値を配列に格納する
                $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
                
                foreach($applyagents as $name => $applyagent){
                    $ageNums="select * from apply_agent where agent='$name';";
                    $agent_nums=$db->query($ageNums)->fetchAll(PDO::FETCH_ASSOC);
                    $sql3="INSERT INTO student_tags (tag_id,email) VALUE(:tag_id,:email)";
                    $stmt3 = $db->prepare($sql3); //挿入する値は空のまま、SQL実行の準備をする
                    foreach($agent_nums as $agent_num){
                        $agent_numm=$agent_num['id'];
                        $params3=array(':tag_id'=>$agent_numm,':email'=>$student_email,);
                        $stmt3->execute($params3); //挿入する値が入った変数をexecuteにセットしてSQLを実行

                    }

                }
                
                if(isset($_POST['regist'])){
                    // echo "good";
                    
                    $sql2="INSERT INTO agent_count (agent_name) VALUES(:agent_name)";
                    $stmt2 = $db->prepare($sql2); //挿入する値は空のまま、SQL実行の準備をする
                    foreach($applyagents as $name => $applyagent){
                        $params2=array(':agent_name'=>$name);
                        $stmt2->execute($params2); //挿入する値が入った変数をexecuteにセットしてSQLを実行
                    }
                    
                    // require "../../php/mail_test.php";
                    
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="./application.css">
    <link rel="stylesheet" href="../studentCSS/header.css">
    <link rel="stylesheet" href="../studentCSS/footer.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <section class="header_container">
            <div class="header_logo">
            <img src="../../materials/syukatudotcom_logo_white.png" alt="就活.com">
        </div>
        </section>
    </header>
    <main>
    <section class="application_container">
        <div class="form_title">ー　申し込みフォーム　ー</div>
        <section class="form_wrapper">
            <form action="application.php" method="POST">
                <ul class="form_list">
                    <li>
                        <div class="form_item">
                            <label for="last_name">お名前</label>
                            <div class="input_wrapper student_name">
                                <input type="text" name="last_name" id="last_name" placeholder="例）山田">
                                <input type="text" name="first_name" id="first_name" placeholder="例）太郎">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="student_email">メールアドレス</label>
                            <div class="input_wrapper">
                                <input type="email" name="student_email" id="student_email" placeholder="例）yourname@example.com">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="student_phone">電話番号</label>
                            <div class="input_wrapper">
                                <input type="tel" name="student_phone" id="student_phone" placeholder="例）000-0000-000">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="birthdate">生年月日</label>
                            <div class="input_wrapper">
                                <select name="birth_year" id="bdate-year">
                                    <option selected=""></option>
                                    <?php for ($i=1; $i<=20; $i++): ?>
                                    <option value="<?= 1990 + $i; ?>"><?= 1990 + $i; ?></option>
                                    <?php endfor; ?>
                                </select>年
                                <select name="birth_month" id="bdate-month">
                                    <option selected=""></option>
                                    <?php for ($i=1; $i<=12; $i++): ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>月
                                <select name="birth_day" id="bdate-day">
                                    <option selected=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <?php for ($i=1; $i<=31; $i++): ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>日
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="college">大学・大学院</label>
                            <div class="input_wrapper">
                                <input type="text" name="college" id="college" placeholder="大学・大学院">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="college">学部</label>
                            <div class="input_wrapper">
                                <input type="text" name="faculty" id="faculty" placeholder="学部">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="college">学科</label>
                            <div class="input_wrapper">
                                <input type="text" name="department" id="department" placeholder="学科">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="graduation_year">卒業年</label>
                            <div class="input_wrapper">
                                <select name="graduation_year" id="graduation_year">
                                    <option selected=""></option>
                                    <option value="23">2023</option>
                                    <option value="24">2024</option>
                                    <option value="25">2025</option>
                                </select>年
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="postal_code">郵便番号</label>
                            <div class="input_wrapper">
                                <input type="text" name="post_code" id="postal_code" placeholder="郵便番号">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form_item">
                            <label for="student_address">住所</label>
                            <div class="input_wrapper input_address"><p>都道府県</p>
                                <input type="text" name="address1" id="address_1" placeholder="例）東京都">
                            </div>
                            <div class="input_wrapper input_address"><p>市区町村</p>
                                <input type="text" name="address2" id="address_2" placeholder="例）中央区">
                            </div>
                            <div class="input_wrapper input_address"><p>番地等</p>
                                <input type="text" name="address3" id="address_3" placeholder="○番地○町目">
                            </div>
                            <div class="input_wrapper input_address"><p>建物名・部屋番号等</p>
                                <input type="text" name="address4" id="address_4" placeholder="例）コーポ○○101号室">
                            </div>
                        </div>
                    </li>
                </ul>
        <!-- <?php foreach($agent_infos as $agent_info):?>
            <?php foreach($agentLists as $agentList):?>
                <?php if($agentList = $agent_info):?>
                    <input type="hidden" name="<?=$agent_info?>">
                <?php endif;?>
            <?php endforeach;?>
        <?php endforeach;?> -->
                <div class="submit_button">
                    <button type="submit" name="regist">申し込む</button>
                </div>
            </form>
        </section>
    </section>
    </main>
<!-- <div id="input_form">
    <a href="../../client/studentDetail/studentDetail.php">学生詳細へ</a>
</div> -->
</body>
</html>