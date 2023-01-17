<?php

namespace Tests\Unit;

use App\src\application\RetrieveTotalUnpaidInvoices;
use App\src\domain\Invoice\Exception\UnpaidInvoicesTotalAmountException;
use App\src\domain\Invoice\InvoiceRepositoryInterface;
use PHPUnit\Framework\TestCase;

class RetrieveTotalUnpaidInvoicesTest extends TestCase
{
    private InvoiceRepositoryInterface $invoiceRepository;
    private RetrieveTotalUnpaidInvoices $retrieveTotalUnpaidInvoices;

    protected function setUp(): void
    {
        $this->invoiceRepository = $this->createMock(InvoiceRepositoryInterface::class);
        $this->retrieveTotalUnpaidInvoices = new RetrieveTotalUnpaidInvoices($this->invoiceRepository);
    }

    public function testShouldThrowUnpaidInvoicesTotalAmountException(): void
    {
        $this->expectException(UnpaidInvoicesTotalAmountException::class);
        $this->invoiceRepository
            ->method('getTotalUnpaidInvoices')
            ->willThrowException(new UnpaidInvoicesTotalAmountException());

        $this->retrieveTotalUnpaidInvoices->execute();
    }
}
