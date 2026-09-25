<div class="container mt-14 space-y-4">
    <x-page-header icon="invoices" title="{{ __('navigation.invoices') }}" subtitle="Billing history and anything still due." />

    @forelse ($invoices as $invoice)
    <a href="{{ route('invoices.show', $invoice) }}" wire:navigate>
        <div class="astra-card astra-card-hover astra-card-beam astra-reveal p-4 mb-4" data-astra-delay="{{ min($loop->iteration, 8) }}">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-3">
            <div class="bg-secondary/10 p-2 rounded-xl">
                <x-ri-bill-line class="size-5 text-secondary" />
            </div>
            <span class="font-medium">{{ !$invoice->number && config('settings.invoice_proforma', false) ? __('invoices.proforma_invoice', ['id' => $invoice->id]) : __('invoices.invoice', ['id' => $invoice->number]) }}</span>
            <span class="text-base/50 font-semibold">
                <x-ri-circle-fill class="size-1 text-base/20" />
            </span>
            <span class="text-base text-sm">{{ $invoice->formattedTotal }}</span>
            </div>
            <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-2.5 py-1 rounded-full
                @if ($invoice->status == 'paid') text-success bg-success/15
                @elseif($invoice->status == 'cancelled') text-info bg-info/15
                @else text-warning bg-warning/15
                @endif">
                <span class="size-1.5 rounded-full astra-status-dot
                    @if ($invoice->status == 'paid') bg-success
                    @elseif($invoice->status == 'cancelled') bg-info
                    @else bg-warning
                    @endif"></span>
                {{ ucfirst($invoice->status) }}
            </span>
        </div>
        @foreach ($invoice->items as $item)
            <p class="text-base text-sm text-muted">Item(s): {{ $item->description }} ({{ __('invoices.invoice_date')}}: {{ $invoice->created_at->format('d M Y') }})</p>
        @endforeach
        </div>
    </a>
    @empty
    <div class="astra-card p-6 text-center">
        <x-ri-inbox-line class="size-8 mx-auto text-muted mb-2" />
        <p class="text-sm text-muted">{{ __('invoices.no_invoices') }}</p>
    </div>
    @endforelse

    {{ $invoices->links() }}
</div>
