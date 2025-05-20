<?php

test('can create a ticket', function () {
    $ticket = \Webkul\Ticket\Models\Ticket::create([
        'subject' => 'Test Ticket',
        'description' => 'Test description',
        'status' => 'open',
    ]);

    expect($ticket->id)->not()->toBeNull();
});
