<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends ContainerAwareCommand
{
    private const COMMAND_NAME = 'csv-parser:import';
    private const COMMAND_DESCRIPTION = 'Import data from CSV file to database';
    private const COMMAND_TEST_MODE_OPTION_NAME = 'test';
    private const COMMAND_TEST_MODE_DESCRIPTION = 'If set, everything will be performed except inserting data to the database';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::COMMAND_DESCRIPTION)
            ->addOption(
                self::COMMAND_TEST_MODE_OPTION_NAME,
                null,
                InputOption::VALUE_NONE,
                self::COMMAND_TEST_MODE_DESCRIPTION
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $isTestOptionSet = $input->getOption(self::COMMAND_TEST_MODE_OPTION_NAME);
        $mode = $isTestOptionSet ? 'test' : 'working';

        $output->writeln(sprintf("%s: %s mode", self::COMMAND_NAME, $mode));
    }
}