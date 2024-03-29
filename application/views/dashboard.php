
<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets2/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets2/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets2/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets2/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets2/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets2/img/favicon.png">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
	<!-- NAVBAR -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="brand">
			<a href="<?php echo base_url();?>dashboard"><img src="<?php echo base_url();?>assets2/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
		</div>
		<div class="container-fluid">
			<div class="navbar-btn">
				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
			</div>
			<form class="navbar-form navbar-left">
				<div class="input-group">
					<input type="text" value="" class="form-control" placeholder="Search dashboard...">
					<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
				</div>
			</form>
			<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url();?>assets2/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['username']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
							<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
							<li><a href="<?php echo base_url();?>login"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END NAVBAR -->
	<!-- LEFT SIDEBAR -->
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<li><a href="<?php echo base_url();?>dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
					<li><a href="<?php echo base_url();?>student_list" class=""><i class="lnr lnr-code"></i> <span>Students</span></a></li>
					<li><a href="#" class=""><i class="lnr lnr-flag"></i> <span>Countries</span></a></li>
					<li><a href="#" class=""><i class="lnr lnr-users"></i> <span>Users</span></a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- END LEFT SIDEBAR -->
	<!-- MAIN -->
	<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<!-- OVERVIEW -->
				<div class="panel panel-headline">
					<div class="panel-heading">
						<h3 class="panel-title">Weekly Overview</h3>
						<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<div class="metric">
									<span class="icon"><i class="fa fa-download"></i></span>
									<p>
										<a href="">
											<span class="number">1,252</span>
											<span class="title">Downloads</span>
										</a>
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="metric">
									<span class="icon"><i class="fa fa-shopping-bag"></i></span>
									<p>
										<span class="number">203</span>
										<span class="title">Sales</span>
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="metric">
									<span class="icon"><i class="fa fa-eye"></i></span>
									<p>
										<span class="number">274,678</span>
										<span class="title">Visits</span>
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="metric">
									<span class="icon"><i class="fa fa-bar-chart"></i></span>
									<p>
										<span class="number">35%</span>
										<span class="title">Conversions</span>
									</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-9">
								<div id="headline-chart" class="ct-chart"></div>
							</div>
							<div class="col-md-3">
								<div class="weekly-summary text-right">
									<span class="number">2,315</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
									<span class="info-label">Total Sales</span>
								</div>
								<div class="weekly-summary text-right">
									<span class="number">$5,758</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
									<span class="info-label">Monthly Income</span>
								</div>
								<div class="weekly-summary text-right">
									<span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
									<span class="info-label">Total Income</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END OVERVIEW -->
			</div>
		</div>
		<!-- END MAIN CONTENT -->
	</div>
	<!-- END MAIN -->
	<div class="clearfix"></div>
	<footer>
		<div class="container-fluid">
			<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
		</div>
	</footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo base_url();?>assets2/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets2/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets2/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets2/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url();?>assets2/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo base_url();?>assets2/scripts/klorofil-common.js"></script>
<script>
    $(function() {
        var data, options;

        // headline charts
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [23, 29, 24, 40, 25, 24, 35],
                [14, 25, 18, 34, 29, 38, 44],
            ]
        };

        options = {
            height: 300,
            showArea: true,
            showLine: false,
            showPoint: false,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#headline-chart', data, options);


        // visits trend charts
        data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [{
                name: 'series-real',
                data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
            }, {
                name: 'series-projection',
                data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
            }]
        };

        options = {
            fullWidth: true,
            lineSmooth: false,
            height: "270px",
            low: 0,
            high: 'auto',
            series: {
                'series-projection': {
                    showArea: true,
                    showPoint: false,
                    showLine: false
                },
            },
            axisX: {
                showGrid: false,

            },
            axisY: {
                showGrid: false,
                onlyInteger: true,
                offset: 0,
            },
            chartPadding: {
                left: 20,
                right: 20
            }
        };

        new Chartist.Line('#visits-trends-chart', data, options);


        // visits chart
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [6384, 6342, 5437, 2764, 3958, 5068, 7654]
            ]
        };

        options = {
            height: 300,
            axisX: {
                showGrid: false
            },
        };

        new Chartist.Bar('#visits-chart', data, options);


        // real-time pie chart
        var sysLoad = $('#system-load').easyPieChart({
            size: 130,
            barColor: function(percent) {
                return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
            },
            trackColor: 'rgba(245, 245, 245, 0.8)',
            scaleColor: false,
            lineWidth: 5,
            lineCap: "square",
            animate: 800
        });

        var updateInterval = 3000; // in milliseconds

        setInterval(function() {
            var randomVal;
            randomVal = getRandomInt(0, 100);

            sysLoad.data('easyPieChart').update(randomVal);
            sysLoad.find('.percent').text(randomVal);
        }, updateInterval);

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

    });
</script>
</body>

</html>
