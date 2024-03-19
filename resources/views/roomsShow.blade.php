<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $room->room_name }} Availability</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.button {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #0056b3;
        }

        .nav-links {
            text-align: center;
            margin-top: 20px;
        }

        .nav-links a {
            margin: 0 10px;
            color: #007bff;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            transition: border-bottom-color 0.3s ease;
        }

        .nav-links a:hover {
            border-bottom-color: #007bff;
        }

        .download-pdf button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .download-pdf button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>{{ $room->room_name }} Availability</h1>

    <table>
        <thead>
            <tr>
                <th></th>
                @for ($i = 1; $i <= 5; $i++)
                    <th>{{isset($sess[$i]) ? $sess[$i] : '' }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @foreach ($days as $day)
                <tr>
                    <th>{{ \Carbon\Carbon::parse($day)->format('l') }} {{ $day }}</th>
                    @for ($i = 1; $i <= 5; $i++)
                        <td>
                            @if (isset($reservations[$day][$i]))
                                Booked by:
                                {{ $reservations[$day][$i]->user->name }}<br>
                                Reason:
                                {{ $reservations[$day][$i]->reason }}
                                <br>
                                @if (Auth::check() && $reservations[$day][$i]->user_id == Auth::user()->id || Auth::user()->role == 'admin')
                                    <a href="{{ route('reservations.edit', ['id' => $reservations[$day][$i]->id, 'room_id' => $room->id]) }}"
                                        class="button">
                                        Edit
                                    </a>
                                    <form action="{{ route('reservations.destroy', ['id' => $reservations[$day][$i]->id]) }}"
                                        method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button"
                                            onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                                    </form>
                                @endif
                            @else
                                Available
                                <br>
                                <a href="{{ route('reservations.create', ['date' => $day, 'session' => $i, 'room_id' => $room->id]) }}"
                                    class="button">
                                    Book Now
                                </a>
                            @endif
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="nav-links">
        <a href="{{ url('/rooms/' . $room->id . '/' . $prevWeek) }}">Previous Week</a>
        <a href="{{ url('/rooms') }}">Rooms page</a>
        <a href="{{ url('/rooms/' . $room->id . '/' . $nextWeek) }}">Next Week</a>
    </div>
    <div class="download-pdf">
        <button onclick="downloadAsPDF()">Download as PDF</button>
    </div>
    <script>
        function downloadAsPDF() {
            // Options for pdf generation
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
                // jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            // Target element to convert to PDF
            const element = document.body;

            // Generate PDF
            html2pdf()
                .from(element)
                .set(options)
                .save();
        }
    </script>
</body>

</html>
