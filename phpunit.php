<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Symfony\Component\Finder\Finder;

const REPO = 'phpunit/phpunit';
const REPO_DIR = __DIR__ . '/phpunit';
const SRC_DIR = REPO_DIR . '/src';
const CACHE_DIR = __DIR__ . '/cache';
const DOCS_DIR = __DIR__ . '/docs';

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(SRC_DIR);

return new Sami($iterator, array(
    'title'             => 'PHPUnit API',
    'remote_repository' => new GitHubRemoteRepository(REPO, REPO_DIR),
    'cache_dir'         => CACHE_DIR,
    'build_dir'         => DOCS_DIR
));
