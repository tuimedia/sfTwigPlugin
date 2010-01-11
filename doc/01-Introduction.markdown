Introduction
============
This is the [Symfony](http://symfony-project.org) plugin for integrating Twig into Symfony 1.3 / 1.4. Symfony 1.2 mayb work but has not been tested.

About Twig
----------
[Twig](http://twig-project.org) is a template parser created by [Fabien Potencier](http://fabien.potencier.org).

### From Twig's readme
> Twig is a template language for PHP, released under the new BSD license (code
> and documentation).
>
> Twig uses a syntax similar to the Django and Jinja template languages which
> inspired the Twig runtime environment.

Install
-------
To use this plugin extract the contents into ``plugins/sfTwigPlugin`` and enabled it in Symfony's ``ProjectConfiguration.class.php``. After you have cloned the respository. You have to init and update the submodules. Which will download the Twig project into vendor/Twig. A submodule is used because some people may already have Twig installed globally on their machine.

Create ``module.yml`` in ``config/`` or ``apps/frontend/config``. With the following contents.
    all:
        view_class: sfTwig
        partial_view_class: sfTwig
        
Run the task ``./symfony cc`` and your done. All that is left now is to create new templates that uses ``.html`` extension. 

Usage
-----
I recommend everyone to check out the documentation on Twig's website. There it is explained how to create extensions, filters and the general usage of templates. Else read the rest of the documents in this directory.