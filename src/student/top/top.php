<?php 

require "../../dbconnect.php";

$agent_data="select * from agent_info;";
$agent_offer_rate="select * from agent_info order by offer_rate desc;";
$agent_population="select * from agent_info order by population desc;";
$agent_Num_of_firm="select * from agent_info order by Num_of_firm desc;";


$agent_infos=$db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);
$rate_ranks=$db->query($agent_offer_rate)->fetchAll(PDO::FETCH_ASSOC);
$popu_ranks=$db->query($agent_population)->fetchAll(PDO::FETCH_ASSOC);
$firm_ranks=$db->query($agent_Num_of_firm)->fetchAll(PDO::FETCH_ASSOC);


$name = isset($_POST['name'])? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
$intro = isset($_POST['intro'])? htmlspecialchars($_POST['intro'], ENT_QUOTES, 'utf-8') : '';
$image = isset($_POST['image'])? htmlspecialchars($_POST['image'], ENT_QUOTES, 'utf-8') : '';
$delete_name = isset($_POST['delete_name'])? htmlspecialchars($_POST['delete_name'], ENT_QUOTES, 'utf-8') : '';

session_start();
//配列に入れるには、$name,$count,$priceの値が取得できていることが前提なのでif文で空のデータを排除する
if($delete_name != '') unset($_SESSION['agentLists'][$delete_name]);
if($name!=''&&$intro!=''&&$image!=''){
    $_SESSION['agentLists'][$name]=[
        'intro' => $intro,
        'image' => $image
    ];
}
$agentLists = isset($_SESSION['agentLists'])? $_SESSION['agentLists']:[];

// if(isset($agentLists)){
//     foreach($agentLists as $key => $agentList){
//         echo $key;
//         echo "<br>";
//         echo $agentList['intro'];
//         echo "<br>";
//         echo $agentList['image'];
//         echo "<br>";
//     }
// }

// foreach($agent_infos as $agent_){
//     // print_r($agent_img);
//     $agent_imgs[]=$agent_img['image'];
// }

// print_r($agent_imgs);


// $today_time="select learn_time from learning_info where learn_date=CURDATE();";
// $month_time="SELECT learn_time FROM learning_info WHERE LAST_DAY(NOW()) >= learn_date AND DATE_FORMAT(NOW(), '%Y-%m-01') <= learn_date;";
// $learn_time="select learn_time from learning_info;";
// $languages_data="select * from languages;";
// $contents_data="select * from contents;";
// $languages_percent="SELECT learn_language, SUM(learn_time) FROM learning_info GROUP BY learn_language;";
// $contents_percent="SELECT learn_content, SUM(learn_time) FROM learning_info GROUP BY learn_content;";

// $today_times = $dbh->query($today_time)->fetch(PDO::FETCH_ASSOC);
// $month_times = $dbh->query($month_time)->fetchAll(PDO::FETCH_ASSOC);
// $learn_times = $dbh->query($learn_time)->fetchAll(PDO::FETCH_ASSOC);
// $languages_datas = $dbh->query($languages_data)->fetchAll(PDO::FETCH_ASSOC);
// $contents_datas = $dbh->query($contents_data)->fetchAll(PDO::FETCH_ASSOC);
// $languages_percents = $dbh->query($languages_percent)->fetchAll(PDO::FETCH_ASSOC);
// $contents_percents = $dbh->query($contents_percent)->fetchAll(PDO::FETCH_ASSOC);


// foreach($month_times as $month_time){
//     $mounth_sum[]=$month_time['learn_time'];
// }
// foreach($learn_times as $study_time){
//     $learn_sum[]=$study_time['learn_time'];
// }
// $month_total=array_sum($mounth_sum);
// $all_total=array_sum($learn_sum);
// $timebox=[$today_times['learn_time'],$month_total,$all_total];
// $time_title=["Today","Month","Total"];





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
    <link rel="stylesheet" href="./top.css">
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
            <div class="list_icon">
                <a href="#modal">
                    <i class="fa-solid fa-table-list fa-lg"></i>
                    <p>申し込み</p>
                </a>
            </div>
        </section>
        <!-- modal ここから-->
        <div class="modal_wrapper" id="modal">
            <a href="#!" class="modal_overlay"></a>
            <div class="modal_window">
                <div class="modal_content">
                    <h2>ー　リスト内容　ー</h2>
                    <section class="modal_agent_list_wrapper">
                    <?php foreach($agentLists as $name => $agentList): ?>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <h3><?=$name?></h3>
                                <form action="top.php" method="post">
                                    <input type="hidden" name="delete_name" value="<?= $name; ?>">
                                    <button type="submit" class="modal_agent_delete">削除</button>
                                </form>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../../materials/<?=$agentList['image']?>" alt="リクナビ">
                                <p><?=$agentList['intro']?></p>
                            </div>
                        </section>
                    <?php endforeach;?>
                    </section>
                <section class="modal_bottom">
                    <p>リストの中身を確認し、「まとめて無料申し込み」ボタンを押してください。</p>
                <button> <a href="../application/application.php">確認して無料申し込み</a> </button>
            </section>
        </div>
        <a href="#!" class="modal_close">×</a>
    </div>
