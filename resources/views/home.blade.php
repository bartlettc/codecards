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
                        @{{ userError }}
                    </p>
                </div>

                <div class="field">
                    <label class="label" for="title">Title</label>
                    <p class="control">
                        <input v-model="title" class="input" type="text" name="title" id="title"
                               placeholder="Card title" maxlength="120">
                        @{{ titleError }}
                    </p>
                </div>

                <div class="field">
                    <label class="label" for="title">Description</label>
                    <p class="control">
                    <textarea v-model="description" class="textarea" name="description" id="description"
                          placeholder="Card description"></textarea>
                        @{{ descriptionError }}
                    </p>
                </div>

                <div>
                    <p class="control">
                        <a class="button is-primary" @click="takeSnapshot">Create Twitter Card</a>
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
    <div class="modal" v-bind:class="{ 'is-active' : isActive }">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Your card</p>
                <button class="delete" @click="closeModal"></button>
            </header>
            <section class="modal-card-body">
            <h2 class="card-h2">@{{ title }}</h2><a title="View card" v-bind:href="link" class="icon pull-right"><i class="fa fa-link"></i></a>
                <a v-bind:href="tweetUserLink" class="card-user" >@{{ user }}</a>
            <img :src="'/storage/' + imgFileName + '.png'">
                @{{ description }}
            </section>
            <footer class="modal-card-foot">
                <a v-bind:href="tweetLink" class="button is-primary">Tweet</a>
                <a class="button" @click="closeModal">Cancel</a>
            </footer>
        </div>
    </div>
</div>
<script src="js/app.js"></script>
</body>
</html>

