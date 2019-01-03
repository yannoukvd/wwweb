<div class="container config-container">
    <div class="col-md-6 col-md-offset-3">
        <h2>Create a website<br>with your social media.</h2>
        <div>
            <?php 

                require_once '../src/Facebook/autoload.php';
                
                $fb = new Facebook\Facebook([
                    'app_id' => '1106172139550357',
                    'app_secret' => 'aa965a5420deacc3396b58e20870149a',
                    'default_graph_version' => 'v3.2',
                ]);

                $helper = $fb->getRedirectLoginHelper();

                $permissions = ['email']; // Optional permissions
                $loginUrl = $helper->getLoginUrl('https://yannouk.com/wwweb/config/func/fb-callback.php', $permissions);

                echo '<a class="fb-login" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

            ?>
        </div>
    </div>
</div>