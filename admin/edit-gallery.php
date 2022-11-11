<div class="manage-event">
  <h1 class="section-name">EDIT GALLERY</h1>
</div>
<?php 
    $gallery = getGalleryInfo($pdo); 
    if(isset($_POST['edit_gallery'])){
        $imgName = mysqli_real_escape_string($conn, $_FILES['gal_photo']['name']);
        $galleryID = $_GET['edit'];
        
        if($imgName != ""){
            $imgPath = '../assets/images/gallery/' . $gallery->gallery_img;
            deleteCurrentImg($gallery->gallery_img, $imgPath);
            $newImgName = renameImg($imgName, 'IMG_GALLERY');
            $inputData = [
                'years' => mysqli_real_escape_string($conn, $_POST['gal_year']),
                'descs' => $_POST['gal_desc'], 
                'img' => $newImgName
            ];
    
            $sourcePath = $_FILES['gal_photo']['tmp_name'];
            $destinationPath = '../assets/images/gallery/' . $newImgName;
            $query = "UPDATE gallery SET img_year = :years, img_description = :descs, gallery_img = :img WHERE id = $galleryID";
            try {
                uploadNewImage($sourcePath, $destinationPath, $pdo, $query, $inputData);
                messageNotif('success', 'Updated Galery');
                echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-gallery';</script>"; 
    
            } catch (Exception $e) {
                messageNotif('error', 'Something went wrong');
                echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-gallery';</script>"; 
            }
        } else {
            $inputData = [
                'years' => mysqli_real_escape_string($conn, $_POST['gal_year']),
                'descs' => $_POST['gal_desc']
            ];

            $queryNoImg = "UPDATE gallery SET img_year = :years, img_description = :descs WHERE id = $galleryID";

            $stmt = $pdo->prepare($query);
            if($stmt->execute($inputData)){
                messageNotif('success', 'Updated Galery');
                echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=add-gallery';</script>"; 
            } else {
                messageNotif('error', 'Something went wrong');
                echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-gallery';</script>"; 
            }
        }
        
    }
?>
<div class="manage-table">
  <div class="table-head">
    <h3 class="table-name">Add Gallery</h3>
  </div>

  <form action="" method="post" class="add-event-form" enctype="multipart/form-data">
    <div class="form-group event-name">
      <label for="gal_year" class="label-name">Gallery Year</label>
      <input type="number" name="gal_year" id="gal_year" class="input" placeholder="Gallery Year" value="<?= $gallery->img_year ?>" required>
    </div>

    <div class="form-group event-desc">
      <label for="gal_desc" class="label-name">Description</label>
      <textarea name="gal_desc" id="eventDesc" required><?= $gallery->img_description ?></textarea>
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
          })(event)">
      <div id="inputPhoto">No Image Choose</div>
      <input type="submit" name="edit_gallery" value="Update Gallery" class="button1 add-event-btn">
    </div>
  </form>
</div>

<?php
    function getGalleryInfo($pdo) {
        $galleryID = $_GET['edit'];
        $query = "SELECT * FROM gallery WHERE id = $galleryID LIMIT 1";
        $stmt = $pdo->prepare($query);

        if($stmt->execute()){
            return $stmt->fetch();
        }
    }
?>