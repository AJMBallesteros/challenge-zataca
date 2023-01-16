<?php

namespace App\src\domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnpaidInvoices extends Model
{
    use HasFactory;

    public function getNumeroFacturasAttribute($value): int
    {
        return $value;
    }

    public function setNumeroFacturasAttribute($value)
    {
        $this->attributes['numeroFacturas'] = $value;
        return $this;
    }

    public function getImporteTotalAttribute($value): int
    {
        return $value;
    }

    public function setImporteTotalAttribute($value)
    {
        $this->attributes['importeTotal'] = $value;
        return $this;
    }

    public function getFechaDesdeAttribute($value): string
    {
        return $value;
    }

    public function setFechaDesdeAttribute($value)
    {
        $this->attributes['fechaDesde'] = $value;
        return $this;
    }

    public function getFechaHastaAttribute($value): string
    {
        return $value;
    }

    public function setFechaHastaAttribute($value)
    {
        $this->attributes['fechaHasta'] = $value;
        return $this;
    }
}
