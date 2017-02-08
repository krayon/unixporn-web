<?php include_once('inc/header.php'); ?>

        <div class="page-header">
        <h1>Upload</h1>
      </div>

  <form name="uploader" method="post" enctype="multipart/form-data" action="" onsubmit="return checkForm(this);">
    <p> <span class="btn btn-default btn-file">Choose file... <input name="files[]" type="file" required></span></p>
    <p> <input name="imgText" class="darkform" type="text" size="25" maxlength="200" placeholder="Image description..." required></p>
    <p>  <input type="checkbox" name="checkthis" required> I have read and agree to the <a href="tos.php">Terms of Service</a>.</p>
    <p> <img src="/captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></p>
    <p> <input type="text" class="darkform" size="25" maxlength="5" name="captcha" value="" placeholder="Type the digits from the captcha!"></p>
      
    <p><input name="submit" class="btn btn-sm btn-primary" type="submit" value="Upload"></p>
  </form>

<?PHP
  if($_POST) {     
    if($_POST['captcha'] != $_SESSION['digit']) die("Sorry, the CAPTCHA code entered was incorrect!");
    session_destroy();

if (isset($_POST['submit']) && (is_uploaded_file($_FILES['files']['tmp_name'][0]))) {

  $errors= array();
  foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['files']['name'][$key];
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key];  
    $imgText = htmlspecialchars($_POST['imgText']);
    $imgDate = time();
    $path='i/';
    $splitter = explode('.', $file_name);
    $ext = strtolower($splitter[count($splitter)-1]);
    $newname = randString();
    $file_name = $newname.'.'.$ext;
    $allowedExt =  array('jpg','jpeg','png');
        if($file_size > 4097152){
      $errors[]='File size must be less than 4 MB';
        }   
        if(!in_array($ext,$allowedExt) ) {
            echo '<div class="alert alert-danger" role="alert">Sorry, something went wrong! [3000]</div>';
            exit();
        }
        if(empty($errors)==true){
            if(is_dir($path)==false){
                echo '<div class="alert alert-danger" role="alert">Sorry, something went wrong! [3001]</div>';
                // Directory not found!
                exit();
            }
            if(is_dir('$path/'.$file_name)==false){
                move_uploaded_file($file_tmp,$path.$file_name);
                $thumb_name = $newname."_thumb".".".$ext;
                // Desired width of thumbnail, in pixels
                $thumb_width = 150;
                // Make a thumnail
                image_to_thumb($path.$file_name, $path.$thumb_name, $thumb_width, 80);
            }else{                  
                echo '<div class="alert alert-danger" role="alert">Sorry, something went wrong! [3002]</div>';
                // Filename already exist!
                exit();
            }
            $stmt = $conn->query("INSERT INTO uploads (imgName, imgSize, imgType, imgText, imgDate, imgThumb) VALUES ('$file_name', '$file_size', '$file_type', '$imgText', '$imgDate', '$thumb_name')");
        }else{
                print_r($errors);
        }
    }
  if(empty($error)){
    $stmt = $conn->query("SELECT * FROM uploads ORDER BY id DESC LIMIT 1");
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<div> <h4>Image uploaded!</h4> <a href="https://nixplorer.org/i/'.$row['imgName'].'" target="_blank"><img src="https://nixplorer.org/i/'.$row['imgThumb'].'"><br /> https://nixplorer.org/i/'.$row['imgName'].'</a> </div>';
      }    
    }
  }
}
?>

<?php include_once('inc/footer.php'); ?>
