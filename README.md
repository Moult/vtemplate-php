# What is vtemplate?

vtemplate is a boilerplate setup for starting new projects which combines
various industry standards. Everything can be plugged in and out as desired.

Frontend:

 - H5BP 4.0.1
 - Stylus
 - Mustache (KOstache)
 - WYMEditor-based CMS

Backend:

 - Kohana 3.3
 - PSR-0
 - Composer

Development:

 - Behat
 - Mink
 - GNU make
 - Jasmine
 - Karma
 - Gulp

See the various `composer`, `npm`, and `bower` files for more recommendations.

## Anything added?

Although most code is vanilla industry standard, I have tweaked the following:

 1. Autoload static pages for rapid prototyping
 2. Ability to autorender templates from your controller
 3. The Driver component allows you to develop apps which combine libraries
    across different frameworks.
 4. The CMS dashboard is custom, and WYMEditor has been customised to support
    more HTML5 tags, and nesting of blocks.

# Documentation

Please start reading in `docs/vtemplate/`.

# Licenses

This software is open-source and free software. See `licenses/` for full text.
