<section id="section-postlist" class="page">
    <h1 class="page__title">Liste posts</h1>
    <a href="/admin/post/add" class="btn btn-primary btn-list">Add Post</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Last Modification Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post){ ?>
                <tr>
                    <td><?= $post->getTitle() ?></td>
                    <td><?= $post->getLastModificationDate() ?></td>
                    <td>
                        <a class="table-link" href="/admin/post/edit?id=<?= $post->getId() ?>"><img class="table-img" src="../../Files/edit_white_24dp.svg"></a>
                        <a class="table-link" href="/admin/post/delete?id=<?= $post->getId() ?>"><img class="table-img" src="../../Files/delete_white_24dp.svg"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</section>