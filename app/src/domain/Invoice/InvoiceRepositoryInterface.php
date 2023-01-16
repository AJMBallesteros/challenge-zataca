<?php

namespace App\src\domain\Invoice;

interface InvoiceRepositoryInterface
{
    public function getTotalUnpaidInvoices();
}
