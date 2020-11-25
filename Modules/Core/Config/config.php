<?php

return [
    'name' => 'core',
    'displayDateFormat' =>'d/m/Y',
    'displayDatetimeFormat'=> 'd/m/y H:i',
    'paginationlimit' => 20,
    'fileUploadMaxSize' => 10240,
    'uploadPath' => 'upload',
    'logLevel' => [1,2,3],
    'logType' => [
        'info' => 1,
        'error' => 2,
        'system' => 3
    ],
    'userStatus' => [
        'unactive' => 0,
        'active' => 1,
        'locked' => 2
    ]
];
