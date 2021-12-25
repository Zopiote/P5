<section id="section-postlist" class="page">
    <h1 class="page__title">Liste des articles</h1>
    <a href="/admin/post/add" class="btn btn-primary btn-list">Ajouter un article</a>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Dernière date de modification</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post){ ?>
                <tr>
                    <td><?= EscapeManager::clean($post->getTitle()) ?></td>
                    <td><?= EscapeManager::clean($post->getLastModificationDate()) ?></td>
                    <td>
                        <a class="table-link" href="/admin/post/edit?id=<?= EscapeManager::clean($post->getId()) ?>"><img class="table-img" src="../../Files/edit_white_24dp.svg"></a>
                        <a class="table-link" href="/admin/post/delete?id=<?= EscapeManager::clean($post->getId()) ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce post ?');"><img class="table-img" src="../../Files/delete_white_24dp.svg"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</section>