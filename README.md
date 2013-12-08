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
 4. The WYMEditor-based CMS contains a customised version of WYMEditor. Included
    is a login dashboard, a themed editor, and support for more blocks such as
    article, section, divisions, citations, and code.

# Documentation

Please start reading in `docs/vtemplate/`.

# Licenses

This software is open-source and free software. See `licenses/` for full text.
