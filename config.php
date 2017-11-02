<?php
//database info straight forward
//you realy souldent be a programmer if you dont know what this is
return [
    'database' => [
        'name' => 'mytodo',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
