
-- 学生表
CREATE TABLE `php_LP` (
  `p_LP_id` int unsigned PRIMARY KEY AUTO_INCREMENT,
  `p_LP_name` varchar(20) NOT NULL comment '学生姓名',
  `p_LP_class` varchar(20) NOT NULL comment '所属班级ID',
  'p_LP_sex' varchar(10) not null comment '学生性别',
  'p_LP_grade' INT comment '学生成绩',
  'p_LP_date_of_birth' timestamp NOT NULL comment '出生日期',
  'p_LP_date_of_enter' timestamp NOT NULL comment '入学日期'
)CHARSET=utf8 engine=innodb;


-- 班级表
create table `php_class`(
  `p_class_id` int unsigned primary key auto_increment comment '班级ID',
  `p_class_name` varchar(12) not null unique comment ' 班级名称'
)charset=utf8 engine=innodb;