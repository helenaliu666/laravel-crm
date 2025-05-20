<?php

namespace Webkul\Ticket\Providers;

use Webkul\Core\Providers\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\Ticket\Models\Ticket::class,
        \Webkul\Ticket\Models\TicketReply::class,
        \Webkul\Ticket\Models\TicketStatusHistory::class,
    ];
}
