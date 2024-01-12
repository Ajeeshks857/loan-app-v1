<div data-te-datatable-init id="loan-details" class="bg-gray-100 p-4">
    <h2 class="text-2xl font-bold mb-4">Loan Details</h2>
    <table class="table-auto w-full bg-white shadow-md rounded mb-4" id="loanDetailsTable">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2">Client ID</th>
                <th class="px-4 py-2">Number of Payments</th>
                <th class="px-4 py-2">First Payment Date</th>
                <th class="px-4 py-2">Last Payment Date</th>
                <th class="px-4 py-2">Loan Amount</th>
            </tr>
        </thead>

        <tbody>

        </tbody>
    </table>
</div>
<style>
    #loanDetailsTable td {
        color: rgb(27, 4, 4);
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
<script src="/js/loan-details.js" defer></script>
