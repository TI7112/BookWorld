<div class="bg-[url('img/banner.jpg')] bg-cover w-full py-32 flex justify-center">
    <form action="filter.php?query=<?php ?>" class="flex " method="get">
        <input size="45" type="search" class="outline-none py-2 px-3 rounded-l-md" placeholder="Search by title, author, ISBN no..." name="query" id="">
        <input type="submit" class="bg-indigo-500 text-white py-2 px-5 cursor-pointer hover:bg-indigo-600 font-semibold rounded-r-md" name="search" value="Search" id="">
    </form>
</div>