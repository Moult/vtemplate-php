# What is vtemplate?

vtemplate is a boilerplate setup for starting new projects which combines
various industry standards.

Frontend:

 - H5BP 4.0.1
 - Stylus
 - Mustache (KOstache)
 - WYMEditor-based CMS

Backend:

 - Kohana 3.3
 - PSR-0
 - Composer
 - Swiftmailer

Development:

 - PHPSpec2
 - Behat + Mink
 - Phing

## Anything added?

Although most code is vanilla industry standard, I have tweaked the following:

 1. Catchall route autoloads Static templates without need for a view. See
    `application/classes/Controller/Static.php`. E.g. `static/foo/` will load
    `APPPATH/templates/static/foo.mustache`
 2. Autorendering templates. See `application/classes/Controller/Core.php`
 3. Drivers to help connect KO libraries with framework agnostic domain code.
    Includes a simplified MySQL Auth driver, Swiftmailer based email driver,
    KOstache integrated formatting driver, and validation driver. All code in
    `modules/driver/`

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

## Development

 1. `curl -s https://getcomposer.org/installer | php`
 2. `php composer.phar install --dev`
 3. `vim behat.yml`
 4. `vim build.xml`

`bin/behat` and `bin/phpspec` is now available to you. PHPSpec2 is set to load
classes in `application/classes/`.

`phing -projecthelp` lists all tools.

# Licenses

This software is open-source and free software. See `licenses/` for full text.
