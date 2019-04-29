@extends('templates.template')
@section('template')
<script src="http://localhost/Tasks-Management/public/js/app.js"></script>

    <!-- Styles -->
    <link href="http://localhost/Tasks-Management/public/css/app.css" rel="stylesheet">

    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="http://localhost/Tasks-Management/public/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/icons/icons_reference.asp"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.3/css/autoFill.dataTables.min.css">
<body>
    <div id="app">
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">

                        <canvas id="pie-chart" width="80" height="45"></canvas>

                    </div>
                    <div class="col-md-6">

                        <canvas id="bar-chart" width="800" height="450"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
    <script>
        $(function () {
            //Pie Chart
            new Chart(document.getElementById("pie-chart"), {
                width: 380,
                type: 'pie',
                data: {
                    labels: ["completed", "open"],
                    datasets: [{
                        label: "Population (millions)",
                        backgroundColor: ["blue", "red"],
                        data: [60,40],
                    }]
                },
                options: {
                    legend: { 
                        position: 'right',
                    }
                    
                }
            });

            // Bar Chart
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: ["Homework", "Club", "Cleaning", "Workshop"],
                    datasets: [
                        {
                            label: "Event in pnc",
                            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
                            data: [0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                        }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                        // text: 'Predicted world population (millions) in 2050'
                    }
                }
            });

        });
    </script>
</body>
@endsection