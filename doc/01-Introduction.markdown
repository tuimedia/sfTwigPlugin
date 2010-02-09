Introduction
============

This is the [Symfony](http://symfony-project.org) plugin for integrating Twig
into Symfony 1.3 / 1.4. Symfony 1.2 mayb work but has not been tested.


About Twig
----------

[Twig](http://twig-project.org) is a template parser created by [Fabien
Potencier](http://fabien.potencier.org).


### From Twig's readme
> Twig is a template language for PHP, released under the new BSD license (code
> and documentation).
> Twig uses a syntax similar to the Django and Jinja template languages which
> inspired the Twig runtime environment.


Install
-------

To use this plugin extract the contents into ``plugins/sfTwigPlugin`` and
enabled it in Symfony's ``ProjectConfiguration.class.php``. After you have
cloned the respository. You have to init and update the submodules. Which will
download the Twig project into vendor/Twig. A submodule is used because some
people may already have Twig installed globally on their machine.

Create ``module.yml`` in ``config/`` or ``apps/frontend/config``. With the
following contents.

    all:
        view_class: sfTwig
        partial_view_class: sfTwig

Run the task ``./symfony cc`` and your done. All that is left now is to create
new templates that uses ``.html`` extension. 


### PEAR

When ever a new tag is created in the git respository a release will show up on
[pearhub.org/projects/sfTwigPlugin](http://pearhub.org/projects/sfTwigPlugin)
this makes it possible to use the standard ``./symfony plugin:install
PATH_TO_RELEASE`` when installing the plugin.

In the future it will be possible to use ``./symfony plugin:install -c
'pearhub.org' sfTwigPlugin`` but a bug in the plugin installer task hinders it
from working with [pearhub.org](http://pearhub.org)


### Extra

If you plan on using global partials e.g. "global/partial". You must set
``mod_global_partial_view_class`` manually since it wont get populated dynamic.
This can be done in ``ProjectConfiguration.class.php`` with
``sfConfig::set('mod_global_partial_view_class', 'sfTwig')`` This will force
sfTwigPartialView to be used for the global module.


Usage
-----

I recommend everyone to check out the documentation on Twig's website. There it
is explained how to create extensions, filters and the general usage of
templates. Else read the rest of the documents in this directory.

