<!DOCTYPE html>
<html>
<head>
    <title>amoAPI</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="http://getbootstrap.com/examples/sticky-footer-navbar/sticky-footer-navbar.css">
    <link rel="stylesheet" href="/template/css/style.css">
</head>
<body>

    <header>

        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php if (!User::isGuest()): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Действия <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/front">Добавление контактов</a></li>
                                <li><a href="/addmulti">Добавление доп. поля типа мультиселект</a></li>
                                <li><a href="/addtextfield">Добавление доп. поля типа текст</a></li>
                                <li><a href="/addnote">Добавление примечания</a></li>
                                <li><a href="/addtask">Добавление задачи</a></li>
                                <li><a href="/finishtask">Завершение задачи</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (User::isGuest()): ?>
                            <li><a href="/">Вход</a></li>
                        <?php else: ?>
                            <li><a href="/logout">Выход</a></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
