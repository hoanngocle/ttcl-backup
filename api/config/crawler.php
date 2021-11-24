<?php
const IMGUR_ENDPOINT = 'https://api.imgur.com/3/';

return [
    'imgur' => [
        'album' => [
            'create' => IMGUR_ENDPOINT . 'album',
            'all' => ''
        ],
        'image' => [
            'upload' => IMGUR_ENDPOINT . 'upload',
            'all' => ''
        ],

        'accessToken' => file_get_contents(config_path('.imgur-credentials')),
    ],
];

