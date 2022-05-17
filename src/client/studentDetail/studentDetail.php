<?php
require "../../dbconnect.php";

$student_data="select * from student_list;";

$student_infos=$db->query($student_data)->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生詳細</title>
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="./studentDetail.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
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
            <?php foreach($student_infos as $student_info):?>
            <table class="student_detail_table">
                <tr>
                    <th>学生氏名</th>
                    <td><?=$student_info['last_name']?></td>
                    <td><?=$student_info['first_name']?></td>
                </tr>
                <tr>
                    <th>申し込み日時</th>
                    <td colspan="2"><?=$student_info['apply_time']?></td>
                </tr>
                <tr>
                    <th>大学</th>
                    <td colspan="2"><?=$student_info['college']?></td>
                </tr>
                <tr>
                    <th>学部・学科</th>
                    <td><?=$student_info['faculty']?>学部</td>
                    <td><?=$student_info['department']?>学科</td>
                </tr>
                <tr>
                    <th>卒業年度</th>
                    <td colspan="2"><?=$student_info['graduation_year']?>年度</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td colspan="2"><?=$student_info['student_email']?></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td colspan="2"><?=$student_info['student_phone']?></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td colspan="2"><?=$student_info['student_address']?></td>
                </tr>
            </table>
            <?php endforeach;?>
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