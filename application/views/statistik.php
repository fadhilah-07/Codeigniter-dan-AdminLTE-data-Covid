<html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informasi COVID-19</title>
        <meta http-equiv="refresh" content="600"/>
        <link href="https://corona.jepara.go.id/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="https://corona.jepara.go.id/assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://corona.jepara.go.id/assets/css/linecons.css" rel="stylesheet" type="text/css">
        <link href="https://corona.jepara.go.id/assets/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="https://corona.jepara.go.id/assets/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="https://corona.jepara.go.id/assets/css/animate.css" rel="stylesheet" type="text/css">
    </head>
    <body>
                <!--Header_section-->
        <header id="header_outer">
            <div class="container">
                <div class="header_section">
                    <div class="logo logo2"><a href="javascript:void(0)" class="site"><img src="https://corona.jepara.go.id/assets/logo/jepara.png" alt="" width="30px"></a></div>
                    <nav class="nav" id="nav">
                        <ul class="">
                            <li><a href="Auth/index">LOGIN ADMIN</a></li>
                            <li><a href="https://corona.jepara.go.id/">Informasi</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
</html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
</head>
<body> 
        <h2>Informasi Covid - 19 di Jepara</h2>
        </div>
        <canvas id="myChart"  width="150" height="50"></canvas>
        <script>
            
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
            //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            labels: [
            <?php
            foreach($stat as $val){
				echo "'" . $val->kecamatan ."',";
			}
    		?>
            ],
            datasets: [{
                label: '# PP',
                // data: [12, 19, 3, 5, 2, 3],
    			data: [
    			<?php
    				foreach($stat as $val){
    					echo "'" . $val->pp ."',";
    				}
    			?>
    			],
    			backgroundColor: 'green',
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 0
            },
    		{
                label: '# ODP',
                // data: [12, 19, 3, 5, 2, 3],
    			data: [
    			<?php
    				foreach($stat as $val){
    					echo "'" . $val->odp ."',";
    				}
    			?>
    			],
                backgroundColor: 'yellow',
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            },
    		{
                label: '# PDP',
                // data: [12, 19, 3, 5, 2, 3],
    			data: [
    			<?php
    				foreach($stat as $val){
    					echo "'" . $val->pdp ."',";
    				}
    			?>
    			],
                backgroundColor: 'blue',
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            },
    		{
                label: '# POSITIF',
                // data: [12, 19, 3, 5, 2, 3],
    			data: [
    			<?php
    				foreach($stat as $val){
    					echo "'" . $val->positif ."',";
    				}
    			?>
    			],
                backgroundColor: 'red',
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>