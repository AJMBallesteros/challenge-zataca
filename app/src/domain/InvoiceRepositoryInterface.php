<?php

namespace App\src\domain;

interface InvoiceRepositoryInterface
{
    public function getTotalUnpaidInvoices();
}
