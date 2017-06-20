<script type="text/javascript">
// charting jumlah produk terlaris
<?php 
        $query_habis  = mysql_query("SELECT count(*) as JUMLAHHABIS FROM `produk` p JOIN kategori_produk k ON p.katpro_id = k.katpro_id where p.stok = 0");
        $produk_habis = mysql_fetch_array($query_habis);
        $habis = $produk_habis['JUMLAHHABIS'];

        $query_menipis  = mysql_query("SELECT count(*) as JUMLAHMENIPIS FROM `produk` p JOIN kategori_produk k ON p.katpro_id = k.katpro_id where p.stok != 0 AND p.stok <= 5");
        $produk_menipis = mysql_fetch_array($query_menipis);
        $menipis = $produk_menipis['JUMLAHMENIPIS'];
        
        $query_tersedia  = mysql_query("SELECT count(*) as JUMLAHTERSEDIA FROM `produk` p JOIN kategori_produk k ON p.katpro_id = k.katpro_id where p.stok >= 6");
        $produk_tersedia = mysql_fetch_array($query_tersedia);
        $tersedia = $produk_tersedia['JUMLAHTERSEDIA'];
 ?>
Highcharts.chart('produk_terlaris', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Chartting Produk Terlaris'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f} Barang </b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    
   series: [{
        type: 'pie',
        name: 'Total :',
        data: [
            ['PRODUK HABIS', <?php echo $habis; ?> ],
            {
                name:'PRODUK MENIPIS' ,
                y: <?php echo $menipis; ?>,
                sliced: true,
                selected: true  
            },
            ['PRODUK TERSEDIA', <?php echo $tersedia; ?>]
        ]
    }],
    colors: ['#f7a35c', '#7798BF', '#90ee7e', '#aaeeee', '#ff0066', '#eeaaee',
      '#55BF3B', '#DF5353', '#7798BF', '#aaeeee']
});
</script>
<!-- chartting order -->
<?php 
        $query_total_order = mysql_query("SELECT count(*) as total_order FROM orders ");
        $row_total_order = mysql_fetch_array($query_total_order);
        $total = $row_total_order['total_order'];
        $query_order_lunas  = mysql_query("SELECT count(*) as total_lunas FROM orders where status_order = 'Lunas'");
        $row_total_lunas = mysql_fetch_array($query_order_lunas);
        $lunas = $row_total_lunas['total_lunas'];
        $waitting_order = $total-$lunas;
 ?>

 <script type="text/javascript">
    // Create the chart
Highcharts.chart('order_penjualan', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Order Transaksi Penjualan <?php echo date('Y'); ?>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} </b> Barang<br/>'
    },

    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Total Penjualan',
            y: <?php echo $total; ?>,
            drilldown: 'Total Penjualan'
        }, {
            name: 'Penjualan Lunas',
            y: <?php echo $lunas; ?>,
            drilldown: 'Penjualan Lunas'
        }, {
            name: 'Penjualan Waitinglist',
            y: <?php echo $waitting_order; ?>,
            drilldown: 'Penjualan Waitinglist'
        }]
    }]
    
});

 </script>