<?php

namespace Webkul\Ticket\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\Ticket\Contracts\Ticket as TicketContract;
use Webkul\User\Models\UserProxy;

class Ticket extends Model implements TicketContract
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'subject',
        'description',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass());
    }

    public function replies()
    {
        return $this->hasMany(TicketReplyProxy::modelClass());
    }

    public function statusHistories()
    {
        return $this->hasMany(TicketStatusHistoryProxy::modelClass());
    }
}
