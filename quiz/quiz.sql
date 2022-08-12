-- クイズ問題解答作成
drop table if exists quiz;

create table quiz(
        id integer primary key,
        level text,
        bangou integer,
        question text,
        s1 text,
        s2 text,
        s3 text,
        s4 text,
        answer integer,
        kaisetsu text
);

.mode csv
.import quizdata.csv quiz