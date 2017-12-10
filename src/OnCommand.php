<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App;

use App\Paydays\CalculatePaydays;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class OnCommand extends SymfonyCommand
{
    protected function configure()
    {
        $this->setName('on')
            ->setDescription('Specify year for paydays.')
            ->addArgument(
                'year',
                InputArgument::REQUIRED,
                'Numerical format of a year.'
            )
            ->addOption(
                'lang',
                'l',
                InputOption::VALUE_OPTIONAL,
                'Change language using language locale, .e.g fr for French.'
            )
            ->addOption(
                'format',
                'f',
                InputOption::VALUE_OPTIONAL,
                'Ouput format: text or json.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $year = $input->getArgument('year');

        $calculatePaydays = new CalculatePaydays($year);

        $paydays = $calculatePaydays->handle();

        $table = new Table($output);

        $table->setHeaders([
            'Month Name',
            '1st expenses day',
            '2nd expenses day',
            'Salary day'
        ])->setRows($paydays)
            ->render();
    }
}