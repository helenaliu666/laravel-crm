<?php

namespace Webkul\Ticket\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\Ticket\Contracts\TicketReply as TicketReplyContract;
use Webkul\User\Models\UserProxy;

class TicketReply extends Model implements TicketReplyContract
{
    use HasFactory;

    protected $table = 'ticket_replies';

    protected $fillable = [
        'ticket_id',
        'user_id',
        'message',
    ];

    public function ticket()
    {
        return $this->belongsTo(TicketProxy::modelClass());
    }

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass());
    }
}
