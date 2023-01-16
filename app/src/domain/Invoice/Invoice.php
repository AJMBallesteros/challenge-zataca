<?php

namespace App\src\domain\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $fillable = ['fecha_factura, total_factura, pagada'];
    public $timestamps = false;
    protected $connection = 'zataca';

    public function getFechaFacturaAttribute($value): string
    {
        return $value;
    }

    public function setFechaFacturaAttribute($value)
    {
        $this->attributes['fecha_factura'] = $value;
        return $this;
    }

    public function getTotalFacturaAttribute($value): int
    {
        return $value;
    }

    public function setTotalFacturaAttribute($value)
    {
        $this->attributes['total_factura'] = $value;
        return $this;
    }

    public function getPagadaAttribute($value): bool
    {
        return $value;
    }

    public function setPagadaAttribute($value)
    {
        $this->attributes['pagada'] = $value;
        return $this;
    }
}
