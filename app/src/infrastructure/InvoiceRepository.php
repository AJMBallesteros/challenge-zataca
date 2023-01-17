<?php

namespace App\src\infrastructure;

use App\src\domain\Invoice\Exception\UnpaidInvoicesTotalAmountException;
use App\src\domain\Invoice\Invoice;
use App\src\domain\Invoice\InvoiceRepositoryInterface;
use App\src\domain\Invoice\UnpaidInvoices;
use Carbon\Carbon;

class InvoiceRepository implements InvoiceRepositoryInterface
{

    public function getTotalUnpaidInvoices(): UnpaidInvoices
    {
        $from = Carbon::now()->subMonths(1)->toDateString();
        $to = Carbon::now()->toDateString();
        $totalUnpaid = Invoice::whereBetween('fecha_factura', [ $from, $to ])->where('pagada', '=', 'false')->get();

        $totalAmount = collect($totalUnpaid)->sum('total_factura');
        if($totalAmount < 0){
            throw new UnpaidInvoicesTotalAmountException();
        }

        $unpaidInvoices = new UnpaidInvoices();
        $unpaidInvoices->setFechaDesdeAttribute($from)
            ->setFechaHastaAttribute($to)
            ->setImporteTotalAttribute($totalAmount)
            ->setNumeroFacturasAttribute(count($totalUnpaid));

        return $unpaidInvoices;
    }
}
