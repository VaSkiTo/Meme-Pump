<?php

if($_FILES['file']['size']!=0){
    
	//checks if file exists and has no error
        if($_FILES['file']['name']){
        if(!$_FILES['file']['error']){
            
			//checks if file is within a certain size
            if(($_FILES['file']['size'] > (1024000))){
                $valid_file=false;
				//checks if file is of a certain image type
            }else if($_FILES['file']['type']!='image/png'
                    &&$_FILES['file']['type']!='image/jpg'
                    &&$_FILES['file']['type']!='image/jpeg'){
                $valid_file=false;
                echo "Invalid file";
            }else{
                $valid_file=true;
            }
            
			//declares the string variable that will be the saved file name for ordering
			$resultFileName;
			
			//if it is a valid file scan all files to find the maximum number (all files are named by numbers)
            if($valid_file){
				$dirImages = scandir("adminuploads");
				$dirImages = array_diff($dirImages,array(".",".."));
				$max = 0;
				foreach($dirImages as $file){
					$stringVariant = (string) $file;
					$pattern = '/.((png)|(jpg)|(jpeg))/';
					$fileNumber = (int) preg_replace($pattern,"",$stringVariant);
					if($fileNumber > $max)
						$max = $fileNumber;
				}
				foreach($dirImages as $file){
					$pattern = '/'.$max.'.((png)|(jpg)|(jpeg))/';
					if(preg_match($pattern,(string)$file)==1)
						$resultFileName = (string) $max+1;
				}
				//finally move the file from temporary storage into permenant storage
                move_uploaded_file($_FILES['file']['tmp_name'], 'adminuploads/' . $resultFileName . ".png");
                echo "Upload successful";
            }else{
                echo "File too big";
            }
        }
        }
    
        }else{
            echo "Form not filled out correctly";
        }

?>