<div class="container config-container">
    <div class="col-md-6 col-md-offset-3">
        <h2>Create a website<br>with your social media.</h2>
        <p>Which social media do you<br>want to use for your website?</p>
        <p><?= $_SESSION['token'] ?>
        <div>
            <form class="form-horizontal" method="POST" action="index.php">

                <div class="form-group config-group">
                    
                    <div class="col-md-12">
                    	<input class="control-form config-checkbox" id="facebook-checkbox" type="checkbox" name="facebook-checkbox" value="Facebook">
                    	<label for="facebook-checkbox" class="config-label config-checkbox-label">Facebook</label>
                	</div>

                	<div class="config-checked">
 
	                    <label for="facebook" class="col-md-4 control-label config-label">facebook.com/</label>

	                    <div class="col-md-8">
	                        <input id="facebook" type="text" class="form-control config-input" name="facebook" required autofocus>
	                    </div>

	                </div>

                </div>

               	<div class="form-group config-group">
                    
                    <div class="col-md-12">
                    	<input class="control-form config-checkbox" id="instagram-checkbox" type="checkbox" name="instagram-checkbox" value="Instagram">
                    	<label for="instagram-checkbox" class="config-label config-checkbox-label">Instagram</label>
                	</div>

                	<div class="config-checked">

	                    <label for="instagram" class="col-md-4 control-label config-label">instagram.com/</label>

	                    <div class="col-md-8">
	                        <input id="instagram" type="text" class="form-control config-input" name="instagram" autofocus>
	                    </div>

	                </div>

                </div>

                <div class="form-group config-group">
                    
                    <div class="col-md-12">
                    	<input class="control-form config-checkbox" id="twitter-checkbox" type="checkbox" name="twitter-checkbox" value="Twitter">
                    	<label for="twitter-checkbox" class="config-label config-checkbox-label">Twitter</label>
                	</div>

                	<div class="config-checked">

	                    <label for="twitter" class="col-md-4 control-label config-label">twitter.com/</label>

	                    <div class="col-md-8">
	                        <input id="twitter" type="text" class="form-control config-input" name="twitter" autofocus>
	                    </div>

	                </div>

                </div>

                <div class="form-group config-group">
                    
                    <div class="col-md-12">
                    	<input class="control-form config-checkbox" id="youtube-checkbox" type="checkbox" name="youtube-checkbox" value="Youtube">
                    	<label for="youtube-checkbox" class="config-label config-checkbox-label">Youtube</label>
                	</div>

                	<div class="config-checked">

	                    <label for="youtube" class="col-md-4 control-label config-label">youtube.com/</label>

	                    <div class="col-md-8">
	                        <input id="youtube" type="text" class="form-control config-input" name="youtube" autofocus>
	                    </div>

	                </div>

                </div>

                <div class="form-group config-group">
                    <div class="col-md-6 col-md-offset-4">
                        <input type="submit" name="submit" class="config-input config-btn" value="Create Website">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>