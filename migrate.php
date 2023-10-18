<?php

function runMigrations()
{
    $dir = __DIR__ . '/migrations/';
    $files = scandir($dir);

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            include_once $dir . $file;
            echo "Executed migration: $file\n";
        }
    }
}

runMigrations();
