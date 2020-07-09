<?php

session_start();

// 現在のセッションを取得
$old_session_id = session_id();

// 新しいsessionIdを発行(前のセッションは無効)
session_regenerate_id();

// 新しいsessionIdを取得
$new_session_id = session_id();


echo "古いセッションId：$old_session_id<br>";
echo "新しいセッションId：$new_session_id";