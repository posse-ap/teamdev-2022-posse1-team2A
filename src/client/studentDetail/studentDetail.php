<?php
require "../../dbconnect.php";

$student_data="select * from student_list;";

$student_infos=$db->query($student_data)->fetchAll(PDO::FETCH_ASSOC);

// $getcolumns=[
//     "id",
//     "apply_time",
//     "student_name",
//     "student_email",
//     "student_phone",
//     "college",
//     "department",
//     "graduation_year",
//     "student_address",
// ];

/* データベースへ登録 */
// foreach($getcolumns as $getcolumn){
//     if(!empty($_POST["input_$getcolumn"])){
//         try{
//         $sql  = "INSERT INTO student_contract_info($getcolumn) VALUES(:A_$getcolumn)";
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



?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生詳細</title>
</head>
<body>

    <header>
        <section class="header_container">admin</section>
    </header>
    <main>
        <div class="detail_close">
            <button>閉じる</button>
        </div>
        <section class="student_detail_top">申し込み情報</section>
        <section class="student_detail_table_container">
            <table class="student_detail_table">
                <tr>
                    <th>学生氏名</th>
                    <td>伊藤</td>
                    <td>博文</td>
                </tr>
                <tr>
                    <th>申し込み日時</th>
                    <td colspan="2">2022/10/10/23:53</td>
                </tr>
                <tr>
                    <th>大学</th>
                    <td colspan="2">就活大学</td>
                </tr>
                <tr>
                    <th>学部・学科</th>
                    <td>就活学部</td>
                    <td>就活学科</td>
                </tr>
                <tr>
                    <th>卒業年度</th>
                    <td colspan="2">2024年度</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td colspan="2">sample@sample.com</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td colspan="2">000-0000-0000</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td colspan="2">東京都千代田区永田町１丁目７−１</td>
                </tr>
            </table>
        </section>
    </main>
    
    
<?php foreach($student_infos as $student_info):?>
    <div class="ranking_card">
        <p>--------</p>
        <h4><?= $student_info['apply_time']?></h3>
        <h4><?= $student_info['student_name']?></h3>
        <h4><?= $student_info['student_email']?></h3>
        <h4><?= $student_info['student_phone']?></h3>
        <h4><?= $student_info['college']?></h3>
        <h4><?= $student_info['department']?></h3>
        <h4><?= $student_info['graduation_year']?></h3>
        <h4><?= $student_info['student_address']?></h3>
        <p>---------</p>
    </div>
<?php endforeach;?>
<a href="../../student/application/application.php">申し込み画面へ</a>

<script src=""></script>
</body>
</html>