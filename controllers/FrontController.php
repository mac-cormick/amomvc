<?php

class FrontController
{
    public function actionAddcontacts()
    {
        if (isset($_POST['submit']))
        {
            $count = $_POST['contacts-count'];

            $errors = false;

            if (!Front::checkNumeric($count)) {
                $errors[] = 'Введите число!';
            }

            if ($errors == false) {
                $res = Front::addContacts($count);
                $answer = $count . ' Контактов, компаний, сделок, покупателей добавлено.';
            }

        }

        require_once(ROOT.'/views/site/front.php');

        return true;
    }

    public function actionAddmulti()
    {
        if (isset($_POST['submit']))
        {
            $name = strip_tags($_POST['multi-name']);
            $type = $_POST['choise'];
            function choise() {
                $type = $_POST['choise'];
                switch($type) {
                    case 'contact':
                        return 1;
                        break;
                    case 'sdelka':
                        return 2;
                        break;
                    case 'company':
                        return 3;
                        break;
                    case 'pokup':
                        return 12;
                }
            }
            $elemType = choise();
            $serviceId = md5(uniqid(rand(), true));

            $res = Front::addMulti($name, $elemType, $serviceId);
            $answer = 'Мультисписок добавлен!';

        }

        require_once(ROOT.'/views/site/addmulti.php');

        return true;
    }

    public function actionAddtextfield()
    {
        if (isset($_POST['submit']))
        {
            $name = strip_tags($_POST['doptext-name']);
            $mean = strip_tags($_POST['doptext-mean']);
            function choise() {
                $type = $_POST['choise'];
                switch($type) {
                    case 'contact':
                        return 1;
                        break;
                    case 'sdelka':
                        return 2;
                        break;
                    case 'company':
                        return 3;
                        break;
                    case 'pokup':
                        return 12;
                }
            }
            $elemType = choise();
            $serviceId = md5(uniqid(rand(), true));

            $res = Front::addTextfield($name, $mean, $elemType, $serviceId);
            $answer = 'Поле добавлено.';

        }

        require_once(ROOT.'/views/site/addtextfield.php');

        return true;
    }

    public function actionAddnote()
    {
        if (isset($_POST['submit']))
        {
            $elemId = strip_tags($_POST['elem-id']);
            $noteText = strip_tags($_POST['note-text']);
            function choise() {
                $type = $_POST['choise'];
                switch($type) {
                    case 'contact':
                        return 1;
                        break;
                    case 'sdelka':
                        return 2;
                        break;
                    case 'company':
                        return 3;
                        break;
                    case 'pokup':
                        return 12;
                }
            }
            function noteChoise() {
                $type = $_POST['note-choise'];
                switch($type) {
                    case 'simple-note':
                        return 4;
                        break;
                    case 'call-note':
                        return 10;
                }
            }
            $elemType = choise();
            $noteType = noteChoise();

            $res = Front::addNote($elemId, $noteText, $elemType, $noteType);
            $answer = 'Примечание добавлено.';

        }

        require_once(ROOT.'/views/site/addnote.php');

        return true;
    }

    public function actionFinishtask()
    {
        if (isset($_POST['submit']))
        {
            $taskId = strip_tags($_POST['task-id']);
            $taskText = strip_tags($_POST['task-text']);
            $updateDate = strtotime($_POST['date']);

            $res = Front::finishTask($taskId, $taskText, $updateDate);
            $answer = 'Задача завершена.';

        }

        require_once(ROOT.'/views/site/finishtask.php');

        return true;
    }

	public function actionFront()
	{
		require_once(ROOT.'/views/site/front.php');

		return true;
	}
}
