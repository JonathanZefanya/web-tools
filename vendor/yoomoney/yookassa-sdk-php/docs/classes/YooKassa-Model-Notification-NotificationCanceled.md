# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Model\Notification\NotificationCanceled
### Namespace: [\YooKassa\Model\Notification](../namespaces/yookassa-model-notification.md)
---
**Summary:**

Класс объекта, присылаемого API при изменении статуса платежа на "canceled"


---
### Examples
Пример скрипта обработки уведомления

```php
require_once '../vendor/autoload.php';

try {
    $source = file_get_contents('php://input');
    $data = json_decode($source, true);

    $factory = new \YooKassa\Model\Notification\NotificationFactory();
    $notificationObject = $factory->factory($data);
    $responseObject = $notificationObject->getObject();

    $client = new \YooKassa\Client();

    if (!$client->isNotificationIPTrusted($_SERVER['REMOTE_ADDR'])) {
        header('HTTP/1.1 400 Something went wrong');
        exit();
    }

    if ($notificationObject->getEvent() === \YooKassa\Model\NotificationEventType::PAYMENT_SUCCEEDED) {
        $someData = array(
            'paymentId' => $responseObject->getId(),
            'paymentStatus' => $responseObject->getStatus(),
        );
        // Специфичная логика
        // ...
    } elseif ($notificationObject->getEvent() === \YooKassa\Model\NotificationEventType::PAYMENT_WAITING_FOR_CAPTURE) {
        $someData = array(
            'paymentId' => $responseObject->getId(),
            'paymentStatus' => $responseObject->getStatus(),
        );
        // Специфичная логика
        // ...
    } elseif ($notificationObject->getEvent() === \YooKassa\Model\NotificationEventType::PAYMENT_CANCELED) {
        $someData = array(
            'paymentId' => $responseObject->getId(),
            'paymentStatus' => $responseObject->getStatus(),
        );
        // Специфичная логика
        // ...
    } elseif ($notificationObject->getEvent() === \YooKassa\Model\NotificationEventType::REFUND_SUCCEEDED) {
        $someData = array(
            'refundId' => $responseObject->getId(),
            'refundStatus' => $responseObject->getStatus(),
            'paymentId' => $responseObject->getPaymentId(),
        );
        // ...
        // Специфичная логика
    } else {
        header('HTTP/1.1 400 Something went wrong');
        exit();
    }

    // Специфичная логика
    // ...

    $client->setAuth('xxxxxx', 'test_XXXXXXX');

    // Получим актуальную информацию о платеже
    if ($paymentInfo = $client->getPaymentInfo($someData['paymentId'])) {
        $paymentStatus = $paymentInfo->getStatus();
        // Специфичная логика
        // ...
    } else {
        header('HTTP/1.1 400 Something went wrong');
        exit();
    }
} catch (Exception $e) {
    header('HTTP/1.1 400 Something went wrong');
    exit();
}

```

