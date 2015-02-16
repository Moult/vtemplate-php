# What is vtemplate?

vtemplate is a boilerplate setup for starting new web interfaces which combines
various industry standards. Everything can be plugged in and out as desired.

vtemplate is _not_ a framework to build your entire application. vtemplate does
not enforce any of the dependencies it recommends - even Kohana can be
unplugged.

The template code recommends a setup using H5BP, Stylus, and Mustache. The
server code recommends using Kohana, Composer, and your own PSR-0 libraries. The
client code recommends NPM and Bower. The tests recommend Behat, Mink, Jasmine
and Karma. The build system recommends GNU make and gulp.

See the various `composer`, `npm`, and `bower` files for more recommendations.

Please start reading in `docs/vtemplate/` to learn more.

## Anything added?

Although most code is vanilla industry standard, I have tweaked the following:

 1. Autoload static pages for rapid prototyping
 2. Ability to autorender templates from your controller
 3. The Driver component allows you to develop apps which combine libraries
    across different frameworks.
 4. The CMS dashboard is custom, and WYMEditor has been customised to support
    more HTML5 tags, and nesting of blocks.

# Licenses

This software is open-source and free software. See `licenses/` for full text.
