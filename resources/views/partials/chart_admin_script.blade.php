<script src="{{ asset('../../plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('../../plugins/chart.js/Chart.min.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous"></script>

    {{-- Number of Users --}}
<script type="text/javascript"> 
        $(function(){
            var datas = <?php echo json_encode($datas); ?>;
            var barCanvas = $("#barChart");
            var barChart = new Chart(barCanvas,{
                type:'bar',
                data:{
                    labels:['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets:[
                        {
                            label:"{{ __('dashboard_admin.number_of_users') }}",
                            data:datas,
                            backgroundColor:['red','orange','yellow','green','indigo', 'gray', 'violet','purple', 'gray','pink','silver','gold','brown']
                        }
                    ]
                }, 
                options:{
                    scales:{
                        yAxis:[{
                            ticks:{
                                beginAtZero:true 
                            }
                        }]
                    }
                }
            });
        })
</script>


<script type="text/javascript">

var daydatas = <?php echo json_encode($dayjobdatas) ?>

    Highcharts.chart("chart-container", {
        title:{
            text:'Ads created By Day Graph, 2021'
        },
        subtitle:{
            text:'Source: Blue Push'
        },
        xAxis:{
            categories:[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, ,21, 22, 23 ,24, 25, 26,27, 28, 29, 30, 31]
        },
        yAxis:{
            title:{
                text: 'Ads created by day'
            }
        },
        legend:{
            layout:'vertical',
            align:'right',
            verticalAlign:'middle'
        },
        plotOptions:{
            series:{
                allowPointSelect:true
            }
        },
        series:[{
            name:'Ads created by day',
            data:daydatas
        }],
        responsive:{
            rules:[
                {
                    condition:{
                        maxWidth:500
                    },
                    chartOptions:{
                        legend:{
                            layout:'horizontal',
                            align:'center',
                            verticalAlign:'bottom'
                        }
                    }
                }
            ]
        }
    })
</script>





<script type="text/javascript">

var datalikes = <?php echo json_encode($datalikes) ?>

    Highcharts.chart("chart-like", {
        title:{
            text:'Ads liked growth, 2021'
        },
        subtitle:{
            text:'Source: Blue Push'
        },
        xAxis:{
            categories:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis:{ 
            title:{
                text: 'Ads liked by month'
            }
        },
        legend:{
            layout:'vertical',
            align:'right',
            verticalAlign:'middle'
        },
        plotOptions:{
            series:{
                allowPointSelect:true
            }
        },
        series:[{
            name:'Ads liked by month',
            data:datalikes
        }],
        responsive:{
            rules:[
                {
                    condition:{
                        maxWidth:500
                    },
                    chartOptions:{
                        legend:{
                            layout:'horizontal',
                            align:'center',
                            verticalAlign:'bottom'
                        }
                    }
                }
            ]
        }
    })
</script>

