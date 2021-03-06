<?php
use frontend\assets\MainAsset;
use yii\helpers\Html;
use common\widgets\Alert;

MainAsset::register($this) ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->title ?></title>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="agents.html">Agents</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->


<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="index.html"><img src="images/logo.png" alt="Realestate"></a>

        <ul class="pull-right">
            <li><a href="buysalerent.html">Buy</a></li>
            <li><a href="buysalerent.html">Sale</a></li>
            <li><a href="buysalerent.html">Rent</a></li>
        </ul>
    </div>
    <!-- #Header Starts -->
</div>
<div class="container">

<!--    виджет алертов-->
    <?php $session = Yii::$app->session->getFlash('success');
        echo Alert::widget([
            'options' => [
                'class' => 'alert-info',
                'body' => $session
            ],
        ])
    ?>

<!--    наш вывод-->
<!--    --><?php //if(Yii::$app->session->hasFlash('success')): ?>
<!--        <div class="alert alert-success alert-dismissible" role="alert">-->
<!--            <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--            --><?//= Yii::$app->session->getFlash('success') ?>
<!--        </div>-->
<!--    --><?php //endif; ?>
<!--    --><?php //if(Yii::$app->session->hasFlash('error')): ?>
<!--        <div class="alert alert-danger alert-dismissible" role="alert">-->
<!--            <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--            --><?//= Yii::$app->session->getFlash('error') ?>
<!--        </div>-->
<!--    --><?php //endif; ?>
</div>

<div class="container">
    <?= $content ?>
</div>

<div class="footer">

    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Information</h4>
                <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.html">About</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.html">Agents</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.html">Blog</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.html">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Newsletter</h4>
                <p>Get notified about the latest properties in our marketplace.</p>

                <?= Html::beginForm('', 'post', ['class' => 'form-inline', 'role' => 'form']) ?>
                <?= Html::textInput('email', '', ['class' => 'form-control', 'placeholder' => 'enter your email address']) ?>
                <?= Html::submitButton('Notify Me!', ['class' => 'btn btn-success']) ?>
                <?= Html::endForm() ?>

            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Follow us</h4>
                <a href="#"><img src="images/facebook.png" alt="facebook"></a>
                <a href="#"><img src="images/twitter.png" alt="twitter"></a>
                <a href="#"><img src="images/linkedin.png" alt="linkedin"></a>
                <a href="#"><img src="images/instagram.png" alt="instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Contact us</h4>
                <p><b>Bootstrap Realestate Inc.</b><br>
                    <span class="glyphicon glyphicon-map-marker"></span> 8290 Walk Street, Australia <br>
                    <span class="glyphicon glyphicon-envelope"></span> hello@bootstrapreal.com<br>
                    <span class="glyphicon glyphicon-earphone"></span> (123) 456-7890</p>
            </div>
        </div>
        <p class="copyright">Copyright 2013. All rights reserved. </p>


    </div>
</div>


<!-- Modal -->
<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Login</h4>


                    <form class="" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                   placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>


                </div>
                <div class="col-sm-6">
                    <h4>New User Sign Up</h4>
                    <p>Join today and get updated with all the properties deal happening around.</p>
                    <button type="submit" class="btn btn-info" onclick="window.location.href='register.html'">Join Now
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



