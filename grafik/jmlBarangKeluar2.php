<script>
    // let arrLabel = []

    function getData(ajaxUrl) {
        return $.ajax({
            url: ajaxUrl,
            type: "GET",
            dataType: 'json',
            ContentType: 'application/json',
        })
    }

    async function fetchData() {
        try {
            const res = await getData('grafik/jmlBarangKeluar3.php')
            const ctx = document.getElementById('myChartBarangKeluar')
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'June',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    ],
                    datasets: [{
                        label: 'data ' + new Date().getFullYear(),
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: res.data,
                    }]
                },
                options: {}
            });
        } catch (err) {
            console.log(err);
        }

    }

    fetchData()
</script>