</div>
        <!-- modal ここまで -->
        </header>
        <main>
            <article class="search_wrapper">
                <section class="sort_bar">
                    <div class="sort_title">
                        <h2>業界から探す</h2>
                        <i class="fa-solid fa-sort-down fa-lg"></i>
                    </div>
                    <section class="sort_option_container">
                        <section class="gyoukai_section">
                            <div class="gyoukai_title">
                                <p>商社</p>
                                <i class="fa-solid fa-sort-down fa-lg"></i>
                            </div>
                            <section class="sort_option_box">
                                <div class="sort_option_button"></div>
                            </section>
                        </section>
                    </section>
                </section>
                <section class="sort_bar">
                    <div class="sort_title">
                        <h2>業界から探す</h2>
                        <i class="fa-solid fa-sort-down fa-lg"></i>
                    </div>
                    <section class="sort_option"></section>
                </section>
                <section class="sort_bar">
                    <div class="sort_title">
                        <h2>業界から探す</h2>
                        <i class="fa-solid fa-sort-down fa-lg"></i>
                    </div>
                    <section class="sort_option"></section>
                </section>
                <button class="search_button"><p>検索する</p></button>
            </article>
            <article class="ranking_wrapper">
                <section class="ranking_container">
                    <h2 class="ranking_title">－　内定率ランキング　－</h2>
                    <section class="ranking_area">
                        <?php foreach($rate_ranks as $rate_rank):?>
                        <div class="ranking_card">
                            <img src="../../materials/<?= $rate_rank['image']?>">
                            <h3><?= $rate_rank['name']?></h3>
                            <p><?=$rate_rank['offer_rate']?>%</p>
                            <form action="top.php" method="POST">
                                <input type="hidden" name="name" value="<?= $rate_rank['name']?>">
                                <input type="hidden" name="intro" value="<?= $rate_rank['text']?>">
                                <input type="hidden" name="image" value="<?= $rate_rank['image']?>">
                                <button type="submit">リストに入れる</button>
                            </form>
                        </div>
                        <?php endforeach;?>
                        
                    </section>
                </section>
                <section class="ranking_container">
                    <h2 class="ranking_title">－　利用者数ランキング　－</h2>
                    <section class="ranking_area">
                        <?php foreach($popu_ranks as $popu_rank):?>
                            <div class="ranking_card">
                                <img src="../../materials/<?= $popu_rank['image']?>">
                                <h3><?= $popu_rank['name']?></h3>
                                <p><?= $popu_rank['population']?>人</p>
                                <form action="top.php" method="POST">
                                    <input type="hidden" name="name" value="<?= $popu_rank['name']?>">
                                    <input type="hidden" name="intro" value="<?= $popu_rank['text']?>">
                                    <input type="hidden" name="image" value="<?= $popu_rank['image']?>">
                                    <button type="submit">リストに入れる</button>
                                </form>
                                
                            </div>
                            <?php endforeach;?>
                            
                        </section>
                    </section>
                    <section class="ranking_container">
                        <h2 class="ranking_title">－　保有求人数　－</h2>
                        <section class="ranking_area">
                            <?php foreach($firm_ranks as $firm_rank):?>
                                <div class="ranking_card">
                                    <img src="../../materials/<?= $firm_rank['image']?>">
                                    <h3><?= $firm_rank['name']?></h3>
                                    <p><?= $firm_rank['Num_of_firm']?>社</p>
                                    <form action="top.php" method="POST">
                                        <input type="hidden" name="name" value="<?= $firm_rank['name']?>">
                                        <input type="hidden" name="intro" value="<?= $firm_rank['text']?>">
                                        <input type="hidden" name="image" value="<?= $firm_rank['image']?>">
                                        <button type="submit">リストに入れる</button>
                                    </form>
                                </div>
                                <?php endforeach;?>
                                
                    </section>
                </section>
                    <div class="agent_link">
                    <p>> エージェント企業一覧を見る</p>
                    </div>
                </article>
            <article class="column_wrapper">
                <section class="column_container">
                    <input type="checkbox"  id="col_1" class="col_ipt">
                    <label for="col_1" class="col_lable"><h2>CRAFTとは...</h2></label>
                    <div class="col_content"><p>コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容コラム内容</p></div>
                </section>
                <section class="column_container">
                    <input type="checkbox"  id="col_2" class="col_ipt">
                    <label for="col_2" class="col_lable"><h2>就活エージェントの種類と豊富さ</h2></label>
                    <div class="col_content"><p>コラム内容</p></div>
                </section>
            </article>
        </main>
        <footer>
        <ul>
            <li>プライバシーポリシー</li>
            <li>会社概要</li>
            <li>ご利用規約</li>
            <li>お問合せ</li>
        </ul>
        <div class="footer_logo">
            <img src="../../../materials/boozer_logo_white.png" alt="boozer Inc.">
        </div>
        </footer>

    <script src=""></script>
</body>
</html>