# Colene McFarlane

Repo for my portfolio website [https://colenemcfarlane.com](https://colenemcfarlane.com)

This website is built on WordPress and uses the Bedrock folder structure and a modified version of the Sage (v9) starter theme provided by [roots.io](https://root.io).

## Project Requirements

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.1.3 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 8.0.0
* [Yarn](https://yarnpkg.com/en/docs/install)
* [Tailwaind CSS](https://tailwindcss.com/docs/installation) >= 2


## Project structure

```sh
├── composer.json                   # → Manage versions of WordPress, plugins & dependencies
├── config/                         # → WordPress configuration files
│   ├── application.php             # → Primary WP config file (wp-config.php equivalent)
│   └── environments/               # → Environment specific configs
│       ├── development.php         # → Development config
│       └── staging.php             # → Staging config
├── vendor/                         # → Composer packages (omitted in .gitignore, but never edit)
└── web/                            # → Web root (document root on your webserver)
    ├── app/                        # → wp-content equivalent
    │   ├── mu-plugins/             # Must use plugins
    │   ├── plugins/                # Plugins
    │   └── themes/your-theme-name/ # → Root of your Sage based theme
    │       ├── app/                # → Theme PHP
    │       │   ├── Controllers/    # → Controller files
    │       │   ├── admin.php       # → Theme customizer setup
    │       │   ├── filters.php     # → Theme filters
    │       │   ├── helpers.php     # → Helper functions
    │       │   └── setup.php       # → Theme setup
    │       ├── composer.json       # → Autoloading for `app/` files
    │       ├── composer.lock       # → Composer lock file (never edit)
    │       ├── dist/               # → Built theme assets (never edit)
    │       ├── node_modules/       # → Node.js packages (never edit)
    │       ├── package.json        # → Node.js dependencies and scripts
    │       ├── resources/          # → Theme assets and templates
    │       │   ├── assets/         # → Front-end assets
    │       │   │   ├── config.json # → Settings for compiled assets
    │       │   │   ├── build/      # → Webpack and ESLint config
    │       │   │   ├── fonts/      # → Theme fonts
    │       │   │   ├── images/     # → Theme images
    │       │   │   ├── scripts/    # → Theme JS
    │       │   │   └── styles/     # → Theme stylesheets
    │       │   ├── functions.php   # → Composer autoloader, theme includes
    │       │   ├── index.php       # → Never manually edit
    │       │   ├── screenshot.png  # → Theme screenshot for WP admin
    │       │   ├── style.css       # → Theme meta information
    │       │   └── views/          # → Theme templates
    │       │       ├── layouts/    # → Base templates
    │       │       └── partials/   # → Partial templates
    │       └── vendor/             # → Composer packages (never edit)
    ├── wp-config.php               # → Required by WP (never edit)
    ├── index.php                   # → WordPress view bootstrapper
    └── wp/                         # → WordPress core (never edit)
```

## Bedrock configuration
1. Copy .env.example to .env:
    ```sh
    $ cp .env.example .env
    ```
2. Update environment variables in the `.env` file:
    * Database variables
      * `DB_NAME` - Database name
      * `DB_USER` - Database user
      * `DB_PASSWORD` - Database password
      * `DB_HOST` - Database host
      * Optionally, you can define `DATABASE_URL` for using a DSN instead of using the variables above (e.g. `mysql://user:password@127.0.0.1:3306/db_name`)
    * `WP_ENV` - Set to environment (`development`, `staging`, `production`)
    * `WP_HOME` - Full URL to WordPress home (https://example.com)
    * `WP_SITEURL` - Full URL to WordPress including subdirectory (https://example.com/wp)
    * `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`
      * Generate with [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command)
      * Generate with [our WordPress salts generator](https://roots.io/salts.html)
3. Add theme(s) in `web/app/themes/` as you would for a normal WordPress site
4. Set the document root on your webserver to Bedrock's `web` folder: `/path/to/site/web/`
5. Access WordPress admin at `https://example.com/wp/wp-admin/`
6. MAKE SURE THIS FILE IS IN YOUR .gitignore

## Sage theme installation

1. Start your virtual machine (MAMP/Xampp/Vagrant) 
2. Navigate to your WordPress theme directory (replace `your-theme-name` below with the name of your theme) and run the following:

    ```sh
    $ cd web/app/themes/[your-theme-name]
    $ composer install
    $ yarn
    ```
3. Modify `resources/assets/config.json` to reflect:
    * `devUrl` - dev environment hostname (e.g., http://127.0.0.1)
    * `publicPath` - folder location of your theme (e.g., app/themes/cmcfarlane OR `/wp-content/themes/sage` for non-[Bedrock](https://roots.io/bedrock/) installs)
4. Edit `app/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, and sidebars.
5. Build commands:
    * `yarn start` — Compile assets when file changes are made, start Browsersync session
    * `yarn build` — Compile and optimize the files in your assets directory
    * `yarn build:production` — Compile assets for production

## Documentation
* [Bedrock documentation](https://roots.io/bedrock/docs/)
* [Sage documentation](https://roots.io/sage/docs/)
* [Controller documentation](https://github.com/soberwp/controller#usage)
