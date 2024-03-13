<!-- resources/views/reservations/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Session</title>
</head>
<body>
    <h1>Book Session</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="session_id" value="{{ $session->id }}">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="reason">Reason for Booking:</label>
        <textarea id="reason" name="reason" required></textarea>
        <button type="submit">Book Session</button>
    </form>
</body>
</html>
