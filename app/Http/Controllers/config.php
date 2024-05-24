<?php
	define("HTTPS_LOGIN", ""); //Ваш логин для HTTPS-протокола
	define("HTTPS_PASSWORD", ""); //Ваш пароль для HTTPS-протокола
	define("HTTPS_ADDRESS", "http://lcab.smsprofi.ru/"); //HTTPS-Адрес, к которому будут обращаться скрипты. Со слэшем на конце.
    define("HTTP_ADDRESS", "http://lcab.smsprofi.ru/"); //HTTP-Адрес, к которому будут обращаться скрипты. Со слэшем на конце.
	define("HTTPS_CHARSET", "utf-8"); //кодировка ваших скриптов. cp1251 - для Windows-1251, либо же utf-8 для, сообственно - utf-8 :)
	define("HTTPS_METHOD", "curl"); //метод, которым отправляется запрос (curl)
    define("USE_HTTPS", 0); //1 - использовать HTTPS-адрес, 0 - HTTP