<?php

use Illuminate\Support\Facades\Route;
use Webkul\Ticket\Http\Controllers\TicketController;

Route::middleware(['web', 'admin_locale'])->group(function () {
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::post('tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('tickets/{id}/reply', [TicketController::class, 'reply'])->name('tickets.reply');
});
