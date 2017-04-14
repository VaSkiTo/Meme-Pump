<?php

if(isset($_POST['title'])
        &&isset($_POST['paragraph'])
        &&$_FILES['file']['size']!=0){
        
        $title=$_POST['title'];
        $para = $_POST['paragraph'];
    
        if($_FILES['file']['name']){
        if(!$_FILES['file']['error']){
            
            
            if(($_FILES['file']['size'] > (1024000))){
                $valid_file=false;
            }else if($_FILES['file']['type']!='image/png'
                    &&$_FILES['file']['type']!='image/jpg'
                    &&$_FILES['file']['type']!='image/jpeg'){
                $valid_file=false;
            }else{
                $valid_file=true;
            }
            
            if($valid_file){
                move_uploaded_file($_FILES['file']['tmp_name'], 'todaysupload/' . "today" . ".png");
                $jsonString = file_get_contents("todayspump.json");
                $data = json_decode($jsonString);
                $data->{"title"}=$title;
                $data->{"paragraph"}=$para;
                $data->{"image"}="todaysupload/today.png";
                file_put_contents("todayspump.json", json_encode($data));
                echo "Upload successful";
            }
        }
        }
    
        }else{
            echo "Form not filled out correctly";
        }

?>