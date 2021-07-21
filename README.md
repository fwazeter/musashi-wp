# WP Multitenant Overview

_Version 1.1.4_

A multi tenant application is an architectural concept in which a single instance of a piece of software is configured to serve multiple customers, often times called tenants. In a multi tenant WordPress environment, each tenant would share the same core configuration, themes, plugins, and more, while keeping its data and uploads as a separate entity.

This project intends to offer anyone the ability to run a small handful, or hundreds of individual WordPress installations using one core set of configuration files, making maintenance and updates a breeze.

For WP Multi Tenant to function it should sit at the same level (or higher) then the domain paths. It would look similar to the following.

```
/path_to_server
    |__ domain.com
    |__ example.com
    |__ demo.com
    |__ wp-multitenant
```

# Step 1: Multitenant Setup

The following are the steps to setup the wp-multitenant repo.

### Clone Repo

- Clone repo into multitenant `/path_to_server/wp-multitenant`

**Note:** You can are limited to using `wp-multitenant` in the path. Set that to whatever you want but be sure to change it in the `.env` file as shown in the next section.

### Env Vars

- Duplicate `/config/env.example` and name it `.env`
- Env vars that need updating are as follows:

| Env Variable    | Description                                                  |
| :-------------- | :------------------------------------------------------------|
| DB_USER         | Set databse username                                         |
| DB_PASSWORD     | Set database password                                        |
| DB_HOST         | Set database host (may not be required, localhost is common) |
| ENV_CURRENT_ENV | Set development environment                                  |
| ENV_BASE_SERVER | Set base server path (`/path_to_server`)                     |
| WP_ROOT_PATH    | Path to cloned repo `wp-multitenant`                         |

**Note:** If you cloned the repo into anything other than `wp-multitenant` change the reference in the `WP_ROOT_PATH`

### Composer Install

- Duplicate `composer.example.json` and named it `composer.json`
- Open terminal and from `/path_to_server/wordpress` run `composer install`

**Note:** Additional information about working with composer can be found in the `technical docs` (coming soon)

# Step 2: Installing WordPress

This repo includes a simple installation script that will build the folder and folder structure and the create necessary symlinks.

### Install Script

- Duplicate `/scripts/install.example.sh` and name it `install.sh`
- Copy `/scripts/install.sh` to the root of the domain folder (ie: `/path_to_server/example.com`)
- Edit the copied `install.sh` file and change `path_to_multitenant` on lines 8, 10 and 12 to reflect your paths on various server setups
- From the domain folder run `bash install.sh local`

**Note:** when running the installer you are required to use `local`, `dev` or `prod`

----------------

## Multisite

If you choose yes to setting up multisite there are a couple of manual items to update:

- Edit your .env file on the server, look for `ENV_MULTISITE="false"` and change this to `ENV_MULTISITE="true"`
- Vist the admin of your site, under `Options` go to `Network Setup` and follow the instructions there.
- Once the network is setup, edit the `site-config.php` of your install and uncomment the constants that are labeled for multisite (lines 44-49)

----------------

## Credit

Thanks to Mark Jaquith for the [base setup concept](https://gist.github.com/markjaquith/6225805) that helped bring this entire idea to life.