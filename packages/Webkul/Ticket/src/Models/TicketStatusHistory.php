<?php

namespace Webkul\Ticket\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\Ticket\Contracts\TicketStatusHistory as TicketStatusHistoryContract;

class TicketStatusHistory extends Model implements TicketStatusHistoryContract
{
    use HasFactory;

    protected $table = 'ticket_status_histories';

    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'status',
        'changed_at',
    ];

    protected $casts = [
        'changed_at' => 'datetime',
    ];

    public function ticket()
    {
        return $this->belongsTo(TicketProxy::modelClass());
    }
}
