# task_job1_php

##Решение

запуск сервера `php -S localhost`

-Выбираем namspace нашего приложения App
-создаём мимнимальную структуру каталога
-Каждый файл свой клас согласно PSR-4
-точка входа `index.php`
-содержит роутер
-функция получения значения валют из внешнего источника не реализована

##Задача

На странице просмотра объявления
необходимо вывести

	название объявления,
	текст и его
	стоимость
		Стоимость объявления хранится в долларах, выводить надо в рублях по системному курсу.
		1$ - 65рублей.


Есть 2 источника данных:

1.

MySQL::getAdRecord(int ID) {
    return array(
        't_id'       => ID,
        't_name'     => 'AdName_FromMySQL',
        't_text'     => 'AdText_FromMySQL',
        't_keywords' => 'Some Keywords',
        't_price'    => 10,
    );
}

2.
Daemon::getAdInfoById(int ID) {
    return "ID\t235678\t12348\tAdName_FromDaemon\tAdText_FromDaemon\t20";
}

Колонки:
    1. id - объявления
    2. id - кампании
    3. id - пользователя
    4. название объявления
    5. текст объявления
    6. стоимость объявления

В зависимости от строки запроса надо выводить следующий результат:
для запроса /?id=1&from=Mysql

    <h1>AdName_FromMySQL</h1>
    <p>AdText_FromMySQL</p>
    <p>стоимость: Х руб</p>

для запроса /?id=1&from=Daemon

    <h1>AdName_FromDaemon</h1>
    <p>AdText_FromDaemon</p>
    <p>стоимость: Х руб</p>


Если в запрос добавить дополнительный параметр log, например:
/?id=1&from=Mysql&log=1

тогда дополнительно надо зафиксировать произведенную операцию в лог-файле.
Надо сохранить время запроса,
название источника данных и
ID объявления.
Например:
"[time] MySQL::getAdRecord(ID=1)"


Это абстрактная и упрощенная задача.
Чтобы быстро получить необходимый результат достаточно написать пол-страницы примитивного кода.
Возможно, в реальных условиях, так действительно стоит поступить.
Но, представим, что все намного сложнее, и этот
!код надо будет дальше поддерживать и развивать.

В рамках задачи не надо прикручивать MVC,
достаточно только реализовать логику работы с данными.
