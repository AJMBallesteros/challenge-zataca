<?php

namespace App\src\domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $fillable = ['fecha_factura, total_factura, pagada'];
    protected $connection = 'zacata';

    public function getFechaFacturaAttribute($value): string
    {
        return $value;
    }

    public function setFechaFacturaAttribute($value)
    {
        $this->attributes['numeroFacturas'] = $value;
        return $this;
    }

    public function getTotalFacturaAttribute($value): int
    {
        return $value;
    }

    public function setTotalFacturaAttribute($value)
    {
        $this->attributes['importeTotal'] = $value;
        return $this;
    }

    public function getPagadaAttribute($value): bool
    {
        return $value;
    }

    public function setPagadaAttribute($value)
    {
        $this->attributes['fechaDesde'] = $value;
        return $this;
    }
}
