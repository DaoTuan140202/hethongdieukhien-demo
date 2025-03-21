<?php
include 'connect_db.php';
if(!isset($_SESSION))
{
    session_start();
}
// $category = mysqli_query($con, "SELECT * FROM `orders`  ");
// //B1: tính tổng số bản ghi

// $total = mysqli_num_rows($category);

// //B2 : THiết lập số bảng ghi trên 1 trang
// $limit = 5;
// //B3: tính số trang
// $page = ceil($total / $limit);
// //B4: lấy trang hiện tại
// $current_page = (isset($_GET['page']) ? $_GET['page'] : 1);
// //B5: tính start
// $start = ($current_page - 1) * $limit;
// //B6: query sử dụng limit
// $category = mysqli_query($con,"SELECT * FROM `orders` LIMIT $start,$limit");
    ?>
<!DOCTYPE html>
<html>

<head>
    <style>
       img{
  width: 100%;
}

.page-item {
    border: 1px solid rgba(0,0,0,0.4);
    width: 35px;
    display: inline-block;
    text-align: center;
    line-height: 20px;
    color: black;
}

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Hệ thống điều khiển</title>
    <!-- Favicon-->
    <link rel="icon" type="../logo/png" sizes="32x32" href="../logo/badminton.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    
</head>

<body class="theme-blue-grey">
    <!-- Page Loader -->
    
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">HỆ THỐNG ĐIỀU KHIỂN TỪ XA</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php
            include "info.php";
            ?>
            <!-- Menu -->
            <?php
            include "menu.php";
           ?>
            
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Quản lý</h2>
            </div>

            <!-- Widgets -->
            <?php
            include "quanly.php";
            ?>
            <!-- #END# Widgets -->
            
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Điều khiển quạt từ xa
                            </h2>
                        </div>
                        <div class="body" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <div style="display: flex;">
                                <button id="buttons" class="onFan">Bật quạt</button>
                                <button id="buttons" class="offFan" style="margin-left: 10px;">Tắt quạt</button>
                            </div>
                            <div style="display: flex;">
                                    <h3>Trạng thái hiện tại của quạt: </h3>
                                    <h3 id="status" style="margin-left: 10px;"></h3><br>
                            </div>
                            <img src="" alt="" id="fanStatus" style="width: 300px; height: auto" >  
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
        <?php


?>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    
    <script>
        var fan_bat ="./images/FanOn.png";
        var fan_tat = "./images/FanOff.png";
        $('.onFan').click(function(){
            message = new Paho.MQTT.Message("onFan");
            message.destinationName = "ThanhTruc/BatTatQuat";
            client.send(message);
            document.getElementById("status").innerHTML = "Quạt đang hoạt động";
            $("#fanStatus").attr("src", fan_bat);
        });

        $('.offFan').click(function(){
            message = new Paho.MQTT.Message("offFan");
            message.destinationName = "ThanhTruc/BatTatQuat";
            client.send(message);
            document.getElementById("status").innerHTML = "Quạt đang tắt";
            $("#fanStatus").attr("src", fan_tat);
        });

        client = new Paho.MQTT.Client("broker.hivemq.com", Number(8000), "00000");

        client.onConnectionLost = onConnectionLost;
        client.onMessageArrived = onMessageArrived;

        client.connect({onSuccess:onConnect});

        function onConnect() {
        console.log("onConnect");
        // client.subscribe("World");
        }

        function onConnectionLost(responseObject) {
        if (responseObject.errorCode !== 0) {
            console.log("onConnectionLost:"+responseObject.errorMessage);
        }
        }

        function onMessageArrived(message) {
        console.log("onMessageArrived:"+message.payloadString);
        }
    </script>

  


    
    
</body>

</html>
