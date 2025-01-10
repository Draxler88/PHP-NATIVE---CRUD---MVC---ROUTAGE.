<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-4">
            <a class="text-blue-600 hover:underline " href="/notes">Go Back</a>
            </p>
            <p><?= htmlspecialchars($post['title']) ?></p>
        </div>
    </main>
<?php require base_path("views/partials/footer.php") ?>