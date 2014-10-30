set :application, 'open-dai.eu'
set :repo_url, 'git@github.com:netport/open-dai.eu.git'

# Branch options
# Prompts for the branch name (defaults to current branch)
ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }

# Sets branch to current one
#set :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }

# Hardcodes branch to always be master
# This could be overridden in a stage config file
# set :branch, :master

set :log_level, :error

set :linked_files, %w{.env web/.htaccess}
set :linked_dirs, %w{web/app/uploads web/app/upgrade}

set :npm_target_path, -> { release_path.join('web/app/themes/open-dai') }
set :npm_flags, '--silent'

set :bower_target_path, -> { release_path.join('web/app/themes/open-dai') }
set :bower_flags, '--quiet --allow-root'

set :grunt_file, -> { release_path.join('web/app/themes/open-dai/Gruntfile.js') }
set :grunt_tasks, 'build'
after 'bower:install', 'grunt'

# namespace :deploy do
#   desc 'Change ownership of deployed files to server user'
#   task :chown do
#     on roles(:app), in: :sequence, wait: 5 do
#       execute :chown, "-R apache:apache #{release_path}"
#       execute :chown, "-R apache:apache #{current_path}"
#     end
#   end
# end
# after 'deploy:publishing', 'deploy:chown'
