<?php include ROOT.'\views\layouts\header.php'; ?>


<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4">
            <h2>Добавление доп. поля типа мультисписок</h2>

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

            <form action="/addmulti" method="post">
                <div class="form-group">
                    <label for="multi-name">Название мультисписка</label>
                    <p><input class="form-control type="text" name="multi-name" id="multi-name" required></p>
                    <h3>Выберите сущность</h3>
                    <p><input class="form-control" type="radio" name="choise" value="contact"> Контакт</p>
                    <p><input class="form-control" type="radio" name="choise" value="sdelka"> Сделка</p>
                    <p><input class="form-control" type="radio" name="choise" value="company"> Компания</p>
                    <p><input class="form-control" type="radio" name="choise" value="pokup"> Покупатель</p>
                    <p><input class="btn btn-primary" name="submit" type="submit" value="Создать"></p>
                </div>
            </form>
        </div>

    </div>
</div>

<?php include ROOT.'\views\layouts\footer.php';
