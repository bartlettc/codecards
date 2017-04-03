<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@laravel_tips">
    @foreach($card['meta'] as $name => $content)
    <meta name="twitter:{{$name}}" content="{{$content}}">
    @endforeach
    <meta name="twitter:image" content="{{ url('/') }}/storage/{{ $card->ref }}.png">
    <meta name="twitter:image:alt" content="Image of some code">
    <title>A codecard by {{ $card->meta['creator']  or ''}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/app.css">
    <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'code' => $card->code,
    ]) !!};
    </script>
</head>
<body class="is-mobile">
<div class="container" id="app">
    <div class="logo ">
        <a href="../index.html">
            <img src="../images/logo.png">
        </a>
    </div>
    <div class="section">
        <div class="columns is-mobile">
            <div class="column is-half is-offset-one-quarter">
                <h1 class="title">{{ $card->meta['title']  }}</h1>
                <h2 class="subtitle"><a
                            href="https://twitter.com/{{ $card->meta['creator'] or '' }}">{{ $card->UserWithAtSymbol  or ''}}</a>
                </h2>
                <h1></h1>
                <div id="codemirrorCanvas" style="width:570px; height:300px;">
                    <codemirror v-model="code" :options="displayEditorOptions"></codemirror>
                </div>
                <div>
                    {{ $card->meta['description'] }}
                </div>
            </div>
            <div class="column is-one-third">


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

