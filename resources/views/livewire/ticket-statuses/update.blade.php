<x-layouts.app :title="__('Update Ticket Status - ') . $status->name">
    <div class="flex flex-col gap-6">
        <x-auth-session-status class="text-center" :status="session('status')" />
        <span class="text-lg font-medium text-neutral-900 dark:text-neutral-100">{{ __('Create New Ticket Status') }}</span>
        <form method="POST" action="/ticket-statuses/{{ $status->id }}" class="flex flex-col gap-6">
            @csrf
            <!-- Name -->
            <flux:input
                wire:model="title"
                :label="__('Title')"
                type="text"
                required
                autofocus
                autocomplete="title"
                :placeholder="__('Status Name')"
                value="{{ $status->name }}"
            />
            <!-- Description -->
            <flux:input
                wire:model="description"
                :label="__('Description')"
                type="text"
                required
                autocomplete="description"
                :placeholder="__('Status Description')"
                value="{{ $status->description }}"
            />
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Update Status') }}</flux:button>
        </form>
    </div>
</x-layouts.app>
