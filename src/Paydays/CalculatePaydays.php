<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App\Paydays;

use App\Transformers\Transformer;

class CalculatePaydays
{
    private $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function handle(Transformer $transformer)
    {
        $paymentMonths = [];

        for ($month = 1; $month <= 12; $month++) {

            $byYearAndMonth = new ByYearAndMonth($this->year, $month);

            $paymentMonths[] = $byYearAndMonth->handle();
        }

        return $transformer->transformMonths($paymentMonths);
    }
}