<!DOCTYPE html>
<html lang="en">
  <head>
    
  <link rel="icon" type="image/ico" href="../assets/images/favicon.ico" />

<!-- Bootstrap -->
<link href="../assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/awesome/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/vendor/bootstrap-checkbox.css">
<link rel="stylesheet" href="../assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css">

<link href="../assets/css/minimal.css" rel="stylesheet">


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Upload Files</title>
  </head>

  <body class="container">
  <center><h2 class="text-success">File Upload</h2></center><hr />
    <form method="post" enctype="multipart/form-data">
      <input type="file" required id="upload_files" style="display:none" name="files" />
      <div class="row">
        
        <div class="col-md-4 col-xs-4 border">
          <div class="form-group">
            <label for="upload_files">
              <img class="rounded img-thumbnail" style="width: inherit; height: inherit" src="../assets/images/random-avatar2.jpg" alt="web picture" />
            </label>
          </div>
         
        </div>
        <div class="col-md-8 col-xs-8">
          <div class="form-group">
            <label class="label label-cyan" for="pageLink">Link</label>
            <input type="text" required class="form-control" name="linkName" id=" pageLink" value="" />
          </div>
          <div class="form-group">
            <label class="label label-cyan" for="category">Category:</label>
            <input type="text" required class="form-control" name="category" id="category" value="" />
          </div>
          <div class="form-group">
            <label class="label label-cyan" for="aboutUpload">Document Description</label>
            <textarea type="text" required class="form-control" name="aboutUpload" id="aboutUpload" placeholder="About the page"></textarea>
          </div>
          <input type="submit" class="btn btn-info m-4" value="Upload File" name="submit" />
            
          <div class="upload_msg m-3"></div>
          
        </div>
      </div>
    </form><!-- 
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="files" />
       <input type="text" name="folderName" placeholder="Folder Name">
      <input type="text" name="linkName" placeholder="Enter Link">
      <input type="text" name="category" placeholder="Category">
      <input type="submit" value="Upload File" name="submit" />
    </form> --> 
    <script src="../code.jquery.com/jquery.js"></script>

    <script src="../assets/js/fileJs.js"></script>
  </body>
</html>