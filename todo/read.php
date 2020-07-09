<?php
require '../model/funcs.php';
loginCheck();

$pdo = connect_db();
  // DB接続の設定
  // db.php

require '_read.php';

