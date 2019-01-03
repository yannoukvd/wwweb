<?php include("includes/head.php");?>

<?php include("includes/header.php");?>

<main>
		
    <section class="banner">
    </section>
            
    <section class="content cf">
        <?php
			switch ($currentPage) {
			    case 'events':
			        include('views/events.php');
			    	break;
			    case 'contact':
			        include('views/contact.php');
			    	break;
			    case 'home':
			    default:
			        include('views/home.php');
			}
		?>
    </section>
		
</main>

<?php include("includes/footer.php");?>