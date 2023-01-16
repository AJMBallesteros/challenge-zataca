<?php

namespace App\Console\Commands;

use App\src\application\RetrieveTotalUnpaidInvoices;
use Illuminate\Console\Command;

class GetUnpaidInvoices extends Command
{
    private RetrieveTotalUnpaidInvoices $retrieveTotalUnpaidInvoices;

    public function __construct(
        RetrieveTotalUnpaidInvoices $retrieveTotalUnpaidInvoices
    ){
        parent::__construct();
        $this->retrieveTotalUnpaidInvoices = $retrieveTotalUnpaidInvoices;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unpaid-invoices:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve unpaid invoices one month ago';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $unpaidInvoices = $this->retrieveTotalUnpaidInvoices->execute();
        //TODO No se define para que queremos usar esta info, esto será un ejemplo para volcar la info obtenida en un fichero.
        file_put_contents('./zataca-report.txt', $unpaidInvoices);
    }
}
