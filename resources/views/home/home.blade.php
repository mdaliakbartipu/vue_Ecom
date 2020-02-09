@extends('layouts.master')
@section('title','Admin Panel')
@section('page-header')
    <i class="fa fa-tachometer"></i> Admin Panel
@stop
@section('css')
    <style>
        #chartContainer{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        #chartContainer div{
            width: 24%;
        }
    </style>
@stop


@section('content')

<div id="chartContainer" class="container" style="margin-top:1em;">
        <!-- <span class=" label label-info arrowed-right arrowed-in" style="height:100px;width:90%;font-size:5em">D7Brigus Admin Panel</span> -->

        <div style="height:250px;">
            <canvas id="myChart1" width="100" height="100"></canvas>
        </div>
        <div style="height:250px;">
            <canvas id="myChart2" width="100" height="100"></canvas>
        </div>
        <div style="height:250px;">
            <canvas id="myChart3" width="100" height="100"></canvas>
        </div>
        <div style="height:250px;">
            <canvas id="myChart4" width="100" height="100"></canvas>
        </div>
        

    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/js/excanvas.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sparkline.index.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flot.resize.min.js') }}"></script>

    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="{{ asset('assets/js/chart/utils.js') }}"></script>
    <script src="{{ asset('assets/js/chart/analyser.js') }}"></script>
    <!-- Chart JS -->
    <script>
var ctx1 = document.getElementById('myChart1').getContext('2d');
var ctx2 = document.getElementById('myChart2').getContext('2d');
var ctx3 = document.getElementById('myChart3').getContext('2d');
var ctx4 = document.getElementById('myChart4').getContext('2d');

var presets = window.chartColors;
var utils = Samples.utils;


var inputs = {
			min: 0,
			max: 100,
			count: 10,
			decimals: 2,
			continuity: 2
		};

		function generateData(config) {
			return utils.numbers(Chart.helpers.merge(inputs, config || {}));
		}

		function generateLabels(config) {
			return utils.months(Chart.helpers.merge({
				count: inputs.count,
				section: 3
			}, config || {}));
		}

		var options = {
			maintainAspectRatio: false,
			spanGaps: true,
			elements: {
				line: {
					tension: 1
				}
			},
			plugins: {
				filler: {
					propagate: false
				}
			},
			scales: {
				x: {
					ticks: {
						autoSkip: true,
						maxRotation: 0
					}
				}
			}
		};
utils.srand(8);

			new Chart(ctx1, {
				type: 'line',
				data: {
					labels: <?=html_entity_decode($saleX)?>,
					datasets: [{
						backgroundColor: utils.transparentize('rgba(208, 202, 249, 0.75)'),
						borderColor: 'rgba(208, 202, 249, 0.75)',
						data: <?=html_entity_decode($saleY)?>,
						label: <?=$saleTotal?>+' USD',
						fill: 'start'
					}]
				},
				options: Chart.helpers.merge(options, {
					title: {
						text: 'Total Sales',
						display: true
					}
				})
			});
            new Chart(ctx2, {
				type: 'line',
				data: {
					labels: <?=html_entity_decode($orderX)?>,
					datasets: [{
						backgroundColor: utils.transparentize('rgba(208, 202, 249, 0.75)'),
						borderColor: 'rgba(208, 202, 249, 0.75)',
						data: <?=html_entity_decode($orderY)?>,
						label: "<?=$orderCount?>"+' orders till now',
						fill: 'start'
					}]
				},
				options: Chart.helpers.merge(options, {
					title: {
						text: 'Orders',
						display: true
					}
				})
			});
            new Chart(ctx3, {
				type: 'line',
				data: {
					labels: <?=html_entity_decode($profitX)?>,
					datasets: [{
						backgroundColor: utils.transparentize('rgba(208, 202, 249, 0.75)'),
						borderColor: 'rgba(208, 202, 249, 0.75)',
						data: <?=html_entity_decode($profitY)?>,
						label: 'Gross Profit',
						fill: 'start'
					}]
				},
				options: Chart.helpers.merge(options, {
					title: {
						text: 'fill: ' + 'start',
						display: false
					}
				})
			});
            new Chart(ctx4, {
				type: 'line',
				data: {
					labels: <?=html_entity_decode($paymentX)?>,
					datasets: [{
						backgroundColor: utils.transparentize('rgba(208, 202, 249, 0.75)'),
						borderColor: 'rgba(208, 202, 249, 0.75)',
						data: <?=html_entity_decode($paymentY)?>,
						label: 'Total Payments',
						fill: 'start'
					}]
				},
				options: Chart.helpers.merge(options, {
					title: {
						text: 'fill: ' + 'start',
						display: false
					}
				})
			});
</script>

@stop