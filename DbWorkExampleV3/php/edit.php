<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';

if($_SESSION["loggedin"] == true) {
	
	$ShowForm = true;
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		
	// DATA VALIDATION ////////////////////////////////
    $error = false;
    $messages = [];
    
    if (empty($_POST['title'])) {
        $error = true;
        $messages['addProject_title'] = '<p>This value should not be blank</p>';
    }
    if (empty($_POST['description'])) {
        $error = true;
        $messages['addProject_description'] = '<p>This value should not be blank</p>';
    }

       //echo "CHECKING: ". $_POST['csrf_token'] ." <> " . $_SESSION['csrf_token'][0];

    if (empty($_POST['csrf_token'])) {
        $error = true;
        $messages['csrf_token_error'] = '<p>csrf_token_error</p>';
    } else if ($_POST['csrf_token'] <> $_SESSION['csrf_token'][0]) {
        $error = true;
        $messages['csrf_token_error'] = '<p>csrf_token_error</p>';
    }

    
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image'];
        
        if (!in_array(mime_content_type($file['tmp_name']), ['image/png','image/jpeg', 'image/gif'])) {
            $error = true;
            $messages['addProject_image'] = '<p>Only png, jpeg or gif are allowed</p>';
        }
    }
    // END OF DATA VALIDATION //////////////////////////////////////////////////////
    
    
    //var_dump($error);
    // All Input OK ////////////////////////////////////////////////////////////////
    if (!$error) {
      
        
     // Process Data ///////////////////////////////////
		$SQL = $connection->prepare('UPDATE article SET title = :NEWTITLE,description = :NEWDESCRIPTION,img  = :IMG WHERE id = :NUMBER');
		$SQL->bindParam(':NUMBER', $_POST['id'], PDO::PARAM_INT);
		$SQL->bindParam(':NEWTITLE', $_POST['title'], PDO::PARAM_STR);
		$SQL->bindParam(':NEWDESCRIPTION', $_POST['description'], PDO::PARAM_STR);
				if(!empty($_FILES['image'])) {
					$FileNameToDB = ProcessUploadedFile($_FILES['image']);
					$SQL->bindParam(':IMG', $FileNameToDB, PDO::PARAM_STR);
				}
				
		if($SQL->execute()) {
		header("Location: view.php?id=".$_POST['id']." "); /* Redirect browser */
		}
		else {
		echo "Error in Insert";
		print_r($SQL->errorInfo());
		$SQL->debugDumpParams();
		var_dump($_POST);
		}
// EndOf Process Data ///////////////////////////////////
     
        
	}

//////////////////////////////////////////////////// 





} 
/// EndIFPost ////////////////////

// Show Form /////////////////////////////////////////////////
if($_SERVER['REQUEST_METHOD'] !== 'POST' || $error == true) {
include 'header.php';

$_SESSION['csrf_token'] = CreateToken();
var_dump($_SESSION['csrf_token']);
var_dump($_GET);
var_dump($_POST);


//Added to Get the id from POST  
if(!isset($_GET['id'])) $IdToEdit = $_POST['id'];
else $IdToEdit = $_GET['id'];



$result = GetFromDBWithId($IdToEdit,$connection);
//var_dump($result);
?>
		<form method="POST" action="edit.php" enctype="multipart/form-data">
			<div class="form-group">
			    <label for="title">Tip a title for your project</label>
			    <p><?php echo $messages['addProject_title'] ?? ''; ?></p>
			    <input class="form-control" type="text" name="title" value="<?php echo $result[0]['title'] ?? ''; ?>"></input>
			</div>
			
			<div class="form-group">
			    <label for="description">Define a description for your project</label>
   			    <p><?php echo $messages['addProject_description'] ?? ''; ?></p>
			    <textarea class="form-control" name="description"><?php echo $result[0]['description'] ?? ''; ?></textarea>
			</div>
		
			<div class="form-group">
			    <label for="image">Choose an image for your project</label>
   			    <p><?php echo $messages['addProject_image'] ?? ''; ?></p>
			    <input class="form-control" type="file" name="image"></input>
			</div>
		    <input type="hidden" name="id" value="<?php echo $IdToEdit; ?>"></input>
		    <p><?php echo $messages['csrf_token_error'] ?? ''; ?></p>

   		    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'][0]; ?>"></input>


			<div class="form-group cc">
		    	<button class="btn btn-default" type="submit">Submit</button>
			</div>
		</form>

<?php
} 
// End Show Form ////////////////////////
	
} // End If Loggin
	


