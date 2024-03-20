<!-- resources/views/reservations/receipt.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Receipt</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include html2pdf library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg w-full bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg font-semibold leading-6 text-gray-900">Reservation Receipt</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Thank you for making a reservation with us!</p>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">User:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->user->name }}</dd>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Date:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->date }}</dd>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Session:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->session }}</dd>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Room:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->room->room_name }}
                        </dd>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Reason:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->reason }}</dd>
                    </div>
                </dl>
            </div>
            <div class="px-4 py-4 sm:px-6 flex justify-end">
                <a href="{{ route('rooms.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Return to Rooms
                </a>
            </div>
        </div>
    </div>
    <!-- JavaScript code to trigger download of the receipt as PDF -->




    <script>
        // Function to generate and download the PDF
        function generatePDF() {
            var element = document.documentElement;
            var opt = {
                margin: 0,
                filename: 'reservation_receipt.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'landscape'
                }
            };
            html2pdf().set(opt).from(element).save();
        }

        // Call the generatePDF function when the window finishes loading
        window.onload = function() {
            generatePDF();
        };
    </script>
</body>

</html>
