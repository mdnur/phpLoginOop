<?php include_once("inc/_header.php"); ?>
<?php require_once("lib/User.php"); ?>
<?php
error_reporting(E_ALL);

$users = new User();
$usersAll = $users->all();
$no = 1;

?>

<div class="container mx-auto bg-gray-200 justify-between flex mt-6 p-5">
    <div>
        <h1>User Details</h1>
    </div>
    <div>
        <h1>welcome, <b><?php echo Session::get('username') ?? ''?></b></h1>
    </div>
</div>
<div class="bg-white rounded-lg shadow-lg py-6 container mx-auto  bg-gray-100 my-5">
    <div class="block overflow-x-auto mx-6">
        <?php if (Session::get('success') != false): ?>
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-5" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" /></svg></div>
                <div>
                    <p class="font-bold"><?php echo(Session::get('success')); ?></p>
                </div>
            </div>
        </div>
        <?php  Session::unsetFlashData('success');?>
        <?php endif?>
        <table class="w-full text-left rounded-lg">
            <thead>
                <tr class="text-gray-800 border border-b-0">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Username</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersAll as $user ) { ?>
                <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                    <td class="px-4 py-4"><?php echo $no++;?></td>
                    <td class="px-4 py-4"><?php echo($user['name']);?></td>
                    <td class="px-4 py-4"><?php echo($user['email']) ?></td>
                    <td class="px-4 py-4"><?php echo($user['username']) ?></td>
                    <td class="text-left py-4">
                        <a href="view.php?id=<?php echo($user['id'])?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">View</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<footer class="bg-gray-200 text-center p-5">
    Develop by <a href="http://twitter.com/realmdnur" class="text-blue-500">Mohammad Nur</a>
</footer>
</body>

</html>