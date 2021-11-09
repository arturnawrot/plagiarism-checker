<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <title>Home - Landing Page</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-md mt-4 mx-5">
        <div class="container-fluid">
            <span class="navbar-brand">Plagiarism Checker</span>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">How To Contribute</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="d-lg-flex min-vh-lg-85">
        <div style="max-width:1100px;" class="container d-lg-flex align-items-lg-center space-top-2 space-lg-0">
            <div class="hero w-md-100">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-5 mt-11">
                            <h1 class="header">First Open-Source Plagiarism Checker</h1>
                            <p class="mt-4 header-description">The first open-source and solution for K-12 institutions</p>
                            <button onclick="location.href = '/tool';" class="mt-3 start-now-button">Start now!</button>
                        </div>
                    </div>
                </div>
            </div>
            <figure class="disappear-sm svg d-none d-lg-block position-absolute top-0 right-0 pr-0 ie-main-hero">
                <img src="assets/wall-1.svg" width="720">
            </figure>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row mt-5">
            <div style="min-height: 500px;" class="disappear-sm col">
                <figure class="svg d-none d-lg-block position-absolute left-0 pr-0 ie-main-hero">
                        <img src="assets/wall-2.svg" width="700">
                </figure>
            </div>
            <div class="col mt-5">
                <div class="mt-5">
                    <div class="container" style="max-width:800px;">
                        <span class="small-header">Worldwide Impact</span>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <span class="number">
                                    $325,500
                                </span>
                                <p class="description">
                                    Money schools saved using our free solution
                                </p>
                            </div>
                            <div class="col-md-3">
                                <span class="number">
                                    10,260
                                </span>
                                <p class="description">
                                    Plagiarized essays detected
                                </p>
                            </div>
                            <div class="col-md-3">
                                <span class="number">
                                    2,456
                                </span>
                                <p class="description">
                                    Number of institutions using our free solution
                                </p>
                            </div>
                            <div class="col-md-3">
                                <span class="number">
                                    24,573
                                </span>
                                <p class="description">
                                    Total checks
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
            <div class="row mt-5">
                <div class="col mt-5">
                    <span class="h2-header">
                        Stop Exploitation!
                    </span>
                    <p class="description-2 mt-4">
                        A few websites such Turnitin.com have a monopoly in the plagiarism checking industry.  They charge poor taxpayers how much they want. The main goal of this project is to bring an end to these monopolies and provide a free service for everyone in the world.
                    </p>
                    <button onclick="location.href = '/tool';" class="mt-2 start-now-button">Try it out!</button>
                </div>
                <div style="min-height: 500px;" class="disappear-sm col">
                    <figure class="svg d-none d-lg-block position-absolute right-0 pr-0 ie-main-hero">
                            <img src="assets/wall-3.svg" width="700">
                    </figure>
                </div>
            </div>
        </div>
  </body>
</html>