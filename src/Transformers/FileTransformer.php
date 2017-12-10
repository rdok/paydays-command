<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App\Transformers;

use Carbon\Carbon;

class FileTransformer extends Transformer
{
    public function transformMonths(array $paymentDayMonths)
    {
        $output = '"Month Name","1st expenses day",“2nd expenses day”,"Salary day"';
        $output .= "\n";

        foreach ($paymentDayMonths as $paymentDayMonth) {
            $output .= $this->transform($paymentDayMonth);
        }

        return $output;
    }

    public function transform(array $paydaysForAMonth)
    {
        /** @var Carbon $firstExpenses */
        $firstExpenses = $paydaysForAMonth[0];
        /** @var Carbon $secondExpenses */
        $secondExpenses = $paydaysForAMonth[1];
        /** @var Carbon $salary */
        $salary = $paydaysForAMonth[2];

        return sprintf(
            '"%s","%s","%s","%s"%s',
            $firstExpenses->format('F'),
            $firstExpenses->format(self::DATE_TIME_FORMAT),
            $secondExpenses->format(self::DATE_TIME_FORMAT),
            $salary->format(self::DATE_TIME_FORMAT),
            "\n"
        );
    }
}