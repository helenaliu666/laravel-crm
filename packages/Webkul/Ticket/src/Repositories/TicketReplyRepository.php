<?php

namespace Webkul\Ticket\Repositories;

use Illuminate\Container\Container;
use Webkul\Core\Eloquent\Repository;

class TicketReplyRepository extends Repository
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function model()
    {
        return 'Webkul\\Ticket\\Contracts\\TicketReply';
    }
}
