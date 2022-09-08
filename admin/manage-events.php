<div class="manage-event">
  <h1 class="section-name">MANAGE EVENTS</h1>
</div>
<?php
$events = fetchAllEvent($pdo);
?>
<div class="manage-table events">
  <div class="table-head">
    <h3 class="table-name">List of Events</h3>
    <a href="<?= ROOT_URL ?>admin/index.php?page=add-events" class="add-btn add-event">
      <i class="fa-solid fa-plus"></i>Add Events
    </a>
  </div>

  <div class="table-content">
    <div class="table-data">
      <div class="column no">#</div>
      <div class="column title">Event Title</div>
      <div class="column date">Event Date</div>
      <div class="column photo">Event Photo</div>
      <div class="column action head">Action</div>
    </div>
    <?php
    $num = 0;
    foreach ($events as $event) : $num++; ?>
      <div class="table-data">
        <div class="column no"><?= $num ?></div>
        <div class="column title"><?= $event['title'] ?></div>
        <div class="column date">
          <?php
          $eventDate = strtotime($event['date']);
          echo date('F d, Y', $eventDate);
          ?>
        </div>
        <div class="column photo">
          <div class="event-img-container">
            <img src="../assets/images/events/<?= $event['img'] ?>" alt="EVENT">
          </div>
        </div>
        <div class="column action head">
          <a class="alumni-action button-primary" href="#">View</a>
          <a class="alumni-action button-danger" href="#">Delete</a>
        </div>
      </div>
    <?php endforeach; ?>

    <?php
    function fetchAllEvent($pdo) {
      $queryEvent1 = "SELECT * FROM events";
      $stmtEvent1 = $pdo->prepare($queryEvent1);

      if ($stmtEvent1->execute()) {
        return $stmtEvent1->fetchAll(PDO::FETCH_ASSOC);
      } else {
        echo 'failed';
      }
    }
    ?>