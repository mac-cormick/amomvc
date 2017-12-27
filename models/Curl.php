<?php

class Curl {
    public static function getResult($data, $method) {
        $subdomain = $_SESSION['subdomain'];

        switch($method) {
            case 'addcontacts':
                $link = "https://".$subdomain.".amocrm.ru/api/v2/contacts";
                break;
            case 'addleads':
                $link = "https://".$subdomain.".amocrm.ru/api/v2/leads";
                break;
            case 'addcustomers':
                $link = "https://".$subdomain.".amocrm.ru/api/v2/customers";
                break;
            case 'addfields':
                $link = "https://".$subdomain.".amocrm.ru/api/v2/fields";
                break;
            case 'addnotes':
                $link = "https://".$subdomain.".amocrm.ru/api/v2/notes";
                break;
            case 'addtasks':
                $link = "https://".$subdomain.".amocrm.ru/api/v2/tasks";
        }

        $headers[] = "Accept: application/json";

        //Curl options
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-API-client-".$subdomain."/2.0");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__)."/cookie.txt");
        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__)."/cookie.txt");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
        $out = curl_exec($curl);
        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        /* Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
        $code=(int)$code;
        $errors=array(
            301=>'Moved permanently',
            400=>'Bad request',
            401=>'Unauthorized',
            403=>'Forbidden',
            404=>'Not found',
            500=>'Internal server error',
            502=>'Bad gateway',
            503=>'Service unavailable'
        );
        if($code==401) {
            header("Location: /");
        }
        try {
            #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
            if($code!=200 && $code!=204)
                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
        }
        catch(Exception $E) {
            die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
        }
        $result = json_decode($out,TRUE);
        return $result;
    }
}
