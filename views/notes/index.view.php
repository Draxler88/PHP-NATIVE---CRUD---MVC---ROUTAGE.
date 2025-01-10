<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <?php foreach ($posts as $post) : ?>
            <ul>
                <li><a class="text-blue-600 hover:underline mb-2" href="/note?id=<?=$post['id']?>"><?=$post['title']?></a></li>
            </ul>
<?php endforeach; ?>
            <p class="mt-10 ">
                <a class="text-blue-700 bg-blue-100 border p-3 hover:text-green-700 hover:bg-green-200 rounded-lg hover:border-green-500 " href="/notes/create">Create New Note from Here</a>
            </p>
        </div>
    </main>
<?php require base_path("views/partials/footer.php") ?>