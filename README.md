# Mautic MZagmajster Field Group Bundle

Add new field groups via plugin configuration.

Please find procedure to add new field groups to Mautic below (sections: Installing, Deployment).

## Getting Started

### Prerequisites

* Composer 2
* Mautic 4


### Installing

Use hooks from .githooks folder on project by executing:

```
./bin/init.sh
```

**Initial install** described below.

```
cd <mautic-root-folder>
rm -rf var/cache/dev/* var/cache/prod/*
cd plugins
git clone <repo-url> MZagmajsterFieldGroupBundle
cd MZagmajsterFieldGroupBundle
composer install  # You only need this druing development.
php bin/console mautic:plugins:install --dev  # You should get a message saying one or more plugins have been installed in terminal.
```

Typical **update** of plugin source code described below.

* Backup your current ```Config/config.php``` file as you will have to set the parameters again after you update the plugin´s source code.

* Make sure plugin root folder is clean from git´s point of view and update the source code.

```
cd <mautic-root-folder>
cd plugins/MZagmajsterFieldGroupBundle
git pull origin <branch>
```

```
rm -rf var/cache/dev/* var/cache/prod/*
php bin/console mautic:plugins:reload --env=dev
```

## Running the tests

[No tests yet.]

### Coding style

Please refer to PHP CS file for details on coding styles.

From plugin root folder you can also run the following commands during development.

* ```composer lint``` - Checks the PHP syntax.
* ```composer checkcs``` - Checks code formatting && show what should be fixed (does not touch source files).
* ```composer fixcs``` - Fixes code formatting (updates soruce files).

## Deployment

* You do not have to install any composer packages inside plugin folder since we only use it during development.
* When you are deploying the plugin make sure you call ```php bin/console``` command without --dev switch.
* Open Configuration menu on the right Side -> Custom Field Groups
* Add a group(s) you want for example: "mygroup", optionally add a description, save it.
* Update the translation file in ```<plugin-root>/Translations/messages.ini```

## Changelog

* **0.0.3** - Enable new groups via file-based plugin configuration.
* **1.0.0** - Store custom groups in database, add GUI & API

## Documentation

For additional documentation check the docs folder in this repository.

## Built With

* [Mautic](https://github.com/mautic/) - Open Source Marketing Automation Tool
* [Composer](https://getcomposer.org/) - Dependency Management

## Contributing

- If you have a suggestion for the feature or improvement consider opening an issue on GitHub (just make sure the same issue does not already exist).
- If you want, you can open a pull request and I will make an effort to merge it.
- Finally if this project was helpful to you consider supporting it with a donation via [PayPal](https://paypal.me/maticzagmajster). **Thank you!**

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the tags on this repository. 

## Authors

Content in this project was provided by [Matic Zagmajster](http://maticzagmajster.ddns.net/). For more information please see ```AUTHORS``` file.

## Acknowledgments

* Thanks to entire Mautic Community for providing awesome marketing automation tool.



