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

        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="date" value="{{ $date }}">
        <input type="hidden" name="session" value="{{ $session }}">
        <input type="hidden" name="room_id" value="{{ $room_id }}">

        <div class="form-group">
            <label for="reason">Reason</label>
            <input type="text" id="reason" name="reason" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Reservation</button>
    </form>
</body>
</html>
