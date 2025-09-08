<table>
    <caption>{{ __('Support Ticket List') }}</caption>
    <thead>
        <tr>
            <th class="px-4 py-2 text-left" scope="col">{{ __('ID') }}</th>
            <th class="px-4 py-2 text-left" scope="col">{{ __('Title') }}</th>
            <th class="px-4 py-2 text-left" scope="col">{{ __('User') }}</th>
            <th class="px-4 py-2 text-left" scope="col">{{ __('Status') }}</th>
            <th class="px-4 py-2 text-left" scope="col">{{ __('Created At') }}</th>
            <th class="px-4 py-2 text-left" scope="col">{{ __('Actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $ticket)
            <tr class="border-t border-neutral-200 dark:border-neutral-700">
                <td class="px-4 py-2">{{ $ticket->id }}</td>
                <td class="px-4 py-2">{{ $ticket->title }}</td>
                <td class="px-4 py-2">{{ $ticket->assignee->name }}</td>
                <td class="px-4 py-2">{{ $ticket->status->name }}</td>
                <td class="px-4 py-2">{{ $ticket->created_at  }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('tickets.update', $ticket) }}" class="text-blue-600 hover:underline">{{ __('Edit') }}</a>
                    <form action="{{ route('tickets.delete', $ticket) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('{{ __('Are you sure you want to delete this status?') }}')">{{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $tickets->links()  }}
