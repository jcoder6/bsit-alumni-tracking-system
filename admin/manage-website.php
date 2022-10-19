<div class="manage-website">
  <h1 class="section-name">MANAGE WEBSITE</h1>
</div>

<?php
  $pageData = fetchPageData($pdo);
?>

<div class="manage-table">
  <div class="table-head">
    <h3 class="table-name">Manage Website</h3>
  </div>

  <form action="" method="post" class="add-event-form" enctype="multipart/form-data">
    <div class="form-group event-name">
      <label for="page_name" class="label-name">Page Name</label>
      <input type="text" name="page_name" class="input" value="<?= $pageData['page_name'] ?>">
    </div>

    <div class="form-group event-name">
      <label for="contact_number" class="label-name">Contact Number</label>
      <input type="text" name="contact_number" class="input" value="<?= $pageData['contact_no'] ?>">
    </div>

    <div class="form-group event-name">
      <label for="page_email" class="label-name">Page Email</label>
      <input type="text" name="page_email" class="input" value="<?= $pageData['page_email'] ?>">
    </div>

    <div class="form-group event-photo">
      <label for="eventPhoto" class="label-name photo-input">
        <i class="fa-solid fa-upload"></i> Main Image 
      </label>
      <input type="file" name="main_image" id="eventPhoto" onChange="((e)=>{
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
      <input type="submit" name="update_page" value="Add Event" class="button1 add-event-btn">
    </div>
  </form>
</div>  

<?php
  function fetchPageData($pdo) {
    try {
      $query = "SELECT * FROM page WHERE id = 1";
      $stmt = $pdo->prepare($query);
      if($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        echo 'database connection failed'; 
      }
    } catch (PDOException $e) {
      echo $e;
    }
  } 
?>

