<?php


function queryIpv4($ip)
{
    $city = new ipip\db\City('../../db/ipv4.ipdb');
    $info = $city->find($ip, 'CN');
    $country = $info[0];
    $province = $info[1];
    $city = $info[2];
    return json_encode(
        array(
            'success' => true,
            'country' => $country,
            'province' => $province,
            'city' => $city
        ),
        JSON_UNESCAPED_UNICODE
    );
}
