<?php

namespace Tests;

use App\Paydays\ByYearAndMonth;
use Carbon\Carbon;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */
class ByYearAndMonthTest extends TestCase
{
    /** @test */
    public function calculate_payment_days_with_all_payment_days_unmodified()
    {
        $byYearAndMonth = new ByYearAndMonth(2017, 2);

        $paydays = $byYearAndMonth->handle();

        $expectedPaydys = [
            Carbon::create(2017, 2, 1),
            Carbon::create(2017, 2, 15),
            Carbon::create(2017, 2, 28)->startOfDay()
        ];

        $this->assertEquals($expectedPaydys, $paydays);
    }

    /** @test */
    public function calculate_payment_days_with_all_payment_days_modified()
    {
        $byYearAndMonth = new ByYearAndMonth(2017, 4);

        $paydays = $byYearAndMonth->handle();

        $expectedPaydys = [
            Carbon::create(2017, 4, 3),
            Carbon::create(2017, 4, 17),
            Carbon::create(2017, 4, 28)->startOfDay()
        ];

        $this->assertEquals($expectedPaydys, $paydays);
    }
}