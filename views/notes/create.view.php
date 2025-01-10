<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-4">
            <a class="text-blue-600 hover:underline " href="/notes">Go Back</a>
            </p>
            <div class="grid grid-cols-6">
                <div class="col-span-3">
                    <form  method="POST">
                        <label for="about" class="block text-sm/6 font-medium text-gray-900">Own Note :</label>
                        <div class="mt-2">
                            <textarea name="note" id="note" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= isset($_POST['note']) ? $_POST['note'] : '' ?></textarea>
                        </div>
                        <div class="flex justify-between">
                            <p class="mt-5 text-sm/6 text-gray-600">Write a note by yourself.</p>
                            <button class="bg-violet-600 outline hover:outline-violet-600 hover:outline-offset-2 hover:outline-2 hover:bg-violet-700 w-20 text-white mt-3 rounded-full p-2" type="submit">Save</button>
                        </div>
                        <?php if (isset($errors['body'])) : ?>
                        <p class="text-red-400 text-xs"><?= $errors['body'] ?></p>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php require base_path("views/partials/footer.php") ?>