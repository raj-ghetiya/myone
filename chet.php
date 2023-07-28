<?php
 require_once 'chet_header.php';
//  INSERT INTO `chet` (`id`, `v_name`, `meg`, `u_name`, `meg_id`) VALUES (NULL, 'niraj', 'hi', 'rama', 'nirajrama');
if (isset($_GET['view'])) $view = $_GET['view'];
else $view = $user;

$c = array($view,$user);
$v = array($user,$view);

$cid = join("",$c);
$cid2 = join("",$v);

if(isset($_POST['meg'])){
	$meg = $_POST['meg'];
	
	
    
	queryMysql("INSERT INTO `chet` ( `v_name`, `meg`, `u_name`, `meg_id`) VALUES ('$view', '$meg', '$user', '$cid')");

}

if (isset($_GET['view'])){
	$result = queryMysql("SELECT * FROM `chet` WHERE meg_id='$cid' OR meg_id='$cid2'");
	$num = $result->num_rows;
	while($row = mysqli_fetch_assoc($result)){
	  if($row['meg_id'] == $cid2){
		echo'
		<div class="flex justify-start mb-4">
		<img
		  src="image/'.$row['v_name'].'.jpg"
		  class="object-cover h-8 w-8 rounded-full"
		  alt=""
		/>
		<div
		  class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white"
		>
		 
		'.$row['meg'].'
		 
		 
		</div>
	  </div>';
		
	    
	  }
	  else{
		echo'
		<div class="flex justify-end mb-4">
		<div
		  class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
		>
		  '.$row['meg'].'
		</div>
		<img
		  src="image/'.$row['u_name'].'.jpg"
		  class="object-cover h-8 w-8 rounded-full"
		  alt=""
		/>
	  </div>';
    
    
    
    
    
    
    
    
    
    
    
    
		
		
	  }
	    
	}
	echo"<br><br><br>";
}



 
?>
<script src="https://cdn.tailwindcss.com"></script>
 <div class="fixed top-0 left-0 right-0 shadow-lg bg-cyan-50 rounded-md flex justify-between">
   <?php echo' <div class ="flex"><img  class="w-14 h-14 my-2 mx-1 rounded-full" src="image/'.$view.'.jpg" alt="">
               </div>
               <h1 class="mt-5 text-2xl mx-1">'.$view.'</h1>

                <img  class="w-8 my-5 h-8 mx-1 rounded-full" src="image/svg/r.svg" alt="">
   ';?>
    
 </div>
 <!-- --==++++++ -->
 <div class="fixed top-16 my-2 right-1" id="chatmsg">
 <!-- +++++++++++ -->
 <?php 
 echo'
 <form method="post" action="chet.php?view='.$view.' ">
 
 <div class="fixed bottom-2  left-1 right-1 flex ">
	
		
	
 <input type="text" placeholder="Write your message!" name="meg" id="typemsg" class="shadow-lg focus:outline-none w-full focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-cyan-50 mx-1 border-2 border-black rounded-full py-3">
 <button  type="submit"  onclick="sendbtn();" >
 <div class="rounded-full flex justify-center shadow-lg hover:bg-cyan-200  border-2 border-black bg-cyan-50 w-14 h-14">
 <img  class="w-5 h-5 mt-4" src="image/svg/s.svg" alt="">
 </div>
 </button>
 </form>
 </div>';?>
 <script>
    function sendbtn() {
     window.scrollTo(0,document.body.scrollHeight);

}
 </script>
 </body>