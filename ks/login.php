<?php
header('Content-Type:text/html;charset=utf-8');

$error = array();    //保存错误信息

// 当有表单提交时
if (!empty($_POST)) {
    
    // 接收用户登录表单
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // 载入表单验证函数库，验证用户名和密码格式
    require './check_form.lib.php';
    if (($result = checkUsername($username)) !== true) {
        $error[] = $result;
    }
    if (($result = checkPassword($password)) !== true) {
        $error[] = $result;
    }

    // 表单验证通过，再到数据库中验证
    if (empty($error)) {

        // 连接数据库，设置字符集，选择数据库
$link = mysqli_connect('localhost','php_LP','LOLMJTLJJ4','php_LP') or exit('数据库连接失败！');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'php_LP') or exit('php_LP数据库不存在！');
    
        // SQL转义
        $username = mysqli_real_escape_string($link, $username);

        // 根据用户名取出用户信息
        $sql = "select `id`,`password` from `user` where `username`='$username'";
        if ($rst = mysqli_query($link, $sql)) {   // 执行SQL，获得结果集
            $row = mysqli_fetch_assoc($rst);      // 处理结果集

            // 计算密码的MD5
            $password = md5($password);
            // 判断密码是否正确
            if ($password == $row['password']) {
                
                // 欢迎登录！

                // 登录成功，保存用户会话
                session_start();
                $_SESSION['userinfo'] = array(
                    'id' => $row['id'],      // 将用户id保存到SESSION
                    'username' => $username  // 将用户名保存到SESSION
                );

                // 登录成功，跳转到会员中心
                header('Location: user.php');

                // 终止脚本继续执行
                exit;
            }
        }
        $error[] = '用户名不存在或密码错误。';
    }
}

// 加载HTML模板文件
define('APP', 'itcast');
require 'login_html.php';
