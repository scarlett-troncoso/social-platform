# Structure of table

## Schema

User
Post
Media
Like

Bonus: Tags e Comenti

## User

Id | BIGINT | PRIMARY_KEY | AUTO_INCREMENT | UNIQUE | NOTNULL (Tutti id di tutte le tabelle avranno questo formato)
User_Name | VARCHAR(15) | NOTNULL | UNIQUE
Name | VARCHAR(20) | NULL
Lastname | VARCHAR(20) | NULL
Pasword | VARCHAR(10) | NOTNULL
Phone | TINYINT | NULL | UNIQUE
Email | VARCHAR(255) | NOTNULL | UNIQUE
Date_of_birth | DATE | NOTNULL
Created_Date | DATETIME | NOTNULL

## Post

Id
User_id | NOTNULL
Media_id | NOTNULL
Tag_id | NULL
Title | VARCHAR(80) | NOTNULL
Description | VARCHAR(255) | NULL
Create_date | DATETIME | NOTNULL
Modified_date | DATETIME | NULL

## Media

Id
Post_id | NOTNULL
User_id | NOTNULL
Format(Photo, video) | VARCHAR(5) | NOTNULL
path(link) | VARCHAR(255) | NOTNULL

## Like

Id
User_id
Post_id

## Tags

Id
Name_Tag | VARCHAR(15) | NULL | UNIQUE
Post_id | NOTNULL

## Coments

Id
Post_Id
User_Id
Created_date | DATETIME | NOTNULL
Modified_date | DATETIME | NULL

## Media_Post (Tabella Ponte)

Id
Post_id | NOTNULL
Media_id | NOTNULL

## Post_Tags (Tabella Ponte)

Id
Post_id | NOTNULL
Tags_id | NOTNULL
