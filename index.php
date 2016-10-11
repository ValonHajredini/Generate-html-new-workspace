<?php
$dir ="".dirname(__FILE__)."/"; // Current location for generating new workspace
include "assets/php_includes/functiones.php";
if (isset($_POST['submit'])){
    $projectname = filterTheProjectName($_POST['project_name']);
    if ($projectname != '' and $projectname != null){
//        makeDirectory($projectname);
        file_force_contents($projectname, indexContent($projectname), $dir);
    }
}else if(isset($_POST['theProject'])){
deleteTheProject("Projects/".$_POST['theProject']);
}
$dir = $dir."/Projects/";
$dirs = scandir($dir);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="assets/images/dashboard-19.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/blitzer/jquery-ui.css" type="text/css" />
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            <h2><a href="http://php.dev/"><img src="assets/images/blank.png" width="15" height="60"  alt=""></ing></a><img src="assets/images/php_projects.png" width="50" height="60" alt=""> My PHP Projects</h2>
        </div>
        <div class="col-md-5">
            <div class="form-groupp" >
                <button onclick="showForm()" id="new_form_button" class="btn btn-primary">New Project</button>
            </div>
            <form action="" id="new_project_form" style="display: none;" method="POST">
                <div class="form-groupp" >
                    <input type="text" name="project_name" class="" id="project_name"  placeholder="Type The name of new project" >
                    <input type="submit" name="submit" value="NEW PROJECT" id="new_submit_button" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
<?php
foreach ($dirs as $directory){
    $dirFolder = explode('.', $directory);
    if ($directory != '.' and $directory != '..' and $directory  != ".idea" AND $directory != "assets" and $directory != "index.php" and $directory != "db_to_json"){
        if (count($dirFolder) == 1){
        ?>
            <div class="col-md-3">
                <a href="Projects/<?php echo $directory?>/workflow.php" class="link">
                    <div class="well project">
                        <img src="assets/images/projects_images_html.png" alt="" class="logo" width="30" height="30">
<!--                        <img src="assets/images/close.png" alt="" class="delete " width="30" height="30">-->


                        <form action="" name="myForm" id="myForm" method="post" onsubmit="">
                            <input type="hidden" name="confirm" value="=true">
                            <input type="hidden" name="theProject" value="<?php echo $directory; ?>">
                            <button type="submit"  class="glyphicon glyphicon-remove delete confirm" onclick="return ifDelete('<?php echo $directory  ?>')"> </button>

                        </form>

                        <h3 style="text-align: center;">
                            <?php echo strtoupper($directory); ?>
                        </h3>
                    </div>
                </a>
            </div>
        <?php
        }
    }
}
?>
</div>
</div>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/showForm.js"></script>
</body>
</html>
