<?php

session_start();

?>

<div class="container py-3 form-validation" id="form-validation">
    <div class="row">
        <div class="col-lg-12 category-content">
            <h1 class="section-title title-v">Form validation</h1>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php if(!empty($_SESSION['errors'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <p>
                                    <?=$_SESSION['errors'];?>
                                    <?php unset($_SESSION['errors']); ?>
                                </p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>
                                    <?=$_SESSION['success'];?>
                                    <?php unset($_SESSION['success']); ?>
                                </p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <form action="" class="row g-3" method="post">
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <label class="required" for="email-v">Email</label>
                        <input type="text" name="email" class="form-control" id="email-v" placeholder="email@ukraine.ua">
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <label class="required" for="password-v">Password</label>
                        <input type="password" name="password" class="form-control" id="password-v" placeholder="password">
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <label class="required" for="name-v">Name</label>
                        <input type="text" name="name" class="form-control" id="name-v" placeholder="name">
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <label class="required" for="code-v">Index</label>
                        <input type="text" name="code" class="form-control" id="code-v" placeholder="code">
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <button type="submit" name="validate" class="btn btn-danger">send</button>
                </div>
            </form>
        </div>
    </div>
</div>

