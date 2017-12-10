<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App\Paydays;

class CalculatePaydays
{
    private $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function handle()
    {
        $paymentMonths = [];

        $transformer = new DefaultTransformer();

        for ($month = 1; $month <= 12; $month++) {

            $byYearAndMonth = new ByYearAndMonth($this->year, $month);

            $paymentMonths[] = $transformer
                ->transform($byYearAndMonth->handle());
        }

        return $paymentMonths;
    }
}