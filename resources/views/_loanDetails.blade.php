<div data-te-datatable-init id="loan-details" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    <h2 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">Loan Details</h2>
    <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;" id="loanDetailsTable">
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


<script src="/js/loan-details.js" defer></script>
