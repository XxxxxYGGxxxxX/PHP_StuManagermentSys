<?php

// 学生编辑功能

require './init.php'; // 项目初始化文件

$id = (int)input_get('id');

// 表单处理
if ($_POST) {
    // 定义允许的字段
    $allow_fields = array('p_LP_name', 'p_LP_class', 'p_LP_sex','p_LP_grade','p_LP_date_of_birth', 'p_LP_date_of_enter');
    // 获取学生更新数据表单
    $update = array();
    foreach ($allow_fields as $v) {
        $data = input_post($v);            // 接收$_POST数据
        $data = db_escape(filter($data));  // 数据过滤
        if ($data == '') {
            alert_back($v . '字段不能为空');
        }
        // 把键和值按照sql更新语句中的语法要求连接，并存入到$update数组中
        $update[] = "`$v`='$data'";
    }
    // 把$update数组元素使用逗号连接
    $update_sql = implode(',', $update);
    $sql = "update php_LP set $update_sql where p_LP_id=$id";

    if ($res = db_query($sql)) {
        header('Location: index.php');
        exit;
    } else {
        alert_back('学生信息修改失败');
    }
}

// 获取学生原来的信息
$sql = "select * from php_LP left join php_class on p_LP_class=p_class_id where p_LP_id=$id";
$emp_info = db_fetch_row($sql);

// 获取班级信息
$sql = "select * from php_class";
$dept_info = db_fetch_all($sql);

// 加载视图页面，显示数据
require './emp_edit.html';
