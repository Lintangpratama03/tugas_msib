<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

        <h2 class="text-center">Laporan Penjualan Tahunan</h2>

        <table class="table table-striped table-hover table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th class="text-center">Tahun</th>
                    <th class="text-center">Jumlah Penjualan</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" id="btnBar">Tampilkan Grafik Batang</button>
            <button class="btn btn-secondary" id="btnPie">Tampilkan Grafik Pie</button>
        </div>

        <canvas id="myChart"></canvas>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

    <script>
        let chart;
        fetch("/api/charts")
            .then(res => res.json())
            .then(data => {
                displayTableData(data);
                createChart(data);
            });

        function displayTableData(data) {
            let rows = "";

            data.forEach((item) => {
                const formattedJumlahPenjualan = item.jumlah_penjualan.toLocaleString("id-ID", {
                    style: "currency",
                    currency: "IDR",
                });

                rows += `
      <tr>
        <td class="text-center">${item.tahun}</td>
        <td class="text-center">${formattedJumlahPenjualan}</td>
      </tr>
    `;
            });

            document.querySelector("#dataTable tbody").innerHTML = rows;
        }

        function createChart(data) {
            const ctx = document.getElementById("myChart");
            const tahun = data.map(item => item.tahun);
            const jumlah = data.map(item => item.jumlah_penjualan);

            chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: tahun,
                    datasets: [{
                        label: "Penjualan per Tahun",
                        data: jumlah,
                        backgroundColor: ["#007bff", "#dc3545", "#ffc107", "#3367d6", "#008080", "#9932CC"]
                    }]
                },
                options: {
                    title: {
                        text: "Laporan Penjualan Tahunan"
                    },
                    labels: {
                        display: true,
                        fontColor: "#fff",
                        fontSize: 14
                    }
                }
            });
        }

        const btnBar = document.getElementById("btnBar");
        const btnPie = document.getElementById("btnPie");

        btnBar.addEventListener("click", () => {
            chart.config.type = "bar";
            chart.update();
        });

        btnPie.addEventListener("click", () => {
            chart.config.type = "pie";
            chart.update();
        });
    </script>

</body>

</html>