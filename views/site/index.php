<?php include ROOT.'\views\layouts\header.php'; ?>;

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1>Вход</h1>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li class="text-danger"> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">User Login</label>
                        <input class="form-control" type="email" name="email" id="email" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="password">User Hash</label>
                        <input class="form-control" type="password" name="password" id="password" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Subdomain</label>
                        <input class="form-control" type="text" name="domain" id="domain" value="" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Войти"></input>
                </form>
            </div>
        </div>
    </div>

<?php include ROOT.'\views\layouts\footer.php';
