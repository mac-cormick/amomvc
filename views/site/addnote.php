<?php include ROOT.'\views\layouts\header.php'; ?>


<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4">
            <h2>Добавление примечания</h2>

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

            <form action="/addnote" method="post">
                <div class="form-group">
                    <label for="elem-id">ID элемента</label>
                    <p><input class="form-control" type="text" name="elem-id" id="elem-id"></p>
                    <h3>Тип элемента</h3>
                    <p><input class="form-control" type="radio" name="choise" value="contact"> Контакт</p>
                    <p><input class="form-control" type="radio" name="choise" value="sdelka"> Сделка</p>
                    <p><input class="form-control" type="radio" name="choise" value="company"> Компания</p>
                    <p><input class="form-control" type="radio" name="choise" value="pokup"> Покупатель</p>
                    <label for="note-text">Текст примечания</label>
                    <p><input class="form-control" type="text" name="note-text" id="note-text"></p>
                    <h3>Тип примечания</h3>
                    <p><input class="form-control" type="radio" name="note-choise" value="simple-note"> Обычное примечание</p>
                    <p><input class="form-control" type="radio" name="note-choise" value="call-note"> Входящий звонок</p>
                    <p><input class="btn btn-primary" name="submit" type="submit" value="Добавить примечание"></p>
                </div>
            </form>
        </div>

    </div>
</div>

<?php include ROOT.'\views\layouts\footer.php';
