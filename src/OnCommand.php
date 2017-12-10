<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App;

use App\Paydays\CalculatePaydays;
use App\Transformers\DefaultTransformer;
use App\Transformers\FileTransformer;
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
                'output',
                'o',
                InputOption::VALUE_OPTIONAL,
                'Ouput: file, standard (default)'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $year = $input->getArgument('year');
        $outputOption = $input->getOption('output');
        $languageOption = $input->getOption('lang');

        $calculatePaydays = new CalculatePaydays($year);


        if (empty($outputOption) || $outputOption == 'standard') {

            return $this->handleTableOutput(
                $calculatePaydays, $output, $languageOption
            );
        }

        return $this->handleFileOutput(
            $year, $calculatePaydays, $output, $languageOption
        );

    }

    private function handleTableOutput(
        CalculatePaydays $calculatePaydays,
        OutputInterface $output,
        $languageOption)
    {
        $transformer = new DefaultTransformer($languageOption);

        $paydays = $calculatePaydays->handle($transformer);

        $table = new Table($output);

        $table->setHeaders([
            translate($languageOption, 'Month Name'),
            translate($languageOption, '1st expenses day'),
            translate($languageOption, '2nd expenses day'),
            translate($languageOption, 'Salary day'),
        ])->setRows($paydays)
            ->render();
    }

    private function handleFileOutput(
        $year,
        CalculatePaydays $calculatePaydays,
        OutputInterface $output,
        $languageOption)
    {
        $transformer = new FileTransformer($languageOption);

        $paydays = $calculatePaydays->handle($transformer);

        $filename = 'paydays_' . $year . '.csv';

        file_put_contents($filename, $paydays);

        $output->writeln("<info>Paydays saved to {$filename}</info>");
    }
}