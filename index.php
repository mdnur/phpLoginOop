<?php include_once("inc/_header.php"); ?>
<?php require_once("lib/User.php"); ?>
<?php 
error_reporting(E_ALL);

    $user = new User();


?>

    <div class="container mx-auto bg-gray-200 justify-between flex mt-6 p-5">
        <div>
            <h1>User Details</h1>
        </div>
        <div>
            <h1>welcome <b>User</b></h1>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg py-6 container mx-auto  bg-gray-100 my-5">
            <div class="block overflow-x-auto mx-6">
                <table class="w-full text-left rounded-lg">
                    <thead>
                        <tr class="text-gray-800 border border-b-0">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                            <td class="px-4 py-4">1</td>
                            <td class="px-4 py-4">Bedram Tamang</td>
                            <td class="px-4 py-4">tmgbedu@gmail.com</td>
                            <td class="px-4 py-4">
                                <span class="text-sm bg-green-500 text-white rounded-full px-2 py-1">Active</span>
                            </td>
                            <td class="text-left py-4">
                                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">edit</a>
                                <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">delete</a>
                                <a href="#" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">View</a>
                            </td>
                        </tr>
                        <tr class="w-full font-light text-gray-700 whitespace-no-wrap border">
                            <td class="px-4 py-4">2</td>
                            <td class="px-4 py-4">Taylor Otwel</td>

                            <td class="px-4 py-4">taylow@laravel.com</td>
                            <td class="px-4 py-4">
                                <span class="text-sm bg-yellow-500 text-white rounded-full px-2 py-1">Pending</span>
                            </td>
                            <td class="text-left py-4">
                                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">edit</a>
                                <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">delete</a>
                                <a href="#" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">View</a>
                            </td>
                        </tr>
                        <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border">
                            <td class="px-4 py-4">3</td>
                            <td class="px-4 py-4">Adam wathan</td>
                            <td class="px-4 py-4">tmgbedu@gmail.com</td>
                            <td class="px-4 py-4">
                                <span class="text-sm bg-red-500 text-white rounded-full px-2 py-1">Not Active</span>
                            </td>
                            <td class="text-left py-4">
                                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">edit</a>
                                <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">delete</a>
                                <a href="#" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">View</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="bg-gray-200 text-center p-5">
                Develop by <a href="http://twitter.com/realmdnur" class="text-blue-500">Mohammad Nur</a>
        </footer>
</body>

</html>