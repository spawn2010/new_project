<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude('Migrations')
    ->in(__DIR__ . '/');

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@PHP71Migration:risky' => true,
        'concat_space' => ['spacing' => 'one'],
        'psr0' => false,
        'array_syntax' => ['syntax' => 'short'],
        'class_definition' => ['multiLineExtendsEachSingleLine' => true],
        'no_useless_else' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => true],
        'no_short_echo_tag' => true,
        'list_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'void_return' => false,
        'phpdoc_summary' => false,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
        'visibility_required' => ['property', 'method', 'const'],
    ])
    ->setCacheFile(__DIR__ . '/.php_cs.cache')
    ->setFinder($finder);