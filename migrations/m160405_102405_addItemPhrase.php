<?php

use yii\db\Migration;

class m160405_102405_addItemPhrase extends Migration
{
    private $tableName = 'Phrase';
    private $phrases = [
        ['phrase' => 'Будь мужиком, купи слона!'],
        ['phrase' => 'Не будь размазней, купи слона!', 'priority' => 10],
        ['phrase' => 'Все не могут, а ты купи слона', 'priority' => 1],
        ['phrase' => 'Всем его нечем кормить, а ты купи слона', 'priority' => 1],
        ['phrase' => 'Плачь, но купи слона', 'priority' => 2],
        ['phrase' => 'Купи слона на День Рожденья'],
        ['phrase' => 'Купи слона перед Новым Годом', 'priority' => 3],
        ['phrase' => 'Денег нет, а ты купи слона!', 'priority' => 4],
        ['phrase' => 'Купи серого слона с носом мясистым и большими ушами', 'priority' => 3],
        ['phrase' => 'Рыжий, купи слона'],
        ['phrase' => 'ЭЭээ! чувак ты тут?? Купи слона!', 'priority' => 0],
        ['phrase' => 'Да ты уже всем надоел! Купи слона!'],
        ['phrase' => 'Все сходят с ума, а ты купи слона'],
        ['phrase' => 'У всех кризис, а ты купи слона'],
        ['phrase' => 'У всех есть домашние животные, а ты купи слона', 'priority' => 6],
        ['phrase' => 'Нечего ныть! Купи слона!'],
        ['phrase' => 'Вокруг одни идиоты, а ты купи слона!'],
        ['phrase' => 'Не сходи с ума! Купи слона!', 'priority' => 10],
        ['phrase' => 'Совсем охренел! Купи слона!', 'priority' => 1],
        ['phrase' => 'Тряпка!? Купи слона!', 'priority' => 4],
        ['phrase' => 'Он у меня совсем маленький. Купи слона!', 'priority' => 4],
        ['phrase' => 'Не будь жадиной, купи слона!'],
        ['phrase' => 'Не обижайся, купи слона!'],
        ['phrase' => 'Сойди с ума и купи слона'],
        ['phrase' => 'Всем нравятся простые вещи, а ты купи слона'],
        ['phrase' => 'Ну и что, что большой, зато добрый! Купи слона!', 'priority' => 10],
        ['phrase' => 'Купи самого лучшего в мире слона!'],
        ['phrase' => 'Сохрани редкую популяцию! Купи слона!'],
        ['phrase' => 'И нечего ноздри раздувать! Купи слона!'],
        ['phrase' => 'Купи слона, умоляю...'],
        ['phrase' => 'Жопошник, купи слона!', 'priority' => 4],
        ['phrase' => 'Просто никогда не бывает. Купи слона!'],
        ['phrase' => 'Все задолбали, а ты купи слона!'],
        ['phrase' => 'Жизнь говно, а ты купи слона!'],
        ['phrase' => 'Не будь придурком, купи слона!'],
        ['phrase' => 'Фантастическое предложение – купи слона!'],
        ['phrase' => 'Подумай немного и купи слона!'],
        ['phrase' => 'Порадуй соседа, купи слона!'],
        ['phrase' => 'Сдавайся! Купи слона!'],
        ['phrase' => 'Все равно достану! Купи слона!'],
        ['phrase' => 'Не задумывайся! Покупай слона!', 'priority' => 10],
        ['phrase' => 'Все говорят глупости! Купи слона!'],
        ['phrase' => 'Ты еще не ушел? Купи слона!'],
        ['phrase' => 'Все думают, а ты купи слона!'],
        ['phrase' => 'Зря лезешь драться, просто купи слона!'],
        ['phrase' => 'Ни какой это не детский сад! Купи слона!'],
        ['phrase' => 'Не будь бякой! Купи слона!'],
        ['phrase' => 'Жизнь не удалась! Купи слона!'],
        ['phrase' => 'Ищешь  подарок? -  купи слона!'],
        ['phrase' => 'О чем разговор, брат?! Купи слона!', 'priority' => 10],
        ['phrase' => 'Всем надоело! А ты купи слона!'],
        ['phrase' => 'Никому не нужно! А ты купи слона!'],
        ['phrase' => 'Не мели чушь чувак, купи слона!', 'priority' => 2],
        ['phrase' => 'Не будь маразматиком! Купи слона!'],
        ['phrase' => 'Скучаешь? Купи слона!'],
        ['phrase' => 'Не завидуй! Просто купи слона!'],
        ['phrase' => 'Не ссы! Купи слона!'],
        ['phrase' => 'Не падай в обморок! Купи слона!'],
        ['phrase' => 'Порадуй себя напоследок! Купи слона!'],
        ['phrase' => 'Странный ты какой-то! Купи слона!', 'priority' => 4],
        ['phrase' => 'Не будь тряпкой! Купи слона!'],
        ['phrase' => 'Никому не нужно, а ты купи слона!'],
        ['phrase' => 'Все очень просто даже так, купи слона за четвертак!'],
        ['phrase' => 'Купи слона! Почувствуй экзотику!'],
        ['phrase' => 'Не глупи! Купи слона!'],
        ['phrase' => 'Все со странностями, а ты купи слона!'],
        ['phrase' => 'Купи слона! Большой и со справкой!'],
        ['phrase' => 'Купи слона! Хороший слон!'],
        ['phrase' => 'Купи слона! Он скучает без тебя!', 'priority' => 10],
        ['phrase' => 'Не пропусти! Акция! Купи слона! 1 + 1 = 3', 'priority' => 10],
        ['phrase' => 'Везде зима, а ты купи слона!'],
        ['phrase' => 'Купи слона!'],
        ['phrase' => 'Не пробуй даже улизнуть! Купи слона!'],
        ['phrase' => 'Достану везде! Купи слона!'],
        ['phrase' => 'Не пожалеешь! Купи слона!'],
        ['phrase' => 'Глупо упустить отличный шанс! Купи слона!'],
        ['phrase' => 'Купи слона, блеаать!!'],
        ['phrase' => 'Что бы ты не делал! Купи слона!'],
        ['phrase' => 'Все концы с концами сводят, а ты купи слона!'],
        ['phrase' => 'Зачем тебе кот?! Купи слона!'],
        ['phrase' => 'Хочешь большого и светлого?! Купи слона!'],
        ['phrase' => 'Не знаешь что ответить? Купи слона!', 'priority' => 4],
        ['phrase' => 'Купи слона! Все умрут от зависти!', 'priority' => 10],
        ['phrase' => 'Перестань канючить! Купи слона!'],
        ['phrase' => 'Не знаешь с чего начать? Купи слона!', 'priority' => 10],
        ['phrase' => 'Отличный слон! Совсем не дорого! Купи слона!', 'priority' => 10],
        ['phrase' => 'Только сегодня и только сейчас! Купи слона!'],
        ['phrase' => 'Харош вредничать! Купи слона!', 'priority' => 10],
        ['phrase' => 'Не будь нытиком! Купи слона!'],
        ['phrase' => 'Купи слона! Удиви родных!', 'priority' => 10],
        ['phrase' => 'Закрой рот и купи слона!'],
        ['phrase' => 'И нечего тут гавкать! Купи слона!'],
        ['phrase' => 'Купи слона! Домашний, ласковый!', 'priority' => 10],
        ['phrase' => 'Купи слона! Получи воздушный шарик в подарок!', 'priority' => 10],
        ['phrase' => 'Нет счастья в личной жизни? Купи слона!', 'priority' => 10],
        ['phrase' => 'Задолбался? Купи слона!', 'priority' => 10],
        ['phrase' => 'Ничему тебя жизнь не учит! Купи слона!'],
        ['phrase' => 'Не парься! Купи слона!', 'priority' => 10],
        ['phrase' => 'Всех тошнит, а ты купи слона!'],
        ['phrase' => 'Не слушай никого! Купи слона!'],
        ['phrase' => 'Всем страшно, а ты купи слона!'],
        ['phrase' => 'Не знаешь чем заняться? Купи слона!'],
        ['phrase' => 'Это не угрозы! Купи слона!'],
        ['phrase' => 'Зачем тебе новый дом? Лучший подарок - это слон! Купи слона!', 'priority' => 10],
        ['phrase' => 'Тебе скучно, грустно и не с кем поговорить? Купи слона!', 'priority' => 10],
        ['phrase' => 'Не будь унылым говном! Купи слона!', 'priority' => 4],
        ['phrase' => 'Закончились идеи? Купи слона!', 'priority' => 10],
    ];

    public function up()
    {
        foreach ($this->phrases as $cur) {
            $data = ['phrase' => $cur['phrase']];
            if (isset($cur['priority'])) {
                $data['priority'] = $cur['priority'];
            }

            $this->insert($this->tableName, $data);
        }
    }

    public function down()
    {
        $this->truncateTable($this->tableName);
    }
}