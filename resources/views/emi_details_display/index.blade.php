<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <h1 class="text-2xl font-bold mb-4">EMI Details</h1>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table id="productTable"
                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">{{ __('Client ID') }}</th>
                                        @foreach ($emiDetails->first() as $column => $value)
                                            <th scope="col" class="p-4">{{ $column }}</th>
                                        @endforeach
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($emiDetails as $emi)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4">{{ $emi->clientid }}</td>
                                            @foreach ($emi as $value)
                                                <td class="px-6 py-4">{{ $value }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#productTable').DataTable();
                            });
                        </script>

                    </div>
                    <style>
                        #emiDetailsTable td {
                            color: rgb(27, 4, 4);
                        }
                    </style>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
                    <script>
                        $(document).ready(function() {
                            $('#emiDetailsTable').DataTable();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
