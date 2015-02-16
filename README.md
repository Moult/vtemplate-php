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

## Why vtemplate?

 1. vtemplate prefers vanilla industry standards rather than locking you into a
    framework or a technology.
 2. It's lean, plug in and out using your package/dependency manager of choice,
    and modify the build system as you require.
 3. It appreciates the varied ecosystem of a web interface: the server
    requirements, the rich client requirements, and how to separate them and
    deploy them cleanly.

## Documentation

Please start reading in `docs/vtemplate/` to learn more.

As the official docs are currently somewhat outdated (though the principles
still apply), here's a quick start:

 1. `make prepare VTEMPLATE_CONFIG=/path/to/vtemplate.conf`
 2. `make develop`
 3. `cp docs/vtemplate.conf.example /path/to/vtemplate.conf`
 4. `vim /path/to/vtemplate.conf`
 5. Point webserver of choice to `src/www/`

For deploying, replace step 2 with:

 1. `make compile`
 2. `make install INSTALL_PATH=/path/to/install/dir/`

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
