<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de réservation</title>
    <!-- Inclure Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Inclure la bibliothèque html2pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg w-full bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg font-semibold leading-6 text-gray-900">Reçu de réservation</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Merci d'avoir effectué une réservation chez nous !</p>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Utilisateur :</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->user->name }}</dd>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Date :</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->date }}</dd>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Session :</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->session }}</dd>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Salle :</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->room->room_name }}
                        </dd>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between px-4 py-2 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 sm:w-1/4">Raison :</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $reservation->reason }}</dd>
                    </div>
                </dl>
            </div>
            <div class="px-4 py-4 sm:px-6 flex justify-end">
                <a href="{{ route('rooms.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Retourner aux salles
                </a>
            </div>
        </div>
    </div>
    <!-- JavaScript pour déclencher le téléchargement du reçu en PDF -->
    <script>
        // Fonction pour générer et télécharger le PDF
        function generatePDF() {
            var element = document.documentElement;
            var opt = {
                margin: 0,
                filename: 'reçu_de_réservation.pdf',
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

        // Appeler la fonction generatePDF lorsque la fenêtre a fini de charger
        window.onload = function() {
            generatePDF();
        };
    </script>
</body>

</html>
