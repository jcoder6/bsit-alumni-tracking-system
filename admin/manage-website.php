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
      <input type="submit" name="update_page" value="Update Website" class="button1 add-event-btn">
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

  if(isset($_POST['update_page'])){
    $pageImg = mysqli_real_escape_string($conn, $_FILES['main_image']['name']);
    $webData = [
      'page_name' => mysqli_real_escape_string($conn, $_POST['page_name']),
      'contact_no' => mysqli_real_escape_string($conn, $_POST['contact_number']),
      'email' => mysqli_real_escape_string($conn, $_POST['page_email'])
    ];

    try {
      //if the image need to be updated
      if(!empty($pageImg)){
        // IMAGE PATH IS HARD TO CONFIGURE MAKE SURE THAT YOU CONFIGURE IT RIGHT USING THE ROOT URL. MIGHT BE NOT WORKED.
        $imgPath = '.././assets/images/' . $pageData['page_img'];
        $mainImgRename = renameImg($pageImg, 'MAIN_PHOTO');
        deleteCurrentImg($pageImg, $imgPath);
        $sourcePath = $_FILES['main_image']['tmp_name'];
        $destinationPath = '.././assets/images/' . $mainImgRename;
        $queryMainImg = "UPDATE page SET page_img = :page_img WHERE id = 1";
        $imgData = ['page_img' => $mainImgRename];
        uploadNewImage($sourcePath, $destinationPath, $pdo, $queryMainImg, $imgData);
      }

      $query = "UPDATE page SET page_name = :page_name, contact_no = :contact_no, page_email = :email WHERE id = 1";
      $stmtUpdate = $pdo->prepare($query);
      if($stmtUpdate->execute($webData)){
        messageNotif('success', 'Page Updated');
        echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-website" . "';</script>"; 
      } else {
        echo 'something went wrong';
      }
    } catch(PDOException $e) {
      echo $e;
    }   
  }
?>

