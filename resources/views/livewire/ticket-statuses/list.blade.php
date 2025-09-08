<x-layouts.app :title="__('List Ticket Statuses')">
    <div class=" h-full w-full grid grid-cols-3 gap-4 rounded-xl">
        <div class="relative h-full overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:support.TicketStatusCreateForm />
        </div>
        <div class="relative h-full col-span-2 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <table>
                <caption>{{ __('Ticket Statuses List') }}</caption>
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left" scope="col">{{ __('ID') }}</th>
                        <th class="px-4 py-2 text-left" scope="col">{{ __('Name') }}</th>
                        <th class="px-4 py-2 text-left" scope="col">{{ __('Description') }}</th>
                        <th class="px-4 py-2 text-left" scope="col">{{ __('Created At') }}</th>
                        <th class="px-4 py-2 text-left" scope="col">{{ __('Updated At') }}</th>
                        <th class="px-4 py-2 text-left" scope="col">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($TicketStatuses as $status)
                        <tr class="border-t border-neutral-200 dark:border-neutral-700">
                            <td class="px-4 py-2">{{ $status->id }}</td>
                            <td class="px-4 py-2">{{ $status->name }}</td>
                            <td class="px-4 py-2">{{ $status->description  }}</td>
                            <td class="px-4 py-2">{{ $status->created_at  }}</td>
                            <td class="px-4 py-2">{{ $status->updated_at  }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('ticket-status.update', $status) }}" class="text-blue-600 hover:underline">{{ __('Edit') }}</a>
                                <form action="{{ route('ticket-status.delete', $status) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('{{ __('Are you sure you want to delete this status?') }}')">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $TicketStatuses->links()  }}
        </div>
    </div>
</x-layouts.app>
