Configuration
=============
sfTwigPlugin tries to follow the convention over configuration guidelines where possible. Still there is possibilities of configuring the sfTwigView through standard Symfony settings.

Settings
--------
Right now the configuration is kinda limited or not needed. sfTwigView uses ``sf_debug`` to determaine if Twig should autoreload and cache the templates.

### Settings.yml
There have been added a ``sf_twig_extensions`` options in ``settings.yml`` that holds an array of Twig_Extension classes. sfTwigView takes all thoose names and tries to initiate them into ``Twig_Environment::addExtension()``. If it can not do that, it will throw a ``InvalidArgumentException``.

