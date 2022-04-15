<?php
include('user.php');
include('secret.php');

session_start();
$randomKey = $_SESSION['random_key'];

$roles = [
    [
        'label' => 'Create',
        'value' => Users::ROLE_CREATE
    ],
    [
        'label' => 'Read',
        'value' => Users::ROLE_READ
    ],
    [
        'label' => 'Update',
        'value' => Users::ROLE_UPDATE
    ],
    [
        'label' => 'Delete',
        'value' => Users::ROLE_DELETE
    ],

];

$users = Users::all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bitfield.css">
    <title>BIT FIELD</title>
</head>

<body>
    <div class="b-row">
        <div class="register-form b-5">
            <form id="form-user-register" action="register.php" method="post">
                <div class="b-row">
                    <label class="b-3 align-center" for="username">Username</label>
                    <input class="b-9" type="text" name="username" id="username" placeholder="Username" required>
                </div>

                <div class="b-row">
                    <label class="b-3 align-center">Role</label>
                    <div class="b-9 cbs">
                        <fieldset class="b-row" id="checkArray">
                            <?php foreach ($roles as $role) { ?>
                            <div class="cb-item">
                                <label for="">
                                    <input type="checkbox" name="role[]" value="<?php echo $role['value'] ?>">
                                    <span><?php echo $role['label'] ?></span>
                                </label>
                            </div>
                            <?php } ?>
                        </fieldset>
                    </div>
                </div>
                <div class="b-row">
                    <label for="" class="b-3 align-center">Secret Key</label>
                    <div class="b-9">
                        <input class="b-row" type="text" id="g-key" name="g-key" value="<?php echo $randomKey ?>">
                    </div>
                </div>
                <div class="b-row">
                    <label for="" class="b-3 align-center">Hash</label>
                    <div class="b-9">
                        <input class="b-row" type="text" id="g-hash" name="g-hash">
                    </div>
                </div>
                <div class="b-row justify-center">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
        <div class="list-users b-7">
            <center>
                <table cellspacing="20">

                    <head>
                        <tr>
                            <th>Username</th>
                            <th>Sum role</th>
                            <th>create</th>
                            <th>read</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                    </head>

                    <body>
                        <?php
                        foreach ($users as $user) {
                        ?>
                        <tr>
                            <td><?php echo $user->username ?></td>
                            <td><?php echo $user->role ?></td>
                            <td><?php if ($user->role & Users::ROLE_CREATE) echo ("v") ?>
                            <td><?php if ($user->role & Users::ROLE_READ) echo ("v") ?>
                            <td><?php if ($user->role & Users::ROLE_UPDATE) echo ("v") ?>
                            <td><?php if ($user->role & Users::ROLE_DELETE) echo ("v") ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </body>
                </table>
            </center>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha256/0.9.0/sha256.min.js"></script>
<script src="bitfield.js"></script>

</html>