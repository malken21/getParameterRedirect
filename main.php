<?php

# リダイレクトさせないようにする
$blocklist = ["http"];

#  User-Agent に $blocklist に書いている部分があったら
# $blockresult に配列を追加する
$blockresult = array_filter($blocklist, function ($text) {
    return strpos($_SERVER['HTTP_USER_AGENT'], $text);
});

# User-Agent に $blocklist に書いている部分があれば 処理を終了する
if (count($blockresult) != 0) exit;



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