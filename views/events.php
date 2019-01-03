<?php
foreach ($objEvents as $obj) {

            // Event Name
            $eventName = $obj['name'];

            // Event Day/Month/Time
            $eventDate = date('d', strtotime($obj['start_time']));
            $eventMonth = date('M', strtotime($obj['start_time']));
            $eventDay = date('l', strtotime($obj['start_time']));
            $eventTime = date('H:i', strtotime($obj['start_time']));

            // Event Description
            $eventDescription = $obj['description'];

            // Event Cover
            $eventCover = $obj['cover']['source'];

        ?>

        <div class="container-box content-section container-event">
            <div class="event-date">
                <span class="event-day"><?= $eventDate ?></span>
                <span class="event-month"><?= $eventMonth ?></span>
            </div>
            <img class="event-cover" src="<?= $eventCover ?>">
            <div class="event-info">
                <h3><?= $eventName ?></h3>
                <span><?= $eventDay ?> <?= $eventTime ?></span>
            </div>
        </div>

<?php } ?>