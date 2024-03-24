<!DOCTYPE html>
<html lang="en">

<head>
    <?php $index = 1; ?>
    <meta charset="UTF-8">
    <title>Department of Tourism of Tanay, Rizal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/logo-removebg-preview.ico">



    <!-- STYLES -->

    <style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }

        *:focus {
            background-color: rgba(221, 72, 20, .2);
            outline: none;
        }

        html,
        body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        header {
            background-color: rgba(247, 248, 249, 1);
            padding: .4rem 0 0;
        }

        .menu {
            padding: .4rem 2rem;
        }

        header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }

        header li {
            display: inline-block;
        }

        header li a {
            border-radius: 5px;
            color: rgba(0, 0, 0, .5);
            display: block;
            height: 44px;
            text-decoration: none;
        }

        header li.menu-item a {
            border-radius: 5px;
            margin: 5px 0;
            height: 38px;
            line-height: 36px;
            padding: .4rem .65rem;
            text-align: center;
        }

        header li.menu-item a:hover,
        header li.menu-item a:focus {
            background-color: rgba(92, 151, 191, .2);
            color: rgba(92, 151, 191, 1);
            background-color: rgba(92, 151, 191, .2);
            color: rgba(92, 151, 191, 1);
        }

        header .logo {
            float: left;
            height: 44px;
            padding: .4rem .5rem;
        }

        header .menu-toggle {
            display: none;
            float: right;
            font-size: 2rem;
            font-weight: bold;
        }

        header .menu-toggle button {
            background-color: rgba(92, 151, 191, .6);
            background-color: rgba(92, 151, 191, .6);
            border: none;
            border-radius: 3px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            font: inherit;
            font-size: 1.3rem;
            height: 36px;
            padding: 0;
            margin: 11px 0;
            overflow: visible;
            width: 40px;
        }

        header .menu-toggle button:hover,
        header .menu-toggle button:focus {
            background-color: rgba(92, 151, 191, .8);
            background-color: rgba(92, 151, 191, .8);
            color: rgba(255, 255, 255, .8);
        }

        header .heroe {
            margin: 0 auto;
            max-width: 1100px;
            padding: 1rem 1.75rem 1.75rem 1.75rem;
        }

        header .heroe h1 {
            font-size: 2.5rem;
            font-weight: 500;
        }

        header .heroe h2 {
            font-size: 1.5rem;
            font-weight: 300;
        }

        section {
            margin: 0 auto;
            max-width: 1100px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
        }

        section h1 {
            margin-bottom: 2.5rem;
        }

        section h2 {
            font-size: 120%;
            line-height: 2.5rem;
            padding-top: 1.5rem;
        }

        section pre {
            background-color: rgba(247, 248, 249, 1);
            border: 1px solid rgba(242, 242, 242, 1);
            display: block;
            font-size: .9rem;
            margin: 2rem 0;
            padding: 1rem 1.5rem;
            white-space: pre-wrap;
            word-break: break-all;
        }

        section code {
            display: block;
        }

        section a {
            color: rgba(221, 72, 20, 1);
        }

        section svg {
            margin-bottom: -5px;
            margin-right: 5px;
            width: 25px;
        }

        .further {
            background-color: rgba(247, 248, 249, 1);
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            border-top: 1px solid rgba(242, 242, 242, 1);
        }

        .further h2:first-of-type {
            padding-top: 0;
        }

        footer {
            background-color: rgba(115, 147, 179);
            text-align: center;
        }

        footer .environment {
            color: rgba(255, 255, 255, 1);
            padding: 2rem 1.75rem;
        }

        footer .copyrights {
            background-color: rgba(66, 66, 66);
            color: rgba(200, 200, 200, 1);
            padding: .25rem 1.75rem;
        }

        @media (max-width: 629px) {
            header ul {
                padding: 0;
            }

            header .menu-toggle {
                padding: 0 1rem;
            }

            header .menu-item {
                background-color: rgba(244, 245, 246, 1);
                border-top: 1px solid rgba(242, 242, 242, 1);
                margin: 0 15px;
                width: calc(100% - 30px);
            }

            header .menu-toggle {
                display: block;
            }

            header .hidden {
                display: none;
            }

            header li.menu-item a {
                background-color: rgba(92, 151, 191, .7);
                background-color: rgba(92, 151, 191, .7);
            }

            header li.menu-item a:hover,
            header li.menu-item a:focus {
                background-color: rgba(92, 151, 191, 1);
                background-color: rgba(92, 151, 191, 1);
                color: rgba(255, 255, 255, .8);
            }
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .nav-item:hover,
        .nav-item:focus {
            background-color: rgba(92, 151, 191, .8);
            background-color: rgba(92, 151, 191, .8);
            color: rgba(255, 255, 255, .8);
        }

        .card {
            cursor: pointer;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 50px;
            /* Adjust as needed */
            background-color: #f8f9fa;
            /* Footer background color */
            text-align: center;
            padding-top: 15px;
        }

        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php include(APPPATH . 'Views/partials/navbar.php'); ?>
    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

        <!-- <div class="menu">
        <ul>
            <li class="logo">
                <a href="/home" target="/home"><img src='images/logo-removebg-preview.png' class="img-fluid" ></a>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="/home">Home</a></li>
            <li class="menu-item hidden"><a href="/attractions" target="">Attractions</a>
            </li>
            <li class="menu-item hidden"><a href="/food" target="">Food</a></li>
            <li class="menu-item hidden"><a href="/aboutus" target="">About Us</a>
            <li class="menu-item hidden"><a href="views/signin" target="_blank">Log In</a>
            </li>
            <div class="w-50 float-end"> <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form> 
            </div>
        </ul>
        
    </div> -->

        <div class="heroe">

            <script>
                function display_ct5() {
                    var x = new Date()
                    var ampm = x.getHours() >= 12 ? ' PM' : ' AM';

                    var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
                    x1 = x1 + " - " + x.getHours() + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
                    document.getElementById('ct5').innerHTML = x1;
                    display_c5();
                }
                function display_c5() {
                    var refresh = 1000; // Refresh rate in milli seconds
                    mytime = setTimeout('display_ct5()', refresh)
                }
                display_c5()
            </script>
            <span id='ct5' style="background-color:darkgrey"></span>

            <h1>Welcome to the Department of Tourism of Tanay, Rizal</h1>

            <h2>Attractions</h2>



        </div>

    </header>

    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="row">

            <h1>About this page</h1>

            <p>This page would be the attractions page.</p>

            <p>It will include some information for the attractions on Tanay.</p>


        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            <?php foreach ($thumbnails as $thumbnail): ?>
                <div class="col mb-4">
                    <a href="<?= site_url('tourist_centre/view/' . $thumbnail['id']) ?>">
                        <div class="card">
                            <img src="<?= base_url('public/uploads/images/' . $thumbnail['image']) ?>" class="card-img-top"
                                alt="Thumbnail">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $thumbnail['name'] ?>
                                </h5>
                                <p class="card-text"><small class="text-body-secondary">Date posted:
                                        <?= $thumbnail['last_updated'] ?>
                                    </small></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">

            <h1>About Us</h1>

        </div>
    </div>
    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer class="footer">
        <!--<div class="environment">

        <p>Page rendered in {elapsed_time} seconds</p>

        

    </div>-->

        <div class="copyrights">

            <p>&copy;
                <?= date('Y') ?> Capstone 1
            </p>

        </div>

    </footer>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js" integrity="sha512-dSI4QnNeaXiNEjX2N8bkb16B7aMu/8SI5/rE6NIa3Hr/HnWUO+EAZpizN2JQJrXuvU7z0HTgpBVk/sfGd0oW+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.min.js" integrity="sha512-Jx+orEb1KJtJ6Ajfshhr7is0zqgUC7H9ylk76KMtB9Ea2WAf/Muyzpe9zvBAYQQQKdAbj+rNYEorsRQLsmRafA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js" integrity="sha512-BfC/MaayF9sOZyn1bs1R1P8dEugU7v0j5Qu2FeWVfF/rhKUKZBD9kgNqRNinefIp9zAE7g2KhlwwhMpl5V1jMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/pager/lg-pager.min.js" integrity="sha512-JuEDozFHrFXMEQ9WXhpLpfmdIZs53JlKO1v20E2GUVf/VzcgW/KIhHZYWFfjLewmNEPptVSfjNM1jzL0jh7tkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.8.1/js/jquery.justifiedGallery.min.js" integrity="sha512-8dQZtymfQeDiZ4bBCFhrKZhDcZir15MqnEDBRiR6ReIVHLcdnCyJrhPIS0QifLGuMkFZsw9QMNeD9JtiLwieTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script> -->
    <!-- <script type="text/javascript">
    $("#animated-thumbnails-gallery")
    .justifiedGallery({
        captions: false,
        lastRow: "hide",
        rowHeight: 180,
        margins: 5
    })
    .on("jg.complete", function () {
        window.lightGallery(
        document.getElementById("animated-thumbnails-gallery"),
        {
            autoplayFirstVideo: false,
            pager: false,
            galleryId: "nature",
            plugins: [lgZoom, lgThumbnail],
            mobileSettings: {
            controls: false,
            showCloseIcon: false,
            download: false,
            rotate: false
            }
        }
        );
    });

    // lightGallery(document.getElementById('lightgallery'), {
    //     plugins: [lgZoom, lgThumbnail, lgPager],
    //     speed: 500
    // });
</script> -->
    <!-- -->

</body>

</html>