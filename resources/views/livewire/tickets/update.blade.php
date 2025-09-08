<x-layouts.app :title="__('Update Ticket - ') . $ticket->title">
    <div class="flex flex-col gap-6" xmlns:flux="http://www.w3.org/1999/html">
        <x-auth-session-status class="text-center" :status="session('status')" />
        <span class="text-lg font-medium text-neutral-900 dark:text-neutral-100">{{ __('Update Support Ticket') }}</span>
        <form method="POST" action="/tickets/{{ $ticket->id }}" class="flex flex-col gap-6">
            @csrf
            <!-- Name -->
            <flux:input
                wire:model="title"
                :label="__('Title')"
                type="text"
                required
                autofocus
                autocomplete="title"
                :placeholder="__('Name')"
                value="{{ $ticket->title }}"
            />
            <!-- Description -->
            <flux:textarea
                wire:model="description"
                :label="__('Description')"
                type="text"
                required
                autocomplete="description"
                :placeholder="__('Description')"
            >
                {{ $ticket->description }}
            </flux:textarea>
            <flux:select
                wire:model="priority"
                :label="__('Priority')"
                required
                autocomplete="priority"
                :placeholder="__('Select Priority')"
            >
                @foreach($priorities as $key => $priority)
                    <option @selected($key === $ticket->priority) value="{{ $key }}">{{ $priority }}</option>
                @endforeach
            </flux:select>

            <flux:select
                wire:model="status_id"
                :label="__('Status')"
                required
                autocomplete="Status"
                :placeholder="__('Select Status')"
            >
                @foreach($statuses as $status)
                    <option @selected($status->id === $ticket->status_id) value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </flux:select>

            <flux:select
                wire:model="assignee_id"
                :label="__('Assignee')"
                required
                autocomplete="Assignee"
                :placeholder="__('Select Assignee')"
            >
                @foreach($users as $user)
                    <option @selected($user->id === $ticket->assignee_id) value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </flux:select>
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Update') }}</flux:button>
        </form>
    </div>
</x-layouts.app>
