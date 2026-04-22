<?php
include ("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management - Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      
      <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Create your account
              </h1>

              <form class="space-y-4 md:space-y-6" action="register_post.php" method="POST">

                  <!-- NAME -->
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                      <?php
if(isset($user_error)){
    echo $user_error;
}
?>
                      <input type="text" name="name" placeholder="Your name"
                      class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                      required>
                  </div>

                  <!-- EMAIL -->
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                     <?php
if(isset($email_error)){
    echo $email_error;
}
?>
                      <input type="email" name="email" placeholder="name@company.com"
                      class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                      required>
                  </div>

                  <!-- PASSWORD -->
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                     <?php
if(isset($pass_error)){
    echo $pass_error;
}
?>
                      <input type="password" name="password" placeholder="••••••••"
                      class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                      required>
                  </div>

                  <!-- CONFIRM PASSWORD -->
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                      <input type="password" name="confirm_password" placeholder="••••••••"
                      class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                      required>
                  </div>

                  <!-- BUTTON -->
                  <button type="submit" name="submit"
                  class="w-full text-white bg-blue-400 hover:cursor-pointer font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-blue-500">
                      Sign up
                  </button>

                  <!-- LINK LOGIN -->
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Already have an account? 
                      <a href="index.php" class="font-medium text-blue-600 hover:underline">
                          Sign in
                      </a>
                  </p>

              </form>

          </div>
      </div>
  </div>
</section>

</body>
</html>