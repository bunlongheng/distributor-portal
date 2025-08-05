<?php
return [
    'disks' => [
        'ssh' => [
            'driver' => 'ssh',
            'host' => '45.55.88.57',
            'hostkey' => 'ssh-rsa',
            'port' => '22',
            'username' => 'devftp',
            'private_file' => 'keyfile/id_rsa',
            'path' => '/home/forge/bheng/public/logo_path/' // for example: /var/www/html/dev/images
        ],
    ],
];
