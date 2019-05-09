@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">

            <h1>Charts with ChartJS</h1>
            <p>Good looking charts canbe generated with ChartJS. Please visit their website for more information:
                <a target="_blank" href="http://www.chartjs.org/">http://www.chartjs.org/</a></p>
            
            <h2>Bar chart</h2>
            
            <canvas id="bar-chart" width="800" height="450"></canvas>
            
            <h2>Line chart</h2>
            
            <canvas id="line-chart" width="800" height="450"></canvas>
                            
            <h2>Pie chart</h2>
            
            <canvas id="pie-chart" width="800" height="450"></canvas>
                
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    // Bar Chart
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["Club", "Homework", "Workshop", "Sport"],
            datasets: [
            {
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
                data: [2478,5267,734,784]
            }
            ]
        },
        options: {
            legend: { display: false }
        }
    });

    //Line Chart
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
        labels: ['Current Week','Next Week','Week +2','Week +3'],
        datasets: [{
            data: [0,5,3,12],
            label: "Club Meeting",
            borderColor: "#3e95cd",
            fill: false
            }, {
            data: [0,3,8,15],
            label: "Sports",
            borderColor: "#8e5ea2",
            fill: false
            }, {
            data: [0,6,5,13],
            label: "Homework",
            borderColor: "#c45850",
            fill: false
            }
        ]
        }
    });

    //Pie Chart
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: ["Open", "Completed"],
                datasets: [{
                backgroundColor: ["#c21e56", "green"],
                data: [40,30]
                }]
            }
        });

});
</script>
@endpush
