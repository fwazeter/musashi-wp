<?php
// src/Setup/Installer.php

namespace Musashi\Setup;

class Installer
{
	public function run()
	{
		echo "Starting installation...\n";

		// Check for dependencies like PHP and WP-CLI
		$this->checkDependencies();

		// Set up the master WordPress installation
		$this->setupMasterWordPress();

		echo "Installation completed successfully.\n";
	}

	protected function checkDependencies()
	{
		$wpCliPath = __DIR__ . '/../vendor/bin/wp';

		echo "Checking dependencies...\n";

		// Check for WP-CLI globally or locally
		echo "Checking for WP-CLI...\n";

		if (!shell_exec('which wp') && !file_exists($wpCliPath)) {
			echo "Error: WP-CLI is not installed globally or locally.\n";
			exit(1);
		} else {
			echo "WP-CLI is installed. [Press Enter to continue]";
			fgets(STDIN);  // Wait for user to press Enter
		}

		// Check for PHP version
		echo "Checking for PHP version...\n";
		if (version_compare(PHP_VERSION, '8.1', '<')) {
			echo "Error: PHP 8.1 or higher is required.\n";
			exit(1);
		} else {
			echo "PHP version is " . PHP_VERSION . ". [Press Enter to continue]";
			fgets(STDIN);  // Wait for user to press Enter
		}



		echo "All dependencies are met.\n";
	}


	protected function setupMasterWordPress()
	{
		echo "Setting up master WordPress installation...\n";
		// Implement the logic to download and configure the master WordPress instance
	}

	// Additional installation tasks can be added as methods here...
}
