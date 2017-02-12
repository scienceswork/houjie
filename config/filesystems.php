<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => 'qiniu',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',
        ],
        // 添加七牛云存储
        'qiniu' => [
            'driver' => 'qiniu',
            'domains' => [
                'default' => 'ol5yyvvdl.bkt.clouddn.com', // 七牛域名
                'https' => 'ol60zepem.qnssl.com', // HTTPS域名
                'custom' => '', // 自定义域名
            ],
            'access_key' => env('QINIU_AK', ''), // AccessKey
            'secret_key' => env('QINIU_SK', ''),  // SecretKey
            'bucket' => env('QINIU_BUCKET', ''),  // Bucket名字
            'notify_url'=> env('QINIU_NOTIFY', ''),  // 持久化处理回调地址
        ],
    ],

];
