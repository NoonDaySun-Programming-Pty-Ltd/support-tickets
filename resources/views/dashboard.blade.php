<x-layouts.app :title="__('Dashboard')">
    <div class=" h-full w-full grid grid-cols-3 gap-4 rounded-xl">
        <div class="relative h-full overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <livewire:support.TicketCreateForm />
        </div>
        <div class="relative h-full col-span-2 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <livewire:support.ListTickets />
        </div>
    </div>
</x-layouts.app>
