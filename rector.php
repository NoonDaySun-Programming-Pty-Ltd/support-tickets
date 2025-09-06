<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    // get parameters
    $rectorConfig->paths([
        __DIR__.'/app',
        __DIR__.'/tests',
    ]);
    $rectorConfig->importNames();

    // Define what rule sets will be applied
    $rectorConfig->sets([
        LaravelSetList::LARAVEL_120,
        LaravelSetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL,
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_ELOQUENT_MAGIC_METHOD_TO_QUERY_BUILDER,
    ]);
    $rectorConfig->import(SetList::EARLY_RETURN);
    $rectorConfig->import(SetList::DEAD_CODE);
    $rectorConfig->import(SetList::PHP_84);
};
