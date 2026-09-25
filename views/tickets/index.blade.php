<div class="container mt-14 space-y-4">
    <x-page-header icon="ticket" title="Support Tickets" subtitle="Open a new one or follow up on an existing conversation.">
        <x-slot:actions>
            <x-navigation.link :href="route('tickets.create')" class="relative overflow-hidden flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-xl font-semibold hover:bg-primary/90 transition-colors">
                <span class="astra-shine"></span>
                <x-ri-add-line class="size-5" />
                <span>{{ __('ticket.create_ticket') }}</span>
            </x-navigation.link>
        </x-slot:actions>
    </x-page-header>

    @forelse ($tickets as $ticket)
    <a href="{{ route('tickets.show', $ticket) }}" wire:navigate>
        <div class="astra-card astra-card-hover astra-card-beam astra-reveal p-4 mb-4" data-astra-delay="{{ min($loop->iteration, 8) }}">
            <div class="flex items-center justify-between gap-3 mb-2">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="shrink-0 bg-secondary/10 p-2 rounded-xl">
                        <x-ri-ticket-line class="size-5 text-secondary" />
                    </div>
                    <span class="font-medium truncate">#{{ $ticket->id }} - {{ $ticket->subject }}</span>
                </div>
                <span class="shrink-0 inline-flex items-center gap-1.5 text-xs font-semibold px-2.5 py-1 rounded-full
                    @if ($ticket->status == 'open') text-success bg-success/15
                    @elseif($ticket->status == 'closed') text-inactive bg-inactive/15
                    @else text-info bg-info/15
                    @endif">
                    <span class="size-1.5 rounded-full astra-status-dot
                        @if ($ticket->status == 'open') bg-success
                        @elseif($ticket->status == 'closed') bg-inactive
                        @else bg-info
                        @endif"></span>
                    {{ ucfirst($ticket->status) }}
                </span>
            </div>
            <p class="text-sm text-muted">
                {{ __('ticket.last_activity') }}
                {{ $ticket->messages()->orderBy('created_at', 'desc')->first()?->created_at->diffForHumans() }}
                {{ $ticket->department ? ' - ' . $ticket->department : '' }}
            </p>
        </div>
    </a>
    @empty
    <div class="astra-card p-6 text-center">
        <x-ri-inbox-line class="size-8 mx-auto text-muted mb-2" />
        <p class="text-sm text-muted">{{ __('ticket.no_tickets') }}</p>
    </div>
    @endforelse

    {{ $tickets->links() }}
</div>
