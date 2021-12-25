use mcq_dev;


INSERT INTO `role` VALUES (1,'admin',NULL),(2,'teacher',NULL),(3,'student',NULL);
insert into grade values (10, 'Lớp 10'), (11, 'Lớp 11'), (12, 'Lớp 12');

select * from `subject`;
insert into `subject` (`name`) values ('Toán');
insert into `subject` (`name`) values ('Vật Lý');
insert into `subject` (`name`) values ('Hóa Học');
insert into `subject` (`name`) values ('Sinh học');
insert into `subject` (`name`) values ('English');

insert into question (subject_id, content) values (4, 'The well known Pythagorean theorem \\(x^2 + y^2 = z^2\\) was proved to be invalid for other exponents. Meaning the next equation has no integer solutions:\n\\[ x^n + y^n = z^n \\]');
insert into question (subject_id, content) values (4, '\\(< > \\subset \\supset \\subseteq \\supseteq\\) $c = 1$');
update question
set content = '\\(< > \\subset \\supset \\subseteq \\supseteq\\) $c = 1$'
where id=3;

insert into `school`
values
(1, 'THCS Lê Thanh Nghị', '', 'Gia Tân, Gia Lộc, Hải Dương'),
(2, 'THPT Gia Lộc', '', 'TT Gia Lộc, Gia Lộc, Hải Dương'),
(3, 'THPT Chuyên Nguyễn Trãi', '', 'Đường Ngô Quyền, TP Hải Dương, Hải Dương'),
(4, 'THPT Hồng Quang', '', 'Chương Dương, Trần Phú, TP Hải Dương, Hải Dương'),
(5, 'THPT chuyên Khoa học Tự nhiên', '', '182 đường Lương Thế Vinh, quận Thanh Xuân, Hà Nội'),
(6, 'THPT Thăng Long', '', 'Số 44, Tạ Quang Bửu, Hai Bà Trưng, Hà Nội'),
(7, 'THPT Chuyên Nguyễn Chí Thanh', '', '08 Lê Duẩn, Phường Nghĩa Tân, Gia Nghĩa, Đăk Nông');

insert into `question`
(`id`, `content`, `solution`, `subject_id`)
values
(10, '\\(\\sqrt(4) = ?\\)', 'Because \\(\\sqrt(4) = \\frac{10}{5}\\)', 4),
(11, '\\(\\sqrt(9) = ?\\)', 'Because \\(\\sqrt(4) = \\frac{18}{2}\\)', 4),
(12, '\\(\\sqrt(16) = ?\\)', 'Because \\(\\sqrt(4) = \\frac{100}{25}\\)', 4),
(13, '\\(\\sqrt(25) = ?\\)', 'Because \\(\\sqrt(4) = \\frac{50}{10}\\)', 4);
insert into `choice`
(`id`, `question_id`, `content`, `is_solution`)
values
(0, 10, '2', true),
(1, 10, '3', false),
(2, 10, '1.9', false),
(3, 10, '\\(\\sqrt(2)^2\\)', true),
(0, 11, '3', true),
(1, 11, '4', false),
(2, 11, '2.9', false),
(3, 11, '\\(\\sqrt(3)^2\\)', true),
(0, 12, '4', true),
(1, 12, '5', false),
(2, 12, '3.9', false),
(3, 12, '\\(\\sqrt(4)^2\\)', true),
(0, 13, '5', true),
(1, 13, '6', false),
(2, 13, '4.9', false),
(3, 13, '\\(\\sqrt(5)^2\\)', true);

insert into `test`
(`test_code`, `name`, `grade_id`, `duration`, `description`, `no_of_questions`)
values
(0, 'Kiểm tra ngắn', '11', 5, 'Bài kiểm tra ngắn cho lớp 11A, trường THPT Gia Lộc', 5);
update `test`
set created_by=1;


select * from `test_content`;
insert into `test_content`
(`test_id`, `test_code`, `question_id`)
values
(1, 0, 10),
(1, 0, 11),
(1, 0, 12),
(1, 0, 13),
(1, 0, 1),
(1, 0, 2);
