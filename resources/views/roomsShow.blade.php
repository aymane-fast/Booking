<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $room->room_name }} Availability
        </h2>
    </x-slot>

    <div class="overflow-x-auto mx-4">
        <table class="w-full border-collapse border border-gray-300 bg-white dark:bg-gray-800">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2"></th>
                    @for ($i = 1; $i <= 5; $i++)
                        <th class="px-4 py-2">Session {{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($days as $day)
                    <tr>
                        <th class="px-4 py-2">{{ \Carbon\Carbon::parse($day)->format('l') }} {{ $day }}</th>
                        @for ($i = 1; $i <= 5; $i++)
                            <td class="px-4 py-2">
                                @if (isset($reservations[$day][$i]))
                                    Booked by: {{ $reservations[$day][$i]->user->name }}<br>
                                    Reason: {{ $reservations[$day][$i]->reason }}<br>
                                    @if (Auth::check() && $reservations[$day][$i]->user_id == Auth::user()->id || Auth::user()->role == 'admin')
                                        <a href="{{ route('reservations.edit', ['id' => $reservations[$day][$i]->id, 'room_id' => $room->id]) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                            Edit
                                        </a>
                                        <form action="{{ route('reservations.destroy', ['id' => $reservations[$day][$i]->id]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this reservation?')"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    Available<br>
                                    <a href="{{ route('reservations.create', ['date' => $day, 'session' => $i, 'room_id' => $room->id]) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                        Book Now
                                    </a>
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-center my-8">
        <a href="{{ url('/rooms/' . $room->id . '/' . $prevWeek) }}"
            class="mr-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Previous Week</a>
        <a href="{{ url('/rooms') }}"
            class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rooms Page</a>
        <a href="{{ url('/rooms/' . $room->id . '/' . $nextWeek) }}"
            class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next Week</a>
    </div>

    <div class="flex justify-center my-8">
        <button onclick="downloadAsPDF()"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download as PDF</button>
    </div>

    <script>
        function downloadAsPDF() {
            const options = {
                margin: 10,
                filename: '{{ $room->room_name }}_availability.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };

            const element = document.body;

            html2pdf()
                .from(element)
                .set(options)
                .save();
        }
    </script>
</x-app-layout>
