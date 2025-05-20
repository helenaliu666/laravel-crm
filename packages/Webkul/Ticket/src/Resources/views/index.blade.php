<x-admin::layouts>
    <x-slot:title>
        Tickets
    </x-slot>

    <div class="flex flex-col gap-2">
        <h1 class="text-xl font-bold">Tickets</h1>
        <ul class="list-disc pl-5">
            @foreach ($tickets as $ticket)
                <li>
                    <a href="{{ route('tickets.show', $ticket->id) }}">{{ $ticket->subject }}</a>
                    ({{ $ticket->status }})
                </li>
            @endforeach
        </ul>
    </div>
</x-admin::layouts>
