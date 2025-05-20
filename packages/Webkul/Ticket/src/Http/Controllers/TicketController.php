<?php

namespace Webkul\Ticket\Http\Controllers;

use Illuminate\Routing\Controller;
use Webkul\Ticket\Repositories\TicketRepository;
use Webkul\Ticket\Repositories\TicketReplyRepository;
use Webkul\Ticket\Repositories\TicketStatusHistoryRepository;

class TicketController extends Controller
{
    public function __construct(
        protected TicketRepository $ticketRepository,
        protected TicketReplyRepository $replyRepository,
        protected TicketStatusHistoryRepository $statusRepository
    ) {
    }

    public function index()
    {
        return view('ticket::index', [
            'tickets' => $this->ticketRepository->all(),
        ]);
    }

    public function show($id)
    {
        $ticket = $this->ticketRepository->findOrFail($id);

        return view('ticket::show', compact('ticket'));
    }

    public function store()
    {
        $data = request()->only('subject', 'description', 'user_id');

        $ticket = $this->ticketRepository->create($data);

        $this->statusRepository->create([
            'ticket_id'  => $ticket->id,
            'status'     => $ticket->status,
            'changed_at' => now(),
        ]);

        return redirect()->route('tickets.show', $ticket->id);
    }

    public function reply($id)
    {
        $ticket = $this->ticketRepository->findOrFail($id);

        $reply = $this->replyRepository->create([
            'ticket_id' => $ticket->id,
            'user_id'   => request('user_id'),
            'message'   => request('message'),
        ]);

        if ($status = request('status')) {
            $ticket->update(['status' => $status]);
            $this->statusRepository->create([
                'ticket_id'  => $ticket->id,
                'status'     => $status,
                'changed_at' => now(),
            ]);
        }

        return redirect()->route('tickets.show', $ticket->id);
    }
}
