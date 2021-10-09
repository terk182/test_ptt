<?php
include "class/database_class.php" ;
if(isset($_POST['path']))
{
    $path = $_POST['path'];
    $name = $_POST['name'];

    if(isset($_FILES['image']['name']))
    {
        //Upload the Image
        //To upload image we need image name, source path and destination path
        $image_name = $_FILES['image']['name'];
        
        // Upload the Image only if image is selected
        if($image_name != "")
        {

            //Auto Rename our Image
            //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
            $ext = end(explode('.', $image_name));

            //Rename the Image
            $image_name = "pic_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
            

            $source_path = $_FILES['image']['tmp_name'];

            

            //Finally Upload the Image
            $upload = move_uploaded_file($source_path, $path);

            //Check whether the image is uploaded or not
            //And if the image is not uploaded then we will stop the process and redirect with error message
            $func = new DB_con;
            $sql = $func->insert_pic($path,$name);

        }
    }
    else
    {
        //Don't Upload Image and set the image_name value as blank
        $image_name="";
    }
}
else
{
    echo "error";
}

?>