<?php

require "../../dbconnect.php";

$agent_data = "select * from agent_info;";
$agent_offer_rate = "select * from agent_info order by offer_rate desc;";
$agent_population = "select * from agent_info order by population desc;";
$agent_Num_of_firm = "select * from agent_info order by Num_of_firm desc;";
$indus_tag = "select * from tags where id between 0 and 11;";
$areas_tag = "select * from tags where id between 12 and 17;";
$favos_tag = "select * from tags where id between 18 and 24;";

$agent_infos = $db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);
$rate_ranks = $db->query($agent_offer_rate)->fetchAll(PDO::FETCH_ASSOC);
$popu_ranks = $db->query($agent_population)->fetchAll(PDO::FETCH_ASSOC);
$firm_ranks = $db->query($agent_Num_of_firm)->fetchAll(PDO::FETCH_ASSOC);
$industry_tags = $db->query($indus_tag)->fetchAll(PDO::FETCH_ASSOC);
$area_tags = $db->query($areas_tag)->fetchAll(PDO::FETCH_ASSOC);
$favo_tags = $db->query($favos_tag)->fetchAll(PDO::FETCH_ASSOC);

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
$intro = isset($_POST['intro']) ? htmlspecialchars($_POST['intro'], ENT_QUOTES, 'utf-8') : '';
$image = isset($_POST['image']) ? htmlspecialchars($_POST['image'], ENT_QUOTES, 'utf-8') : '';
$delete_name = isset($_POST['delete_name']) ? htmlspecialchars($_POST['delete_name'], ENT_QUOTES, 'utf-8') : '';


