<?php

namespace DotCoyote;

use Kirby\Cms\App as Kirby;

Kirby::plugin('dotcoyote/voices', [
    'api' => [
        'data' => [
            'getVoices' => function (Kirby $kirby) {
                return $kirby->page('stimmen')->children();
            },
        ],
        'routes' => function (Kirby $kirby) {
            return [
                [
                    'pattern' => 'voices/search',
                    'method' => 'POST',
                    'action' => function () use ($kirby) {
                        return $this->getVoices($kirby);
                    }
                ]
            ];
        }
    ]
]);
