<?php

namespace App\src\application;

use App\src\domain\Invoice\InvoiceRepositoryInterface;

class RetrieveTotalUnpaidInvoices
{
    private InvoiceRepositoryInterface $invoiceRepository;

    public function __construct(
        InvoiceRepositoryInterface $invoiceRepository
    ){
        $this->invoiceRepository = $invoiceRepository;
    }

    public function execute(){
        return $this->invoiceRepository->getTotalUnpaidInvoices();
    }
}
