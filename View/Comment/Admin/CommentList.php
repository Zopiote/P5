<section id="section-postlist" class="page">
    <h1 class="page__title">Liste comments</h1>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Valid</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comments as $comment){ ?>
                <tr>
                    <td><?= $comment->getPublicationDate() ?></td>
                    <td><?= $comment->getValid() ?></td>
                    <td>
                        <a href="/admin/comment/delete?id=<?= $comment->getId() ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>