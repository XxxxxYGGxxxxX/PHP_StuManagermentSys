<!DOCTYPE html>
<html>
<head>
    <title>背景图示例</title>
    <style>
        body {
            background-image: url('view1.jpg');
            background-repeat: no-repeat;
            background-size: 2200px 1000px;
        }
    </style>
</head>
<body>    


     <?php
     $servername = "localhost";
     $username = "php_LP";
     $password = "LOLMJTLJJ4";
     $dbname = "php_LP";

     // 创建数据库连接
     $conn = new mysqli($servername, $username, $password, $dbname);
     // 检查连接是否成功
     if ($conn->connect_error) {
         die("连接数据库失败: " . $conn->connect_error);
     }

     // 获取用户输入的姓名
     $name = $_POST['name'];

     // 构建查询语句，按姓名搜索学生信息
     $sql = "SELECT * FROM php_LP WHERE p_LP_name like '%$name%'";
     $result = $conn->query($sql);

     // 输出查询结果
     if ($result->num_rows > 0) { ?>
         <h2 style="text-align: center; color: #444;">搜索结果：</h2>
         <table style="border: 1px solid #ddd; border-collapse: collapse;">
             <thead>
                 <tr style="background-color: #f9f9f9;">
                     <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                     <th style="border: 1px solid #ddd; padding: 8px;">姓名</th>
                     <th style="border: 1px solid #ddd; padding: 8px;">班级</th>
                     <th style="border: 1px solid #ddd; padding: 8px;">性别</th>
                     <th style="border: 1px solid #ddd; padding: 8px;">成绩</th>
                     <th style="border: 1px solid #ddd; padding: 8px;">出生日期</th>
                     <th style="border: 1px solid #ddd; padding: 8px;">入学日期</th>
                 </tr>
             </thead>
             <tbody>
                 <?php while ($row = $result->fetch_assoc()) { ?>
                     <tr style="border: 1px solid #ddd;">
                         <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['p_LP_id']; ?></td>
                         <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['p_LP_name']; ?></td>
                         <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['p_LP_class']; ?></td>
                         <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['p_LP_sex']; ?></td>
                         <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['p_LP_grade']; ?></td>
                         <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['p_LP_date_of_birth']; ?></td>
                         <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['p_LP_date_of_enter']; ?></td>
                     </tr>
                 <?php } ?>
             </tbody>
         </table>
     <?php } else { ?>
         <p style="text-align: center; color: #777;">没有找到相关的学生信息</p>
     <?php }

     $conn->close();
     ?>

</body>
</html>