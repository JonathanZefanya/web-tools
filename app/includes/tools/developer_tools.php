<?php


defined('ZEFANYA') || die();

return [
    'html_minifier' => [
        'icon' => 'fab fa-html5',
        'similar' => [
            'css_minifier',
            'js_minifier'
        ]
    ],

    'css_minifier' => [
        'icon' => 'fab fa-css3',
        'similar' => [
            'html_minifier',
            'js_minifier'
        ]
    ],

    'js_minifier' => [
        'icon' => 'fab fa-js',
        'similar' => [
            'html_minifier',
            'css_minifier'
        ]
    ],

    'json_validator_beautifier' => [
        'icon' => 'fas fa-project-diagram'
    ],

    'sql_beautifier' => [
        'icon' => 'fas fa-database'
    ],

    'html_entity_converter' => [
        'icon' => 'fas fa-file-code'
    ],

    'bbcode_to_html' => [
        'icon' => 'fab fa-html5'
    ],

    'markdown_to_html' => [
        'icon' => 'fas fa-code'
    ],

    'html_tags_remover' => [
        'icon' => 'fab fa-html5'
    ],

    'user_agent_parser' => [
        'icon' => 'fas fa-columns'
    ],

    'url_parser' => [
        'icon' => 'fas fa-paperclip'
    ],
];
