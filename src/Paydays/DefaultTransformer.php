<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App\Paydays;

use Carbon\Carbon;

class DefaultTransformer
{
    const DATE_TIME_FORMAT = 'Y-m-d';

    public function transform(array $dates)
    {
        /** @var Carbon $firstExpenses */
        $firstExpenses = $dates[0];
        /** @var Carbon $secondExpenses */
        $secondExpenses = $dates[1];
        /** @var Carbon $salary */
        $salary = $dates[2];

        return [
            $firstExpenses->format('F'),
            $firstExpenses->format(self::DATE_TIME_FORMAT),
            $secondExpenses->format(self::DATE_TIME_FORMAT),
            $salary->format(self::DATE_TIME_FORMAT),
        ];
    }
}