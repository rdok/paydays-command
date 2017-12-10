<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App\Transformers;

abstract class  Transformer
{
    const DATE_TIME_FORMAT = 'Y-m-d';

    protected $language;

    public function __construct($language = null)
    {
        $this->language = $language;
    }

    abstract public function transform(array $paydaysForAMonth);

    abstract public function transformMonths(array $paymentDayMonths);
}