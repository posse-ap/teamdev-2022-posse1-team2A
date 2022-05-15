<?php

$to="ugkirin@gmail.com";
$subject = "申し込み完了";
$message = "申し込みありがとうございました！エージェントから連絡が来るので少々お待ちください";
$headers = "From: from@example.com";

mb_send_mail($to, $subject, $message, $headers);