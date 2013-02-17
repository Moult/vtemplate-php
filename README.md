# What is vtemplate?

vtemplate is a boilerplate setup for starting new projects. It takes the best of
the frontend worlds (a customised H5BP) and the backend worlds (KO routing,
PSR-0 loaded apps, modules, Composer), glues them together with an amazing
template engine (Mustache/KOstache), and provides the infrastructure for good
application development with PHPSpec2 and Behat, wrapped inside Phing.

## Anything added?

 1. An experimental CMS is implemented with WYMEditor. It's in `modules/cms/`
 2. Catchall route autoloads Static templates without need for a view. See
    `application/classes/Controller/Static.php`. E.g. `static/foo/` will load
    `APPPATH/templates/static/foo.mustache`
 3. Autorendering templates. See `application/classes/Controller/Core.php`

## Setup

To begin a fresh project with vtemplate, create your new git repository as
usual, then follow these instructions within your repository's root to merge
vtemplate into your repo.

 1. `git remote add -f vtemplate git://github.com/Moult/vtemplate.git`
 2. `git merge -Xtheirs vtemplate/master`

You are now free to use vtemplate. You will still need to install it, of course!

At any time, you can update your project to use the latest vtemplate via:

 1. `git fetch vtemplate`
 2. `git merge --no-commit vtemplate/master`

Please delete this README text up to the `# Installation` section after merging.

# Installation

 1. `git submodule update --init --recursive`
 2. Verify `RewriteBase /` in `.htaccess`
 3. Verify `application/logs/` and `application/cache/` are writeable
 4. Configure everything in `application/config/*`
 5. Configure `application/bootstrap.php`

## Deployment

Please move `application`, `system`, and `modules` outside the DOCROOT and
modify `index.php` as necessary for added security.

## Development

 1. `curl -s https://getcomposer.org/installer | php`
 2. `php composer.phar install --dev`
 3. `vim behat.yml`
 4. `vim build.xml`

`bin/behat` and `bin/phpspec` is now available to you. PHPSpec2 is set to load
classes in `application/classes/`.

`phing -projecthelp` lists all tools.

# Foundation

This application is built upon Kohana 3.3 and HTML5 Boilerplate 4.0.1.

# Licenses

This software is open-source and free software..

All licenses used are viewable in `licenses/`.

# Credits

Please see `humans.txt`.
