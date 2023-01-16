<?php

namespace Tests\Mother;

use App\src\domain\Invoice\Invoice;

class InvoiceMother
{
    public static function paidInvoice(float $total = 2): Invoice
    {
        $invoice = new Invoice();
        $invoice->setFechaFacturaAttribute('2023-01-16')
            ->setTotalFacturaAttribute($total)
            ->setPagadaAttribute(true);

        return $invoice;
    }
    public static function unpaidInvoice(float $total = 1): Invoice
    {
        $invoice = new Invoice();
        $invoice->setFechaFacturaAttribute('2023-01-16')
            ->setTotalFacturaAttribute($total)
            ->setPagadaAttribute(false);

        return $invoice;
    }
}
