<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App\Transformers;

use Carbon\Carbon;

class DefaultTransformer extends Transformer
{
    public function transformMonths(array $paymentDayMonths)
    {
        $output = [];

        foreach ($paymentDayMonths as $paymentDayMonth) {
            $output[] = $this->transform($paymentDayMonth);
        }

        return $output;
    }

    public function transform(array $paydaysForAMonthForAMonth)
    {
        /** @var Carbon $firstExpenses */
        $firstExpenses = $paydaysForAMonthForAMonth[0];
        /** @var Carbon $secondExpenses */
        $secondExpenses = $paydaysForAMonthForAMonth[1];
        /** @var Carbon $salary */
        $salary = $paydaysForAMonthForAMonth[2];

        return [
            ucfirst(translate($this->language, $firstExpenses->format('F'))),
            $firstExpenses->format(self::DATE_TIME_FORMAT),
            $secondExpenses->format(self::DATE_TIME_FORMAT),
            $salary->format(self::DATE_TIME_FORMAT),
        ];
    }
}