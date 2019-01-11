# php-archiver
## Описание:
Данная библиотека представляет собой обертку над библиотекой ZipArchive, позволяя архивировать папки с вложенными в нее подпапками и файлами.

## Использование:

### Инициализация
```php 
use Angryjack\Archiver\Archiver;

require __DIR__ . '/vendor/autoload.php';

$a = new Archiver();
```

### Архивирование файла или папки (включая саму себя)
```php 
$sourcePath = '/path/to/folder'; // путь к архивируемой папке или файлу
$outZipPath = 'output/folder.zip'; // название архива и его расположение после создания (папка должна существовать)
$a->makeArchive($sourcePath, $outZipPath)

```
