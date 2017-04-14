 /*for those who got here to override validation:
  * 
  * nice try but we do validate on the server side as well
  * good luck!
  * 
  */
 
 var fileChosen=false;
                    
                    function validateForm(){
                        if($("#email").val()==="" 
                                || $("#name").val()===""
                                 || $("#url").val()===""){
                             $("#validationError").remove();
                             var x = document.createElement("h3");
                             x.id="validationError";
                             x.textContent="Not all fields have been correctly filled";
                             $("#formex").append(x);
                             return false;
                        }
                        return true;
                    }
                    
                    //checking for right type of file
                    
                    function checkFile(){
                        if(!$("#imagetoupload").val().match(/\.(jpeg|JPEG|JPG|jpg|PNG|png)$/)){
                            var error = document.createElement("h3");
                            $("#validationError2").remove();
                            error.id="validationError2";
                            error.textContent="File type not supported, try jpeg or png";
                            $("#formex").append(error);
                            fileChosen=false;
                            if($("#imagetoupload").val()!==""){
                                $("#filename").remove();
                                $("#unecessarybreak").hide();
                                var h1 = document.createElement("h6");
                                h1.id="filename";
                                h1.textContent=$("#imagetoupload").val();
                                $("#label").after(h1);
                            }else{
                                $("#unecessarybreak").show();
                            }
                        }else{
                        if($("#imagetoupload").val()!==""){
                                $("#filename").remove();
                                $("#unecessarybreak").hide();
                                var h1 = document.createElement("h6");
                                h1.id="filename";
                                h1.textContent=$("#imagetoupload").val();
                                $("#label").after(h1);
                            }else{
                                $("#unecessarybreak").show();
                            }
                        $("#validationError2").remove();
                        fileChosen=true;
                        }
                    }
                    
                    //final validation
                    
                    function validateEverything(){
                        return (validateForm() && fileChosen);
                    }