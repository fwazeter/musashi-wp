# Multi-Tenant WordPress Management CLI Tool

## Project Structure

- `/bin` - Executable scripts
- `/src` - PHP source code with class-based design
- `/templates` - Templates for configuration files like `wp-config.php`
- `/vendor` - Composer dependencies
- `.env.example` - Example dotenv file for server admin configurations
- `composer.json` - Composer configuration file

## Key Components

### CLI Entry Point (`/bin/wp-setup`)

A Bash or PHP script that serves as the entry point for the CLI tool. It will parse command-line arguments and invoke the appropriate PHP classes/methods.

### PHP Classes (`/src`)

- `SiteSetup`: Handles the setup of individual WordPress sites, including folder creation and environment setup.
- `UserManager`: Manages the creation and configuration of system users for FTP access and site management.
- `DatabaseManager`: Handles the creation of databases and database users in MariaDB.
- `Configurator`: Manages the creation and configuration of `wp-config.php`, mu-plugins, and shared utilities.
- `OpenLiteSpeedConfigurator`: Handles the configuration of OpenLiteSpeed, including vhosts and listeners.
- `MasterSetup`: Manages the setup of the master WordPress installation, including running `composer install` and setting directory permissions.

### Environment Configuration

Use `.env` files for storing environment-specific configurations (e.g., database credentials, paths). There should be a master `.env` file for server-wide configurations and individual `.env` files for each site/user.

### Composer for Dependencies

Define required packages in `composer.json`, including `vlucas/phpdotenv` for dotenv file management and `wp-cli/wp-cli` for WP-CLI interactions.

### Templates (`/templates`)

Store templates for configuration files that need to be dynamically generated, such as `wp-config.php`.

## Development Steps

1. **Setup Composer and Dependencies**: Initialize Composer in your project directory and include necessary packages.

2. **Implement PHP Classes**: Start by creating class skeletons based on the key components outlined above. Implement methods for each task, such as creating directories, managing database configurations, and setting up OpenLiteSpeed.

3. **CLI Entry Point**: Develop the CLI entry point script in `/bin`. This script should handle command-line arguments and invoke the appropriate methods from your PHP classes.

4. **Environment Management**: Implement logic to manage `.env` files for server admin configurations and individual site/user configurations.

5. **Testing and Iteration**: Test each component individually and then as a whole to ensure the tool functions as expected. Iterate based on test results and feedback.

6. **Documentation**: Document the usage of the CLI tool, including setup instructions, command-line options, and examples.

## Considerations

- **Security**: Ensure secure handling of credentials and permissions, especially when creating system users and managing database access.
- **Error Handling**: Implement robust error handling and logging to manage and troubleshoot issues effectively.
- **Flexibility**: Design the tool to be flexi