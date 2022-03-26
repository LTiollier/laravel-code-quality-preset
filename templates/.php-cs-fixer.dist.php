<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/database',
        __DIR__ . '/routes',
        __DIR__ . '/config',
        __DIR__ . '/tests',
    ])
;

$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@PhpCsFixer' => true,
        'concat_space' => ['spacing' => 'one'],
        'ordered_imports' => ['imports_order' => ['const', 'class', 'function']],
        'phpdoc_to_comment' => false,
        'class_definition' => false,
        'php_unit_test_class_requires_covers' => false,
        'phpdoc_no_alias_tag' => ['replacements' => ['type' => 'var', 'link' => 'see']],
        'no_extra_blank_lines' => ['tokens' => [
            'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return',
            'square_brace_block', 'switch', 'throw', 'use_trait',
        ]],
        'php_unit_method_casing' => ['case' => 'snake_case'],
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
    ])
    ->setFinder($finder)
    ;
