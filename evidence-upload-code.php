<?php
//used https://www.php.ne;t/manual/en/features.file-upload.post-method.php to help with file upload
//Websdite:php
//Name Of Webpage:POST method uploads
//Date: N/A
//URL:https://www.php.net/manual/en/features.file-upload.post-method.php
include("includes/dbconfing-inc.php");
$user=$_POST["user"]??null;
 $fileDir="imgs/evidence/";
 $imgname=$_FILES['evidence']['name'];
 var_dump($imgname);
 $extension= pathinfo($imgname,PATHINFO_EXTENSION);

 $randnum=rand(0,1000000);
 $rename='Evidence'.date('Ymd').$randnum;
 $newname=$rename.'.'.$extension;
 $path="imgs/evidence/{$newname}";
 $filename=$_FILES['evidence']['tmp_name'];
 if (move_uploaded_file($filename,$path)) {
    echo "File is valid, and was successfully uploaded.\n";
    $stmnt=$mysqli->prepare("SELECT * FROM evidence_of_funds WHERE user_id=$user;");
    $stmnt->execute();
    $results=$stmnt->get_result();
    if($results->num_rows>0){
        while($account = $results -> fetch_object()){
            {
                var_dump($user);
                var_dump($path);
                $old_link=$account->evidence_img_path;
                unlink($old_link);
                $stmnt=$mysqli->prepare("UPDATE evidence_of_funds SET evidence_img_path='$path' WHERE user_id=?");
                $stmnt->bind_param('s',$user);
                $stmnt->execute();
                $data=1;
                header("Location:evidence-funds.php?user=$user & data=$data");
                }
            }
    }
    else{
        $stmnt=$mysqli->prepare("INSERT INTO evidence_of_funds (user_id,evidence_img_path) VALUES(?,?);");
        $stmnt->bind_param('ss',$user,$path);
        $stmnt->execute();
        $data=1;
        header("Location:evidence-funds.php?user=$user & data=$data");
    }
}
else{
    $data=2;
    header("Location:evidence-funds.php?user=$user & data=$data");
}





?>