<section id="section-postlist" class="page">
    <h1 class="page__title">Liste users</h1>

    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Valid</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user){ ?>
                <tr>
                    <td><?= $user->getEmail() ?></td>
                    <td><?= $user->getValid() ?></td>
                    <td>
                        <?php if($user->getValid() == "0"){ ?><a href="/admin/user/valid?id=<?= $user->getId() ?>">Validation</a><?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>