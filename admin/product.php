<?php include("./inc/check_session.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mosaic HTML Demo - Home</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="style.311cc0a03ae53c54945b.css" rel="stylesheet">
</head>

<body class="font-inter antialiased bg-gray-100 text-gray-600" :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ page: 'dashboard', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>
    <div class="flex h-screen overflow-hidden">
        <?php include("./inc/sidebar.php"); ?>
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            <?php include("./inc/header.php"); ?>
            <main>
                <?php include("./inc/alert.php"); ?>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                    <!-- Page title -->
                    <h2 class="text-2xl text-gray-600 mb-5">Product</h2>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="flex flex-col col-span-full">
                            <?php if (isset($_GET['edit'])) {
                                $id = $_GET['edit'];

                                // Get the category using the id 
                                $query = "SELECT * FROM category WHERE id = '$id'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $name = $row['category_name'];

                            ?>
                                <form action="./handlers/category_handler.php" method="post">
                                    <label class="block text-sm font-medium mb-1" for="default">Category Name</label>
                                    <input id="default" name="category" value="<?= $name ?>" class="form-input w-full">
                                    <input type="hidden" name="id" value="<?= $id ?>" />

                                    <div class="mt-3">
                                        <button name="edit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Update Category</button>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <form action="./handlers/product_handler.php" method="post" enctype="multipart/form-data">
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="name">Product Name</label>
                                            <input id="name" name="name" class="form-input w-full">
                                        </div>

                                        <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="price">Product Price</label>
                                            <input id="price" name="price" class="form-input w-full">
                                        </div>

                                        <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="quantity">Product Quantity</label>
                                            <input id="quantity" name="quantity" class="form-input w-full">
                                        </div>

                                        <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="label">Product Label</label>
                                            <input id="label" name="label" class="form-input w-full">
                                        </div>

                                        <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="color">Product Color</label>

                                            <select class="form-select" name="color" id="color">
                                                <option value="" selected disabled>Select color</option>

                                                <?php foreach (getAllColors($conn) as $color) : extract($color); ?>
                                                    <option value="<?= $id ?>"> <?= $color_name ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="category">Product Category</label>
                                            <select class="form-select" name="category" id="category">
                                                <option value="" selected disabled>Select category</option>

                                                <?php foreach (getAllCategories($conn) as $category) : extract($category); ?>
                                                    <option value="<?= $id ?>"> <?= $category_name ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="flex flex-col col-span-full">
                                            <label class="block text-sm font-medium mb-1" for="image">Product Image</label>
                                            <input type="file" name="image[]" multiple id="image">
                                        </div>

                                        <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-6">
                                            <label class="block text-sm font-medium mb-1" for="description">Product Description</label>
                                            <textarea class="form-input w-full" name="description" id="description" rows="5"></textarea>
                                        </div>

                                        <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-6">
                                            <label class="block text-sm font-medium mb-1" for="feature">Product Features</label>
                                            <textarea class="form-input w-full" name="feature" id="feature" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button name="add" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Add Product</button>
                                    </div>
                                </form>
                            <?php } ?>

                        </div>

                        <div class="flex flex-col col-span-full">
                            <div class="mt-5">
                                <h2 class="text-2xl text-gray-600 mb-6">All Products</h2>
                                <div class="rounded-sm border border-gray-200">
                                    <div class="overflow-x-auto">
                                        <table class="table-auto w-full divide-y divide-gray-200">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>Label</th>
                                                    <th>color</th>
                                                    <th>Feature</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm" x-data="{ open: false }">
                                                <?php if(count(getAllProducts($conn))): ?>
                                                    <?php foreach(getAllProducts($conn) as $product): ?>
                                                        <tr>
                                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                                <div class="text-left">
                                                                    <?= $product["name"] ?>
                                                                </div>
                                                            </td> 

                                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                                <div class="text-left">
                                                                    <?= $product["quantity"] ?>
                                                                </div>
                                                            </td>  

                                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                                <div class="text-left">
                                                                    <?= explode("|", $product["quantity"])[0] ?>
                                                                </div>
                                                            </td>  

                                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                                <div class="text-left" title="<?= $product["description"] ?>">
                                                                    <?= substr($product["description"], 0, 20) . "..." ?>
                                                                </div>
                                                            </td>  

                                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                                <div class="text-left">
                                                                    <?= $product["label"]; ?>
                                                                </div>
                                                            </td>  

                                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                                <div class="text-left flex">
                                                                    <div style="width: 10px; height: 10px; background-color: <?= getOneColor($conn, $product['color'])["color_value"] ?> ;"></div>
                                                                    <?= getOneColor($conn, $product['color'])["color_name"]  ?>
                                                                </div>
                                                            </td>  

                                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                                <div class="text-left" title="<?= $product["feature"] ?>">
                                                                    <?= substr($product["feature"], 0, 20) . "..." ?>
                                                                </div>
                                                            </td>  
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="8" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                            <div class="text-center">No products available</div>
                                                        </td>  
                                                    </tr>
                                                <?php endif; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4">
                            <div class="px-5 pt-5">
                                <header class="flex justify-between items-start mb-2"><img src="images/icon-02.svg" width="32" height="32" alt="Icon 02" />
                                    <div class="relative inline-flex" x-data="{ open: false }"><button class="text-gray-400 hover:text-gray-500 rounded-full" :class="{ 'bg-gray-100 text-gray-500': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open"><span class="sr-only">Menu</span> <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                <circle cx="16" cy="16" r="2" />
                                                <circle cx="10" cy="16" r="2" />
                                                <circle cx="22" cy="16" r="2" />
                                            </svg></button>
                                        <div class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
                                            <ul>
                                                <li><a class="font-medium text-sm text-gray-600 hover:text-gray-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 1</a></li>
                                                <li><a class="font-medium text-sm text-gray-600 hover:text-gray-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 2</a></li>
                                                <li><a class="font-medium text-sm text-red-500 hover:text-red-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </header>
                                <h2 class="text-lg font-semibold text-gray-800 mb-2">Acme Advanced</h2>
                                <div class="text-xs font-semibold text-gray-400 uppercase mb-1">Sales</div>
                                <div class="flex items-start">
                                    <div class="text-3xl font-bold text-gray-800 mr-2">$17,489</div>
                                    <div class="text-sm font-semibold text-white px-1.5 bg-yellow-500 rounded-full">-14%</div>
                                </div>
                            </div>
                            <div class="grow"><canvas id="dashboard-card-02" width="389" height="128"></canvas></div>
                        </div> -->
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="main.75545896273710c7378c.js"></script>
</body>

</html>