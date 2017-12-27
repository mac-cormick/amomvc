<?php include ROOT.'\views\layouts\header.php'; ?>


    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-4">
                <h2>Добавление задачи</h2>

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

                <form action="/addtask" method="post">
                    <div class="form-group">
                        <label for="elem-id">ID элемента</label>
                        <p><input class="form-control" type="text" name="elem-id" id="elem-id"></p>
                        <h3>Тип элемента</h3>
                        <p><input class="form-control" type="radio" name="choise" value="contact"> Контакт</p>
                        <p><input class="form-control" type="radio" name="choise" value="sdelka"> Сделка</p>
                        <p><input class="form-control" type="radio" name="choise" value="company"> Компания</p>
                        <p><input class="form-control" type="radio" name="choise" value="pokup"> Покупатель</p>
                        <label for="elem-id">ID ответственного пользователя</label>
                        <p><input class="form-control" type="text" name="user-id" id="user-id" required></p>
                        <label for="date">Дата завершения</label>
                        <p><input class="form-control" type="datetime-local" name="date" id="date" required></p>
                        <label for="task-text">Текст задачи</label>
                        <p><input class="form-control" type="text" name="task-text" id="task-text" required></p>
                        <h3>Тип задачи</h3>
                        <p><input class="form-control" type="radio" name="task-choise" value="call"> Звонок</p>
                        <p><input class="form-control" type="radio" name="task-choise" value="meet"> Встреча</p>
                        <p><input class="form-control" type="radio" name="task-choise" value="letter"> Написать письмо</p>
                        <p><input class="btn btn-primary" name="submit" type="submit" value="Добавить Задачу"></p>
                    </div>
                </form>
            </div>

        </div>
    </div>

<?php include ROOT.'\views\layouts\footer.php';
