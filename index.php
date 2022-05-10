<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <style>
        #cover-loader {
            position: fixed;
            height: 100%;
            width: 100%;
            background: #141526;
            opacity: 0.5;
            z-index: 9999;
            font-size: 65px;
            text-align: center;
            color: #fff;
            font-family:tahoma;
        }
        .loading-msg {
            vertical-align: middle;
            top: 50%;
        }

    </style>
</head>
<body>
<div id="cover-loader" style="display:none;">
    <div class="loading-msg">
        <i class="fas fa-sync fa-spin"></i>
        <span class="icon-material-sync w3-spin "></span> Processing Votes...
    </div>
</div>
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
<!--                <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="16" alt="" loading="lazy"-->
<!--                     style="margin-top: -3px;" />-->
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">


                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="https://github.com/raymondTheDev/votesimulator" rel="nofollow" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="my-5">
    <div class="container">
        <div class="alert alert-info">
            <p>
            <b>What the heck is this!?</b>
            Saw a post on
            <a href="https://www.reddit.com/r/Philippines/comments/ultp52/so_nakita_ko_sa_twitter_yung_6832_so_i_did_my_own/" target="_blank">
                Reddit
            </a> then saw a post on
            <a href="https://twitter.com/joefranc/status/1523697606223818752/photo/1" target="_blank">
                Twitter
            </a>
            which talks about some interesting numbers.
            I just happened to remember some things happened on similar projects I've worked on so decided to play around a bit
            </p>

            <p>
                <b>How does this work!? </b>
                Just put any number on that white box thingy
                below and that would be considered the number of votes you wanna play around with. You can put millions, tens of millions, etc...
                Then click on the button below it and it should render some results below.
            </p>

            <p></p>
            (Apologies if I didn't link anything properly as I have no idea how to use Social Media :))

        </div>

        <div class="p-4 shadow-4 rounded-3" style="background-color: hsl(0, 0%, 94%);">
            <h2>Votes to Process</h2>
            <p>
                Please specify the number of votes
            </p>
            <input id="votes-input" type="number" class="form-control form-control-lg" value="1000000" placeholder="1000000" autofocus />
            <hr class="my-4" />

            <button type="button" class="btn btn-primary" onclick="loadResults();">
                Click here to process the votes!
            </button>
        </div>
        <!-- Jumbotron -->
        <!--Section: Content-->
        <div id="results-section">
        <section class="text-center mt-5">

            <?php //include('results.php'); ?>

        </section>
        </div>

    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="bg-light text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Disclaimer: For elitist programmers, I zerg-rushed coding this thing so take it easy on me as I have actual work to do. If you want to help out pull requests can be done
        <a href="https://github.com/raymondTheDev/votesimulator">
        HERE
        </a>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
    rel="stylesheet"
/>
</body>
<script>
    $(function(){
        loadResults();
    });

    function loadResults(){
        $('#cover-loader').show();
        $.ajax({
            type: 'GET',
            url: 'results.php',
            data: {votes: $('#votes-input').val()},
            dataType: 'html',
            success: function(resp) {
                $('#cover-loader').hide();
                $('#results-section').html(resp);
            },
            error: function(xhr, status, error) {
                $('#cover-loader').hide();
                alert('Something went wrong');
            }

        });
    }
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4VP4VTQC40"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-4VP4VTQC40');
</script>
</html>