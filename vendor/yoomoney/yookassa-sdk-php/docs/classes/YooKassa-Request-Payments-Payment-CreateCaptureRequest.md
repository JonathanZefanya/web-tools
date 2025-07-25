# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Request\Payments\Payment\CreateCaptureRequest
### Namespace: [\YooKassa\Request\Payments\Payment](../namespaces/yookassa-request-payments-payment.md)
---
**Summary:**

Класс объекта запроса к API на подтверждение оплаты


---
### Constants
* No constants found

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [$airline](../classes/YooKassa-Common-AbstractPaymentRequest.md#property_airline) |  | Данные фискального чека 54-ФЗ |
| public | [$amount](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md#property_amount) |  | Подтверждаемая сумма оплаты |
| public | [$amount](../classes/YooKassa-Common-AbstractPaymentRequest.md#property_amount) |  | Сумма |
| public | [$deal](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md#property_deal) |  | Данные о сделке, в составе которой проходит платеж |
| public | [$receipt](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md#property_receipt) |  | Данные фискального чека 54-ФЗ |
| public | [$receipt](../classes/YooKassa-Common-AbstractPaymentRequest.md#property_receipt) |  | Данные фискального чека 54-ФЗ |
| public | [$transfers](../classes/YooKassa-Common-AbstractPaymentRequest.md#property_transfers) |  | Данные о распределении платежа между магазинами |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [__construct()](../classes/YooKassa-Common-AbstractObject.md#method___construct) |  | AbstractObject constructor. |
| public | [__get()](../classes/YooKassa-Common-AbstractObject.md#method___get) |  | Возвращает значение свойства |
| public | [__isset()](../classes/YooKassa-Common-AbstractObject.md#method___isset) |  | Проверяет наличие свойства |
| public | [__set()](../classes/YooKassa-Common-AbstractObject.md#method___set) |  | Устанавливает значение свойства |
| public | [__unset()](../classes/YooKassa-Common-AbstractObject.md#method___unset) |  | Удаляет свойство |
| public | [builder()](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md#method_builder) |  | Возвращает билдер объектов запросов на подтверждение оплаты |
| public | [clearValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_clearValidationError) |  | Очищает статус валидации текущего запроса |
| public | [fromArray()](../classes/YooKassa-Common-AbstractObject.md#method_fromArray) |  | Устанавливает значения свойств текущего объекта из массива |
| public | [getAirline()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_getAirline) |  | Возвращает данные авиабилетов |
| public | [getAmount()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_getAmount) |  | Возвращает сумму оплаты |
| public | [getDeal()](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md#method_getDeal) |  | Возвращает данные о сделке, в составе которой проходит платеж |
| public | [getLastValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_getLastValidationError) |  | Возвращает последнюю ошибку валидации |
| public | [getReceipt()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_getReceipt) |  | Возвращает чек, если он есть |
| public | [getTransfers()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_getTransfers) |  | Возвращает данные о распределении денег — сколько и в какой магазин нужно перевести. |
| public | [hasAirline()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_hasAirline) |  | Проверяет, были ли установлены данные авиабилетов |
| public | [hasAmount()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_hasAmount) |  | Проверяет, была ли установлена сумма оплаты |
| public | [hasDeal()](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md#method_hasDeal) |  | Проверяет, были ли установлены данные о сделке |
| public | [hasReceipt()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_hasReceipt) |  | Проверяет наличие чека |
| public | [hasTransfers()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_hasTransfers) |  | Проверяет наличие данных о распределении денег |
| public | [jsonSerialize()](../classes/YooKassa-Common-AbstractObject.md#method_jsonSerialize) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации |
| public | [offsetExists()](../classes/YooKassa-Common-AbstractObject.md#method_offsetExists) |  | Проверяет наличие свойства |
| public | [offsetGet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetGet) |  | Возвращает значение свойства |
| public | [offsetSet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetSet) |  | Устанавливает значение свойства |
| public | [offsetUnset()](../classes/YooKassa-Common-AbstractObject.md#method_offsetUnset) |  | Удаляет свойство |
| public | [removeReceipt()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_removeReceipt) |  | Удаляет чек из запроса |
| public | [setAirline()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_setAirline) |  | Устанавливает информацию об авиабилетах |
| public | [setAmount()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_setAmount) |  | Устанавливает сумму |
| public | [setDeal()](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md#method_setDeal) |  | Устанавливает данные о сделке, в составе которой проходит платеж. |
| public | [setReceipt()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_setReceipt) |  | Устанавливает чек |
| public | [setTransfers()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_setTransfers) |  | Устанавливает transfers (массив распределения денег между магазинами) |
| public | [toArray()](../classes/YooKassa-Common-AbstractObject.md#method_toArray) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации Является алиасом метода AbstractObject::jsonSerialize() |
| public | [validate()](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md#method_validate) |  | Валидирует объект запроса |
| protected | [getUnknownProperties()](../classes/YooKassa-Common-AbstractObject.md#method_getUnknownProperties) |  | Возвращает массив свойств которые не существуют, но были заданы у объекта |
| protected | [setValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_setValidationError) |  | Устанавливает ошибку валидации |

---
### Details
* File: [lib/Request/Payments/Payment/CreateCaptureRequest.php](../../lib/Request/Payments/Payment/CreateCaptureRequest.php)
* Package: Default
* Class Hierarchy:   
  * [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)
  * [\YooKassa\Common\AbstractRequest](../classes/YooKassa-Common-AbstractRequest.md)
  * [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)
  * \YooKassa\Request\Payments\Payment\CreateCaptureRequest
* Implements:
  * [\YooKassa\Request\Payments\Payment\CreateCaptureRequestInterface](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequestInterface.md)

---
## Properties
<a name="property_airline"></a>
#### public $airline : \YooKassa\Model\AirlineInterface
---
***Description***

Данные фискального чека 54-ФЗ

**Type:** <a href="../classes/YooKassa-Model-AirlineInterface.html"><abbr title="\YooKassa\Model\AirlineInterface">AirlineInterface</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)


<a name="property_amount"></a>
#### public $amount : \YooKassa\Model\AmountInterface
---
***Description***

Подтверждаемая сумма оплаты

**Type:** <a href="../classes/YooKassa-Model-AmountInterface.html"><abbr title="\YooKassa\Model\AmountInterface">AmountInterface</abbr></a>

**Details:**


<a name="property_amount"></a>
#### public $amount : \YooKassa\Model\AmountInterface
---
***Description***

Сумма

**Type:** <a href="../classes/YooKassa-Model-AmountInterface.html"><abbr title="\YooKassa\Model\AmountInterface">AmountInterface</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)


<a name="property_deal"></a>
#### public $deal : \YooKassa\Model\Deal\CaptureDealData
---
***Description***

Данные о сделке, в составе которой проходит платеж

**Type:** <a href="../classes/YooKassa-Model-Deal-CaptureDealData.html"><abbr title="\YooKassa\Model\Deal\CaptureDealData">CaptureDealData</abbr></a>

**Details:**


<a name="property_receipt"></a>
#### public $receipt : \YooKassa\Model\ReceiptInterface
---
***Description***

Данные фискального чека 54-ФЗ

**Type:** <a href="../classes/YooKassa-Model-ReceiptInterface.html"><abbr title="\YooKassa\Model\ReceiptInterface">ReceiptInterface</abbr></a>

**Details:**


<a name="property_receipt"></a>
#### public $receipt : \YooKassa\Model\ReceiptInterface
---
***Description***

Данные фискального чека 54-ФЗ

**Type:** <a href="../classes/YooKassa-Model-ReceiptInterface.html"><abbr title="\YooKassa\Model\ReceiptInterface">ReceiptInterface</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)


<a name="property_transfers"></a>
#### public $transfers : \YooKassa\Model\TransferInterface[]
---
***Description***

Данные о распределении платежа между магазинами

**Type:** <a href="../\YooKassa\Model\TransferInterface[]"><abbr title="\YooKassa\Model\TransferInterface[]">TransferInterface[]</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)



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


<a name="method_builder" class="anchor"></a>
#### public builder() : \YooKassa\Request\Payments\Payment\CreateCaptureRequestBuilder

```php
Static public builder() : \YooKassa\Request\Payments\Payment\CreateCaptureRequestBuilder
```

**Summary**

Возвращает билдер объектов запросов на подтверждение оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\Payment\CreateCaptureRequest](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md)

**Returns:** \YooKassa\Request\Payments\Payment\CreateCaptureRequestBuilder - Инстанс билдера


<a name="method_clearValidationError" class="anchor"></a>
#### public clearValidationError() : mixed

```php
public clearValidationError() : mixed
```

**Summary**

Очищает статус валидации текущего запроса

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRequest](../classes/YooKassa-Common-AbstractRequest.md)

**Returns:** mixed - 


<a name="method_fromArray" class="anchor"></a>
#### public fromArray() : mixed

```php
public fromArray(array|\Traversable $sourceArray) : mixed
```

**Summary**

Устанавливает значения свойств текущего объекта из массива

**Details:**
* Inherited From: [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">array OR \Traversable</code> | sourceArray  | Ассоциативный массив с настройками |

**Returns:** mixed - 


<a name="method_getAirline" class="anchor"></a>
#### public getAirline() : \YooKassa\Model\AirlineInterface

```php
public getAirline() : \YooKassa\Model\AirlineInterface
```

**Summary**

Возвращает данные авиабилетов

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** \YooKassa\Model\AirlineInterface - Данные авиабилетов


<a name="method_getAmount" class="anchor"></a>
#### public getAmount() : \YooKassa\Model\AmountInterface

```php
public getAmount() : \YooKassa\Model\AmountInterface
```

**Summary**

Возвращает сумму оплаты

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** \YooKassa\Model\AmountInterface - Сумма оплаты


<a name="method_getDeal" class="anchor"></a>
#### public getDeal() : \YooKassa\Model\Deal\CaptureDealData

```php
public getDeal() : \YooKassa\Model\Deal\CaptureDealData
```

**Summary**

Возвращает данные о сделке, в составе которой проходит платеж

**Details:**
* Inherited From: [\YooKassa\Request\Payments\Payment\CreateCaptureRequest](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md)

**Returns:** \YooKassa\Model\Deal\CaptureDealData - Данные о сделке, в составе которой проходит платеж


<a name="method_getLastValidationError" class="anchor"></a>
#### public getLastValidationError() : string

```php
public getLastValidationError() : string
```

**Summary**

Возвращает последнюю ошибку валидации

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRequest](../classes/YooKassa-Common-AbstractRequest.md)

**Returns:** string - Последняя произошедшая ошибка валидации


<a name="method_getReceipt" class="anchor"></a>
#### public getReceipt() : \YooKassa\Model\ReceiptInterface|null

```php
public getReceipt() : \YooKassa\Model\ReceiptInterface|null
```

**Summary**

Возвращает чек, если он есть

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** \YooKassa\Model\ReceiptInterface|null - Данные фискального чека 54-ФЗ или null, если чека нет


<a name="method_getTransfers" class="anchor"></a>
#### public getTransfers() : \YooKassa\Model\TransferInterface[]

```php
public getTransfers() : \YooKassa\Model\TransferInterface[]
```

**Summary**

Возвращает данные о распределении денег — сколько и в какой магазин нужно перевести.

**Description**

Присутствует, если вы используете решение ЮKassa для платформ.
(https://yookassa.ru/developers/special-solutions/checkout-for-platforms/basics)

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** \YooKassa\Model\TransferInterface[] - Данные о распределении денег


<a name="method_hasAirline" class="anchor"></a>
#### public hasAirline() : bool

```php
public hasAirline() : bool
```

**Summary**

Проверяет, были ли установлены данные авиабилетов

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** bool - 


<a name="method_hasAmount" class="anchor"></a>
#### public hasAmount() : bool

```php
public hasAmount() : bool
```

**Summary**

Проверяет, была ли установлена сумма оплаты

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** bool - True если сумма оплаты была установлена, false если нет


<a name="method_hasDeal" class="anchor"></a>
#### public hasDeal() : bool

```php
public hasDeal() : bool
```

**Summary**

Проверяет, были ли установлены данные о сделке

**Details:**
* Inherited From: [\YooKassa\Request\Payments\Payment\CreateCaptureRequest](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md)

**Returns:** bool - True если данные о сделке были установлены, false если нет


<a name="method_hasReceipt" class="anchor"></a>
#### public hasReceipt() : bool

```php
public hasReceipt() : bool
```

**Summary**

Проверяет наличие чека

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** bool - True если чек есть, false если нет


<a name="method_hasTransfers" class="anchor"></a>
#### public hasTransfers() : bool

```php
public hasTransfers() : bool
```

**Summary**

Проверяет наличие данных о распределении денег

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** bool - 


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


<a name="method_removeReceipt" class="anchor"></a>
#### public removeReceipt() : mixed

```php
public removeReceipt() : mixed
```

**Summary**

Удаляет чек из запроса

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

**Returns:** mixed - 


<a name="method_setAirline" class="anchor"></a>
#### public setAirline() : \YooKassa\Common\AbstractPaymentRequest

```php
public setAirline(\YooKassa\Model\AirlineInterface|array|null $value) : \YooKassa\Common\AbstractPaymentRequest
```

**Summary**

Устанавливает информацию об авиабилетах

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\AirlineInterface OR array OR null</code> | value  | Объект данных длинной записи или ассоциативный массив с данными |

**Returns:** \YooKassa\Common\AbstractPaymentRequest - 


<a name="method_setAmount" class="anchor"></a>
#### public setAmount() : \YooKassa\Common\AbstractPaymentRequest

```php
public setAmount(\YooKassa\Model\AmountInterface|array|string $value) : \YooKassa\Common\AbstractPaymentRequest
```

**Summary**

Устанавливает сумму

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\AmountInterface OR array OR string</code> | value  | Сумма оплаты |

**Returns:** \YooKassa\Common\AbstractPaymentRequest - Инстанс билдера запросов


<a name="method_setDeal" class="anchor"></a>
#### public setDeal() : mixed

```php
public setDeal(\YooKassa\Model\Deal\CaptureDealData|array|null $value) : mixed
```

**Summary**

Устанавливает данные о сделке, в составе которой проходит платеж.

**Details:**
* Inherited From: [\YooKassa\Request\Payments\Payment\CreateCaptureRequest](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\Deal\CaptureDealData OR array OR null</code> | value  | Данные о сделке, в составе которой проходит платеж |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданные данные не удалось интерпретировать как метаданные платежа |

**Returns:** mixed - 


<a name="method_setReceipt" class="anchor"></a>
#### public setReceipt() : mixed

```php
public setReceipt(\YooKassa\Model\ReceiptInterface|array|null $value) : mixed
```

**Summary**

Устанавливает чек

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\ReceiptInterface OR array OR null</code> | value  | Инстанс чека или null для удаления информации о чеке |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если передан не инстанс класса чека и не null |

**Returns:** mixed - 


<a name="method_setTransfers" class="anchor"></a>
#### public setTransfers() : mixed

```php
public setTransfers(\YooKassa\Model\TransferInterface[]|array|null $value) : mixed
```

**Summary**

Устанавливает transfers (массив распределения денег между магазинами)

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\TransferInterface[] OR array OR null</code> | value  |  |

**Returns:** mixed - 


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


<a name="method_validate" class="anchor"></a>
#### public validate() : bool

```php
public validate() : bool
```

**Summary**

Валидирует объект запроса

**Details:**
* Inherited From: [\YooKassa\Request\Payments\Payment\CreateCaptureRequest](../classes/YooKassa-Request-Payments-Payment-CreateCaptureRequest.md)

**Returns:** bool - True если запрос валиден и его можно отправить в API, false если нет


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


<a name="method_setValidationError" class="anchor"></a>
#### protected setValidationError() : mixed

```php
protected setValidationError(string $value) : mixed
```

**Summary**

Устанавливает ошибку валидации

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRequest](../classes/YooKassa-Common-AbstractRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Ошибка, произошедшая при валидации объекта |

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