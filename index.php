<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>cems</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
    <?php require 'utils/header.php'; ?>
    <div class="content">
        <div class="container">
            <div class="col-md-12">
                <h1 style="color:#000080; font-size:42px; font-weight:bold;">
                    <strong>Register for Your Favorite Events</strong>
                </h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <!-- Technical Events Section -->
            <section>
                <div class="container">
                    <div class="col-md-6">
                        <img src="images/technical.jpg" class="img-responsive">
                    </div>
                    <div class="subcontent col-md-6">
                        <h1 style="color:#003300; font-size:38px;">
                            <u><strong>Technical Events</strong></u>
                        </h1>
                        <p>
                            EMBRACE YOUR TECHNICAL SKILLS BY PARTICIPATING IN OUR DIFFERENT TECHNICAL EVENTS!
                        </p>
                        <br><br>
                        <?php
                        $id = 1;
                        echo '<a class="btn btn-default" href="viewEvent.php?id=' . $id . '">
                                <span class="glyphicon glyphicon-circle-arrow-right"></span>View Technical Events
                              </a>';
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <hr>

        <!-- Gaming Events Section -->
        <div class="row">
            <section>
                <div class="container">
                    <div class="col-md-6">
                        <img src="images/gaming.jpg" class="img-responsive">
                    </div>
                    <div class="subcontent col-md-6">
                        <h1 style="color:#003300; font-size:38px;">
                            <u><strong>Gaming Events</strong></u>
                        </h1>
                        <p>
                            EMBRACE YOUR GAMING SKILLS BY PARTICIPATING IN OUR DIFFERENT GAMING EVENTS!
                        </p>
                        <br><br>
                        <?php
                        $id = 2;
                        echo '<a class="btn btn-default" href="viewEvent.php?id=' . $id . '">
                                <span class="glyphicon glyphicon-circle-arrow-right"></span>View Gaming Events
                              </a>';
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <hr>

        <!-- On-Stage Events Section -->
        <div class="row">
            <section>
                <div class="container">
                    <div class="col-md-6">
                        <img src="images/onstage.jpg" class="img-responsive">
                    </div>
                    <div class="subcontent col-md-6">
                        <h1 style="color:#003300; font-size:38px;">
                            <u><strong>On-Stage Events</strong></u>
                        </h1>
                        <p>
                            EMBRACE YOUR CONFIDENCE BY PARTICIPATING IN OUR DIFFERENT ON-STAGE EVENTS!
                        </p>
                        <br><br>
                        <?php
                        $id = 3;
                        echo '<a class="btn btn-default" href="viewEvent.php?id=' . $id . '">
                                <span class="glyphicon glyphicon-circle-arrow-right"></span>View On-Stage Events
                              </a>';
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <hr>

        <!-- Off-Stage Events Section -->
        <div class="row">
            <section>
                <div class="container">
                    <div class="col-md-6">
                        <img src="images/offstage.jpg" class="img-responsive">
                    </div>
                    <div class="subcontent col-md-6">
                        <h1 style="color:#003300; font-size:38px;">
                            <u><strong>Off-Stage Events</strong></u>
                        </h1>
                        <p>
                            EMBRACE YOUR TALENT BY PARTICIPATING IN OUR DIFFERENT OFF-STAGE EVENTS!
                        </p>
                        <br><br><br>
                        <?php
                        $id = 4;
                        echo '<a class="btn btn-default" href="viewEvent.php?id=' . $id . '">
                                <span class="glyphicon glyphicon-circle-arrow-right"></span>View Off-Stage Events
                              </a>';
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php require 'utils/footer.php'; ?>
</body>
</html>
