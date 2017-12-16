<?php
/**
 * Wafer php demo 配置文件
 */

$config = [
    'rootPath' => '',

    // 微信小程序 AppID
    'appId' => '',

    // 微信小程序 AppSecret
    'appSecret' => '',

    // 使用腾讯云代理登录
    'useQcloudLogin' => true,

    /**
     * MySQL 配置，用来存储 session 和用户信息
     * 若使用了腾讯云微信小程序解决方案
     * 开发环境下，MySQL 的初始密码为您的微信小程序 AppID
     */
    'mysql' => [
       // 'host' => '172.16.141.151',
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'db'   => 'cAuth',
      //  'pass' => 'Ineedy0ut00',
        'pass' => 'wx010ab59d956a048a',
        'char' => 'utf8mb4'
    ],

    'cos' => [
        /**
         * 区域
         * 上海：cn-east
         * 广州：cn-sorth
         * 北京：cn-north
         * 广州二区：cn-south-2
         * 成都：cn-southwest
         * 新加坡：sg
         * @see https://www.qcloud.com/document/product/436/6224
         */
        'region' => 'cn-sorth',
        // Bucket 名称
        'fileBucket' => 'wafer',
        // 文件夹
        'uploadFolder' => 'abc'
    ],

    // 微信登录态有效期
    'wxLoginExpires' => 7200,
    'wxMessageToken' => 'abcdefgh'
];