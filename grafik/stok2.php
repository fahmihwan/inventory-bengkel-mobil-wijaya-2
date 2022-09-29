<script>
    let arrLabel = []

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
            const res = await getData('grafik/stok3.php')
            arrLabel = []
            qtyData = []
            for (let i = 0; i <= res.data.length - 1; i++) {
                arrLabel.push(res.data[i].nama)
                qtyData.push(res.data[i].qty)
            }

            const ctx = document.getElementById('myChartStock').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: arrLabel,
                    datasets: [{
                        label: '# of Votes',
                        data: qtyData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        } catch (err) {
            console.log(err);
        }

    }

    fetchData()
</script>