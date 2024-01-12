const app = Vue.createApp({
    data() {
        return {
            loanDetails: [],
        };
    },
    mounted() {
        this.fetchLoanDetails();
    },
    methods: {
        fetchLoanDetails() {
            const apiUrl = '/loan-details';

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    this.loanDetails = data.data[0];
                    this.$nextTick(() => {
                        this.initializeDataTable();
                    });
                })
                .catch(error => {
                    console.error('Error fetching loan details:', error);
                });
        },
        initializeDataTable() {
            $('#loanDetailsTable').DataTable({
                data: this.loanDetails,
                columns: [{
                        data: 'clientid'
                    },
                    {
                        data: 'num_of_payment'
                    },
                    {
                        data: 'first_payment_date',
                        render: function (data) {
                            return new Date(data).toLocaleDateString();
                        },
                    },
                    {
                        data: 'last_payment_date',
                        render: function (data) {
                            return new Date(data).toLocaleDateString();
                        },
                    },
                    {
                        data: 'loan_amount'
                    },
                ],
            });
        },
    },
});

app.mount('#loan-details');
