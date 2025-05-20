<x-admin::layouts>
    <x-slot:title>
        Ticket #{{ $ticket->id }}
    </x-slot>

    <div class="flex flex-col gap-4">
        <div>
            <h1 class="text-xl font-bold">{{ $ticket->subject }}</h1>
            <p>Status: {{ $ticket->status }}</p>
            <p>{{ $ticket->description }}</p>
        </div>

        <div>
            <h2 class="font-semibold">Replies</h2>
            <ul class="pl-5 list-disc">
                @foreach ($ticket->replies as $reply)
                    <li>{{ $reply->message }}</li>
                @endforeach
            </ul>
        </div>

        <form method="POST" action="{{ route('tickets.reply', $ticket->id) }}">
            @csrf
            <textarea name="message" class="w-full border" rows="3"></textarea>
            <div class="mt-2">
                <select name="status" class="border">
                    <option value="">-- Status --</option>
                    <option value="open">Open</option>
                    <option value="in_progress">In Progress</option>
                    <option value="resolved">Resolved</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <input type="hidden" name="user_id" value="{{ $ticket->user_id }}" />
            <button type="submit" class="primary-button mt-2">Reply</button>
        </form>
    </div>
</x-admin::layouts>
