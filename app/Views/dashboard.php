 <?= $this->extend('layout/template') ?>
 <?= $this->section('content') ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

 <div class="container-fluid">
     <div class="row content-body">
         <div class="col-lg-12">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-bg-danger">
                 <div class="iq-card-body box iq-box-relative">
                     <!-- <div class="box-image float-right">
                         <img class="rounded img-fluid" src="images/page-img/37.png" alt="profile">
                     </div> -->
                     <h4 class="d-block mb-3 text-black">Welcome back <?= session()->user_name ?></h4>
                     <p class="d-inline-block welcome-text text-black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vulputate facilisis velit, vitae fermentum nulla ultrices et.</p>
                 </div>
             </div>
         </div>


         <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                 <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                         <h4 class="card-title">Transaksi Penjualan</h4>
                         <input type="number" id="tahun-trans" class="form-control mb-2 mt-2" value="<?= date('Y') ?>" onchange="chartTransaksi()">
                     </div>
                 </div>
                 <div class="iq-card-body">
                     <!-- <div id="apex-basic"></div> -->
                     <canvas id="chartTransaksi"></canvas>
                     <!-- ini diubah di chart -->

                     <!-- <div id="chartTransaksi"></div> -->
                 </div>
                 <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                     <button class="btn btn-outline-primary btn-sm" onclick="downloadChartTransaksi('PDF')">Unduh PDF</button>
                     <a id="download-trans" download="chart-transaksi.png">
                         <button class="btn btn-outline-secondary btn-sm" onclick="downloadChartTransaksi('PNG')">Unduh PNG</button>
                     </a>
                 </div>
             </div>
         </div>


         <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                 <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                         <h4 class="card-title">Customer</h4>
                         <input type="number" id="tahun-cust" class="form-control mb-2 mt-2" value="<?= date('Y') ?>" onchange="chartCustomer()">
                     </div>
                 </div>
                 <div class="iq-card-body">
                     <canvas id="chartCust"></canvas>
                 </div>
                 <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                     <button class="btn btn-outline-primary btn-sm" onclick="downloadChartCustomer('PDF')">Unduh PDF</button>
                     <a id="download-cust" download="chart-cust.png">
                         <button class="btn btn-outline-secondary btn-sm" onclick="downloadChartCustomer('PNG')">Unduh PNG</button>
                     </a>
                 </div>
             </div>

         </div>
     </div>

     <!-- <div class="col-xl-6">
         <div class="card mb-4">
             <div class="card-header">
                 <i class="fas fa-chart-area me-1"></i>
                 Grafik Transaksi Pembelian
                 <div class="col-sm-2 mt-3">
                     <input type="number" id="tahun-pem" class="form-control" value="<?= date('Y') ?>" onchange="chartPembelian()">
                 </div>
             </div>
             <div class="card-body"><canvas id="chartPembelian" width="100%" height="40"></canvas></div>
             <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                 <button class="btn btn-outline-primary btn-sm" onclick="downloadChartPembelian('PDF')">Unduh PDF</button>
                 <a id="download-pem" download="chart-pembelian.png">
                     <button class="btn btn-outline-secondary btn-sm" onclick="downloadChartPembelian('PNG')">Unduh PNG</button>
                 </a>
             </div>
         </div>
     </div> -->

     <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
             <div class="iq-header-title">
                 <h4 class="card-title"> Transaksi Pembelian</h4>
                 <input type="number" id="tahun-pem" class="form-control mb-2 mt-2" value="<?= date('Y') ?>" onchange="chartPembelian()">
             </div>
         </div>
         <div class="iq-card-body">
             <canvas id="chartPem"></canvas>
         </div>
         <div class="d-grip gap-2 d-md-flex justify-content-md-end">
             <button class="btn btn-outline-primary btn-sm" onclick="downloadChartPembelian('PDF')"> PDF</button>
             <a id="download-pem" download="chart-Pembelian.png">
                 <button class="btn btn-outline-secondary btn-sm" onclick="downloadChartPembelian('PNG')"> PNG</button>
             </a>
         </div>
     </div>



 </div>
 </div>


 <script>
     // Area Chart Example

     $(document).ready(function() {
         chartTransaksi()
         chartCustomer()
     });

     //   =================================TRANSAKSI==============================
     function setLineChart(dataset) {
         var ctx = document.getElementById("chartTransaksi");
         var myLineChart = new Chart(ctx, {
             type: 'line',
             data: {
                 labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
                 datasets: [{
                     label: "Total",
                     lineTension: 0.3,
                     backgroundColor: "rgba(2,117,216,0.2)",
                     borderColor: "rgba(2,117,216,1)",
                     pointRadius: 5,
                     pointBackgroundColor: "rgba(2,117,216,1)",
                     pointBorderColor: "rgba(255,255,255,0.8)",
                     pointHoverRadius: 5,
                     pointHoverBackgroundColor: "rgba(2,117,216,1)",
                     pointHitRadius: 50,
                     pointBorderWidth: 2,
                     data: dataset,
                 }],
             },
             options: {
                 scales: {
                     xAxes: [{
                         time: {
                             unit: 'date'
                         },
                         gridLines: {
                             display: false
                         },
                         ticks: {
                             maxTicksLimit: 7
                         }
                     }],
                     yAxes: [{
                         ticks: {
                             maxTicksLimit: 5
                         },
                         gridLines: {
                             color: "rgba(0, 0, 0, .125)",
                         }
                     }],
                 },
                 legend: {
                     display: false
                 }
             }
         });
     }

     function chartTransaksi() {
         var tahun = $('#tahun-trans').val();
         $.ajax({
             url: "/chart-Transaksi",
             method: "POST",
             data: {
                 'tahun': tahun,
             },
             success: function(response) {
                 var result = JSON.parse(response)

                 dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                 $.each(result.data, function(i, val) {
                     dataset[val.month - 1] = val.total
                 });
                 setLineChart(dataset)
             }
         });
     }

     function downloadChartImg(download, chart) {
         var img = chart.toDataURL("image/jpg", 1.0).replace("image/jpg", "image/octet-stream")
         download.setAttribute("href", img)
     }

     function downloadChartPDF(chart, name) {
         html2canvas(chart, {
             onrendered: function(canvas) {
                 var img = canvas.toDataURL("image/jpg", 1.0)
                 var doc = new jsPDF('p', 'pt', 'A4')
                 var lebarKonten = canvas.width
                 var tinggiKonten = canvas.height
                 var tinggiPage = lebarKonten / 592.28 * 841.89
                 var leftHeight = tinggiKonten
                 var position = 0
                 var imgWidth = 595.28
                 var imgHeight = 592.28 / lebarKonten * tinggiKonten
                 if (leftHeight < tinggiPage) {
                     doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight)
                 } else {
                     while (leftHeight > 0) {
                         doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                         leftHeight -= tinggiPage
                         position -= 841.89
                         if (leftHeight > 0) {
                             pdf.addPage()
                         }
                     }
                 }
                 doc.save(name)
             }
         });
     }

     // =================================CUSTOMER=============================
     function setBarChart(dataset) {
         // Bar Chart Example
         var ctx = document.getElementById("chartCust");
         var myLineChart = new Chart(ctx, {
             type: 'bar',
             data: {
                 labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep",
                     "Okt", "Nov", "Des"
                 ],
                 datasets: [{
                     label: "Total",
                     backgroundColor: "rgba(2,117,216,1)",
                     borderColor: "rgba(2,117,216,1)",
                     data: dataset,
                 }],
             },
             options: {
                 scales: {
                     xAxes: [{
                         time: {
                             unit: 'month'
                         },
                         gridLines: {
                             display: false
                         },
                         ticks: {
                             maxTicksLimit: 6
                         }
                     }],
                     yAxes: [{
                         ticks: {

                             maxTicksLimit: 5
                         },
                         gridLines: {
                             display: true
                         }
                     }],
                 },
                 legend: {
                     display: false
                 }
             }
         });
     }

     function chartCustomer() {
         var tahun = $('#tahun-cust').val();
         $.ajax({
             url: "/chart-Pelanggan",
             method: "POST",
             data: {
                 'tahun': tahun,
             },
             success: function(response) {
                 var result = JSON.parse(response)

                 dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                 $.each(result.data, function(i, val) {
                     dataset[val.month - 1] = val.total
                 });
                 setBarChart(dataset)
             }
         });
     }


     //   =================================Pembelian================================
     function setgaris(dataset) {
         var ctx = document.getElementById("chartPem");
         var myLineChart = new Chart(ctx, {
             type: 'line',
             data: {
                 labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
                 datasets: [{
                     label: "Jumlah",
                     lineTension: 0.3,
                     backgroundColor: "rgba(2,117,216,0.2)",
                     borderColor: "rgba(2,117,216,1)",
                     pointRadius: 5,
                     pointBackgroundColor: "rgba(2,117,216,1)",
                     pointBorderColor: "rgba(255,255,255,0.8)",
                     pointHoverRadius: 5,
                     pointHoverBackgroundColor: "rgba(2,117,216,1)",
                     pointHitRadius: 50,
                     pointBorderWidth: 2,
                     data: dataset,
                 }],
             },
             options: {
                 scales: {
                     xAxes: [{
                         time: {
                             unit: 'month'
                         },
                         gridLines: {
                             display: false
                         },
                         ticks: {
                             maxTicksLimit: 7
                         }
                     }],
                     yAxes: [{
                         ticks: {
                             maxTicksLimit: 5
                         },
                         gridLines: {
                             color: "rgba(0, 0, 0, .125)",
                         }
                     }],
                 },
                 legend: {
                     display: false
                 }
             }
         });
     }

     function chartPembelian() {
         var tahun = $('#tahun-pem').val();
         $.ajax({
             url: "chart-Pembelian",
             method: "POST",
             data: {
                 'tahun': tahun,
             },
             success: function(response) {
                 var result = JSON.parse(response)

                 dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                 $.each(result.data, function(i, val) {
                     dataset[val.month - 1] = val.total
                 });
                 setgaris(dataset)
             }
         });
     }

     function downloadChartImg(download, chart) {
         var img = chart.toDataURL("image/jpg", 1.0).replace("image/jpg", "image/octet-stream")
         download.setAttribute("href", img)
     }

     function downloadChartPDF(chart, name) {
         html2canvas(chart, {
             onrendered: function(canvas) {
                 var img = canvas.toDataURL("image/jpg", 1.0)
                 var doc = new jsPDF('p', 'pt', 'A4')
                 var lebarKonten = canvas.width
                 var tinggiKonten = canvas.height
                 var tinggiPage = lebarKonten / 592.28 * 841.89
                 var leftHeight = tinggiKonten
                 var position = 0
                 var imgWidth = 595.28
                 var imgHeight = 592.28 / lebarKonten * tinggiKonten
                 if (leftHeight < tinggiPage) {
                     doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight)
                 } else {
                     while (leftHeight > 0) {
                         doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                         leftHeight -= tinggiPage
                         position -= 841.89
                         if (leftHeight > 0) {
                             pdf.addPage()
                         }
                     }
                 }
                 doc.save(name)
             }
         });
     }




     function downloadChartTransaksi(type) {
         var download = document.getElementById('download-trans')
         var chart = document.getElementById('chartTransaksi')

         if (type == "PNG") {
             downloadChartImg(download, chart)
         } else {
             downloadChartPDF(chart, "Chart-Transaksi.pdf")
         }
     }

     function downloadChartPembelian(type) {
         var download = document.getElementById('download-pem')
         var chart = document.getElementById('chartPem')

         if (type == "PNG") {
             downloadChartImg(download, chart)
         } else {
             downloadChartPDF(chart, "Chart-Pembelian.pdf")
         }
     }

     function downloadChartCustomer(type) {
         var download = document.getElementById('download-cust')
         var chart = document.getElementById('chartCust')

         if (type == "PNG") {
             downloadChartImg(download, chart)
         } else {
             downloadChartPDF(chart, "Chart-Customer.pdf")
         }
     }
 </script>
 <?= $this->endSection() ?>