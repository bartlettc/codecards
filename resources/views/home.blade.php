<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>codecards - for people who like to tweet code</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/app.css">
    <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    </script>

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
<div class="container" id="app">
    <div class="logo">
        <a href="../index.html">
            <img src="../images/logo.png">
        </a>
    </div>
    <div class="section">
        <div class="columns">
            <div class="column is-two-thirds">
                <label class="label" for="user">Code</label>
                <div id="codemirrorCanvas" style="width:570px; height:300px;">
                    <codemirror  @focus="onEditorFocus" v-model="code" :options="editorOptions"></codemirror>
                </div>
            </div>
            <div class="column is-one-third">
                <div class="field">
                    <label class="label" for="user">Twitter Username</label>
                    <p class="control">
                        <input v-model="user" class="input" type="text" name="user" id="user"
                               placeholder="Username">
                    </p>
                </div>

                <div class="field">
                    <label class="label" for="title">Title</label>
                    <p class="control">
                        <input v-model="title" class="input" type="text" name="title" id="title"
                               placeholder="Card title">
                    </p>
                </div>

                <div class="field">
                    <label class="label" for="title">Description</label>
                    <p class="control">
                    <textarea v-model="description" class="textarea" name="description" id="description"
                          placeholder="Card description"></textarea>
                    </p>
                </div>

                <div>
                    <p class="control">
                        <a class="button is-primary" @click="takeSnapshot2">Create Twitter Card</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section">

        <div class="status-footer">
            <p>
                <a href="#">Privacy</a>
                <a href="#">About</a>
                <a href="#">Github</a>
            </p>
        </div>
    </div>
</div>
<script src="js/app.js"></script>

</body>
</html>