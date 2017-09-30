<?php
// composer下载方式
// 先使用composer命令下载：
// composer require owner888/phpspider
// 引入加载器
//require './vendor/autoload.php';

// GitHub下载方式
require_once __DIR__ . '/../autoloader.php';
use phpspider\core\phpspider;

/* Do NOT delete this comment */
/* 不要删除这段注释 */

$configs = array(
    'name' => 'YONEX(尤尼克斯)',
    'log_show' => true,
    'tasknum' => 1,
    //'save_running_state' => true,
    'domains' => array(
        'www.yonex.cn',
        'yonex.cn'
    ),
    'scan_urls' => array(
        'http://www.yonex.cn/sports/products/badminton-racquets/' //羽毛球
    ),
    'list_url_regexes' => array(
        "http://www.yonex.cn/sports/products/\w+#productlist"
    ),
    'content_url_regexes' => array(
        "http://www.yonex.cn/sports/products/product/\w+",
//        "http://www.yonex.cn/sports/products/product/ARC11CH",
//        "http://www.yonex.cn/sports/products/product/17NR10GE"
    ),
    'max_try' => 5,
    //'proxies' => array(
        //'http://H784U84R444YABQD:57A8B0B743F9B4D2@proxy.abuyun.com:9010'
    //),
//    'export' => array(
//        'type' => 'csv',
//        'file' => '../data/qiushibaike.csv',
//    ),
    'export' => array(
        'type'  => 'sql',
        'file'  => '../data/yonex.sql',
        'table' => 'content',
    ),
    //'export' => array(
        //'type' => 'db', 
        //'table' => 'content',
    //),
    //'db_config' => array(
        //'host'  => '127.0.0.1',
        //'port'  => 3306,
        //'user'  => 'root',
        //'pass'  => 'root',
        //'name'  => 'qiushibaike',
    //),
    //'queue_config' => array(
        //'host'      => '127.0.0.1',
        //'port'      => 6379,
        //'pass'      => '',
        //'db'        => 5,
        //'prefix'    => 'phpspider',
        //'timeout'   => 30,
    //),
    'fields' => array(
        array(
            'name' => "series",
            'selector_type' => 'regex',
            'selector' => "#系列：(.*?)系列 #",
        ),
        array(
            'name' => "name",
            'selector_type' => 'regex',
            'selector' => "#型号：(.*?) #",
            'required' => true,
        ),
        array(
            'name' => "description",
            'selector' => "/html/body/div/div[3]/div[2]/div[2]/div[1]/p",
        ),
        array(
            'name' => "habitat",
            'selector_type' => 'regex',
            'selector' => "#<td>产&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地：</td> <td>(.*?)</td>#",
        ),
        array(
            'name' => "code",
            'selector_type' => 'regex',
            'selector' => "#<td> 商品代码：</td> <td>(.*?)</td>#",
        ),
        array(
            'name' => "weight",
            'selector_type' => 'regex',
            'selector' => "#产品重量：(.*?) #",
        ),
        array(
            'name' => "Grip",
            'selector_type' => 'regex',
            'selector' => "#握把尺寸：(.*?) #",
        ),


    ),
);

$spider = new phpspider($configs);


$spider->start();


