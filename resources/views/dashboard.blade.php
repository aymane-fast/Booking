<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center">
            {{ __('Accueil') }}
        </h2>
    </x-slot>
    <x-guest-layout>
        @if (Auth::user()->role === 'admin')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Details</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($auditLogs as $log)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                    $user = \App\Models\User::find($log->user_id);
                                                @endphp
                                                @if ($user)
                                                    {{ $user->name }}
                                                @else
                                                    Unknown User
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($log->event === 'created')
                                                    Created
                                                @elseif ($log->event === 'updated')
                                                    Updated
                                                @elseif ($log->event === 'deleted')
                                                    Deleted
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    Old: {{ $log->old_values }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    New: {{ $log->new_values }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $log->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{ $auditLogs->links() }}

        @else
            @isset(Auth::user()->reservations)
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h2 class="text-lg font-semibold mb-4">Vos réservations</h2>
                                <ul>
                                    @foreach (Auth::user()->reservations as $reservation)
                                        <li>{{ $reservation->date }} - {{ $reservation->room->room_name }} : ({{ $reservation->session_name }}) 
                                            
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        @endif
    </x-guest-layout>
</x-app-layout>
