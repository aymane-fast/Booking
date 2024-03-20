<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Edit Reservation</h1>
        <form action="{{ route('reservations.update', ['id' => $reservation->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="date" value="{{ $reservation->date }}">
            <input type="hidden" name="session" value="{{ $reservation->session }}">
            <input type="hidden" name="room_id" value="{{ $reservation->room_id }}">

            <div class="mb-4">
                <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                <input type="text" id="reason" name="reason" value="{{ $reservation->reason }}" class="mt-1 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update Reservation</button>
        </form>
    </div>
</body>
</html>
