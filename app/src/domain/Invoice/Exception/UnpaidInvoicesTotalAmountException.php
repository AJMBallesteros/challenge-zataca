<?php

namespace App\src\domain\Invoice\Exception;

use Illuminate\Http\JsonResponse;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class UnpaidInvoicesTotalAmountException extends RuntimeException
{
    const MESSAGE = 'The total amount of unpaid invoices never can be less than 0';
    public function render(): JsonResponse
    {
        return response()->json(["error" => true, "message" => self::MESSAGE], Response::HTTP_NOT_FOUND);
    }
}
