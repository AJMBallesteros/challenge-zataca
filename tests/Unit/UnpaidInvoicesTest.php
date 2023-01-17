<?php

namespace Tests\Unit;

use App\src\domain\Invoice\UnpaidInvoices;
use PHPUnit\Framework\TestCase;

class UnpaidInvoicesTest extends TestCase
{
    public function testShouldAssignRequiredAttributes(): void
    {
        $invoice = new UnpaidInvoices();
        $invoice->setNumeroFacturasAttribute(10)
            ->setImporteTotalAttribute(100)
            ->setFechaDesdeAttribute('2023-01-17')
            ->setFechaHastaAttribute('2023-01-17');

        $this->assertArrayHasKey('numeroFacturas', $invoice->attributesToArray());
        $this->assertArrayHasKey('importeTotal', $invoice->attributesToArray());
        $this->assertArrayHasKey('fechaDesde', $invoice->attributesToArray());
        $this->assertArrayHasKey('fechaHasta', $invoice->attributesToArray());
    }
}
