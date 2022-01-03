drop database if exists `mcq_dev`;
create database `mcq_dev`;
use `mcq_dev`;

-- !! grade id is varchar(4)
drop table if exists `grade`;
create table `grade` (
	`id` char(4) not null,
    `description` text,
    constraint `pk_grade_id` primary key (`id`)
);

drop table if exists `subject`;
create table `subject` (
	`id` int not null auto_increment,
    `name` varchar(50) not null,
    `description` text,
    constraint `pk_subject_id` primary key (`id`)
);

drop table if exists `role`;
create table `role` (
	`id` int not null,
    `name` varchar(50),
    `description` text,
    constraint `pk_role_id` primary key (`id`)
);

drop table if exists `school`;
create table `school` (
	`id` int not null auto_increment,
    `name` varchar(50) not null,
    `description` text,
    `address` varchar(300),
    constraint `pk_school_id` primary key (`id`)
);

drop table if exists `user`;
create table `user` (
	`id` int not null auto_increment,
	`username` varchar(50) not null,
    `email` varchar(150),
    `password` varchar(100),
    `remember_token` varchar(100),
    `otp` varchar(10),
    `first_name` varchar(100),
    `last_name` varchar(100),
    `avatar` varchar(600),
    `birthdate` date,
    `mobile_phone` varchar(20),
    `telephone` varchar(20),
    `grade_id` char(4),
    `school_id` int,
    `address` varchar(100),
    `description` text,
    `email_verified_at` datetime,
    `created_at` datetime,
    `created_by` int,
    `is_deleted` tinyint,
    `deleted_at` datetime,
    `deleted_by` int,
    constraint `pk_user_id` primary key (`id`)
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;;

drop table if exists `user_role`;
create table `user_role` (
	`user_id` int not null,
    `role_id` int not null,
	constraint `pk_user_role_user_id_role_id` primary key (`user_id`, `role_id`)
);

drop table if exists `question`;
create table `question` (
	`id` int not null auto_increment,
    `content` varchar(6000),
    `subject_id` int not null,
    `grade_id` char(4),
    `solution` text,
    `created_at` datetime,
    `created_by` int,
    `is_deleted` tinyint,
    `deleted_at` datetime,
    `deleted_by` int,
    constraint `pk_question_id` primary key (`id`)
);

drop table if exists `choice`;
create table `choice` (
	`id` int not null,
    `question_id` int not null,
    `content` varchar(1000),
    `is_solution` tinyint(1),
	constraint `pk_choice_question_id_id` primary key (`question_id`, `id`)
);

drop table if exists `test_type`;
create table `test_type` (
	`id` int not null auto_increment,
    `name` varchar(50),
    `desciption` text,
    constraint `pk_test_type_id` primary key (`id`)
);

drop table if exists `test`;
create table `test` (
	`id` int not null auto_increment,
    `test_code` int not null default 0,
    `grade_id` char(4),
    `subject_id` int,
    `name` varchar(200) not null,
    `duration` smallint,
    `no_of_questions` smallint,
    `test_type_id` int,
    `description` text,
    `created_at` datetime,
    `created_by` int,
    `updated_at` datetime,
    `updated_by` int,
    `is_deleted` tinyint,
    `deleted_at` datetime,
    `deleted_by` int,
	constraint `pk_test_id_test_code` primary key (`id`, `test_code`)
);

drop table if exists `test_content`;
create table `test_content` (
	`test_id` int not null,
    `test_code` int not null default 0,
    `question_id` int not null,
    `question_order` int,
    `answer_order` varchar(50),
    constraint `pk_test_content_test_id_question_id`
    primary key (`test_id`, `test_code`, `question_id`)
);

drop table if exists `class`;
create table `class` (
	`id` int not null auto_increment,
    `name` varchar(50),
    `description` text,
    `grade_id` char(4),
    `school_id` int,
    `created_at` datetime,
    `created_by` int,
	`is_deleted` tinyint,
    `deleted_at` datetime,
    `deleted_by` int,
	constraint `pk_class_id` primary key (`id`)
);

drop table if exists `class_member`;
create table `class_member` (
	`class_id` int not null,
    `user_id` int not null,
    `created_at` datetime,
    `created_by` int,
    constraint `pk_class_member_class_id_user_id` primary key (`class_id`, `user_id`)
);

drop table if exists `class_test`;
create table `class_test` (
    `class_id` int not null,
	`test_id` int not null,
	`start_at` datetime,
    `created_at` datetime,
    `created_by` int,
    constraint `pk_class_test_class_id_test_id` primary key (`class_id`, `test_id`)
);

drop table if exists `work_history`;
create table `work_history` (
	`id` int not null auto_increment,
	`user_id` int not null,
    `test_id` int not null,
    `test_code` int not null default 0,
    `no_of_correct` smallint,
    `started_at` datetime,
    `ended_at` datetime,
    `submitted_at` datetime,
    `note` text,
    constraint `pk_work_history_id` primary key (`id`)
);

drop table if exists `work_history_detail`;
create table `work_history_detail` (
	`work_history_id` int not null,
    `question_id` int not null,
    `choice_ids` varchar(50),
    `updated_at` datetime,
    constraint `pk_work_history_detail`
    primary key (`work_history_id`, `question_id`)
);


alter table `user`
add constraint `fk_user_grade`
foreign key (`grade_id`) references `grade` (`id`)
on update cascade
on delete restrict;

alter table `user_role`
add constraint `fk_user_role_user`
foreign key (`user_id`) references `user` (`id`)
on update cascade
on delete restrict;

alter table `user_role`
add constraint `fk_user_role_role`
foreign key (`role_id`) references `role` (`id`)
on update cascade
on delete restrict;

-- alter table `user`
-- add constraint `fk_user_role`
-- foreign key (`role_id`) references `role` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `user`
-- add constraint `fk_user_user_created`
-- foreign key (`created_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `user`
-- add constraint `fk_user_user_updated`
-- foreign key (`updated_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `user`
-- add constraint `fk_user_user_deleted`
-- foreign key (`deleted_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `question`
-- add constraint `fk_question_user_created`
-- foreign key (`created_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `question`
-- add constraint `fk_question_user_updated`
-- foreign key (`updated_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `question`
-- add constraint `fk_question_user_deleted`
-- foreign key (`deleted_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

alter table `user`
add constraint `fk_user_school`
foreign key (`school_id`) references `school` (`id`)
on update cascade
on delete restrict;

alter table `class`
add constraint `fk_class_school`
foreign key (`school_id`) references `school` (`id`)
on update cascade
on delete restrict;

alter table `choice`
add constraint `fk_choice_question`
foreign key (`question_id`) references `question` (`id`)
on update cascade
on delete restrict;

alter table `test`
add constraint `fk_test_test_type_id`
foreign key (`test_type_id`) references `test_type` (`id`)
on update cascade
on delete restrict;

alter table `test`
add constraint `fk_test_grade`
foreign key (`grade_id`) references `grade` (`id`)
on update cascade
on delete restrict;

alter table `test`
add constraint `fk_test_subject`
foreign key (`subject_id`) references `subject` (`id`)
on update cascade
on delete restrict;

alter table `question`
add constraint `fk_question_subject`
foreign key (`subject_id`) references `subject` (`id`)
on update cascade
on delete restrict;

alter table `question`
add constraint `fk_question_grade`
foreign key (`grade_id`) references `grade` (`id`)
on update cascade
on delete restrict;

-- alter table `test`
-- add constraint `fk_test_user_created`
-- foreign key (`created_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `test`
-- add constraint `fk_test_user_updated`
-- foreign key (`updated_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `test`
-- add constraint `fk_test_user_deleted`
-- foreign key (`deleted_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

alter table `test_content`
add constraint `fk_test_content_test`
foreign key (`test_id`, `test_code`) references `test` (`id`, `test_code`)
on update cascade
on delete restrict;

alter table `test_content`
add constraint `fk_test_content_question`
foreign key (`question_id`) references `question` (`id`)
on update cascade
on delete restrict;

alter table `class`
add constraint `fk_class_grade`
foreign key (`grade_id`) references `grade` (`id`)
on update cascade
on delete restrict;

-- alter table `class`
-- add constraint `fk_class_user_created`
-- foreign key (`created_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `class`
-- add constraint `fk_class_user_updated`
-- foreign key (`updated_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `class`
-- add constraint `fk_class_user_deleted`
-- foreign key (`deleted_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

alter table `class_member`
add constraint `fk_class_member_class`
foreign key (`class_id`) references `class` (`id`)
on update cascade
on delete restrict;

alter table `class_member`
add constraint `fk_class_member_user`
foreign key (`user_id`) references `user` (`id`)
on update cascade
on delete restrict;

-- alter table `class_member`
-- add constraint `fk_class_member_user_created`
-- foreign key (`created_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

-- alter table `class_member`
-- add constraint `fk_class_member_user_deleted`
-- foreign key (`deleted_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

alter table `class_test`
add constraint `fk_class_test_class`
foreign key (`class_id`) references `class` (`id`)
on update cascade
on delete restrict;

alter table `class_test`
add constraint `fk_class_test_test`
foreign key (`test_id`) references `test` (`id`)
on update cascade
on delete restrict;

-- alter table `class_test`
-- add constraint `fk_class_test_user_created`
-- foreign key (`created_by`) references `user` (`id`)
-- on update cascade
-- on delete restrict;

alter table `work_history`
add constraint `fk_work_history_user`
foreign key (`user_id`) references `user` (`id`)
on update cascade
on delete restrict;

alter table `work_history`
add constraint `fk_work_history_test_content`
foreign key (`test_id`, `test_code`) references `test` (`id`, `test_code`)
on update cascade
on delete restrict;

alter table `work_history_detail`
add constraint `fk_work_history_detail_work_history`
foreign key (`work_history_id`) references `work_history` (`id`)
on update cascade
on delete restrict;

alter table `work_history_detail`
add constraint `fk_work_history_detail_question`
foreign key (`question_id`) references `question` (`id`)
on update cascade
on delete restrict;

