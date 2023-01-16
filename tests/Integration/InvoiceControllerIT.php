<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\Mother\InvoiceMother;
use Tests\TestCase;

class InvoiceControllerIT extends TestCase
{
    use RefreshDatabase;

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
}
