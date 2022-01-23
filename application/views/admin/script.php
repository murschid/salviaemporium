<script type="text/javascript">
    setInterval(function(){
        $.ajax({
            url: baseurl + 'order/ordnotification',
            method: 'POST',
            type: 'html',
            data: {'table': 'tb_ordersummary', 'whrfst': 'status', 'whrlst': 'pending'},
            success: function (result) {
                $('.navajaxdata').html(result);
                $('.ordernotific').text($('.ordercountcls').length);
            }
        });
    }, 30000);
    $(document).ready(function () {
        $('.textarea').summernote({
            height: 87,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['codeview']]
            ]
        });
    });
    $(document).ready(function () {
        $('.textarealg').summernote({
            height: 400
        });
    });
    
    <?php if(isset($grpvstr)): ?>
    $(function () {
        Highcharts.chart('areaChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '<?= $maptext; ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                    name: 'Total',
                    colorByPoint: true,
                    data: [
                        <?php foreach ($grpvstr as $grpvstm): ?>
                        {name: '<?= ucfirst($grpvstm->country); ?>', y: <?= $grpvstm->total; ?>, sliced: true, selected: true },
                        <?php endforeach; ?>
                    ]
                }]
        });
    });
    <?php endif; ?>

    <?php if (isset($maptexttwo)): ?>
    Highcharts.chart('monthChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?= $maptexttwo ? $maptexttwo : 'Chart Data'; ?>'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Order'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Order',
                    data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
                }]
        });
    <?php endif; ?>
</script>