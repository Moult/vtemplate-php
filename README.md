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
 - Moult/contact

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
 4. The WYMEditor-based CMS contains a customised version of WYMEditor. Included
    is a login dashboard, a themed editor, and support for more blocks such as
    article, section, divisions, citations, and code.

## Setup

To begin a fresh project with vtemplate, create your new git repository as
usual, then follow these instructions within your repository's root to merge
vtemplate into your repo.

 1. `git remote add -f vtemplate git://github.com/Moult/vtemplate.git`
 2. `git merge -Xtheirs vtemplate/master`

At any time, you can update your project to use the latest vtemplate via:

 1. `git fetch vtemplate`
 2. `git merge --no-commit vtemplate/master`

Please delete this README text up to the `# Installation` section after merging.

# Installation

 1. `curl -s https://getcomposer.org/installer | php`
 2. `php composer.phar install --dev`
 3. Configure `build.properties` and `behat.yml`
 4. `bin/phing -l`

# Licenses

This software is open-source and free software. See `licenses/` for full text.
