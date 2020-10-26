<?php include_once("inc/_header.php"); ?>
<?php require_once("lib/User.php"); ?>
<?php require_once("helper/Validation.php")?>
<?php
error_reporting(E_ALL);

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // validation::validate($_POST);
    // print_r(array_keys($_POST));
    $validate_data = validation::validate($_POST)->is_empty()->trim()->filter_data()->getdata();
    $user->

}

?>

<div class="container mx-auto bg-gray-200 justify-between flex mt-6 p-5">
    <div>
        <h1>Sign Up </h1>
    </div>
    <div>

    </div>
</div>
<div class="bg-white rounded-lg shadow-lg py-6 container mx-auto  bg-gray-100 my-5">
    <div class="block overflow-x-auto mx-6">

        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="signup.php" method="POST">
            name<div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="name" name="name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="email" name="email">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" name="username">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password">
                <p class="text-red-500 text-xs italic">Please choose a password.</p>
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Sign up
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