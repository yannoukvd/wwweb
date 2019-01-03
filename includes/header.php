<header>    

    <div class="headWrap cf">
        <!-- Logo -->
        <div class="logo">
            <a href="index.php"><span>yannouk.com</span></a>
        </div>

        <h1 class="main-title"><?= $name ?></h1>
            
        <!-- Main Navigation -->
        <nav class="mainNav cf">
            <ul>
                <li><a class="<?php if ($pageTitle == "Events") {?>active<?php }?>" href="?page=events">Events</a></li>
                <li><a class="<?php if ($pageTitle == "Home") {?>active<?php }?>" href="?page=home">Home</a></li>
            </ul>
        </nav>
            
        <!-- Mobile Nav Button -->
        <div class="m-mainNav-btn">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
            
        <!-- Mobile Navigation -->
        <nav class="m-mainNav">
                <ul>
                    <li><a class="<?php if ($pageTitle == "Home") {?>active<?php }?>" href="?page=home">Home</a></li>
                    <li><a class="<?php if ($pageTitle == "Events") {?>active<?php }?>" href="?page=events">Events</a></li>
                </ul>
        </nav>
    </div>
</header>