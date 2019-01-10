# php-archiver
## Описание:
Данная библиотека представляет собой обертку над библиотекой ZipArchive, позволяя архивировать папки с вложенными в нее подпапками и файлами.

## Использование:

### Инициализация
```php 
use Angryjack\Archiver;

require __DIR__ . '/vendor/autoload.php';

$a = new Archiver();
```

### Архивирование папки включая саму себя
```php 
$sourcePath = '/path/to/folder'; // путь к папке
$outZipPath = 'output/folder.zip'; // по какому пути будет находиться архив и его название
$a->makeArchive($sourcePath, $outZipPath)

```
