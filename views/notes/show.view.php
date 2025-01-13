<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-4">
            <a class="text-blue-600 hover:underline " href="/notes">Go Back</a>
            </p>
            <p><?= htmlspecialchars($post['title']) ?></p>
            <div class="flex gap-6">
                <form class="mt-4" action="/notes" method="POST">
                    <input type="hidden" name="_method" value="DELETE" >
                    <input type="hidden" name="id_target" value="<?= $post['id'] ?>">
                    <button class="text-xs text-white bg-red-500 rounded-full p-3">Delete</button>
                </form>
                <form class="mt-4" action="/note/edit?id=<?= $post['id'] ?>" method="POST">
                    <input type="hidden" name="_method" value="PATCH" >
                    <input type="hidden" name="id_target" value="<?= $post['id'] ?>">
                    <button class="text-xs text-white bg-blue-500 rounded-full p-3 hover:outline hover:outline-offset-2 hover:outline-2 outline-blue-700">Update</button>
                </form>
            </div>

        </div>
    </main>
<?php require base_path("views/partials/footer.php") ?>