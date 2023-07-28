CREATE TABLE 'admin' (
    'username' varchar(10),
    'password' varchar(25)
)

CREATE TABLE 'user_table' (
    'id' int PRIMARY AUTO_INCREMENT,
    'id_num' UNIQUE varchar(10),
    'password' varchar(max),
    'fullname' varchar(300),
    'office' varchar(300),
    'window' char(1),
    'campus' varchar(300),
    'created_on' datetime,
    'updated_on' datetime 
)

CREATE TABLE 'transaction_table' (
    'id' int PRIMARY AUTO_INCREMENT,
    'client_type' varchar,
    'id_num' varchar,
    'fullname' varchar,
    'mobile_num' varchar,
    'email' varchar,
    'transaction_department' varchar,
    'trasaction_id' int,
    'created_on' datetime,
    'updated_on' datetime
)

CREATE TABLE 'transaction_type' (
    'id' int PRIMARY,
    'department' varchar,
    'created_on' datetime,
    'updated_on' datetime,
)

CREATE TABLE 'transaction_list' (
    'id' PRIMARY int,
    'transaction_num' int,
    'transaction' varchar,
    'created_on' datetime,
    'updated_on' datetime
)