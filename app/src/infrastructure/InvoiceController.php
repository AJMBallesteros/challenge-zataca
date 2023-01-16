<?php

namespace App\src\infrastructure;

use App\src\application\RetrieveTotalUnpaidInvoices;

class InvoiceController
{
    private RetrieveTotalUnpaidInvoices $retrieveTotalUnpaidInvoices;

    public function __construct(
        RetrieveTotalUnpaidInvoices $retrieveTotalUnpaidInvoices
    ){
        $this->retrieveTotalUnpaidInvoices = $retrieveTotalUnpaidInvoices;
    }

    public function retrieveTotalUnpaidInvoices()
    {
        $totalUnpaids = $this->retrieveTotalUnpaidInvoices->execute();

        return $totalUnpaids;
    }
}
