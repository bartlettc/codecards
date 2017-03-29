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
                        <a class="button is-primary" @click="takeSnapshot">Create Twitter Card</a>
                    </p><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://codecards.xyz/111" data-show-count="false">Tweet</a>
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

    <div class="modal" v-bind:class="{ 'is-active' : isActive }">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete"></button>
            </header>
            <section class="modal-card-body">

            </section>
            <footer class="modal-card-foot">

                <a class="button is-success">Save changes</a>
                <a class="button">Cancel</a>
            </footer>
        </div>
    </div>
</div>

<script src="js/app.js"></script>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>

