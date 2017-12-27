<?php include ROOT.'\views\layouts\header.php'; ?>


<div class="container">
	<div class="row">

        <div class="col-md-4 col-md-offset-4">
            <h2>Добавление контактов</h2>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li class="text-danger"> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (isset($answer) && is_string($answer)): ?>
                        <p class="text-success"><?php echo $answer; ?></p>
            <?php endif; ?>

            <form action="/addcontacts" method="post">
                <div class="form-group">
                    <label for="contacts-count">Сколько контактов добавить?</label>
                    <p><input class="form-control" type="text" name="contacts-count" id="contacts-count" required></p>
                </div>
                <p><input type="submit" name="submit" class="btn btn-primary" value="Добавить"></p>
            </form>
        </div>

	</div>
</div>

<?php include ROOT.'\views\layouts\footer.php';
