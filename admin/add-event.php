<div class="manage-event">
  <h1 class="section-name">ADD EVENTS</h1>
</div>
<?php
if (isset($_POST['add_event'])) {
  $eventTitle = mysqli_real_escape_string($conn, $_POST['event_name']);
  $eventDate = mysqli_real_escape_string($conn, $_POST['event_date']);
  $eventDesc = $_POST['event_desc'];
  $eventPhoto = imgFunction($conn);

  // echo $eventTitle .
  //   $eventDate .
  //   $eventDesc .
  //   $eventPhoto;
  $eventData = [
    'title' => $eventTitle,
    'date' => $eventDate,
    'desc' => $eventDesc,
    'img' => $eventPhoto
  ];

  $queryEvent = "INSERT INTO events(title, date, description, img) VALUES(:title, :date, :desc, :img)";
  $stmtEvent = $pdo->prepare($queryEvent);

  if ($stmtEvent->execute($eventData)) {
    messageNotif('success', 'Added new event');
    header('location: ' . ROOT_URL . 'admin/index.php?page=manage-events');
  } else {
    messageNotif('error', 'Something went wrong');
    header('location: ' . ROOT_URL . 'admin/index.php?page=manage-events');
  }
}
?>
<div class="manage-table">
  <div class="table-head">
    <h3 class="table-name">Add New Events</h3>
  </div>

  <form action="" method="post" class="add-event-form" enctype="multipart/form-data">
    <div class="form-group event-name">
      <label for="event_name" class="label-name">Event Name</label>
      <input type="text" name="event_name" class="input" placeholder="Event Title">
    </div>

    <div class="form-group event-date">
      <label for="event_name" class="label-name">Event Date</label>
      <input type="date" name="event_date" class="input">
    </div>

    <div class="form-group event-desc">
      <label for="event_desc" class="label-name">Description</label>
      <textarea name="event_desc" id="eventDesc"></textarea>
    </div>

    <div class="form-group event-photo">
      <label for="eventPhoto" class="label-name photo-input">
        <i class="fa-solid fa-upload"></i>Event Photo
      </label>
      <input type="file" name="event_photo" id="eventPhoto" onChange="((e)=>{
          file = e.target.files.item(0);
          var fr = new FileReader;
          fr.onloadend =(imgsrc)=>{
            imgsrc = imgsrc.target.result; // file reader
          var img = document.createElement('img');
              img.src =imgsrc;
          this.nextSibling.nextSibling.innerHTML='';
          this.nextSibling.nextSibling.appendChild(img);
          };
          fr.readAsDataURL(file);
          })(event)">
      <div id="inputPhoto">No Image Choose</div>
      <input type="submit" name="add_event" value="Add Event" class="button1 add-event-btn">
    </div>
  </form>
</div>

<?php
function imgFunction($conn) {
  if (isset($_FILES['event_photo']['name'])) {
    #get the image name
    echo 'helo';
    $imgName = mysqli_real_escape_string($conn, $_FILES['event_photo']['name']);

    // check wether there hava an image
    if ($imgName != "") {
      #rename the image
      # 1. get the extension name of the image
      $ext = explode('.', $imgName);
      $ext = '.' . end($ext);

      # 2. generate the image name with random number
      $imgNewName = 'School_Event_' . rand(000, 999) . $ext;

      #upload the image in to our file folder
      # 1. get the source path
      $sourcePath = $_FILES['event_photo']['tmp_name'];
      echo $sourcePath;
      # 2. get the desitnation path
      $destinationPath = '../assets/images/events/' . $imgNewName;
      # 3. upload the image
      if (!move_uploaded_file($sourcePath, $destinationPath)) {
        echo 'got here';
        messageNotif('error', 'Something went wrong');
        header('location:' . ROOT_URL . 'admin/index.php?page=add-events');
        die();
      }
      echo 'asdfdsaf';
      return $imgNewName;
    }

    return "Image is not currently available";
  }
}
?>