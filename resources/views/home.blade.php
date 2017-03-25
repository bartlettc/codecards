<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>codecards - for people who like to tweet code</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/app.css">
    <link rel="stylesheet" type="text/css" href="../codemirror/lib/codemirror.css">


    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            background-color: #f5f7fa;
        }

        .logo img {
            width: 120px;
        }

        .container {
            padding-top: 50px;
            max-width: 968px;
        }

        .section {
            margin-top: 40px;
            border: 1px solid #efefef;
            border-radius: 5px;
        }

        .status-header {
            padding: 40px 40px 80px 40px;
        }

        .status-header .indicator {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 100%;
            margin-right: 20px;
            background: #17d766;
            background: -moz-linear-gradient(top, #17d766 0%, #17d766 50%, #16cf62 51%, #16cf62 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #17d766), color-stop(50%, #17d766), color-stop(51%, #16cf62), color-stop(100%, #16cf62));
            background: -webkit-linear-gradient(top, #17d766 0%, #17d766 50%, #16cf62 51%, #16cf62 100%);
            background: -ms-linear-gradient(top, #17d766 0%, #17d766 50%, #16cf62 51%, #16cf62 100%);
            background: linear-gradient(to bottom, #17d766 0%, #17d766 50%, #16cf62 51%, #16cf62 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#17d766', endColorsGradientType=0);
            opacity: 0.8;
            filter: alpha(opacity=80);
        }

        .status-header .title {
            display: inline-block;
        }

        .status-header .subtitle {
            display: block;
            margin-left: 35px;
        }



        .status-footer {
            padding-left: 20px;
        }

        .status-footer a {
            padding: 0 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <a href="../index.html">
            <img src="../images/logo.png">
        </a>
    </div>
    <div class="section">
        <div class="status-header">
            <div class="indicator"></div>
            <div class="title">All services are online.</div>
            <div class="subtitle">As of August 1, 2016 at 11:08PM MST.</div>
        </div>


    </div>
    <div class="section">

<textarea id="editor">
   {{  $code }}
</textarea>
    </div>
    <div class="section">
        <div class="status-footer">
            <p>
                <a href="#">Legal</a>
                <a href="#">About</a>
                <a href="#">Jobs</a>
            </p>
        </div>
    </div>
</div>
<script src="codemirror/lib/codemirror.js"></script>
<script src="js/app.js"></script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        lineNumbers: true,
        mode:  "PHP",
        theme: "dracula"
    });
</script>
</body>
</html>