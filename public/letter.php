<?php

session_start();

?>

<div class="site-section">
    <div class="container letter" id="form-send-letter">
        <div class="row justify-content-center mb-5">

            <div class="text-center">
                <h3 style="color: black" class="letter-title">Send letter</h3>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php if(!empty($_SESSION['error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <p>
                                    <?=$_SESSION['error'];?>
                                    <?php unset($_SESSION['error']); ?>
                                </p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($_SESSION['sendok'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>
                                    <?=$_SESSION['sendok'];?>
                                    <?php unset($_SESSION['sendok']); ?>
                                </p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <form class="c-form" action="/admin/letter.php" method="post" enctype="multipart/form-data">
                <div class="letter-block">
                    <label for="email">Enter your email:</label>
                    <input class="c-input" type="text" name="email" placeholder="<?php if($_POST['email']): ?><?=$_POST['email'];?><?php else: ?>Your email<?php endif; ?>">
                    <label for="email">Enter your name:</label>
                    <input class="c-input" type="text" name="name" placeholder="<?php if($_POST['name']): ?><?=$_POST['name'];?><?php else: ?>Your name<?php endif; ?>">
                    <label for="email">Enter your phone:</label>
                    <input class="c-input" type="text" name="phone" placeholder="<?php if($_POST['phone']): ?><?=$_POST['phone'];?><?php else: ?>Your phone<?php endif; ?>">
                    <label for="message">Enter your message:</label>
                    <textarea class="c-textarea" name="message" rows="5" placeholder="<?php if($_POST['message']): ?><?=$_POST['message'];?><?php else: ?>Your message<?php endif; ?>"></textarea>
                    <?php if(isset($_SESSION['login'])): ?>
                        <input class="c-btn" type="submit" name="send" value="send">
                    <?php else: ?>
                        <input class="c-btn" type="submit" name="send" value="send" disabled>
                        <p>* You must login to send letter</p>
                    <?php endif; ?>
                </div>
            </form>

        </div>
    </div>
</div>
