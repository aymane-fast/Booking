<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
    <x-guest-layout>
    <div class="receipt min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div id="receipt" class="max-w-lg w-full bg-white shadow-md overflow-hidden sm:rounded-lg p-5">
            <div class="flex items-center justify-center ">
                <div class="px-6 py-6">
                    <h2 class="text-lg font-semibold leading-6 text-gray-900 mb-4">Reçu de réservation</h2>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 mb-4">Merci d'avoir effectué une réservation chez nous !</p>
                </div>
            </div>
            <div class="border-t border-gray-200 px-6 py-6">
                <dl class="sm:divide-y sm:divide-gray-200">
                    @foreach ([
                        'Utilisateur' => $reservation->user->name,
                        'Nom' => $reservation->user->lname,
                        'Département' => $reservation->user->departement,
                        'PPR' => $reservation->user->ppr,
                        'Email' => $reservation->user->email,
                        'Date' => $reservation->date,
                        'Session' => $reservation->session,
                        'Salle' => $reservation->room->room_name,
                        'Raison' => $reservation->reason
                    ] as $title => $value)
                        <div class="sm:flex sm:items-center sm:justify-between px-4 py-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 sm:w-1/4">{{ $title }} :</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $value }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
    <!-- JavaScript pour déclencher le téléchargement du reçu en PDF -->
    <script>
        // Fonction pour générer et télécharger le PDF
        function generatePDF() {
            var element = document.getElementById('receipt');
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
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        }

        // Appeler la fonction generatePDF lorsque la fenêtre a fini de charger
        window.onload = function() {
            generatePDF();
        };
    </script>
</x-guest-layout>
</x-app-layout>