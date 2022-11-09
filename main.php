<?php

if ($_SERVER['HTTP_USER_AGENT'] == "") exit;

# GETパラメーター名
$Parameter = "?url=";

# $Parameter で分けた 配列を生成
$Redirect = explode($Parameter, $_SERVER['REQUEST_URI']);

# 配列の要素数が1だったら(パラメータがなかったら)
if (count($Redirect) == 1) {
    echo "GETパラメーターがありません<br>";
    echo "パラメーター名: " . $Parameter;
    exit;
    # ここから下の処理終了
}


# 一番前の要素を削除 (GETパラメーター以外の部分[URL] を削除)
unset($Redirect[0]);

# 配列をString型に
$Redirect = implode($Parameter, $Redirect);

# リダイレクト設定
header("Location: " . $Redirect);

?>by Marumasa