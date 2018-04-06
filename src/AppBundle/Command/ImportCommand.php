<?php

namespace AppBundle\Command;

use AppBundle\Service\ImportProcessBuilder;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends ContainerAwareCommand
{
    private const COMMAND_NAME = 'csv-parser:import';
    private const COMMAND_DESCRIPTION = 'Import data from CSV file to database';
    private const FIlE_ARGUMENT_NAME =  'file';
    private const FIlE_ARGUMENT_DESCRIPTION = 'File with CSV formatted data for import';
    private const TEST_MODE_OPTION_NAME = 'test';
    private const TEST_MODE_OPTION_DESCRIPTION = 'If set, everything will be performed except inserting data to the database';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::COMMAND_DESCRIPTION)
            ->addArgument(
                self::FIlE_ARGUMENT_NAME,
                InputArgument::REQUIRED,
                self::FIlE_ARGUMENT_DESCRIPTION
            )
            ->addOption(
                self::TEST_MODE_OPTION_NAME,
                null,
                InputOption::VALUE_NONE,
                self::TEST_MODE_OPTION_DESCRIPTION
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ImportProcessBuilder $importProcessBuilder */
        $importProcessBuilder = $this->getContainer()->get('import_process_builder');
        $filePath = $input->getArgument(self::FIlE_ARGUMENT_NAME);
        $isTestMode = $input->getOption(self::TEST_MODE_OPTION_NAME);

        try {
            $result = $importProcessBuilder->importData($filePath, $isTestMode);
            $output->writeln(
                $this->getMessageForPrint($result)
            );
        } catch (\Exception $ex) {
            $output->writeln(
                $this->getMessageForPrint($ex->getMessage())
            );
        }
    }

    /**
     * @param string $message
     *
     * @return string
     */
    private function getMessageForPrint(string $message): string
    {
        return sprintf('%s: %s', self::COMMAND_NAME, $message);
    }
}