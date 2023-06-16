<?php
/**
 * @Author: zhong
 * @Email: i@antx.cc
 * @Date: 2023-5-26 10:12:07
 */

function addQRCodeRequestRecord($addr, $params, $time): bool
{
    return insertData("insert into qrcode (id, addr, params, time) values (default, '$addr', '$params', '$time')");
}

function addIPv4RequestRecord($addr, $params, $result, $time): bool
{
    return insertData("insert into ipv4 (id, addr,params, result, time) values (default, '$addr', '$params', '$result', '$time')");
}

function addSaoraoRequestRecord($addr, $params, $result, $time): bool
{
    return insertData("insert into saorao (id, addr,params, result, time) values (default, '$addr', '$params', '$result', '$time')");
}

function insertData($sql): bool
{
    $conn = mysqli_connect("mysql.db.antx.cc", "root", getenv("ANTX_MYSQL_PASSWORD"), "antx_api");
    $res = false;
    if ($conn->query($sql) === TRUE) {
        $res = true;
    }
    $conn->close();
    return $res;
}
