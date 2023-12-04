<?php

// 学生添加功能
require './init.php'; // 项目初始化文件

// 表单处理
if ($_POST) {
    // 定义允许的字段
    $fields = array('p_LP_name', 'p_LP_class', 'p_LP_sex','p_LP_grade','p_LP_date_of_birth', 'p_LP_date_of_enter');
    $values = array();
    foreach ($fields as $k => $v) {
        $data = input_post($v);           // 接收$_POST数据
        $data = db_escape(filter($data)); // 数据过滤
        if ($data == '') {
            alert_back($v . '字段不能为空');
        }
        $fields[$k] = "`$v`";             // 把字段使用反引号包裹
        $values[] = "'$data'";            // 把值使用单引号包裹
    }
    $fields = implode(',', $fields);
    $values = implode(',', $values);
    $sql = "insert into php_LP ($fields) values ($values)";
    // 执行SQL
    if ($res = db_query($sql)) {
        header('location: ./index.php');
        exit;
    } else {
        // 执行失败
        alert_back('学生添加失败！');
    }
}

// 获取班级信息
$sql = "select * from php_class";
$dept_info = db_fetch_all($sql);

// 加载视图页面，显示数据
require './emp_add.html';
