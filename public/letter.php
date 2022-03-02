
<div class="site-section">
    <div class="container letter">
        <div class="row justify-content-center mb-5">

            <div class="text-center">
                <h3 style="color: black" class="letter-title">Send letter</h3>
            </div>

            <form class="c-form" action="/admin/letter.php" method="post" enctype="multipart/form-data">
                <div class="letter-block">
                    <input class="c-input" type="text" name="email" value="Enter your email">
                    <input class="c-input" type="text" name="name" value="Enter your name">
                    <input class="c-input" type="text" name="phone" value="Enter your phone">
                    <label for="message">Enter your message:</label>
                    <textarea class="c-textarea" name="message" rows="5"></textarea>
                    <input class="c-btn" type="submit" name="send" value="send">
                </div>
            </form>

        </div>
    </div>
</div>