<?php
/**
 * Makes the name of the project camelcase
 * */
function filterTheProjectName( $projectName){

    if (isset($projectName)){
        $finalProjectName = [];
        $projectName = explode(' ', $projectName);
        foreach ($projectName as $projectWord){
            $word = ucfirst($projectWord);
            $finalProjectName[] = $word;
        }
        $finalProjectName = implode("",$finalProjectName);
        return $finalProjectName;
    }else {
        return "";
    }
}
function makeDirectory($projectName){
    if (mkdir($projectName.'/', 0777, true)) {
        return true;
    }else {
        return false;
    }
}
function file_force_contents($dir, $contents, $path){
    mkdir("Projects/".$dir."/classes", 0777, true);
    mkdir("Projects/".$dir."/assets", 0777, true);
    mkdir("Projects/".$dir."/assets/css", 0777, true);
    mkdir("Projects/".$dir."/assets/js", 0777, true);
    mkdir("Projects/".$dir."/assets/images", 0777, true);
    copy($path.'/assets/css/bootstrap.min.css', $path.'/Projects/'.$dir."/assets/css/bootstrap.min.css");
    copy($path.'/assets/css/main.css', $path.'/Projects/'.$dir."/assets/css/main.css");
    copy($path.'/assets/js/bootstrap.min.js', $path.'/Projects/'.$dir."/assets/js/bootstrap.min.js");
    copy($path.'/assets/js/jquery-3.1.1.min.js', $path.'/Projects/'.$dir."/assets/js/jquery-3.1.1.min.js");
    copy($path.'/assets/js/main.js', $path.'/Projects/'.$dir."/assets/js/main.js");
    copy($path.'/assets/images/dashboard-19.png', $path.'/Projects/'.$dir."/assets/images/dashboard-19.png");
    copy($path.'/assets/images/php_projects.png', $path.'/Projects/'.$dir."/assets/images/php_projects.png");
    copy($path.'/assets/images/back.png', $path.'/Projects/'.$dir."/assets/images/back.png");
    $index = "index.php";
    $workflow = "workflow.php";
    file_put_contents("Projects/$dir/$workflow", $contents);
    file_put_contents("Projects/$dir/$index", "<?php \n");
}
function indexContent($projectName){
    $content = "<!DOCTYPE html>
<html>
<head>
    <link rel=\"icon\" href=\"assets/images/dashboard-19.png\">
    <link rel=\"stylesheet\" href=\"assets/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"assets/css/main.css\">
</head>
<body>

<div class=\"container-fluid\">

    <div class=\"row\">
<h2><a href=\"http://html.dev/\"><img src=\"assets/images/back.png\" width=\"30\" height=\"60\"  alt=\"\"></ing></a><img src=\"assets/images/php_projects.png\" width=\"50\" height=\"60\" alt=\"\"> My PHP Project [ ".$projectName." ]</h2><hr>
<?php include \"index.php\"?>

</div>
</div>
<script src=\"assets/js/jquery-3.1.1.min.js\"></script>
<script src=\"assets/js/bootstrap.min.js\"></script>
<script src=\"assets/js/main.js\"></script>
</body>
</html>

";
    return $content;
}
function deleteTheProject($path){
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            deleteTheProject(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
    echo "Project wos deleted! ";
//    if (!is_dir($projectName)) {
//        mkdir($projectName);
//    }
//
//    rmdir($projectName);
}