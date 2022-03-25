<?php
namespace Deployer;

require 'recipe/wordpress.php';

// Project name
set('application', 'Ermitrade');

// Project repository
set('repository', 'https://github.com/manifest-multimedia/ermitradetravel.git');

// [Optional] Allocate tty for git clone. Default value is false.
// set('git_tty', false); 
set('ssh_type', 'native');
set('ssh_multiplexing', false); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);
set('allow_anonymous_stats', false); 

// Hosts

host('54.160.228.171')
    ->user('ermitrade')
    ->set('deploy_path', '/var/www/ermitradetravel.com');    
    

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
