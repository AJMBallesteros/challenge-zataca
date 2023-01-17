<?php

namespace Tests\Integration;

use App\src\domain\Invoice\Exception\UnpaidInvoicesTotalAmountException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response;
use Tests\Mother\InvoiceMother;
use Tests\TestCase;

class InvoiceControllerIT extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function testShouldReturnTotalFromUnpaidInvoices(): void
    {
        $invoice1 = InvoiceMother::paidInvoice(100);
        $invoice1->save();
        $invoice2 = InvoiceMother::paidInvoice(800);
        $invoice2->save();
        $invoice3 = InvoiceMother::unpaidInvoice(300);
        $invoice3->save();

        $response = $this->get(route('invoices.getUnpaidInvoices'));
        $response->assertStatus(Response::HTTP_OK);
        $this->assertStringContainsString('"importeTotal":300', $response->content());
    }

    public function testShouldThrowExceptionIfTotalIsLessThan0(): void
    {
        $this->expectException(UnpaidInvoicesTotalAmountException::class);
        $invoice = InvoiceMother::unpaidInvoice(-200);
        $invoice->save();
        $response = $this->get(route('invoices.getUnpaidInvoices'));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
