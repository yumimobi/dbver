<?php

$config["USER"]["username"] = function ($password) {
    return md5($password) == "e10adc3949ba59abbe56e057f20f883e";
};


$myConfig = array();

$i = $j = 0;

$myConfig[$i]["NAME"] = "project name";
$myConfig[$i]['GIT_BIN'] = "";
$myConfig[$i]['GIT_PATCH'] = "";
$myConfig[$i]['GIT_USER'] = "";
$myConfig[$i]['GIT_EMAIL'] = "";
$myConfig[$i]['DATA_PATH'] = ROOT_PATH."data/project name/";
$myConfig[$i]['UPGRADE']['DB_HOST'] = '';
$myConfig[$i]['UPGRADE']['DB_USER'] = '';
$myConfig[$i]['UPGRADE']['DB_PWD'] = '';
$myConfig[$i]['UPGRADE']['DB_PORT'] = '';
$myConfig[$i]['UPGRADE']['DB_NAME'] = '';
$myConfig[$i]['UPGRADE']['DB_CHARSET'] = '';
$myConfig[$i]['UPGRADE']['SYNC_BIN'] = '';

// 本地开发数据
$myConfig[$i]['env'][$j]['NAME'] = "";
$myConfig[$i]['env'][$j]['DB_HOST'] = '';
$myConfig[$i]['env'][$j]['DB_USER'] = '';
$myConfig[$i]['env'][$j]['DB_PWD'] = '';
$myConfig[$i]['env'][$j]['DB_PORT'] = '';
$myConfig[$i]['env'][$j]['DB_NAME'] = '';
$myConfig[$i]['env'][$j]['DB_CHARSET'] = '';
$myConfig[$i]['env'][$j]['DATA_PATH'] = 'local/';

$j++;
// 测试环境
$myConfig[$i]['env'][$j]['NAME'] = "";
$myConfig[$i]['env'][$j]['DB_HOST'] = '';
$myConfig[$i]['env'][$j]['DB_USER'] = '';
$myConfig[$i]['env'][$j]['DB_PWD'] = '';
$myConfig[$i]['env'][$j]['DB_PORT'] = '';
$myConfig[$i]['env'][$j]['DB_NAME'] = '';
$myConfig[$i]['env'][$j]['DB_CHARSET'] = '';
$myConfig[$i]['env'][$j]['DATA_PATH'] = 'test/';

$config['USER_CONFIG']['username'] = $myConfig;
