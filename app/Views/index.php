<!DOCTYPE html>
<html lang="en">

<head>
    <?php $index = 0; ?>
    <meta charset="UTF-8">
    <title>Department of Tourism of Tanay, Rizal</title>
    <link rel="shortcut icon" type="image/png" href="/logo-removebg-preview.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .nav-item:hover,
        .nav-item:focus {
            background-color: rgba(92, 151, 191, .8);
            background-color: rgba(92, 151, 191, .8);
            color: rgba(255, 255, 255, .8);
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
    <header class="p-3">

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

            <h1>Welcome to the Department of Tourism Tanay, Rizal</h1>
        </div>

    </header>

    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="row p-5">
            <section>
                <!--pchen66.github.io
    
<div class="pano-image"></div>-->


                <!-- https://momento360.com -->
                <iframe height="450px" width="100%" allowfullscreen="true"
                    src="https://momento360.com/e/u/b672e8cab1cd4f6b87584613d0f5998d?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=100&size=medium&autoplay-annotations=true&display-plan=true">
                </iframe>
            </section>
        </div>
        <div class="row p-5 row-cols-1">
            <h1>News</h1>
            <?php foreach ($thumbnails as $thumbnail): ?>
                <div class="col mb-4">


                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= base_url('public/uploads/images/' . $thumbnail['image']) ?>"
                                    class="img-fluid rounded-start" alt="news image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $thumbnail['name'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?= $thumbnail['short_description'] ?>
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Date posted:
                                            <?= $thumbnail['last_updated'] ?>
                                        </small></p>
                                    <a href="<?= site_url('news/view/' . $thumbnail['id']) ?>" class="btn btn-primary">Read
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
    </div>
    <footer>
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
    <script src="js/main.js"></script>
    <script src="js/three.min.js"></script>
    <script src="js/panolens.min.js"></script>
    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->

</body>

</html>