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