create database antx_api;

use antx_api;
create table if not exists ipv4
(
    id     bigint auto_increment
        primary key,
    addr   text     null,
    params text     null,
    result text     null,
    time   datetime null
);

create table if not exists qrcode
(
    id     bigint auto_increment
        primary key,
    addr   text     null,
    params text     null,
    time   datetime null
);

create table if not exists saorao
(
    id     bigint auto_increment
        primary key,
    addr   text     null,
    params text     null,
    result text     null,
    time   datetime null
);

