<div class="events">
  <h3 class="content-title">View Event</h3>
</div>
<?php
if (isset($_GET['event'])) {
  $eventID = $_GET['event'];
  $event = fetchEvent($eventID, $pdo);
}
?>
<div class="view-event-container">
  <div class="img-title-container">
    <div class="event-img-container">
      <img src="./assets/images/events/<?= $event->img ?>" alt="EVENTS">
    </div>
    <div class="view-event-title">
      <h2><?= $event->title ?></h2>
      <p class="view-event-date">
        <?php
        $eventDate = strtotime($event->date);
        echo date('F d, Y', $eventDate);
        ?>
      </p>
    </div>
  </div>

  <div class="view-event-desc">
    <h3 class="event-desc-title">Event Description</h3>
    <div class="event-desc-content"><?= $event->description ?></div>
  </div>
</div>

<?php
function fetchEvent($id, $pdo) {
  $query = "SELECT * FROM events WHERE id = $id";
  $stmt = $pdo->prepare($query);

  if ($stmt->execute()) {
    return $stmt->fetch();
  } else {
    return 'failed';
  }
}
?>