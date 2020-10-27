<?php require_once("lib/User.php"); ?>
<?php require_once('helper/ValidationLogin.php');?>
<?php require_once("lib/Session.php")?>

<?php
error_reporting(E_ALL);

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $validation = new ValidationLogin($_POST);
    $errors = $validation->validateForm();
    if($errors == null){
        $user_data =$user->signIn($validation->getData());
        if($user_data != false){
            Session::init();
            Session::set("login",true);
            Session::set('id',$user_data['id']);
            Session::set('name',$user_data['name']);
            Session::set('email',$user_data['email']);
            Session::set('username',$user_data['username']);
            $flash_msg = "Login sucessful";
            Session::set('success',"login sucessful");
            header("location:index.php");
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.6/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
</head>

<body>
    <header class="bg-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 ">
            <div class="container mx-auto">
                <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
                    <div class="lg:w-0 lg:flex-1">
                        <a href="index.php" class="flex text-3xl">
                            <h1>PHP LOGIN AND REGISTRATION</h1>
                        </a>
                    </div>

                    <div class="md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
                        <?php if(Session::itsLogin() ):?>
                         <a href="profile.php" class="whitespace-no-wrap text-base leading-6 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                           Profile
                        </a>
                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="?logout=true" class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                logout
                            </a>
                        </span>
                        <?php else: ?>
                        <a href="signin.php" class="whitespace-no-wrap text-base leading-6 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                            Sign in
                        </a>
                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="signup.php" class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                Sign up
                            </a>
                        </span>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="container mx-auto bg-gray-200 justify-between flex mt-6 p-5">
    <div>
        <h1>Sign In </h1>
    </div>
    <div>

    </div>
</div>
<div class="bg-white rounded-lg shadow-lg py-6 container mx-auto  bg-gray-100 my-5">
    <div class="block overflow-x-auto mx-6">

    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" value="<?php echo $_POST['email'] ?? '' ?>"placeholder="email" name="email">
                <p class="text-red-500 text-xs italic"><?php echo $errors['email'] ?? '' ?> </p>
            </div>
          

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" value="<?php echo $_POST['password'] ?? '' ?>"placeholder="******************" name="password">
                <p class="text-red-500 text-xs italic"><?php echo $errors['password'] ?? '' ?> </p>
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" value="Sign In">
                </input>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>

    </div>
</div>
<footer class="bg-gray-200 text-center p-5">
    Develop by <a href="http://twitter.com/realmdnur" class="text-blue-500">Mohammad Nur</a>
</footer>
</body>

</html>