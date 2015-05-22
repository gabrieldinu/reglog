<?php

//$user_ip = getenv('REMOTE_ADDR');
$user_ip = '79.116.244.220';

//http://www.geoplugin.net/php.gp?ip=$user_ip
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

  if (isset($geo['geoplugin_city'])){
    $ul_city =  $geo['geoplugin_city'];
 }else{
    $ul_city =  '';
 }

/*
 * geoplugin_request
 * geoplugin_status
 * geoplugin_credit
 * geoplugin_city
 * geoplugin_region
 * geoplugin_areaCode
 * geoplugin_dmaCode
 * geoplugin_countryCode
 * geoplugin_countryName
 * geoplugin_continetCode
 * geoplugin_latitude
 * geoplugin_longitude
 * geoplugin_regionCode
 * geoplugin_regionName
 * geoplugin_currencyCode
 * geoplugin_currencySymbol
 * geoplugin_currencySymbol_UTF8
 * geoplugin_currencyConverter
 */