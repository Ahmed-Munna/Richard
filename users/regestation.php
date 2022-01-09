<?php
session_start();
require('include/header.php'); 
?>
<section>
        <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">
        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <?php if(isset($_SESSION["err_reg"])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION["err_reg"]?>
                </div>
            <?php } unset($_SESSION["err_reg"])?>
        <?php if(isset($_SESSION["succ"])){ ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION["succ"]?>
                </div>
            <?php } unset($_SESSION["succ"])?>
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Rechard <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>
        <form action="post.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Enter your username">
            <?php if(isset($_GET["nam_err"])){ ?>
                    <strong class="text-danger"><?= $_GET["nam_err"]?></strong>
               <?php }?>
        </div><!-- form-group -->
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter your Email">
            <?php if(isset($_GET["email_err"])){ ?>
                    <strong class="text-danger"><?= $_GET["email_err"]?></strong>
               <?php }?>
               <?php if(isset($_GET["valid_email_err"])){ ?>
                    <strong class="text-danger"><?= $_GET["valid_email_err"]?></strong>
               <?php }?>
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Enter your password">
            <?php if(isset($_GET["password_err"])){ ?>
                    <strong class="text-danger"><?= $_GET["password_err"]?></strong>
               <?php }?>
               <?php if(isset($_GET["strong_pass_err"])){ ?>
                    <strong class="text-danger"><?= $_GET["strong_pass_err"]?></strong>
               <?php }?>
        </div><!-- form-group -->
        <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="radio" value="male" name="gender" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">Male</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="female" name="gender" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">female</label>
        </div>
        <?php if(isset($_GET["nam_err"])){ ?>
                    <strong class="text-danger"><?= $_GET["nam_err"]?></strong>
               <?php }?>
        </div><!-- form-group -->
        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <button type="submit" class="btn btn-block" style="color: #fff;background-color: #5B93D3;border-color: #5B93D3;">Sign Up</button>
        </form>
        <div class="mg-t-40 tx-center">Already have an account? <a href="page-signin.html" class="tx-info">Sign In</a></div>
        </div><!-- login-wrapper -->
        </div><!-- d-flex -->
</section>
<?php require('include/header.php'); ?>