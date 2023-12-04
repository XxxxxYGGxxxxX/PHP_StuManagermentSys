<?php

// 学生删除功能

require './init.php'; // 项目初始化文件

$id = (int)input_get('id');
$sql = "delete from php_LP where p_LP_id=$id";
db_query($sql);

// 删除后返回学生列表
header('Location: index.php');
