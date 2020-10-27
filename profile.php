<?php include_once('inc/_header.php'); ?>
<?php require_once("lib/User.php"); ?>
<?php require_once("lib/Session.php"); ?>
<?php require_once("helper/ValidationProfile.php") ?>
<?php
error_reporting(E_ALL);

$user = new User();
$getdata = $user->get(Session::get('id'));

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    var_dump($_POST);
    $validation = new ValidationProfile($_POST);
    $errors = $validation->validateForm();
    if ($errors == null) {
        if ($user->update($validation->getData())) {
            Session::set('success', "Profile updated sucessful");
        } else {
            echo 'somthing went wrongs';
        }
    }
}

?>

<div class="container mx-auto bg-gray-200 justify-between flex mt-6 p-5">
    <div>
        <h1>Update Detials</h1>
    </div>
    <div>

    </div>
</div>
<div class="bg-white rounded-lg shadow-lg py-6 container mx-auto  bg-gray-100 my-5">
    <div class="block overflow-x-auto mx-6">
        <?php if (Session::get('success') != false) : ?>
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-5" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" /></svg></div>
                    <div>
                        <p class="font-bold"><?php echo (Session::get('success')); ?></p>
                    </div>
                </div>
            </div>
            <?php Session::unsetFlashData('success'); ?>
        <?php endif ?>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" value="<?php echo $_POST['name'] ?? ($getdata->name) ?>" placeholder="name" name="name">
                <p class="text-red-500 text-xs italic"><?php echo $errors['name'] ?? '' ?> </p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" value="<?php echo $_POST['email'] ?? ($getdata->email) ?>" placeholder="email" name="email">
                <p class="text-red-500 text-xs italic"><?php echo $errors['email'] ?? '' ?> </p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" value="<?php echo $_POST['username'] ?? ($getdata->username) ?>" placeholder="Username" name="username">
                <p class="text-red-500 text-xs italic"><?php echo $errors['username'] ?? '' ?> </p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="bio">
                    Bio
                </label>
                <textarea class="shadow appearance-none border rounded w-full h-40 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bio" type="text" name="bio"><?php echo $_POST['bio'] ?? ($getdata->bio) ?></textarea>
                <p class="text-red-500 text-xs italic"><?php echo $errors['bio'] ?? '' ?> </p>
            </div>

            <div class="flex items-center justify-between">
                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" value="Update">
            </div>

        </form>

    </div>
</div>


<footer class="bg-gray-200 text-center p-5">
    Develop by <a href="http://twitter.com/realmdnur" class="text-blue-500">Mohammad Nur</a>
</footer>
</body>

</html>