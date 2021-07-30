# Mautic Plugin Boilerplate

Empty Mautic plugin bundle (zero functionality). Tested on **Mautic 3.3.3**. Go ahead use this boilerplate and provide more custom functionality to Mautic - Open source Marketing Automation Tool.

## Getting Started

### Prerequisites

* Composer 1
* Mautic 3


### Installing

**Initial install** described below.

```
cd <mautic-root-folder>
rm -rf var/cache/dev/* var/cache/prod/*
cd plugins
git clone <repo-url> MauticHelloWorldBundle
cd <mautic-root-folder>
composer install  # You only need this druing development.
php bin/console mautic:plugins:install --dev  # You should get a message saying one or more plugins have been installed in terminal.
```


Typical **update** of plugin source code described below.

* Make sure plugin root folder is clean from git´s point of view.

```
cd <mautic-root-folder>
rm -rf var/cache/dev/* var/cache/prod/*
cd plugins/MauticHelloWorldBundle
git pull origin <branch>
php bin/console mautic:plugins:reload --dev  # You should get a message saying one or more plugins have been installed in terminal.
```

## Running the tests

[No tests yet.]

### Coding style

Please refer to PHP CS file for details on coding styles.

From plugin root folder you can also run the following commands during development.

* ```composer lint``` - Checks the PHP syntax.
* ```composer checkcs``` - Check code formatting && show what should be fixed (does not touch source files).
* ```composer fixcs``` - Fixes code formatting (updates soruce files).

## Deployment

* You do not have to install any composer packages inside plugin folder since we only use it during development.
* When you are deploying the plugin make sure you call ```php bin/console``` command without --dev switch.

## Changelog

[No changelog yet.]

## Documentation

[No documentation yet.]

## Built With

* [Mautic](https://github.com/mautic/) - Open Source Marketing Automation Tool
* [Composer](https://getcomposer.org/) - Dependency Management

## Contributing

Please read ```CONTRIBUTING.md``` for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the tags on this repository. 

## Authors

Content in this project was provided by [Matic Zagmajster](http://maticzagmajster.ddns.net/). For more information please see ```AUTHORS``` file.

## Acknowledgments

* Thanks to entire Mautic Community for providing awesome marketing automation tool.