session_start();
//配列に入れるには、$name,$count,$priceの値が取得できていることが前提なのでif文で空のデータを排除する
if ($delete_name != '') unset($_SESSION['agentLists'][$delete_name]);
if ($name != '' && $intro != '' && $image != '') {
    $_SESSION['agentLists'][$name] = [
        'intro' => $intro,
        'image' => $image
    ];
}
$agentLists = isset($_SESSION['agentLists']) ? $_SESSION['agentLists'] : [];

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
                        <?php foreach ($agentLists as $name => $agentList) : ?>
                            <section class="modal_agent_card">
                                <div class="modal_agent_name">
                                    <h3><?= $name ?></h3>
                                    <form action="top.php" method="post">
                                        <input type="hidden" name="delete_name" value="<?= $name; ?>">
                                        <button type="submit" class="modal_agent_delete">削除</button>
                                    </form>
                                </div>
                                <div class="modal_agent_info">
                                    <img src="../../../materials/<?= $agentList['image'] ?>" alt="リクナビ">
                                    <p><?= $agentList['intro'] ?></p>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    </section>
                    <section class="modal_bottom">
                        <p>リストの中身を確認し、「まとめて無料申し込み」ボタンを押してください。</p>
                        <button> <a href="../application/application.php">確認して無料申し込み</a> </button>
                    </section>
                </div>
                <a href="#!" class="modal_close">×</a>
            </div>
        </div>
        <!-- modal ここまで-->
    </header>
    <main>
        <form action="../searchResult/searchResult.php" method="post" class="search_wrapper">
            <section class="sort_bar">
                <div class="sort_title" id="sort_title_gyoukai">
                    <input type="checkbox" id="gyoukai_ipt" class="sort_ipt" style="display: none;">
                    <label for="gyoukai_ipt" class="ipt_label">
                        <div>業界から探す</div>
                    </label>

                    <section class="sort_section_container_gyoukai" id="sort_section_gyoukai_container">
                        <?php foreach ($industry_tags as $index => $industry_tag) : ?>
                            <section class="gyoukai_section">
                                <div class="gyoukai_title">
                                    <input name="tag_number[]" type="checkbox" value="<?= $index + 12 ?>" id="gyoukai<?= $index + 12 ?>">
                                    <label for="gyoukai<?= $index + 12 ?>"><?= $industry_tag['tag']; ?></label>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    </section>

                    <i class="fa-solid fa-sort-down fa-lg"></i>
                </div>
            </section>
            <section class="sort_bar">
                <div class="sort_title" id="sort_title_area">
                    <input type="checkbox" id="area_ipt" class="sort_ipt" style="display: none;">
                    <label for="area_ipt" class="ipt_label">
                        <div>求人エリアから探す</div>
                    </label>

                    <section class="sort_section_container_area" id="sort_section_area_container">
                        <?php foreach ($area_tags as $index => $area_tag) : ?>
                            <section class="area_section">
                                <div class="area_title">
                                    <input name="tag_number[]" type="checkbox" value="<?= $index + 18 ?>" id="area<?= $index + 18 ?>">
                                    <label for="area<?= $index + 18 ?>"><?= $area_tag['tag']; ?></label>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    </section>

                    <i class="fa-solid fa-sort-down fa-lg"></i>
                </div>
            </section>
            <section class="sort_bar">
                <div class="sort_title" id="sort_title_picky">
                    <input type="checkbox" id="picky_ipt" class="sort_ipt" style="display: none;">
                    <label for="picky_ipt" class="ipt_label">
                        <div>こだわり条件から探す</div>
                    </label>

                    <section class="sort_section_container_picky" id="sort_section_picky_container">
                        <?php foreach ($favo_tags as $index => $favo_tag) : ?>
                            <section class="picky_section">
                                <div class="picky_title">
                                    <input name="tag_number[]" type="checkbox" value="<?= $index + 1 ?>" id="picky<?= $index + 1 ?>">
                                    <label for="picky<?= $index + 1 ?>"><?= $favo_tag['tag']; ?></label>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    </section>

                    <i class="fa-solid fa-sort-down fa-lg"></i>
                </div>
            </section>
            <button type="submit" class="search_button">
                <p>検索する</p>
            </button>
        </form>
        <article class="ranking_wrapper">
            <section class="ranking_container">
                <h2 class="ranking_title">－　内定率ランキング　－</h2>
                <section class="ranking_area">
                    <?php foreach ($rate_ranks as $index => $rate_rank) : ?>
                        <div class="ranking_card">
                            <div class="ranking_num_box">
                                <p><span class="ranking_num"><?= $index + 1 ?></span> 位</p>
                            </div>

                            <img src="../../materials/<?= $rate_rank['image'] ?>">
                            <h3><?= $rate_rank['name'] ?></h3>
                            <p><?= $rate_rank['offer_rate'] ?>%</p>
                            <div class="ranking_card_buttons">
                                <form action="../agentDetail/agentDetail.php" method="GET">
                                    <input type="hidden" name="detail" value="<?= $rate_rank['name'] ?>">
                                    <button type="submit" class="ranking_card_buttons_detail_button">詳細</button>
                                </form>
                                <form action="top.php" method="POST">
                                    <input type="hidden" name="name" value="<?= $rate_rank['name'] ?>">
                                    <input type="hidden" name="intro" value="<?= $rate_rank['text'] ?>">
                                    <input type="hidden" name="image" value="<?= $rate_rank['image'] ?>">
                                    <button type="submit"class="ranking_card_buttons_list_button">リストに入れる</button>
                                </form>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </section>
            </section>
            <section class="ranking_container">
                <h2 class="ranking_title">－　利用者数ランキング　－</h2>
                <section class="ranking_area">
                    <?php foreach ($popu_ranks as $index => $popu_rank) : ?>
                        <div class="ranking_card">
                            <div class="ranking_num_box">
                                <p><span class="ranking_num"><?= $index + 1 ?></span> 位</p>
                            </div>
                            <img src="../../materials/<?= $popu_rank['image'] ?>">
                            <h3><?= $popu_rank['name'] ?></h3>
                            <p><?= $popu_rank['population'] ?>人</p>
                            <div class="ranking_card_buttons">
                                <form action="../agentDetail/agentDetail.php" method="GET">
                                    <input type="hidden" name="detail" value="<?= $popu_rank['name'] ?>">
                                    <button type="submit" class="ranking_card_buttons_detail_button">詳細</button>
                                </form>
                                <form action="top.php" method="POST">
                                    <input type="hidden" name="name" value="<?= $popu_rank['name'] ?>">
                                    <input type="hidden" name="intro" value="<?= $popu_rank['text'] ?>">
                                    <input type="hidden" name="image" value="<?= $popu_rank['image'] ?>">
                                    <button type="submit"class="ranking_card_buttons_list_button">リストに入れる</button>
                                </form>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </section>
            </section>
            <section class="ranking_container">
                <h2 class="ranking_title">－　保有求人数　－</h2>
                <section class="ranking_area">
                    <?php foreach ($firm_ranks as $index => $firm_rank) : ?>
                        <div class="ranking_card">
                            <div class="ranking_num_box">
                                <p><span class="ranking_num"><?= $index + 1 ?></span> 位</p>
                            </div>
                            <img src="../../materials/<?= $firm_rank['image'] ?>">
                            <h3><?= $firm_rank['name'] ?></h3>
                            <p><?= $firm_rank['Num_of_firm'] ?>社</p>
                            <div class="ranking_card_buttons">
                                <form action="../agentDetail/agentDetail.php" method="GET">
                                    <input type="hidden" name="detail" value="<?= $firm_rank['name'] ?>">
                                    <button type="submit" class="ranking_card_buttons_detail_button">詳細</button>
                                </form>
                                <form action="top.php" method="POST">
                                    <input type="hidden" name="name" value="<?= $firm_rank['name'] ?>">
                                    <input type="hidden" name="intro" value="<?= $firm_rank['text'] ?>">
                                    <input type="hidden" name="image" value="<?= $firm_rank['image'] ?>">
                                    <button type="submit"class="ranking_card_buttons_list_button">リストに入れる</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </section>
            </section>

            <!-- <div class="agent_link">
                <p>> エージェント企業一覧を見る</p>
            </div> -->
        </article>
        <article class="column_wrapper">
            <section class="column_container">
                <input type="checkbox" id="col_1" class="col_ipt">
                <label for="col_1" class="col_lable">
                    <h2>CRAFTとは...</h2>
                </label>
                <div class="col_content">
                    <p>「Craft」とは、株式会社Booserが運営する、「就活エージェントを通して、あなたにピッタリな企業と出会うことができる、就活生向けの情報サイト」です。</p>
                </div>
            </section>
            <section class="column_container">
                <input type="checkbox" id="col_2" class="col_ipt">
                <label for="col_2" class="col_lable">
                    <h2>就活エージェントの種類と豊富さ</h2>
                </label>
                <div class="col_content">
                    <p>コラム内容</p>
                </div>
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

    <script src="top.js"></script>
</body>

</html>