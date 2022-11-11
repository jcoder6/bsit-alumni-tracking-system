<div class="manage-event">
  <h1 class="section-name">ADD GALLERY</h1>
</div>
<?php getUserInputs($pdo, $conn) ?>
<div class="manage-table">
  <div class="table-head">
    <h3 class="table-name">Add Gallery</h3>
  </div>

  <form action="" method="post" class="add-event-form" enctype="multipart/form-data">
    <div class="form-group event-name">
      <label for="gal_year" class="label-name">Gallery Year</label>
      <input type="number" name="gal_year" id="gal_year" class="input" placeholder="Gallery Year" required>
    </div>

    <div class="form-group event-desc">
      <label for="gal_desc" class="label-name">Description</label>
      <textarea name="gal_desc" id="eventDesc" required></textarea>
    </div>

    <div class="form-group event-photo">
      <label for="eventPhoto" class="label-name photo-input">
        <i class="fa-solid fa-upload"></i>Gallery Photo
      </label>
      <input type="file" name="gal_photo" id="eventPhoto" onChange="((e)=>{
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
          })(event)" required>
      <div id="inputPhoto">No Image Choose</div>
      <input type="submit" name="add_gallery" value="Add Event" class="button1 add-event-btn">
    </div>
  </form>
</div>

<?php
  function getUserInputs($pdo, $conn) {
    if(isset($_POST['add_gallery'])){
      $imgName = mysqli_real_escape_string($conn, $_FILES['gal_photo']['name']);
      if($imgName != ""){
        $newImgName = renameImg($imgName, 'IMG_GALLERY');
      }
      $inputData = [
        'years' => mysqli_real_escape_string($conn, $_POST['gal_year']),
        'descs' => mysqli_real_escape_string($conn, $_POST['gal_desc']), 
        'img' => $newImgName
      ];

      $sourcePath = $_FILES['gal_photo']['tmp_name'];
      $destinationPath = '../assets/images/gallery/' . $newImgName;
      $query = "INSERT INTO gallery(gallery_img, img_year, img_description) VALUES (:img, :years, :descs)";
      try {
        uploadNewImage($sourcePath, $destinationPath, $pdo, $query, $inputData);
        messageNotif('success', 'Added New Image to Gallery');
        echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-gallery';</script>"; 

      } catch (Exception $e) {
        messageNotif('error', 'Something went wrong');
        echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-gallery';</script>"; 
      }
    }
  }
?>