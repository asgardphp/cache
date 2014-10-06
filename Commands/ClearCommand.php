<?php
namespace Asgard\Cache\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Clear cache command.
 */
class ClearCommand extends \Asgard\Console\Command {
	/**
	 * {@inheritDoc}
	 */
	protected $name = 'cc';
	/**
	 * {@inheritDoc}
	 */
	protected $description = 'Clear the application cache';
	/**
	 * Cache dependency.
	 * @var \Doctrine\Common\Cache\Cache
	 */
	protected $cache;

	/**
	 * Constructor.
	 * @param \Doctrine\Common\Cache\Cache $cache
	 */
	public function __construct(\Doctrine\Common\Cache\Cache $cache) {
		$this->cache = $cache;
		parent::__construct();
	}

	/**
	 * {@inheritDoc}
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		if($this->cache->clear())
			$this->info('The cache has been cleared.');
		else
			$this->error('The cache could not be cleared.');
	}
}