<!DOCTYPE html>
<html>
<?php
    include './connect_db.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <!-- Giúp trang responsive trên di động -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Hệ thống điều khiển</title>

    <!-- Favicon -->
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
    <!-- Custom Css (AdminBSB) -->
    <link href="css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blue-grey">
    <!-- Hiển thị trạng thái kết nối MQTT -->
    <div id="mqtt-status" style="position: fixed; top: 10px; right: 10px; z-index: 1000; color: red; font-weight: bold;">
        🔴 Mất kết nối
    </div>

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left"><div class="circle"></div></div>
                    <div class="circle-clipper right"><div class="circle"></div></div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Nút toggle cho mobile -->
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" 
                   data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <!-- Tiêu đề -->
                <a class="navbar-brand" href="index.php">HỆ THỐNG ĐIỀU KHIỂN TỪ XA</a>
            </div>
        </div>
    </nav>
    <!-- #END# Top Bar -->

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php include "info.php"; ?>
            <!-- Menu Bên Trái -->
            <?php include "menu.php"; ?>
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <!-- PHẦN 1: Quản lý (bạn đã có sẵn) -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Quản lý</h2>
            </div>
            <!-- Gọi file quản lý -->
            <?php include "quanly.php"; ?>
        </div>
    </section>

    <!-- PHẦN 2: HỆ THỐNG ĐIỀU KHIỂN -->
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>HỆ THỐNG ĐIỀU KHIỂN</h2>
                        </div>
                        <div class="body">
                            <!-- BẮT ĐẦU KHỐI ĐIỀU KHIỂN 8 NÚT -->
                            <div class="control-grid">
                                <!-- Đèn -->
                                <div class="control-group">
                                    <i class="material-icons">lightbulb_outline</i>
                                    <!-- Đặt id cho nút đèn để dễ xử lý -->
                                    <button id="led-toggle" class="toggle" data-topic="AnhTuan/BatTatDen">Bật đèn</button>
                                </div>
                                <!-- Các nút khác vẫn giữ nguyên -->
                                <div class="control-group">
                                    <i class="material-icons">wb_sunny</i>
                                    <button class="toggle" data-topic="AnhTuan/BatTatDenUV">Bật đèn UV</button>
                                </div>
                                <div class="control-group">
                                    <i class="material-icons">arrow_forward_ios</i>
                                    <button class="toggle" data-topic="AnhTuan/BatTatBomVao">Bật bơm vào</button>
                                </div>
                                <div class="control-group">
                                    <i class="material-icons">arrow_back_ios</i>
                                    <button class="toggle" data-topic="AnhTuan/BatTatBomRa">Bật bơm ra</button>
                                </div>
                                <div class="control-group">
                                    <i class="material-icons">device_thermostat</i>
                                    <button class="toggle" data-topic="AnhTuan/BatTatSuoi">Bật sưởi</button>
                                </div>
                                <div class="control-group">
                                    <i class="material-icons">filter_alt</i>
                                    <button class="toggle" data-topic="AnhTuan/BatTatLoc">Bật lọc</button>
                                </div>
                                <div class="control-group">
                                    <i class="material-icons">restaurant_menu</i>
                                    <button class="toggle" data-topic="AnhTuan/BatTatChoAn">Bật máy cho ăn</button>
                                </div>
                                <div class="control-group">
                                    <i class="material-icons">air</i>
                                    <button class="toggle" data-topic="AnhTuan/BatTatOxy">Bật Auto</button>
                                </div>
                            </div>
                            <!-- KẾT THÚC KHỐI ĐIỀU KHIỂN 8 NÚT -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <!-- CSS: Để nút bằng nhau, icon sát nút, responsive 2 cột -> 1 cột -->
    <style>
        .control-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        @media (max-width: 600px) {
            .control-grid {
                grid-template-columns: 1fr;
            }
        }
        .control-group {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .control-group .material-icons {
            font-size: 36px;
            margin-right: 5px;
        }
        .control-group button {
            margin-left: 5px;
            padding: 8px 12px;
            font-size: 16px;
            cursor: pointer;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 160px;
            text-align: center;
        }
        /* Khi tắt -> màu đỏ */
        .control-group button.off {
            background-color: red;
        }
    </style>

    <!-- Tích hợp PAHO MQTT & các thư viện JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/demo.js"></script>

    <script>
        // Cấu hình kết nối MQTT
        var MQTT_HOST = "test.mosquitto.org";
        var MQTT_PORT = 8080;
        // Tạo client với id ngẫu nhiên
        var client = new Paho.MQTT.Client(MQTT_HOST, Number(MQTT_PORT), "Client_" + Math.random());

        client.onConnectionLost = onConnectionLost;
        client.onMessageArrived = onMessageArrived;

        // Kết nối tới broker
        function connectToBroker() {
            client.connect({
                onSuccess: onConnect,
                onFailure: onConnectFailure
            });
        }

        // Khi kết nối thành công, subscribe topic cho đèn và các nút khác
        function onConnect() {
            console.log("Đã kết nối MQTT");
            document.getElementById("mqtt-status").innerHTML = "🟢 Đã kết nối";
            document.getElementById("mqtt-status").style.color = "green";
            // Subscribe tất cả các topic điều khiển
            let topics = [
                "AnhTuan/BatTatDen", 
                "AnhTuan/BatTatDenUV", 
                "AnhTuan/BatTatBomVao", 
                "AnhTuan/BatTatBomRa", 
                "AnhTuan/BatTatSuoi", 
                "AnhTuan/BatTatLoc", 
                "AnhTuan/BatTatChoAn", 
                "AnhTuan/BatTatChedo"
            ];
            topics.forEach(topic => client.subscribe(topic));
        }

        function onConnectionLost(responseObject) {
            if (responseObject.errorCode !== 0) {
                console.log("Mất kết nối: " + responseObject.errorMessage);
                document.getElementById("mqtt-status").innerHTML = "🔴 Mất kết nối";
                document.getElementById("mqtt-status").style.color = "red";
                setTimeout(connectToBroker, 5000);
            }
        }

        // Khi nhận được tin nhắn, cập nhật trạng thái nút tương ứng
        function onMessageArrived(message) {
            console.log("Message arrived: " + message.destinationName + " - " + message.payloadString);
            document.querySelectorAll('.toggle').forEach(button => {
                if (button.getAttribute("data-topic") === message.destinationName) {
                    // Nếu nhận "on" -> chuyển thành "Tắt", nếu "off" -> chuyển thành "Bật"
                    if (message.payloadString === "on") {
                        if(button.textContent.includes("Bật")) {
                            button.textContent = button.textContent.replace("Bật", "Tắt");
                        }
                        button.classList.add("off");
                    } else {
                        if(button.textContent.includes("Tắt")) {
                            button.textContent = button.textContent.replace("Tắt", "Bật");
                        }
                        button.classList.remove("off");
                    }
                }
            });
        }

        function onConnectFailure() {
            console.log("Kết nối MQTT thất bại, thử lại...");
            document.getElementById("mqtt-status").innerHTML = "🔴 Mất kết nối";
            document.getElementById("mqtt-status").style.color = "red";
            setTimeout(connectToBroker, 5000);
        }

        // Gọi kết nối ban đầu
        connectToBroker();

        // Xử lý sự kiện nhấn nút (áp dụng cho tất cả nút có class "toggle")
        document.querySelectorAll('.toggle').forEach(button => {
            button.addEventListener('click', () => {
                let topic = button.getAttribute("data-topic");
                let newState;
                // Dựa vào text của nút để quyết định trạng thái gửi đi
                if (button.textContent.trim().startsWith("Bật")) {
                    newState = "on";
                    button.textContent = button.textContent.replace("Bật", "Tắt");
                    button.classList.add("off");
                } else {
                    newState = "off";
                    button.textContent = button.textContent.replace("Tắt", "Bật");
                    button.classList.remove("off");
                }
                // Gửi tin nhắn MQTT tới topic tương ứng
                let message = new Paho.MQTT.Message(newState);
                message.destinationName = topic;
                client.send(message);
            });
        });
    </script>
</body>
</html>
