<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App\Paydays;

use Carbon\Carbon;

/** Calculate paydays for a specific month & year. */
class ByYearAndMonth
{
    private $year;
    private $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function handle()
    {
        $firstExpensesDay = Carbon::create($this->year, $this->month, 1);
        $secondExpensesDay = Carbon::create($this->year, $this->month, 15);
        $salariesDay = Carbon::create($this->year, $this->month)->lastOfMonth();

        $this->modifyToWorkingDay($firstExpensesDay);
        $this->modifyToWorkingDay($secondExpensesDay);
        $this->modifyToWorkingDay($salariesDay, false);

        return [$firstExpensesDay, $secondExpensesDay, $salariesDay];
    }

    private function modifyToWorkingDay(Carbon $datetime, $after = true)
    {
        if ($datetime->isSaturday()) {

            $after ? $datetime->addDays(2) : $datetime->subDay();

            return;
        }

        if ($datetime->isSunday()) {

            $after ? $datetime->addDay() : $datetime->subDays(2);
        }
    }
}