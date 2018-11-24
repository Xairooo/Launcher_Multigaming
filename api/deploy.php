<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Emodyz Dev');
// Project repository
set('repository', 'git@github.com:MrDarkSkil/Launcher_Multigaming.git');
// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);
// Shared files/dirs between deploys
set('shared_files', [
    '.env'
]);
// Laravel shared dirs
set('shared_dirs', [
    'storage'
]);
// Writable dirs by web server
set('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

host('production')
    ->user('root')
    ->hostname('dev.emodyz.eu')
    ->set('branch', 'webpanel-refactor')
    ->set('deploy_path', '/var/www/dev');

task('change:deploy_path', function () {
    $release_path = get('release_path');
    $release_path .= '/api';
    set('release_path', $release_path);
});


after('deploy:update_code', 'change:deploy_path');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate:fresh');
before('artisan:migrate:fresh', 'artisan:db:seed');