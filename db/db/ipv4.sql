create table ipv4
(
    id     bigint auto_increment
        primary key,
    addr   text     null,
    params text     null,
    result text     null,
    time   datetime null
);

INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('127.0.0.1', '{"ipv4":"0.0.0.0"}', '{"success":true,"country":"保留地址","province":"保留地址","city":""}', '2023-06-17 06:16:39');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('127.0.0.1', '{"ipv4":"0.0.0.0"}', '{"success":true,"country":"保留地址","province":"保留地址","city":""}', '2023-06-17 06:16:41');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('127.0.0.1', '{"ipv4":"0.0.0.0"}', '{"success":true,"country":"保留地址","province":"保留地址","city":""}', '2023-06-17 06:16:41');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('127.0.0.1', '{"ipv4":"0.0.0.0"}', '{"success":true,"country":"保留地址","province":"保留地址","city":""}', '2023-06-17 06:16:42');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('127.0.0.1', '{"ipv4":"0.0.0.0"}', '{"success":true,"country":"保留地址","province":"保留地址","city":""}', '2023-06-17 06:16:43');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('127.0.0.1', '{"ipv4":"0.0.0.0"}', '{"success":true,"country":"保留地址","province":"保留地址","city":""}', '2023-06-17 06:16:43');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('127.0.0.1', '{"ipv4":"0.0.0.0"}', '{"success":true,"country":"保留地址","province":"保留地址","city":""}', '2023-06-17 06:17:03');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('127.0.0.1', '{"ipv4":"0.0.0.0"}', '{"success":true,"country":"保留地址","province":"保留地址","city":""}', '2023-06-17 06:17:47');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"39.156.66.10"}', '{"success":true,"country":"中国","province":"北京","city":"北京"}', '2023-06-17 06:18:01');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"127.2.2.2"}', '{"success":true,"country":"局域网","province":"局域网","city":""}', '2023-06-17 06:18:10');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"55.5.2.3"}', '{"success":true,"country":"美国","province":"美国","city":""}', '2023-06-17 06:18:16');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"120.23.33.22"}', '{"success":true,"country":"澳大利亚","province":"澳大利亚","city":""}', '2023-06-17 06:18:23');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"0"}', '{"success":false,"message":"IPv4 cannot be empty"}', '2023-06-17 06:18:26');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"47.88.128.163"}', '{"success":true,"country":"新加坡","province":"新加坡","city":""}', '2023-06-17 06:18:51');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"47.88.128.163"}', '{"success":true,"country":"新加坡","province":"新加坡","city":""}', '2023-06-17 06:25:50');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"47.88.128.163"}', '{"success":true,"country":"新加坡","province":"新加坡","city":""}', '2023-06-17 06:25:51');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"47.88.128.163"}', '{"success":true,"country":"新加坡","province":"新加坡","city":""}', '2023-06-17 06:25:51');
INSERT INTO antx_api.ipv4 (addr, params, result, time) VALUES ('192.168.0.104', '{"ipv4":"47.88.128.163"}', '{"success":true,"country":"新加坡","province":"新加坡","city":""}', '2023-06-17 06:25:52');
