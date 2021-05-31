<section id="section-postlist" class="page">
    <h1 class="page__title">Liste posts</h1>
    
    <a href="/admin/post/add">Add Post</a>

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
                        <a href="/admin/post/edit?id=<?= $post->getId() ?>">Edit</a>
                        <a href="/admin/post/delete?id=<?= $post->getId() ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>