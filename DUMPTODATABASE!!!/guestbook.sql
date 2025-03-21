create database guestbook;
use guestbook;

create table guestbook_messages (
    id int auto_increment primary key,
    name varchar(255) not null,
    message text not null,
    created_at timestamp default current_timestamp, 
    is_published boolean default false
);

create table admin_users (
    id int auto_increment primary key,
    username varchar(255) unique not null,
    password_hash varchar(255) not null
);
