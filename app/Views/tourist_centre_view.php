<!DOCTYPE html>
<html lang="en">

<head>
    <?php $index = 1; ?>
    <meta charset="UTF-8">
    <title>Tourist View</title>
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

        .center-image {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include (APPPATH . 'Views/partials/navbar.php'); ?>
    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

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

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title text-center">
                        <?= $thumbnail['name'] ?>
                    </h1>
                    <p class="card-text"><small class="text-body-secondary">Date posted
                            <?= $thumbnail['created_at'] ?>
                        </small></p>
                    <div class="text-center">
                        <img src="<?= base_url('public/uploads/images/' . $thumbnail['image']) ?>"
                            class="w-50 img-fluid card-img-top" alt="Thumbnail" />
                    </div>
                    <div id="wrapper" style="height:600px;width:100%" class="mt-2">
                        <a-scene embedded style="height:100%;width:100%">
                            <a-assets>
                                <img id="panorama" src="<?= base_url('public/uploads/images360/' . $thumbnail['image360']) ?>" />
                            </a-assets>
                            <a-sky src="#panorama" rotation="0 -130 0"></a-sky>
                        </a-scene>
                    </div>
                </div>

                <div class="card-body">

                    <p class="card-text">
                        <?= $thumbnail['description'] ?>
                    </p>

                </div>
            </div>
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
    <script src="https://aframe.io/releases/0.5.0/aframe.min.js"></script>
</body>

</html>