---
### Constants
* No constants found

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [$event](../classes/YooKassa-Model-Notification-AbstractNotification.md#property_event) |  | Тип события |
| public | [$object](../classes/YooKassa-Model-Notification-NotificationCanceled.md#property_object) |  | Объект с информацией о платеже |
| public | [$type](../classes/YooKassa-Model-Notification-AbstractNotification.md#property_type) |  | Тип уведомления в виде строки |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [__construct()](../classes/YooKassa-Common-AbstractObject.md#method___construct) |  | AbstractObject constructor. |
| public | [__get()](../classes/YooKassa-Common-AbstractObject.md#method___get) |  | Возвращает значение свойства |
| public | [__isset()](../classes/YooKassa-Common-AbstractObject.md#method___isset) |  | Проверяет наличие свойства |
| public | [__set()](../classes/YooKassa-Common-AbstractObject.md#method___set) |  | Устанавливает значение свойства |
| public | [__unset()](../classes/YooKassa-Common-AbstractObject.md#method___unset) |  | Удаляет свойство |
| public | [fromArray()](../classes/YooKassa-Model-Notification-NotificationCanceled.md#method_fromArray) |  | Конструктор объекта нотификации о возможности подтверждения платежа |
| public | [getEvent()](../classes/YooKassa-Model-Notification-AbstractNotification.md#method_getEvent) |  | Возвращает тип события |
| public | [getObject()](../classes/YooKassa-Model-Notification-NotificationCanceled.md#method_getObject) |  | Возвращает объект с информацией о платеже, уведомление о котором хранится в текущем объекте |
| public | [getType()](../classes/YooKassa-Model-Notification-AbstractNotification.md#method_getType) |  | Возвращает тип уведомления |
| public | [jsonSerialize()](../classes/YooKassa-Common-AbstractObject.md#method_jsonSerialize) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации |
| public | [offsetExists()](../classes/YooKassa-Common-AbstractObject.md#method_offsetExists) |  | Проверяет наличие свойства |
| public | [offsetGet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetGet) |  | Возвращает значение свойства |
| public | [offsetSet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetSet) |  | Устанавливает значение свойства |
| public | [offsetUnset()](../classes/YooKassa-Common-AbstractObject.md#method_offsetUnset) |  | Удаляет свойство |
| public | [toArray()](../classes/YooKassa-Common-AbstractObject.md#method_toArray) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации Является алиасом метода AbstractObject::jsonSerialize() |
| protected | [getUnknownProperties()](../classes/YooKassa-Common-AbstractObject.md#method_getUnknownProperties) |  | Возвращает массив свойств которые не существуют, но были заданы у объекта |
| protected | [setEvent()](../classes/YooKassa-Model-Notification-AbstractNotification.md#method_setEvent) |  | Устанавливает тип события |
| protected | [setType()](../classes/YooKassa-Model-Notification-AbstractNotification.md#method_setType) |  | Устанавливает тип уведомления |

---
### Details
* File: [lib/Model/Notification/NotificationCanceled.php](../../lib/Model/Notification/NotificationCanceled.php)
* Package: YooKassa
* Class Hierarchy:  
  * [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)
  * [\YooKassa\Model\Notification\AbstractNotification](../classes/YooKassa-Model-Notification-AbstractNotification.md)
  * \YooKassa\Model\Notification\NotificationCanceled

---
## Properties
<a name="property_event"></a>
#### public $event : string
---
***Description***

Тип события

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Model\Notification\AbstractNotification](../classes/YooKassa-Model-Notification-AbstractNotification.md)


<a name="property_object"></a>
#### public $object : \YooKassa\Model\PaymentInterface
---
***Description***

Объект с информацией о платеже

**Type:** <a href="../classes/YooKassa-Model-PaymentInterface.html"><abbr title="\YooKassa\Model\PaymentInterface">PaymentInterface</abbr></a>

**Details:**


<a name="property_type"></a>
#### public $type : string
---
***Description***

Тип уведомления в виде строки

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Model\Notification\AbstractNotification](../classes/YooKassa-Model-Notification-AbstractNotification.md)



---
## Methods
<a name="method___construct" class="anchor"></a>
#### public __construct() : mixed

```php
public __construct(array $data = array()) : mixed
```

**Summary**

AbstractObject constructor.

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">array</code> | data  |  |

**Returns:** mixed - 


<a name="method___get" class="anchor"></a>
#### public __get() : mixed

```php
public __get(string $propertyName) : mixed
```

**Summary**

Возвращает значение свойства

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | propertyName  | Имя свойства |

**Returns:** mixed - Значение свойства


<a name="method___isset" class="anchor"></a>
#### public __isset() : bool

```php
public __isset(string $propertyName) : bool
```

**Summary**

Проверяет наличие свойства

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | propertyName  | Имя проверяемого свойства |

**Returns:** bool - True если свойство имеется, false если нет


<a name="method___set" class="anchor"></a>
#### public __set() : mixed

```php
public __set(string $propertyName, mixed $value) : mixed
```

**Summary**

Устанавливает значение свойства

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | propertyName  | Имя свойства |
| <code lang="php">mixed</code> | value  | Значение свойства |

**Returns:** mixed - 


<a name="method___unset" class="anchor"></a>
#### public __unset() : mixed

```php
public __unset(string $propertyName) : mixed
```

**Summary**

Удаляет свойство

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | propertyName  | Имя удаляемого свойства |

**Returns:** mixed - 


<a name="method_fromArray" class="anchor"></a>
#### public fromArray() : mixed

```php
public fromArray(array $sourceArray) : mixed
```

**Summary**

Конструктор объекта нотификации о возможности подтверждения платежа

**Description**

Инициализирует текущий объект из ассоциативного массива, который просто путём JSON десериализации получен из
тела пришедшего запроса. При конструировании проверяется валидность типа передаваемого уведомления, если
передать уведомление не того типа, будет сгенерировано исключение типа {@link}

**Details:**
* Inherited From: [\YooKassa\Model\Notification\NotificationCanceled](../classes/YooKassa-Model-Notification-NotificationCanceled.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">array</code> | sourceArray  | Ассоциативный массив с информацией об уведомлении |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueException | Генерируется если значение типа нотификации или события не равны "notification" и "payment.canceled" соответственно, что может говорить о том, что переданные в конструктор данные не являются уведомлением нужного типа. |

**Returns:** mixed - 


<a name="method_getEvent" class="anchor"></a>
#### public getEvent() : string

```php
public getEvent() : string
```

**Summary**

Возвращает тип события

**Description**

Тип события - одна из констант, указанных в перечислении {@link}.

**Details:**
* Inherited From: [\YooKassa\Model\Notification\AbstractNotification](../classes/YooKassa-Model-Notification-AbstractNotification.md)

**Returns:** string - Тип события


<a name="method_getObject" class="anchor"></a>
#### public getObject() : \YooKassa\Model\PaymentInterface

```php
public getObject() : \YooKassa\Model\PaymentInterface
```

**Summary**

Возвращает объект с информацией о платеже, уведомление о котором хранится в текущем объекте

**Description**

Так как нотификация может быть сгенерирована и поставлена в очередь на отправку гораздо раньше, чем она будет
получена на сайте, то опираться на статус пришедшего платежа не стоит, лучше запросить текущую информацию о
платеже у API.

**Details:**
* Inherited From: [\YooKassa\Model\Notification\NotificationCanceled](../classes/YooKassa-Model-Notification-NotificationCanceled.md)

**Returns:** \YooKassa\Model\PaymentInterface - Объект с информацией о платеже


<a name="method_getType" class="anchor"></a>
#### public getType() : string

```php
public getType() : string
```

**Summary**

Возвращает тип уведомления

**Description**

Тип уведомления - одна из констант, указанных в перечислении {@link}.

**Details:**
* Inherited From: [\YooKassa\Model\Notification\AbstractNotification](../classes/YooKassa-Model-Notification-AbstractNotification.md)

**Returns:** string - Тип уведомления в виде строки


<a name="method_jsonSerialize" class="anchor"></a>
#### public jsonSerialize() : array

```php
public jsonSerialize() : array
```

**Summary**

Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

**Returns:** array - Ассоциативный массив со свойствами текущего объекта


<a name="method_offsetExists" class="anchor"></a>
#### public offsetExists() : bool

```php
public offsetExists(string $offset) : bool
```

**Summary**

Проверяет наличие свойства

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | offset  | Имя проверяемого свойства |

**Returns:** bool - True если свойство имеется, false если нет


<a name="method_offsetGet" class="anchor"></a>
#### public offsetGet() : mixed

```php
public offsetGet(string $offset) : mixed
```

**Summary**

Возвращает значение свойства

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | offset  | Имя свойства |

**Returns:** mixed - Значение свойства


<a name="method_offsetSet" class="anchor"></a>
#### public offsetSet() : void

```php
public offsetSet(string $offset, mixed $value) : void
```

**Summary**

Устанавливает значение свойства

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | offset  | Имя свойства |
| <code lang="php">mixed</code> | value  | Значение свойства |

**Returns:** void - 


<a name="method_offsetUnset" class="anchor"></a>
#### public offsetUnset() : void

```php
public offsetUnset(string $offset) : void
```

**Summary**

Удаляет свойство

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | offset  | Имя удаляемого свойства |

**Returns:** void - 


<a name="method_toArray" class="anchor"></a>
#### public toArray() : array

```php
public toArray() : array
```

**Summary**

Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации
Является алиасом метода AbstractObject::jsonSerialize()

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

**Returns:** array - Ассоциативный массив со свойствами текущего объекта


<a name="method_getUnknownProperties" class="anchor"></a>
#### protected getUnknownProperties() : array

```php
protected getUnknownProperties() : array
```

**Summary**

Возвращает массив свойств которые не существуют, но были заданы у объекта

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

**Returns:** array - Ассоциативный массив с не существующими у текущего объекта свойствами


<a name="method_setEvent" class="anchor"></a>
#### protected setEvent() : mixed

```php
protected setEvent(string $value) : mixed
```

**Summary**

Устанавливает тип события

**Details:**
* Inherited From: [\YooKassa\Model\Notification\AbstractNotification](../classes/YooKassa-Model-Notification-AbstractNotification.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Тип события |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\EmptyPropertyValueException | Выбрасывается если в качестве значения было передано пустое значение |
| \YooKassa\Common\Exceptions\InvalidPropertyValueException | Выбрасывается если переданное значение не найдено в перечислении типов событий |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданное значение не является строкой |

**Returns:** mixed - 


<a name="method_setType" class="anchor"></a>
#### protected setType() : mixed

```php
protected setType(string $value) : mixed
```

**Summary**

Устанавливает тип уведомления

**Details:**
* Inherited From: [\YooKassa\Model\Notification\AbstractNotification](../classes/YooKassa-Model-Notification-AbstractNotification.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Тип уведомления |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\EmptyPropertyValueException | Выбрасывается если в качестве значения было передано пустое значение |
| \YooKassa\Common\Exceptions\InvalidPropertyValueException | Выбрасывается если переданное значение не найдено в перечислении типов нотификаций |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданное значение не является строкой |

**Returns:** mixed - 



---

### Top Namespaces

* [\YooKassa](../namespaces/yookassa.md)

---

### Reports
* [Errors - 0](../reports/errors.md)
* [Markers - 1](../reports/markers.md)
* [Deprecated - 43](../reports/deprecated.md)

---

This document was automatically generated from source code comments on 2025-07-15 using [phpDocumentor](http://www.phpdoc.org/)

&copy; 2025 YooMoney