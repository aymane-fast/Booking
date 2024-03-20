<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center">
            {{ $room->room_name }} Availability
        </h1>
    </x-slot>
    <x-guest-layout>

        <div class="overflow-x-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 border border-gray-200">
            <table id="myTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Day
                        </th>
                        @for ($i = 0; $i <= 4; $i++)
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{isset($sess[$i]) ? $sess[$i] : '' }}
                            </th>
                        @endfor
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($days as $day)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($day)->format('l') }} {{ $day }}
                            </td>
                            @for ($i = 0; $i <= 4; $i++)
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if (isset($reservations[$day][$i]))
                                        <div class="flex flex-col">
                                            <span>Booked by: {{ $reservations[$day][$i]->user->name }}</span>
                                            <span>Reason: {{ $reservations[$day][$i]->reason }}</span>
                                            @if (Auth::check() && $reservations[$day][$i]->user_id == Auth::user()->id || Auth::user()->role == 'admin')
                                                <div class="mt-2">
                                                    <a href="{{ route('reservations.edit', ['id' => $reservations[$day][$i]->id, 'room_id' => $room->id]) }}"
                                                        class="text-blue-500 hover:text-blue-700">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('reservations.destroy', ['id' => $reservations[$day][$i]->id]) }}"
                                                        method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                                            onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="flex flex-col items-center">
                                            <span>Available</span>
                                            <a href="{{ route('reservations.create', ['date' => $day, 'session' => $i, 'room_id' => $room->id]) }}"
                                                class="text-green-500 hover:text-green-700 mt-2">
                                                Book Now
                                            </a>
                                        </div>
                                    @endif
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

        <div class="flex justify-center mt-4">
            <a href="{{ url('/rooms/' . $room->id . '/' . $prevWeek) }}" class="text-blue-500 hover:text-blue-700 mx-2">
                <x-primary-button class="ms-4">
                    <i class="fas fa-arrow-left"></i> <!-- Font Awesome left arrow icon -->
                </x-primary-button>
            </a>
            <a href="{{ url('/rooms/' . $room->id . '/' . $nextWeek) }}" class="text-blue-500 hover:text-blue-700 mx-2">
                <x-primary-button class="ms-4">
                    <i class="fas fa-arrow-right"></i> <!-- Font Awesome right arrow icon -->
                </x-primary-button>
            </a>
        </div>
        <div class="download-pdf flex items-center justify-end mt-4">
            <button onclick="downloadAsPDF()" class="text-blue-500 hover:text-blue-700 mx-2 ">
                {{-- <x-primary-button class="ms-4"> --}}
                Télecharger
                <i class="fas fa-file-pdf"></i> <!-- Font Awesome PDF icon -->
                {{-- </x-primary-button> --}}
            </button>
        </div>


        <script>
            function downloadAsPDF() {
    var element = document.getElementById('myTable');
    var opt = {
        margin: 0,
        filename: '{{ $room->room_name }}.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 1 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
    };
    html2pdf().set(opt).from(element).save();
}
        </script>
    </x-guest-layout>
</x-app-layout>
