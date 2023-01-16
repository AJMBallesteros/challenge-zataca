<?php

namespace App\src\infrastructure;

use App\src\domain\Invoice;
use App\src\domain\InvoiceRepositoryInterface;
use App\src\domain\UnpaidInvoices;
use Carbon\Carbon;

class InvoiceRepository implements InvoiceRepositoryInterface
{

    public function getTotalUnpaidInvoices()
    {
        $from = Carbon::now()->subMonths(1)->toDateString();
        $to = Carbon::now()->toDateString();
        $totalUnpaid = Invoice::whereBetween('fecha_factura', [ $from, $to ])->where('pagada', '=', 'false')->get();

        $unpaidInvoices = new UnpaidInvoices();
        $unpaidInvoices->setFechaDesdeAttribute($from)
            ->setFechaHastaAttribute($to)
            ->setImporteTotalAttribute(collect($totalUnpaid)->sum('total_factura'))
            ->setNumeroFacturasAttribute(count($totalUnpaid));

        return $unpaidInvoices;
    }
}
