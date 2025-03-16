<!DOCTYPE html>
<html>

<head>
    <style>
        img {
            width: 100%;
        }

        .buttons {
            text-align: right;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
            line-height: 38px;
        }

        .buttons a {
            color: #FFF;
            padding: 10px;
            background: #f44336;
        }

        .buttons a:hover {
            color: #ffffff;
            text-decoration: none;
            opacity: 0.8;
        }

        .page-item {
            border: 1px solid rgba(0, 0, 0, 0.4);
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
    <link rel="icon" type="../logo/png" sizes="32x32" href="../logo/badminton.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blue-grey">
    <div class="overlay"></div>

    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">HỆ THỐNG ĐIỀU KHIỂN TỪ XA</a>
            </div>
        </div>
    </nav>

    <section>
        <aside id="leftsidebar" class="sidebar">
            <?php include "info.php"; ?>
            <?php include "menu.php"; ?>
        </aside>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Quản lý</h2>
            </div>
            <?php include "quanly.php"; ?>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TRẠNG THÁI HIỆN TẠI CỦA BỂ:</h2>
                        </div>
                        <div class="body" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <span style="display: flex; justify-content: space-between;">
                                <h3>Nhiệt độ: </h3>
                                <h3 id="nhietdo" style="margin-left: 10px;">...</h3>
                                <h3 style="margin-left: 10px;">°C</h3>
                            </span>
                        </div>

                        <div class="body" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <span style="display: flex; justify-content: space-between;">
                                <h3>Chỉ số UV: </h3>
                                <h3 id="uv" style="margin-left: 10px;">...</h3>
                                <h3 style="margin-left: 10px;"> mW/cm²</h3>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MQTT JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js"></script>
    <script>
        var client = new Paho.MQTT.Client("test.mosquitto.org", Number(8080), "000000");

        client.onConnectionLost = onConnectionLost;
        client.onMessageArrived = onMessageArrived;

        client.connect({onSuccess: onConnect});

        function onConnect() {
            console.log("Đã kết nối với broker MQTT");
            client.subscribe("AnhTuan/NhietDo");
            client.subscribe("AnhTuan/uv");
        }

        function onConnectionLost(responseObject) {
            if (responseObject.errorCode !== 0) {
                console.log("Mất kết nối: " + responseObject.errorMessage);
            }
        }

        function onMessageArrived(message) {
            console.log("Tin nhắn nhận được: " + message.payloadString);

            if (message.destinationName == "AnhTuan/NhietDo") {
                document.getElementById("nhietdo").innerHTML = message.payloadString;
            }

            if (message.destinationName == "AnhTuan/uv") {
                document.getElementById("uv").innerHTML = message.payloadString;
            }
        }
    </script>

    <!-- Các thư viện JS -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>
    <script src="plugins/chartjs/Chart.bundle.js"></script>
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>
    <script src="js/demo.js"></script>

</body>

</html>
