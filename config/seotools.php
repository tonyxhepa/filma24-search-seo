<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Filma24.stream | Filma me titra shqip", // set false to total remove
            'description'  => 'Filma dhe seriale me titra shqip', // set false to total remove
            'separator'    => ' | ',
            'keywords'     => ['filma me titra shqip', 'seriale me titra shqip', 'seriale turke me titra shqip', 'seriale turke', 'filma indian', 'filma erotik'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Filma24.stream | Filma me titra shqip', // set false to total remove
            'description' => 'Filma dhe seriale me titra shqip', // set false to total remove
            'url'         => url()->current(), // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'Filma24.stream',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
