<?php 

require "../../dbconnect.php";

$agent_data="select * from agent_contract_info;";

$agent_infos=$db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);

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
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <h3>リクナビ</h3>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                    <img src="../../../materials/rikunavi.png" alt="リクナビ">
                    <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                    </div>
                </section>
                <section class="modal_agent_card">
                    <div class="modal_agent_name">
                        <h3>リクナビ</h3>
                        <button class="modal_agent_delete">削除</button>
                    </div>
                    <div class="modal_agent_info">
                        <img src="../../../materials/rikunavi.png" alt="リクナビ">
                        <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                    </div>
                </section>
                <section class="modal_agent_card">
                    <div class="modal_agent_name">
                    <h3>リクナビ</h3>
                    <button class="modal_agent_delete">削除</button>
                </div>
                <div class="modal_agent_info">
                    <img src="../../../materials/rikunavi.png" alt="リクナビ">
                    <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                </div>
                </section>
                <section class="modal_agent_card">
                    <div class="modal_agent_name">
                        <h3>リクナビ</h3>
                        <button class="modal_agent_delete">削除</button>
                    </div>
                    <div class="modal_agent_info">
                        <img src="../../../materials/rikunavi.png" alt="リクナビ">
                    <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                </div>
            </section>
        </section>
                <section class="modal_bottom">
                    <p>リストの中身を確認し、「まとめて無料申し込み」ボタンを押してください。</p>
                <button>確認して無料申し込み</button>
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
                <?php foreach($agent_infos as $agent_info):?>
                <div class="ranking_card">
                    <img src="../../materials/<?= $agent_info['image']?>">
                    <h3><?= $agent_info['name']?></h3>
                    <p>120%</p>
                    <button>リストに入れる</button>
                </div>
                <?php endforeach;?>

            </section>
        </section>
        <section class="ranking_container">
            <h2 class="ranking_title">－　内定率ランキング　－</h2>
            <section class="ranking_area">
                <?php foreach($agent_infos as $agent_info):?>
                <div class="ranking_card">
                    <img src="../../materials/<?= $agent_info['image']?>">
                    <h3><?= $agent_info['name']?></h3>
                    <p>120%</p>
                    <button>リストに入れる</button>
                </div>
                <?php endforeach;?>

            </section>
        </section>
        <section class="ranking_container">
            <h2 class="ranking_title">－　内定率ランキング　－</h2>
            <section class="ranking_area">
                <?php foreach($agent_infos as $agent_info):?>
                <div class="ranking_card">
                    <img src="../../materials/<?= $agent_info['image']?>">
                    <h3><?= $agent_info['name']?></h3>
                    <p>120%</p>
                    <button>リストに入れる</button>
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
            <h2>CRAFTとは...</h2>
            <p>てふぜっそイぇぱれいヅキワでぉオヅコィデゥねピくこピヵリほロぺェにセたヤげデょりあょィィぼなョひゼヤばペヌたぽヸぢぅマぎぃばロヮヴニヅピルデひゾきツはシおかねゕホツヵぽゅヲいせヒねノみナジがぢぜずヴねズゕゃヤフギギるボゴめタゅばなワヤゾブリろわふヨゔゅいゲヮョシヲぱボャヵぱヸヵちぼリぬヸヘたズるヱせソシろダェあノナィラそヹオョヹュをダたらギふヲちポてスギつやびねムスヮづジゅヘヮぁケズれず</p>
            </section>
            <section class="column_container">
            <h2>就活エージェントの種類と豊富さ</h2>
            <p>てふぜっそイぇぱれいヅキワでぉオヅコィデゥねピくこピヵリほロぺェにセたヤげデょりあょィィぼなョひゼヤばペヌたぽヸぢぅマぎぃばロヮヴニヅピルデひゾきツはシおかねゕホツヵぽゅヲいせヒねノみナジがぢぜずヴねズゕゃヤフギギるボゴめタゅばなワヤゾブリろわふヨゔゅいゲヮョシヲぱボャヵぱヸヵちぼリぬヸヘたズるヱせソシろダェあノナィラそヹオョヹュをダたらギふヲちポてスギつやびねムスヮづジゅヘヮぁケズれず</p>
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