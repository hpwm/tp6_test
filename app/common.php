<?php
// 应用公共文件

function https_request($url, $data = null)
{

    //这个方法我不知道是怎么个意思  我看都是这个方法 就copy过来了
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    $headers[] = 'content-type: application/json';
    //$headers[] = 'content-type: application/x-www-form-urlencoded';
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    //$output = json_decode($output,true);
    return $output;
}


function get_english($lower=false)
{
    $arr = [];
    for($i=65;$i<91;$i++){
        $arr[] = strtoupper(chr($i));
    }
    return $arr;
}
