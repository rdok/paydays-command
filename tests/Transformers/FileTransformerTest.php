<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace Tests;

namespace Tests\Transformers;

use App\Transformers\FileTransformer;
use Carbon\Carbon;
use Tests\TestCase;

class FileTransformerTest extends TestCase
{
    const DATETIME_FORMAT = 'Y-m-d';
    protected $transformer;

    public function setUp()
    {
        parent::setUp();

        $this->transformer = new FileTransformer();
    }

    /** @test */
    public function transform_a_single_paydays_month()
    {
        $actualPaymentDays = $this->transformer->transform([
            $firstExpensesDay = Carbon::now(),
            $secondExpensesDay = Carbon::now()->addDay(),
            $salaryDay = Carbon::now()->subDay()
        ]);

        $expectedPaymentDays = sprintf(
            '"%s","%s","%s","%s"%s',
            $firstExpensesDay->format('F'),
            $firstExpensesDay->format(self::DATETIME_FORMAT),
            $secondExpensesDay->format(self::DATETIME_FORMAT),
            $salaryDay->format(self::DATETIME_FORMAT),
            "\n"
        );

        $this->assertEquals($expectedPaymentDays, $actualPaymentDays);
    }

    /** @test */
    public function transform_many_payday_months()
    {
        $actualPaymentDays = $this->transformer->transformMonths([[
            $firstExpensesDay = Carbon::now(),
            $secondExpensesDay = Carbon::now()->addDay(),
            $salaryDay = Carbon::now()->subDay()
        ]]);

        $expectedPaymentDays = '"Month Name","1st expenses day","2nd expenses day","Salary day"';
        $expectedPaymentDays .= "\n";

        $expectedPaymentDays .= sprintf(
            '"%s","%s","%s","%s"%s',
            $firstExpensesDay->format('F'),
            $firstExpensesDay->format(self::DATETIME_FORMAT),
            $secondExpensesDay->format(self::DATETIME_FORMAT),
            $salaryDay->format(self::DATETIME_FORMAT),
            "\n"
        );

        $this->assertEquals($expectedPaymentDays, $actualPaymentDays);
    }
}