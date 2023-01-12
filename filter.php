<?php include 'config/db.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>results for "
        <?php $_GET['query'] ?>".
    </title>
    <script src="//cdn.tailwindcss.com"></script>
</head>

<body>

    <?php include 'components/header.php' ?>

<?php 
if(isset($_GET['query'])):
    $keyword = $_GET['query'];
    $run = mysqli_query($conn , "SELECT * FROM books JOIN categories on books.category = categories.cat_id where books.isbn = '$keyword' or (title LIKE '%$keyword%' or author LIKE '%$keyword%') ");
    
elseif(isset($_GET['category'])):
    $cat_id = $_GET['category'];
    $keyword = $_GET['name'];
    echo "$keyword";
    $run = mysqli_query($conn , "SELECT * FROM books JOIN categories on books.category = categories.cat_id where category = '$cat_id'");
    
endif;
    
?>
    <div class="lg:px-56 py-4 ">
        <p class="text-lg px-4 pb-6">Search result for "<span class="font-semibold">
                <?= $keyword ?>
            </span>"</p>
        <?php while($row = mysqli_fetch_array($run)):?>
        <a href="view.php?product_name=<?= $row['title'];?>">
            <div
                class="group my-2 rounded-md px-5 hover:border-indigo-500 duration-200 border-2 cursor-pointer py-8 gap-5 lg:gap-16 flex items-center">
                <div class="lg:w-1/4 w-1/3">
                    <img src="img/<?= $row['cover']?>" class="object-center object-cover w-60" alt="">
                </div>
                <div class="py-5 lg:w-3/4 w-2/3">
                    <div class="md:flex-grow">
                        <h2
                            class="group-hover:text-indigo-600 text-indigo-400 duration-200 cursor-pointer text-2xl font-medium  title-font mb-2">
                            <?= $row['title'];?>
                        </h2>
                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <span
                                class="font-semibold group-hover:text-red-600 cursor-pointer title-font text-gray-700">
                                <?= $row['cat_title'];?>
                            </span>
                        </div>
                        <p class="leading-relaxed " title="<?= $row['description'];?>">
                            <?= $row['description'];?>
                        </p>
                        <div class="flex gap-2 mt-5 items-end"><span
                                class="text-lg text-indigo-400 duration-200 group-hover:text-indigo-600 font-bold">RS.
                                <?= $row['discount_price']?>
                            </span><del class="text-xs mb-1">RS.
                                <?= $row['price']?>
                            </del></div>
                    </div>
                </div>
            </div>
        </a>
        <?php endwhile ; ?>
    </div>

</body>

</html>