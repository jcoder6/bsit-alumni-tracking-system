<div class="events">
  <h3 class="content-title">Upcoming Events</h3>
</div>
<?php
$events = fetchAllEvent($pdo);
?>
<!-- EVENT 1 -->
<?php foreach ($events as $event) : ?>
  <div class="event-container">
    <div class="event-photo">
      <img src="./assets/images/events/<?= $event['img'] ?>" alt="Events 1">
    </div>

    <div class="event-detail-container">
      <div class="white-overlay"></div>
      <div class="event-detail-bg-photo">
        <img src="./assets/images/detatailBg.PNG" alt="Detail BG photo">
      </div>


      <div class="detail-container">
        <h2 class="event-title"><?= $event['title'] ?></h2>
        <p class="event-date">
          <span class="calen">
            <i class="fa-solid fa-calendar"></i>
          </span>
          <?php
          $eventDate = strtotime($event['date']);
          echo date('F d, Y', $eventDate);
          ?>
        </p>
        <div class="event-desc">
          <?= $event['description']; ?>
        </div>
        <a class="button1 read-more" href="<?= ROOT_URL ?>index.php?page=view-event&event=<?= $event['id'] ?>">Read more</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php
function fetchAllEvent($pdo) {
  $currDate = Date('Y-m-d');
  $queryEvent1 = "SELECT * FROM events WHERE date > '$currDate'";
  $stmtEvent1 = $pdo->prepare($queryEvent1);

  if ($stmtEvent1->execute()) {
    return $stmtEvent1->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo 'failed';
  }
}
?>