<?php
// src/Core/Cli.php

namespace Musashi\Core;

use Musashi\Setup\Installer;
use Musashi\User\UserManager;

class Cli
{

	/**
	 * Installer
	 *
	 * @var Installer
	 */
	protected Installer $installer;

	/**
	 * UserManager
	 *
	 * @var UserManager
	 */
	protected UserManager $userManager;

	public function __construct(UserManager $userManager, Installer $installer)
	{
		$this->userManager = $userManager;
		$this->installer = $installer;
	}

	public function run()
	{
		$args = $_SERVER['argv'];
		array_shift($args); // Remove the script name

		$command = $args[0] ?? null;

		switch ($command) {
			case 'install':
				$this->install();
				break;
			case 'user':
				$username = $args[1] ?? null;
				$this->userManager->createUser($username);
				break;
			default:
				echo "Unknown command: $command\n";
				break;

		}
	}

	public function install()
	{
		$this->installer->run();
	}

	protected function createSite($args)
	{
		// Extract and validate arguments like USER and SITE
		// Implement the logic to create directories, set up environments, etc.
		echo "Creating site...\n";
	}
}
