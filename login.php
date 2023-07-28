<?php
 require_once 'header.php';
 $error = $user = $pass = "";
 if (isset($_POST['user']))
 {
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 if ($user == "" || $pass == "")
$error = 'Not all fields were entered';
 else
 {
$result = queryMySQL("SELECT user,pass FROM members
WHERE user='$user' AND pass='$pass'");
if ($result->num_rows == 0)
{
$error = "Invalid login attempt";
}

else
{
$_SESSION['user'] = $user;
$_SESSION['pass'] = $pass;
die("You are now logged in. Please <a data-transition='slide'
href='members.php?view=$user'>click here</a> to continue.</div>
</body></html>");
}
 }
 }
// echo <<<_END
// <form method='post' action='login.php'>
// <div data-role='fieldcontain'>
// <label></label>
// <span class='error'>$error</span>
// </div>
// <div data-role='fieldcontain'>
// <label></label>
// Please enter your details to log in
// </div>
// <div data-role='fieldcontain'>
// <label>Username</label>
// <input type='text' maxlength='16' name='user' value='$user'>
// </div>
// <div data-role='fieldcontain'>
// <label>Password</label>
// <input type='password' maxlength='16' name='pass' value='$pass'>
// </div>
// <div data-role='fieldcontain'>
// <label></label>
// <input data-transition='slide' type='submit' value='Login'>
// </div>
// </form>
//  </div>
//  </body>
// </html>
// _END;


// ===
echo '
<form method="post" action="login.php">
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<div>
					<h1 class="text-2xl font-semibold">Login Form with Floating Labels</h1>
				</div>
				<div class="divide-y divide-gray-200">
					<div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
						<div class="relative">
							<input autocomplete="off" id="email" name="user" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Email address" />
							<label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>
						</div>
						<div class="relative">
							<input autocomplete="off" id="password" name="pass" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Password" />
							<label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
						</div>
						<div class="relative">
							<button class="bg-blue-500 text-white rounded-md px-2 py-1">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</body>
</html>
';
?>

