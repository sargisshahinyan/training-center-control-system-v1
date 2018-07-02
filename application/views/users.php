<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 13.04.2017
 * Time: 19:16
 */
$users = isset($users) ? $users : [];
?>
<article class="list list-group container">
    <section class="list-group-item-heading row bold">
        <div class="col-xs-6">Մականուն</div>
        <div class="col-xs-6">Օգտվողի կարգավիճակը</div>
    </section>
    <?php foreach ($users as $user) { ?>
    <section class="list-group-item row" id="<?= $user["id"] ?>">
        <div class="col-xs-6"><a role="button" class="edit" href="#"><?= $user["login"] ?></a></div>
        <div class="col-xs-5"><?= empty($user["admin"]) ? "Operator" : "Administrator"; ?></div>
        <div class="col-xs-1"><button class="delete-button">X</button></div>
    </section>
    <?php } ?>
</article>

<article class="container">
    <section class="row">
        <button class="btn btn-success" id="add">Ավելացնել օգտվող</button>
    </section>
</article>

<div class="modal fade" id="userDataFrom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="form-title">Նոր օգտվող</h4>
            </div>
            <div class="modal-body">
                <form id="user-form">
                    <div class="form-group">
                        <label for="username" class="control-label">Մականուն:</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Գաղտնաբառ:</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="user-type" class="control-label">Օգտվողի կարգավիճակը:</label>
                        <select class="form-control" id="user-type">
                            <option value="0">Օպերատորր</option>
                            <option value="1">Ադմինիստրատորր</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                        <button type="submit" class="btn btn-primary" id="submit">Ներկայացնել</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/js/users.js"></script>
