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
                        <div class="float-right">
                            <a href="/dashboard"
                                class="text-white float:left bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Home
                            </a>
                        </div>

                        <h1
                            class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                            EMI Details</h1>

                        @include('_flash-message')
                        <div class="overflow-x-auto bg-white p-6 mt-6 lg:mt-0 rounded shadow-md sm:rounded-lg max-h-[30em]">
                            <div class="max-w-full overflow-y-auto">
                                <table id="emiDetailsTable" class="min-w-full bg-white">
                                    <thead class="text-xs uppercase bg-gray-700 text-white">
                                        <tr>
                                            <th>{{ __('Client ID') }}</th>
                                            @foreach ($emiDetails->first() as $column => $value)
                                                <th>{{ $column }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($emiDetails as $emi)
                                            <tr>
                                                <td>{{ $emi->clientid }}</td>
                                                @foreach ($emi as $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="pagination mt-4">
                                    {{ $emiDetails->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        #emiDetailsTable td {
                            color: rgb(27, 4, 4);
                        }
                    </style>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            $('#emiDetailsTable').DataTable({
                                "paging": false,
                                "searching": false,
                                "info": false,
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
