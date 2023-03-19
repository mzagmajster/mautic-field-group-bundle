# Mautic MZagmajster Field Group Bundle

Add new field groups via plugin configuration.

(no gui yet)

Please find procedure to add new field groups to Mautic below (sections: Installing, Deployment).

## Getting Started

### Prerequisites

* Composer 1
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
cd <mautic-root-folder>
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

* Put parameters from your backup file back in current Config/config.php file and reload the plugin.

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
* Add new field groups inside ```Config/config.php``` file to parameters array, after comment "Add new groups." For example:

```
'parameters' => [
        'mz_fgb_field_groups' => [
            'mautic.lead.field.group.core'              => 'core',
            'mautic.lead.field.group.social'            => 'social',
            'mautic.lead.field.group.personal'          => 'personal',
            'mautic.lead.field.group.professional'      => 'professional',

            /** Add new groups. */
            'Test Field Group' => 'test1'
        ],
    ],
```

The above example will add one new field group named: "Test Field Group" in addition to Mautic core groups.

**ATTENTION: Once you are happy with field group configuration please back it up somewhere, as there is a chance plugin config file will change in future updates and overwrite your configuration, when this happens you will need to put configuration back into the file.**

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

- If you have a suggestion for the feature or improvement consider opening an issue on GitHub (just make sure the same issue does not already exists).
- If you want, you can open a pull request and I will make an effort to merge it.
- Finally if this project was helpful to you consider supporting it with a donation via PayPal. Thank you!


## Acknowledgments

* Thanks to entire Mautic Community for providing awesome marketing automation tool.



