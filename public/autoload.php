<?php
/**
 * Соответствует PSR-4
 * @param string $class абсолютное имя класса.
 * @return void
 */
spl_autoload_register(function ($class) {

    // префикс пространства имён проекта
    $prefix = 'application\\';

    // базовая директория для этого префикса
    $base_dir = APP_DIR;

    // класс использует префикс?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // нет. Пусть попытается другой автозагрузчик
        return;
    }

    // получаем относительное имя класса
    $relative_class = substr($class, $len);

    // заменяем префикс базовой директорией, заменяем разделители пространства имён
    // на разделители директорий в относительном имени класса, добавляем .php
    $file = $base_dir . DIRECTORY_SEPARATOR . str_replace('\\', '/', $relative_class) . '.php';

    // если файл существует, подключаем его
    if (file_exists($file)) {
        require $file;
    }
});