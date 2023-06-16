create table if not exists ipv4
(
    id     bigint auto_increment
        primary key,
    addr   text     null,
    params text     null,
    result text     null,
    time   datetime null
);

