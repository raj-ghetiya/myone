<?php
 require_once 'header.php';
 $result =  mysqli_query($conn,"SELECT * FROM users WHERE user='$user'");

 if($result->num_rows){
 $row = mysqli_fetch_assoc($result);
 $name = $row['name'];
 $gmail = $row['gmail'];
 $about = $row['about'];


      if (isset($_POST['name'])){

          $name = $_POST['name'];
          $gmail= $_POST['gmail'];
          $about= $_POST['about'];
          $result= mysqli_query($conn,"UPDATE `users` SET `name`='$name',`gmail`='$gmail',`about`='$about' WHERE user = '$user'");
        }
 }else{
    if (isset($_POST['name'])){
        $name = $_POST['name'];
        $gmail= $_POST['gmail'];
        $about= $_POST['about'];
        $sql ="INSERT INTO `users`( `user`, `name`, `gmail`, `about`) VALUES ('$user','$name','$gmail','$about')";
        $result= mysqli_query($conn,$sql);
      }
 }
 if (isset($_FILES['image']['name']))
{
$saveto = "image/$user.jpg";
move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
$typeok = TRUE;
$src = "image/$user.jpg";}
//  echo '<h1>'.$name.'</h1>
//  <h1>'.$gmail.'</h1>
//  <h1>'.$about.'</h1>
//  ';
showProfile($user);
 echo'
 <form data-ajax="false" method="post"
action="edit_profile.php" enctype="multipart/form-data">
 <div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 mt-0 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
     style="background-image: url(https://images.unsplash.com/photo-1532423622396-10a3f979251a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1500&q=80);">
     <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
     <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
 <div class="grid  gap-8 grid-cols-1">
     <div class="flex flex-col ">
           
           <div class ="flex justify-center" ><h1>Profile</h1></div>
           
           
             <div class="mt-5">
                 <div class="form">
                     <div class="md:space-y-2 mb-3">
                        
                         <div class="flex items-center py-6">
                             <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                 <img class="w-12 h-12 mr-4 object-cover" src="image/'.$user.'.jpg" alt="Avatar Upload">
                 </div>
                                 <label class="cursor-pointer ">
                   <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
                   <input type="file" name="image" class="hidden" :multiple="multiple" :accept="accept">
                 </label>
                             </div>
                         </div>
                         <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                             <div class="mb-3 space-y-2 w-full text-xs">
                                 <label class="font-semibold text-gray-600 py-2">Name</label>
                                 <input placeholder="Name" name="name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" value="'.$name.'" >
                                 <p class="text-red text-xs hidden">Please fill out this field.</p>
                             </div>
                             <div class="mb-3 space-y-2 w-full text-xs">
                                 <label class="font-semibold text-gray-600 py-2">Mail</label>
                                 <input placeholder="Email ID" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="gmail" id="integration_shop_name" value="'.$gmail.'">
                                 <p class="text-red text-xs hidden">Please fill out this field.</p>
                             </div>
                         </div>
                                 <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                     <label class="font-semibold text-gray-600 py-2">Description</label>
                                     <textarea required="" name="about" value="" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Enter your comapny info" spellcheck="false">'.$about.'</textarea>
                                    
                                 </div>
                                
                                
                                 <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                    
                                     <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">Save</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             </form>';
 ?>