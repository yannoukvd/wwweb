<style type="text/css">
    header {
        background: hsl(<?php echo $_SESSION['colors'][0]['h'] . ',' . $_SESSION['colors'][0]['s'] . ',' . $_SESSION['colors'][0]['l']; ?>);
    }
    header .headWrap .logo {
        background-image: url(<?php print $profile; ?>) !important;
    }
    .banner {
        background-image: url(<?php print $cover; ?>) !important;
    }
    .container-box {
        border-top: 5px solid hsl(<?php echo $_SESSION['colors'][0]['h'] . ',' . $_SESSION['colors'][0]['s'] . ',' . $_SESSION['colors'][0]['l']; ?>);
    }
    .container-description {
        background: hsl(<?php echo $_SESSION['colors'][0]['h'] . ',' . $_SESSION['colors'][0]['s'] . ',' . $_SESSION['colors'][0]['l']; ?>);
    }
    .event-day {
        color: hsl(<?php echo $_SESSION['colors'][0]['h'] . ',' . $_SESSION['colors'][0]['s'] . ',' . $_SESSION['colors'][0]['l']; ?>);
    }
</style>