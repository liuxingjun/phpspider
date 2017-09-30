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
    'name' => '李宁',
    'log_show' => true,
    'tasknum' => 1,
    //'save_running_state' => true,
    'domains' => array(
        'store.lining.com',
    ),
    'scan_urls' => array(
        'https://store.lining.com/shop/goodsCate-sale,desc,1,18s18_137_ms18_137_10_m-0-0-18_137_10_m-0s0-5-0-min,max-0.html', //羽毛球
        'https://store.lining.com/shop/goodsCate-sale,desc,2,18s18_137_ms18_137_10_m-0-0-18_137_10_m-0s0-5-0-min,max-0.html',
        'https://store.lining.com/shop/goodsCate-sale,desc,3,18s18_137_ms18_137_10_m-0-0-18_137_10_m-0s0-5-0-min,max-0.html',
        'https://store.lining.com/shop/goodsCate-sale,desc,4,18s18_137_ms18_137_10_m-0-0-18_137_10_m-0s0-5-0-min,max-0.html'
    ),
    'list_url_regexes' => array(
        "http://www.yonex.cn/sports/products/\w+#productlist"
    ),
    'content_url_regexes' => array(
//        "https://store.lining.com/shop/goods-317538.html?procmp=listproduct",
        "https://store.lining.com/shop/goods-405669.html?procmp=listproduct",

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
        'file'  => '../data/lining.sql',
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
            'selector' => "/html/body/div/div[3]/div[1]/a[3]",
            'required' => true,
        ),
        array(
            'name' => "name",
            'selector' => "/html/body/div/div[3]/div[2]/div[2]/div[1]/h1/text()",
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
            'selector' => "#<tr> <td> 球拍规格：</td> <td>([0-9]U)#",
        ),
        array(
            'name' => "Grip",
            'selector_type' => 'regex',
            'selector' => "#<tr> <td> 球拍规格：</td> <td>.*(G.*?)</td> </tr>#",
        ),
        array(
            'name' => "Grip",
            'selector_type' => 'regex',
            'selector' => "#<tr> <td> 球拍规格：</td> <td>.*(G.*?)</td> </tr>#",
        ),
        array(
            'name' => "Grip",
            'selector_type' => 'regex',
            'selector' => "#<tr> <td> 球拍规格：</td> <td>.*(G.*?)</td> </tr>#",
        ),


    ),
);

$spider = new phpspider($configs);


$spider->start();


