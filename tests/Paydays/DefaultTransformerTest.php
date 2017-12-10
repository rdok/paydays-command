<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace Tests;

use App\Paydays\DefaultTransformer;
use Carbon\Carbon;

class DefaultTransformerTest extends TestCase
{
    const DATETIME_FORMAT = 'Y-m-d';

    /** @test */
    public function transform_payment_days()
    {
        $transformer = new DefaultTransformer();

        $actualPaymentDays = $transformer->transform([
            $firstExpensesDay = Carbon::now(),
            $secondExpensesDay = Carbon::now()->addDay(),
            $salaryDay = Carbon::now()->subDay()
        ]);

        $expectedPaymentDays = [
            $firstExpensesDay->format('F'),
            $firstExpensesDay->format(self::DATETIME_FORMAT),
            $secondExpensesDay->format(self::DATETIME_FORMAT),
            $salaryDay->format(self::DATETIME_FORMAT),
        ];

        $this->assertEquals($expectedPaymentDays, $actualPaymentDays);
    }
}