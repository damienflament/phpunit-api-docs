<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

const REPO = 'sebastianbergmann/phpunit';
const REPO_DIR = __DIR__ . '/phpunit';
const SRC_DIR = REPO_DIR . '/src';
const CACHE_DIR = __DIR__ . '/cache/%version%';
const DOCS_DIR = __DIR__ . '/docs/%version%';

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(SRC_DIR);

$versions = GitVersionCollection::create(REPO_DIR)
    ->add('4.8', '4.8 (old stable)')
    ->add('5.7', '5.7 (current stable)');

return new Sami($iterator, array(
    'title'             => 'PHPUnit API',
    'remote_repository' => new GitHubRemoteRepository(REPO, REPO_DIR),
    'versions'          => $versions,
    'cache_dir'         => CACHE_DIR,
    'build_dir'         => DOCS_DIR
));
