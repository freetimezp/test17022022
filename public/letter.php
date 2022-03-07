<div class="site-section">
    <div class="container letter">
        <div class="row justify-content-center mb-5">

            <div class="text-center">
                <h3 style="color: black" class="letter-title">Send letter</h3>
            </div>

            <form class="c-form" action="/admin/letter.php" method="post" enctype="multipart/form-data">
                <div class="letter-block">
                    <label for="email">Enter your email:</label>
                    <input class="c-input" type="text" name="email" placeholder="write here email">
                    <label for="email">Enter your name:</label>
                    <input class="c-input" type="text" name="name" placeholder="write here name">
                    <label for="email">Enter your phone:</label>
                    <input class="c-input" type="text" name="phone" placeholder="write here phone">
                    <label for="message">Enter your message:</label>
                    <textarea class="c-textarea" name="message" rows="5" placeholder="write here message"></textarea>
                    <input class="c-btn" type="submit" name="send" value="send">
                </div>
            </form>

        </div>
    </div>
</div>