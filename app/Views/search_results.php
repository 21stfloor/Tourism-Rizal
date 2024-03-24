<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>News View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/logo-removebg-preview.ico">



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

        </div>

    </header>

    <!-- CONTENT -->
    <div class="container-fluid">

        <div class="row p-5">
            <?php if (count($results) > 0): ?>
                <h2>There are total
                    <?= count($results) ?> result(s) matching your search query:
                    <?= $query ?>
                </h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    <?php foreach ($results as $result): ?>
                        <?php $view_url = site_url('foods/view/' . $result['id']);
                        if ($result['type'] != 'Food') {
                            $view_url = site_url('tourist_centre/view/' . $result['id']);
                        }
                        ?>
                        <div class="col mb-4">
                            <a href="<?= $view_url ?>">
                                <div class="card h-100">
                                    <img src="<?= base_url('public/uploads/images/' . $result['image']) ?>" class="card-img-top"
                                        alt="Thumbnail">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $result['name'] ?>
                                        </h5>
                                        <p class="card-text"><small class="text-body-secondary">Date posted:
                                                <?= $result['last_updated'] ?>
                                            </small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No results found for your search query:
                    <?= $query ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer class="footer">
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
</body>

</html>