create table ipv4
(
    id     bigint auto_increment
        primary key,
    addr   text     null,
    params text     null,
    result text     null,
    time   datetime null
);

create table qrcode
(
    id     bigint auto_increment
        primary key,
    addr   text     null,
    params text     null,
    time   datetime null
);