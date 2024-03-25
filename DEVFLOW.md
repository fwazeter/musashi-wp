# Multi-Tenant WordPress Management CLI Tool Flowchart

This document outlines the flow of operations for the multi-tenant WordPress management CLI tool, from start to finish, assuming the use of the PHP League container and a master PHP class that coordinates everything.

## Flowchart Overview

1. **CLI Invocation**
    - The process begins with the user invoking the CLI tool from the command line.

2. **Command Parsing**
    - The CLI entry point parses the command and its arguments to determine the requested operation.

3. **Dependency Injection Container Initialization**
    - The PHP League Container is initialized to manage dependencies throughout the application.

4. **Master PHP Class Coordination**
    - An instance of the master PHP class (`AppCoordinator`) is created, which will coordinate the entire process.
    - The `AppCoordinator` utilizes the dependency injection container to resolve and manage dependencies.

5. **Environment Configuration Loading**
    - Server-wide and site-specific `.env` configurations are loaded using `vlucas/phpdotenv` to manage environment variables.

6. **Task Selection**
    - The system determines which task to perform based on the parsed command (e.g., site setup, user management, database setup).

7. **Site Setup**
    - If the task involves setting up a new site:
        - Site directories are created (`SiteSetup` class).
        - `wp-config.php` is configured, and shared utilities are copied (`Configurator` class).
        - Development and production environments are set up.

8. **User Management**
    - If the task involves managing a system user:
        - A system user with FTP access is created or updated (`UserManager` class).

9. **Database Management**
    - If the task involves setting up a database:
        - A new database and user are created in MariaDB (`DatabaseManager` class).

10. **OpenLiteSpeed Configuration**
    - If the task involves configuring the web server:
        - OpenLiteSpeed is configured with default settings for virtual hosts and listeners (`OpenLiteSpeedConfigurator` class).

11. **Master WordPress Installation**
    - For tasks involving the master WordPress installation (initial setup or updates):
        - `composer install` is run, and appropriate permissions are set on directories (`MasterSetup` class).

12. **Completion and Output**
    - The user is provided with feedback regarding the completion status of the task, along with any relevant output or errors.

## Visual Representation

- **Start**: The process begins.
- **User Input**: Represented by a parallelogram, indicating input required from the user.
- **Decision Nodes**: Diamond shapes used for decision points in the flow, such as determining the task to perform.
- **Process Nodes**: Rectangles represent each step in the process, such as loading environment configurations or creating site directories.
- **Sub-processes**: Rectangles with double-struck vertical edges indicate a group of actions or a sub-process within the flow.
- **End**: The point at which the process concludes.

This flowchart provides a high-level overview of the CLI tool's operation, focusing on key processes and decision points.
