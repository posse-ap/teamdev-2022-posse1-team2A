<?php

require "../../dbconnect.php";

$agent_data = "select * from agent_info;";

$agent_infos = $db->query($agent_data)->fetchAll(PDO::FETCH_ASSOC);


try {
    if (isset($_POST['tag_number'])) {
        // $tagg = $_POST['tag_number'];
        // $chose_tag = explode(',', $tagg);
        // $sort_key="select * from agent_info inner join info_tags on agent_info.name=info_tags.name";
        // $sql = 'SELECT * FROM agent_info ';
        // $sql .= 'where info_tags.tag_id IN (' . substr(str_repeat(',?', count($chose_tag)), 1) . ')';
        // $stmt = $db->prepare($sql);
        // $stmt->execute($chose_tag);
        // var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));

        // IN 句に入る値を作成
        $select_id = $_POST['tag_number'];
        $inClause = substr(str_repeat(',?', count($select_id)), 1); // '?,?,?'
        // $sql = "SELECT * FROM  WHERE id IN ({$inClause})";
        $sql = "SELECT name,image FROM agent_info inner join info_tags on agent_info.name=info_tags.agent_name where info_tags.tag_id IN ({$inClause})";
        $stmt = $db->prepare($sql);
        // プレースホルダが ? の時 execute() に配列で渡すことが出来る。
        $stmt->execute($select_id);
        $search_agents = $stmt->fetchAll();

        print_r($search_agents);



        // print_r($select_id);
        // print_r($inClause);
        // print_r($res);
        // print_r(count($select_id));
        // print_r($_POST['tag_number']);/
        // print_r($res);
        // print_r($sql);
        // print_r($_SESSION['tags']);
    }
} catch (Exception $e) {
    print "error!! " . $e->getMessage() . PHP_EOL;
}

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SearchResult</title>
    <!-- css -->
    <link rel="stylesheet" href="../../reset.css" />
    <link rel="stylesheet" href="../studentCSS/header.css" />
    <link rel="stylesheet" href="../studentCSS/footer.css" />
    <link rel="stylesheet" href="./searchResult.css">
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
                                <a href="../agentDetail/agentDetail.html" target="_blank" rel="noopener noreferrer">
                                    <h3>リクナビ</h3>
                                </a>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <a href="../agentDetail/agentDetail.html" target="_blank" rel="noopener noreferrer">
                                    <h3>リクナビ</h3>
                                </a>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../..//materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <a href="../agentDetail/agentDetail.html" target="_blank" rel="noopener noreferrer">
                                    <h3>リクナビ</h3>
                                </a>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
                                <p>2023年卒業予定の新卒の皆様と既卒者を対象とした学生と企業を結び付ける、新卒採用の就職情報サイトです。</p>
                            </div>
                        </section>
                        <section class="modal_agent_card">
                            <div class="modal_agent_name">
                                <a href="../agentDetail/agentDetail.html" target="_blank" rel="noopener noreferrer">
                                    <h3>リクナビ</h3>
                                </a>
                                <button class="modal_agent_delete">削除</button>
                            </div>
                            <div class="modal_agent_info">
                                <img src="../../materials/rikunavi.png" alt="リクナビ">
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
        <section class="search_result_header">
            <div class="search_result_title">
                <div class="search_result_title_text">ー検索結果ー</div>
                <div class="search_result_title_counts">(<?= count($search_agents) ?>件)</div>
            </div>
            <div class="search_result_page_back">
                <div class="page_back_box"><a href="../top/top.php">TOPへ</a></div>
            </div>
        </section>
        <?php foreach($search_agents as $index => $search_agent):?>
        <div class="search_result_card">
            <div class="search_result_card_img">
                <img src="../../materials/<?=$search_agent['image']?>">
            </div>
            <div class="search_result_card_explanation">
                <div class="search_result_card_title">
                    <p><a href="../agentDetail/agentDetail.html" target="_blank">【<?=$search_agent['name']?>】</a></p>
                </div>
                <div class="search_result_card_text">
                    <p>豊富な受験ノウハウとサポートたいせで第一志望校合格へ導きます！驚愕の内定率120%！！！！！！！！！</p>
                </div>
                <form action="../compare/compare.php" method="post" name="card_buttons" class="search_result_card_buttons" id="compare_form">
                    <div class="search_result_card_comparison">
                        <label for="agent<?= $index ?>" class="button_comparison">
                            <input type="checkbox" name="compare_agent[]" id="agent<?= $index ?>" value="<?= $search_agents['name'] ?>">
                            <p>比較</p>
                        </label>
                    </div>
                </form>
                <form action="">
                    <div class="search_result_card_cart">
                        <button>カートに入れる</button>
                    </div>

                </form>
            </div>
        </div>
        <?php endforeach;?>
        <!-- 比較modal ここから -->
        <div class="compare_modal_container">
            <div class="compare_modal_wrapper">
                <section class="compare_modal_header">
                    <div class="compare_modal_title">比較するエージェント企業</div>
                    <div class="compare_modal_close">
                        <button><i class="fa-solid fa-square-xmark fa-lg"></i></button>
                    </div>
                </section>
                <div class="compare_item_wrapper">
                    <!-- ここにカードが入る -->
                </div>
                <section class="compare_modal_footer">
                    <button type="submit" form="compare_form">比較する</button>
                </section>
            </div>
        </div>
        <!-- 比較modal ここまで -->
    </main>
    <footer>
        <ul>
            <li>プライバシーポリシー</li>
            <li>会社概要</li>
            <li>ご利用規約</li>
            <li>お問合せ</li>
        </ul>
        <div class="footer_logo">
            <img src="../../materials/boozer_logo_white.png" alt="boozer Inc.">
        </div>
    </footer>
    <script src="./searchResult.js"></script>
</body>

</html>