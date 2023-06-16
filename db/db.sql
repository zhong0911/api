create table api
(
    id            int auto_increment
        primary key,
    name          text             null,
    address       text             null,
    request_times bigint default 0 null,
    introduction  text             null
);

INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (1, '0', '0', 17, '0');
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (2, 'myaddr', 'myaddr', 8, 'myaddr');
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (3, 'qrcode', 'qrcode', 4, 'qrcode');
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (4, 'qqcard', 'qqcard', 0, 'qqcard');
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (5, 'phone', 'phone', 2, 'phone');
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (6, 'myhost', 'myhost', 3, 'myhost');
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (7, 'ipv4', 'ipv4', 0, 'ipv4');
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (8, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (9, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (10, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (11, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (12, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (13, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (14, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (15, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (16, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (17, null, null, 0, null);
INSERT INTO antx.api (id, name, address, request_times, introduction) VALUES (18, null, null, 0, null);
