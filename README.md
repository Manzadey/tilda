# Tilda API Integration Package
Данный пакет предназначен для работы с [API интеграцией](https://help-ru.tilda.cc/api) [Tilda](https://tilda.cc/).

# Установка
```bash
composer require manzadey/tilda
```

# Как пользоваться

Для начала необходима создать экземпляр класса, с которым мы в дальнейшем будем взаимодействовать:
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');
````

В данном пакете реализованы все методы предоставленные [API интеграцией](https://help-ru.tilda.cc/api).

Все методы связанные с [API интеграцией](https://help-ru.tilda.cc/api) возвращают экземпляр класса **Response**, 
который имеет следующие методы:


```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$projects = $tilda->getProjectsList();

$projects->getData(); // Возвращает полный ответ сервера в формате array
$projects->getResult(); // Возвращает информацию полученную от сервера в формате array, если ошибка вернёт null
$projects->getStatus(); // Возвращает булево значение результата ответа
$projects->getErrorMessage() // Возвращает сообщение об ошибке, если нет возвращает null
```

## Список методов:

### Список проектов:
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$tilda->getProjectsList();
```
Ответ:
```php
^ Manzadey\Tilda\Response {#27 ▼
  -data: array:2 [▼
    "status" => "FOUND"
    "result" => array:1 [▼
      0 => array:3 [▼
        "id" => "12345677"
        "title" => "title"
        "descr" => ""
      ]
    ]
  ]
}
```

---

### Информация о проекте:
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$tilda->getProjectInfo(123456);
```

Ответ:
```php
^ Manzadey\Tilda\Response {#21 ▼
  -data: array:2 [▼
    "status" => "FOUND"
    "result" => array:6 [▼
      "id" => "3739512"
      "title" => "ibin24"
      "descr" => ""
      "customdomain" => "ibin24.store"
      "css" => array:11 [▶]
      "js" => array:15 [▶]
    ]
  ]
}
```

---

###  Информация о проекте для экспорта
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$tilda->getProjectExport(123456);
```

Ответ:
```php
^ Manzadey\Tilda\Response {#28 ▼
  -data: array:2 [▼
    "status" => "FOUND"
    "result" => array:14 [▼
      "id" => ""
      "title" => ""
      "descr" => ""
      "customdomain" => ""
      "export_csspath" => ""
      "export_jspath" => ""
      "export_imgpath" => ""
      "indexpageid" => ""
      "favicon" => ""
      "page404id" => "0"
      "images" => array:1 [▶]
      "htaccess" => ""
      "css" => array:11 [▶]
      "js" => array:15 [▶]
    ]
  ]
}
```

---

###  Список страниц в проекте
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$tilda->getPageList(123456);
```

Ответ:
```php
^ Manzadey\Tilda\Response {#19 ▼
  -data: array:2 [▼
    "status" => "FOUND"
    "result" => array:13 [▼
      0 => array:11 [▼
        "id" => ""
        "projectid" => ""
        "title" => ""
        "descr" => ""
        "img" => ""
        "featureimg" => ""
        "alias" => ""
        "date" => ""
        "sort" => ""
        "published" => ""
        "filename" => ""
      ]
      1 => array:11 [▶]
      2 => array:11 [▶]
      3 => array:11 [▶]
      4 => array:11 [▶]
      5 => array:11 [▶]
      6 => array:11 [▶]
      7 => array:11 [▶]
      8 => array:11 [▶]
      9 => array:11 [▶]
      10 => array:11 [▶]
      11 => array:11 [▶]
      12 => array:11 [▶]
    ]
  ]
}

```

---

### Информация о странице (+ body html-code)

```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$tilda->getPageInfo(789);
```

Ответ:
```php
^ Manzadey\Tilda\Response {#33 ▼
  -data: array:2 [▼
    "status" => "FOUND"
    "result" => array:12 [▼
      "id" => ""
      "projectid" => ""
      "title" => ""
      "descr" => ""
      "img" => ""
      "featureimg" => ""
      "alias" => ""
      "date" => ""
      "sort" => ""
      "published" => ""
      "filename" => ""
      "html" => ""
    ]
  ]
}
```

---

###  Информация о странице (+ fullpage html-code)
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$tilda->getPageFull(789);
```

Ответ:
```php
^ Manzadey\Tilda\Response {#34 ▼
  -data: array:2 [▼
    "status" => "FOUND"
    "result" => array:22 [▼
      "id" => ""
      "projectid" => ""
      "title" => ""
      "descr" => ""
      "img" => ""
      "featureimg" => ""
      "alias" => ""
      "date" => ""
      "sort" => ""
      "published" => ""
      "filename" => ""
      "export_jspath" => ""
      "export_csspath" => ""
      "export_imgpath" => ""
      "export_basepath" => ""
      "project_alias" => ""
      "page_alias" => ""
      "project_domain" => ""
      "html" => ""
      "images" => array:63 [▶]
      "js" => array:15 [▶]
      "css" => array:11 [▶]
    ]
  ]
}
```

--- 

### Информация о странице для экспорта (+ body html-code)
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$tilda->getPageExport(789);
```

Ответ:
```php
^ Manzadey\Tilda\Response {#18 ▼
  -data: array:2 [▼
    "status" => "FOUND"
    "result" => array:22 [▼
      "id" => ""
      "projectid" => ""
      "title" => ""
      "descr" => ""
      "img" => ""
      "featureimg" => ""
      "alias" => ""
      "date" => ""
      "sort" => ""
      "published" => ""
      "filename" => ""
      "export_jspath" => ""
      "export_csspath" => ""
      "export_imgpath" => ""
      "export_basepath" => ""
      "project_alias" => ""
      "page_alias" => ""
      "project_domain" => ""
      "html" => ""
      "images" => array:63 [▶]
      "js" => array:15 [▶]
      "css" => array:11 [▶]
    ]
  ]
}
```

--- 

### Информация о странице для экспорта (+ fullpage html-code)
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

$tilda->getPageFullExport(789);
```

Ответ:
```php
^ Manzadey\Tilda\Response {#35 ▼
  -data: array:2 [▼
    "status" => "FOUND"
    "result" => array:22 [▼
      "id" => ""
      "projectid" => ""
      "title" => ""
      "descr" => ""
      "img" => ""
      "featureimg" => ""
      "alias" => ""
      "date" => ""
      "sort" => ""
      "published" => ""
      "filename" => ""
      "export_jspath" => ""
      "export_csspath" => ""
      "export_imgpath" => ""
      "export_basepath" => ""
      "project_alias" => ""
      "page_alias" => ""
      "project_domain" => ""
      "html" => ""
      "images" => array:63 [▶]
      "js" => array:15 [▶]
      "css" => array:11 [▶]
    ]
  ]
}
```

---

## Дополнительно
Имеются два метода для сущностей "Проект" и "Страница":
```php
use Manzadey\Tilda\Client;

$tilda = new Client('publicKey', 'secretKey');

// Project Entity:
$tilda->getProject(123456)->info(); // $tilda->getProjectInfo(123456)
$tilda->getProject(123456)->export(); // $tilda->getProjectExport(123456)
$tilda->getProject(123456)->pages(); // $tilda->getPageList(123456)

// Page Entity:
$tilda->getPage(789)->info(); // $tilda->getPage(789)
$tilda->getPage(789)->fullInfo(); // $tilda->getPageFull(789)
$tilda->getPage(789)->export(); // $tilda->getPageExport(789)
$tilda->getPage(789)->fullExport(); // $tilda->getPageFullExport(789)
```