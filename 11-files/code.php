<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Файловая система</h3>
    
    <?
        // Чтение
        // $text = file_get_contents('test.txt');
        // echo $text;

        // Запись
        // file_put_contents('test.txt', $text . '!');

        echo $_SERVER['DOCUMENT_ROOT'] . "<br>";
        echo __DIR__ . "<br>";
        echo __FILE__ . "<br>";
        $root = $_SERVER['DOCUMENT_ROOT'];
        $text = file_get_contents($root . "/11-files/test.txt");

        // Переименовывание или перемещение файла
        // rename($root . "/11-files/new.txt", 'test.txt');
        // rename('test.txt', 'dir/test.txt');

        // Копирование файла
        // copy('test.txt', 'copy.txt');
        // copy('test.txt', 'dir/copy.txt');

        // Удаление файла
        // unlink('test.txt');

        echo $text;
    ?>

    <p>Размер файла</p>
    <?
        // Функция filesize позволяет находить размеры файла в байтах. Пример:
        echo filesize('test.txt') . "<br>";

        // Размер в байтах легко можно перевести в килобайты:
        echo filesize('test.txt') / 1024 . "<br>";

        // А теперь давайте переведем в мегабайты:
        echo filesize('test.txt') / (1024 * 1024) . "<br>";
    ?>

    <p>Проверка существования</p>
    <?
        // Функция file_exists проверяет существует ли файл, путь к которому передан параметром. Пример:
        // Как правило, эта функция используется для того, чтобы проверить наличие файла перед выполнением операции над ним. Например, так:
        if (file_exists('test.txt')) {
            echo filesize('test.txt');
        } else {
            echo 'файла не существует';
        }
    ?>

    <p>Операции над папками в PHP</p>
    <?
        // Функция mkdir позволяет создать папку. Параметром принимает путь к папке. Пример:
        // mkdir('dir');

        // Функция rmdir используется для удаления папок. Пример:
        // rmdir('dir');

        // Функция rename, которую вы уже знаете, может использоваться не только для работы с файлами, но и для папок.
        // rename('old', 'new');
        // А теперь выполним перемещение папки, одновременно переименовав ее:
        // rename('old', 'dir/new');
    ?>

    <p>Чтение содержимого папки в PHP</p>
    <?
        $files = scandir('dir');
        $files = array_diff($files, ['..', '.']);
        foreach($files as $file) {
            $text = file_get_contents($root . "/11-files/dir/" . $file);
            echo $file . "<br>";
            echo htmlspecialchars($text) . "<hr>";
        }
        // echo "<pre>";
        // var_dump($files);
        // echo "</pre>";
    ?>

    <p>Отличаем папку от файла в PHP</p>
    <?
        // С помощью специальных функций is_file и is_dir мы можем отличить, ссылается путь на файл или на папку.
        // $path = 'некий путь';
	
        // var_dump(is_file($path)); // true для файла, false для папки
        // var_dump(is_dir($path));  // true для папки, false для файла
    ?>

    <?
        $dir = 'dir';
        $files = array_diff(scandir($dir), ['..', '.']);
        
        foreach ($files as $file) {
            $path = $dir. '/' . $file; // путь к файлу
            if (is_file($path)) {
                echo htmlspecialchars(file_get_contents($path)) . "<br>";
            }
            // echo $file . "<br>";
            // var_dump(is_file($dir. '/' . $file));
        }
    ?>

</body>
</html>