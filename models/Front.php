<?php
class Front {
    public static function addContacts($count) {
        // Добавление n контактов и компаний
        for ($i=0; $i<$count; $i++) {
            $name = md5(uniqid(rand(), true));
            $company = md5(uniqid(rand(), true));
            $array[] = array('name' => $name, 'company_name' => $company);
        }
        $data = array (
            'add' => $array
        );
        $result = Curl::getResult($data, 'addcontacts');

        // Создание массивов сделок и покупателей
        $contacts = $result['_embedded']['items'];
        foreach($contacts as $contact) {
            $contactId = $contact['id'];
            $leadName = md5(uniqid(rand(), true));
            $customName = md5(uniqid(rand(), true));
            $interval = mt_rand(time(),time() + 30*24*3600);
            $customDate = (string) $interval;
            $leads[] = array('name' => $leadName, 'contacts_id' => [$contactId]);
            $customs[] = array('name' => $customName, 'next_date' => $customDate, 'contacts_id' => [$contactId]);
        }
        // Добавление сделок
        $data = array (
            'add' => $leads
        );

        $result = Curl::getResult($data, 'addleads');

        // Добавление покупателей
        $data = array (
            'add' => $customs
        );

        $result = Curl::getResult($data, 'addcustomers');
    }

    public static function addMulti($name, $elemType, $serviceId) {
        $data = array (
            'add' =>
                array (
                    0 =>
                        array (
                            'name' => $name,
                            'type' => '5',
                            'element_type' => $elemType,
                            'origin' => $serviceId,
                            'enums' =>
                                array (
                                    0 => md5(uniqid(rand(), true)),
                                    1 => md5(uniqid(rand(), true)),
                                    2 => md5(uniqid(rand(), true)),
                                    3 => md5(uniqid(rand(), true)),
                                    4 => md5(uniqid(rand(), true)),
                                    5 => md5(uniqid(rand(), true)),
                                    6 => md5(uniqid(rand(), true)),
                                    7 => md5(uniqid(rand(), true)),
                                    8 => md5(uniqid(rand(), true)),
                                    9 => md5(uniqid(rand(), true))
                                ),
                        ),
                ),
        );

        $result = Curl::getResult($data, 'addfields');
    }

    public static function addTextfield($name, $mean, $elemType, $serviceId) {
        $data = array (
            'add' =>
                array (
                    0 =>
                        array (
                            'name' => $name,
                            'type' => '1',
                            'element_type' => $elemType,
                            'origin' => $serviceId,
                            'is_editable' => '1',
                            'enums' =>
                                array (
                                    0 => $mean,
                                ),
                        ),
                ),
        );

        $result = Curl::getResult($data, 'addfields');
    }
    public static function addNote($elemId, $noteText, $elemType, $noteType) {
        $data = array (
            'add' =>
                array (
                    0 =>
                        array (
                            'element_id' => $elemId,
                            'element_type' => $elemType,
                            'text' => $noteText,
                            'note_type' => $noteType,
                        ),
                ),
        );

        $result = Curl::getResult($data, 'addnotes');
    }

    public static function addTask($elemId, $elemType, $date, $type, $text, $userId) {
        $data = array (
            'add' =>
                array (
                    0 =>
                        array (
                            'element_id' => $elemId,
                            'element_type' => $elemType,
                            'complete_till' => $date,
                            'task_type' => $type,
                            'text' => $text,
                            'responsible_user_id' => $userId,
                        ),
                ),
        );
        $result = Curl::getResult($data, 'addtasks');
    }

    public static function finishTask($taskId, $taskText, $updateDate) {
        $data = array (
            'update' =>
                array (
                    0 =>
                        array (
                            'id' => $taskId,
                            'updated_at' => $updateDate,
                            'text' => $taskText,
                            'is_completed' => '1',
                        ),
                ),
        );

        $result = Curl::getResult($data, 'addtasks');
    }
    public static function checkInput($input) {
        if (strlen($input) >= 1) {
            return true;
        }
        return false;
    }
    public static function checkNumeric($input) {
        if (is_numeric($input)) {
            return true;
        }
        return false;
    }
}
