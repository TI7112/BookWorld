<?php include 'config/db.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Book Worlds</title>
    <script src="//cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include 'components/header.php' ?>
    <?php include 'components/banner.php' ?>
    <section class="text-gray-600 body-font">
        <?php
           $CategoriesData = mysqli_query($conn, "SELECT * FROM categories");
           while ($cat = mysqli_fetch_array($CategoriesData)) :
             $cat_id = $cat['cat_id'];
             $query = "select * from books JOIN categories on books.category = categories.cat_id where books.category='$cat_id'";
             $BooksData = mysqli_query($conn, $query . "LIMIT 6");
             $countBooks = mysqli_num_rows(mysqli_query($conn, $query));
       
            if($countBooks > 0):
         ?>
        <div class="container px-5 py-10 mx-auto">
            <div class="flex w-full items-center justify-between mb-8">
                <div class="lg:w-1/2 mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900 capitalize"><?= $cat['cat_title']?> Books Here</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <div class="<?php if($countBooks < 2): echo 'hidden'; else: echo ''; endif?> lg:<?php if($countBooks < 6): echo 'hidden'; else:echo ''; endif?> ">
                    <a href="filter.php?category=<?= $cat['cat_id'];?>&name=<?= $cat['cat_title'];?>" class="bg-indigo-500 px-4 py-2 rounded-md text-white hover:bg-indigo-600">View all</a>
                </div>
            </div>
            <div class="grid lg:grid-cols-6 gap-2 grid-cols-2">
                <?php 
                while($item = mysqli_fetch_array($BooksData)):?>
                <a href="view.php?product_name=<?= $item['title'];?>">
                    <div class="bg-gray-100 hover:brightness-90 duration-200 w-full rounded-lg">
                        <img class="h-80 rounded w-full object-contain object-center mb-6" src="img/<?=$item['cover']?>"
                            alt="content">
                        <div class="px-6 pb-4">
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                            <?= $item['cat_title']?>
                        </h3>
                        <h2 class="text-xl text-gray-900 font-medium title-font  truncate cursor-pointer"
                            title="<?= $item['title']?>">
                            <?= $item['title']?>
                        </h2>
                        <div class="flex gap-2 items-end"><span class="text-lg text-emerald-600">RS.
                                <?= $item['discount_price']?>
                            </span><del class="text-xs mb-1">RS.
                                <?= $item['price']?>
                            </del></div>
                        </div>
                    </div>
                </a>
                <?php endwhile ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endwhile; ?>

    </section>
</body>

</html>



<!-- trancating   use title in this-->