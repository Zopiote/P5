<section id="section-postlist" class="page">
    <h1 class="page__title">Liste des utilisateurs</h1>

    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Valide</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user){ ?>
                <tr>
                    <td><?= EscapeManager::clean($user->getEmail()) ?></td>
                    <td><?= EscapeManager::clean($user->getValid()) ?></td>
                    <td>
                        <?php if($user->getValid() == "0"){ ?><a href="/admin/user/valid?id=<?= EscapeManager::clean($user->getId()) ?>"><img class="table-img" src="../../Files/check_white_24dp.svg"></a><?php }else{ ?><a href="/admin/user/devalid?id=<?= EscapeManager::clean($user->getId()) ?>"><img class="table-img" src="../../Files/clear_white_24dp.svg"></a><?php }; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>