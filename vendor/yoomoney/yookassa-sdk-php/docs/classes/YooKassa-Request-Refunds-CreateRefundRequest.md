# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Request\Refunds\CreateRefundRequest
### Namespace: [\YooKassa\Request\Refunds](../namespaces/yookassa-request-refunds.md)
---
**Summary:**

Класс объекта запроса для создания возврата


---
### Examples
Пример использования билдера

```php
// Создание запроса возврата через билдер
try {
    $refundBuilder = \YooKassa\Request\Refunds\CreateRefundRequest::builder();
    $refundBuilder
                ->setPaymentId('24b94598-000f-5000-9000-1b68e7b15f3f')
                ->setAmount(3500.00)
                ->setCurrency(\YooKassa\Model\CurrencyCode::RUB)
                ->setDescription('Не подошел цвет')
                ->setReceiptItems(array(
                    array(
                        'description' => 'Платок Gucci',
                        'quantity' => '1.00',
                        'amount' => array(
                            'value' => '3000.00',
                            'currency' => 'RUB',
                        ),
                        'vat_code' => 2,
                        'payment_mode' => 'full_payment',
                        'payment_subject' => 'commodity',
                    ),
                ))
                ->setReceiptEmail('john.doe@merchant.com')
                ->setTaxSystemCode(1);

    // Создаем объект запроса
    $request = $refundBuilder->build();

    // Можно изменить данные, если нужно
    $request->setDescription('Не подошел цвет и размер');

    $idempotenceKey = uniqid('', true);
    $response = $client->createRefund($request, $idempotenceKey);
} catch (Exception $e) {
    $response = $e;
}

```

---
### Constants
* No constants found

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [$amount](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#property_amount) |  | Сумма возврата |
| public | [$amount](../classes/YooKassa-Common-AbstractRefundRequest.md#property_amount) |  | Сумма возврата |
| public | [$deal](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#property_deal) |  | Информация о сделке |
| public | [$description](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#property_description) |  | Комментарий к операции возврата, основание для возврата средств покупателю. |
| public | [$paymentId](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#property_paymentId) |  | Айди платежа для которого создаётся возврат |
| public | [$paymentId](../classes/YooKassa-Common-AbstractRefundRequest.md#property_paymentId) |  | Идентификатор платежа для которого создаётся возврат |
| public | [$receipt](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#property_receipt) |  | Инстанс чека или null |
| public | [$sources](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#property_sources) |  | Информация о распределении денег — сколько и в какой магазин нужно перевести |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [__construct()](../classes/YooKassa-Common-AbstractObject.md#method___construct) |  | AbstractObject constructor. |
| public | [__get()](../classes/YooKassa-Common-AbstractObject.md#method___get) |  | Возвращает значение свойства |
| public | [__isset()](../classes/YooKassa-Common-AbstractObject.md#method___isset) |  | Проверяет наличие свойства |
| public | [__set()](../classes/YooKassa-Common-AbstractObject.md#method___set) |  | Устанавливает значение свойства |
| public | [__unset()](../classes/YooKassa-Common-AbstractObject.md#method___unset) |  | Удаляет свойство |
| public | [builder()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_builder) |  | Возвращает билдер объектов текущего типа |
| public | [clearValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_clearValidationError) |  | Очищает статус валидации текущего запроса |
| public | [fromArray()](../classes/YooKassa-Common-AbstractObject.md#method_fromArray) |  | Устанавливает значения свойств текущего объекта из массива |
| public | [getAmount()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_getAmount) |  | Возвращает сумму возврата |
| public | [getDeal()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_getDeal) |  | Возвращает данные о сделке, в составе которой проходит возврат |
| public | [getDescription()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_getDescription) |  | Возвращает комментарий к возврату или null, если комментарий не задан |
| public | [getLastValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_getLastValidationError) |  | Возвращает последнюю ошибку валидации |
| public | [getPaymentId()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_getPaymentId) |  | Возвращает идентификатор платежа для которого создаётся возврат средств |
| public | [getReceipt()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_getReceipt) |  | Возвращает чек, если он есть |
| public | [getSources()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_getSources) |  | Возвращает информацию о распределении денег — сколько и в какой магазин нужно перевести |
| public | [hasAmount()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_hasAmount) |  | Проверяет, была ли установлена сумма возврата |
| public | [hasDeal()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_hasDeal) |  | Проверяет, были ли установлены данные о сделке |
| public | [hasDescription()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_hasDescription) |  | Проверяет задан ли комментарий к создаваемому возврату |
| public | [hasPaymentId()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_hasPaymentId) |  | Проверяет, был ли установлена идентификатор платежа |
| public | [hasReceipt()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_hasReceipt) |  | Проверяет наличие чека |
| public | [hasSources()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_hasSources) |  | Проверяет наличие информации о распределении денег |
| public | [jsonSerialize()](../classes/YooKassa-Common-AbstractObject.md#method_jsonSerialize) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации |
| public | [offsetExists()](../classes/YooKassa-Common-AbstractObject.md#method_offsetExists) |  | Проверяет наличие свойства |
| public | [offsetGet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetGet) |  | Возвращает значение свойства |
| public | [offsetSet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetSet) |  | Устанавливает значение свойства |
| public | [offsetUnset()](../classes/YooKassa-Common-AbstractObject.md#method_offsetUnset) |  | Удаляет свойство |
| public | [removeReceipt()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_removeReceipt) |  | Удаляет чек из запроса |
| public | [setAmount()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_setAmount) |  | Устанавливает сумму |
| public | [setDeal()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_setDeal) |  | Устанавливает данные о сделке, в составе которой проходит возврат |
| public | [setDescription()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_setDescription) |  | Устанавливает комментарий к возврату |
| public | [setPaymentId()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_setPaymentId) |  | Устанавливает идентификатор платежа для которого создаётся возврат |
| public | [setReceipt()](../classes/YooKassa-Common-AbstractRefundRequest.md#method_setReceipt) |  | Устанавливает чек |
| public | [setSources()](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md#method_setSources) |  | Устанавливает sources (массив распределения денег между магазинами) |
| public | [toArray()](../classes/YooKassa-Common-AbstractObject.md#method_toArray) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации Является алиасом метода AbstractObject::jsonSerialize() |
| public | [validate()](../classes/YooKassa-Common-AbstractRequest.md#method_validate) |  | Валидирует текущий запрос, проверяет все ли нужные свойства установлены |
| protected | [getUnknownProperties()](../classes/YooKassa-Common-AbstractObject.md#method_getUnknownProperties) |  | Возвращает массив свойств которые не существуют, но были заданы у объекта |
| protected | [setValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_setValidationError) |  | Устанавливает ошибку валидации |

---
### Details
* File: [lib/Request/Refunds/CreateRefundRequest.php](../../lib/Request/Refunds/CreateRefundRequest.php)
* Package: Default
* Class Hierarchy:   
  * [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)
  * [\YooKassa\Common\AbstractRequest](../classes/YooKassa-Common-AbstractRequest.md)
  * [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)
  * \YooKassa\Request\Refunds\CreateRefundRequest
* Implements:
  * [\YooKassa\Request\Refunds\CreateRefundRequestInterface](../classes/YooKassa-Request-Refunds-CreateRefundRequestInterface.md)

---
## Properties
<a name="property_amount"></a>
#### public $amount : \YooKassa\Model\AmountInterface
---
***Description***

Сумма возврата

**Type:** <a href="../classes/YooKassa-Model-AmountInterface.html"><abbr title="\YooKassa\Model\AmountInterface">AmountInterface</abbr></a>

**Details:**


<a name="property_amount"></a>
#### public $amount : \YooKassa\Model\AmountInterface
---
***Description***

Сумма возврата

**Type:** <a href="../classes/YooKassa-Model-AmountInterface.html"><abbr title="\YooKassa\Model\AmountInterface">AmountInterface</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)


<a name="property_deal"></a>
#### public $deal : \YooKassa\Model\Deal\RefundDealData|null
---
***Description***

Информация о сделке

**Type:** <a href="../\YooKassa\Model\Deal\RefundDealData|null"><abbr title="\YooKassa\Model\Deal\RefundDealData|null">RefundDealData|null</abbr></a>

**Details:**


<a name="property_description"></a>
#### public $description : string
---
***Description***

Комментарий к операции возврата, основание для возврата средств покупателю.

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_paymentId"></a>
#### public $paymentId : string
---
***Description***

Айди платежа для которого создаётся возврат

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_paymentId"></a>
#### public $paymentId : string
---
***Description***

Идентификатор платежа для которого создаётся возврат

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)


<a name="property_receipt"></a>
#### public $receipt : \YooKassa\Model\ReceiptInterface|null
---
***Description***

Инстанс чека или null

**Type:** <a href="../\YooKassa\Model\ReceiptInterface|null"><abbr title="\YooKassa\Model\ReceiptInterface|null">ReceiptInterface|null</abbr></a>

**Details:**


<a name="property_sources"></a>
#### public $sources : \YooKassa\Model\SourceInterface[]|null
---
***Description***

Информация о распределении денег — сколько и в какой магазин нужно перевести

**Type:** <a href="../\YooKassa\Model\SourceInterface[]|null"><abbr title="\YooKassa\Model\SourceInterface[]|null">SourceInterface[]|null</abbr></a>

**Details:**



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
#### public builder() : \YooKassa\Request\Refunds\CreateRefundRequestBuilder

```php
Static public builder() : \YooKassa\Request\Refunds\CreateRefundRequestBuilder
```

**Summary**

Возвращает билдер объектов текущего типа

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

**Returns:** \YooKassa\Request\Refunds\CreateRefundRequestBuilder - Инстанс билдера запросов


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


<a name="method_getAmount" class="anchor"></a>
#### public getAmount() : \YooKassa\Model\AmountInterface

```php
public getAmount() : \YooKassa\Model\AmountInterface
```

**Summary**

Возвращает сумму возврата

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

**Returns:** \YooKassa\Model\AmountInterface - Сумма возврата


<a name="method_getDeal" class="anchor"></a>
#### public getDeal() : \YooKassa\Model\Deal\RefundDealData

```php
public getDeal() : \YooKassa\Model\Deal\RefundDealData
```

**Summary**

Возвращает данные о сделке, в составе которой проходит возврат

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

**Returns:** \YooKassa\Model\Deal\RefundDealData - Данные о сделке, в составе которой проходит возврат


<a name="method_getDescription" class="anchor"></a>
#### public getDescription() : string

```php
public getDescription() : string
```

**Summary**

Возвращает комментарий к возврату или null, если комментарий не задан

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

**Returns:** string - Комментарий к операции возврата, основание для возврата средств покупателю.


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


<a name="method_getPaymentId" class="anchor"></a>
#### public getPaymentId() : string

```php
public getPaymentId() : string
```

**Summary**

Возвращает идентификатор платежа для которого создаётся возврат средств

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

**Returns:** string - Идентификатор платежа для которого создаётся возврат


<a name="method_getReceipt" class="anchor"></a>
#### public getReceipt() : \YooKassa\Model\ReceiptInterface|null

```php
public getReceipt() : \YooKassa\Model\ReceiptInterface|null
```

**Summary**

Возвращает чек, если он есть

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

**Returns:** \YooKassa\Model\ReceiptInterface|null - Данные фискального чека 54-ФЗ или null, если чека нет


<a name="method_getSources" class="anchor"></a>
#### public getSources() : \YooKassa\Model\SourceInterface[]

```php
public getSources() : \YooKassa\Model\SourceInterface[]
```

**Summary**

Возвращает информацию о распределении денег — сколько и в какой магазин нужно перевести

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

**Returns:** \YooKassa\Model\SourceInterface[] - Информация о распределении денег


<a name="method_hasAmount" class="anchor"></a>
#### public hasAmount() : bool

```php
public hasAmount() : bool
```

**Summary**

Проверяет, была ли установлена сумма возврата

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

**Returns:** bool - True если сумма возврата была установлена, false если нет


<a name="method_hasDeal" class="anchor"></a>
#### public hasDeal() : bool

```php
public hasDeal() : bool
```

**Summary**

Проверяет, были ли установлены данные о сделке

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

**Returns:** bool - True если данные о сделке были установлены, false если нет


<a name="method_hasDescription" class="anchor"></a>
#### public hasDescription() : bool

```php
public hasDescription() : bool
```

**Summary**

Проверяет задан ли комментарий к создаваемому возврату

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

**Returns:** bool - True если комментарий установлен, false если нет


<a name="method_hasPaymentId" class="anchor"></a>
#### public hasPaymentId() : bool

```php
public hasPaymentId() : bool
```

**Summary**

Проверяет, был ли установлена идентификатор платежа

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

**Returns:** bool - True если идентификатор платежа был установлен, false если нет


<a name="method_hasReceipt" class="anchor"></a>
#### public hasReceipt() : bool

```php
public hasReceipt() : bool
```

**Summary**

Проверяет наличие чека

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

**Returns:** bool - True если чек есть, false если нет


<a name="method_hasSources" class="anchor"></a>
#### public hasSources() : bool

```php
public hasSources() : bool
```

**Summary**

Проверяет наличие информации о распределении денег

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

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
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

**Returns:** mixed - 


<a name="method_setAmount" class="anchor"></a>
#### public setAmount() : self

```php
public setAmount(\YooKassa\Model\AmountInterface|array|string $value) : self
```

**Summary**

Устанавливает сумму

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\AmountInterface OR array OR string</code> | value  | Сумма возврата |

**Returns:** self - Инстанс билдера запросов


<a name="method_setDeal" class="anchor"></a>
#### public setDeal() : mixed

```php
public setDeal(\YooKassa\Model\Deal\RefundDealData|array|null $value) : mixed
```

**Summary**

Устанавливает данные о сделке, в составе которой проходит возврат

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\Deal\RefundDealData OR array OR null</code> | value  | Данные о сделке, в составе которой проходит возврат |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданные данные не удалось интерпретировать как данные сделки |

**Returns:** mixed - 


<a name="method_setDescription" class="anchor"></a>
#### public setDescription() : mixed

```php
public setDescription(string $value) : mixed
```

**Summary**

Устанавливает комментарий к возврату

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Комментарий к операции возврата, основание для возврата средств покупателю |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если была передана не строка |

**Returns:** mixed - 


<a name="method_setPaymentId" class="anchor"></a>
#### public setPaymentId() : mixed

```php
public setPaymentId(string $value) : mixed
```

**Summary**

Устанавливает идентификатор платежа для которого создаётся возврат

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Идентификатор платежа |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\EmptyPropertyValueException | Выбрасывается если передано пустое значение идентификатора платежа |
| \YooKassa\Common\Exceptions\InvalidPropertyValueException | Выбрасывается если переданное значение является строкой, но не является валидным значением идентификатора платежа |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если передано значение не валидного типа |

**Returns:** mixed - 


<a name="method_setReceipt" class="anchor"></a>
#### public setReceipt() : mixed

```php
public setReceipt(\YooKassa\Model\ReceiptInterface|array|null $value) : mixed
```

**Summary**

Устанавливает чек

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRefundRequest](../classes/YooKassa-Common-AbstractRefundRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\ReceiptInterface OR array OR null</code> | value  | Инстанс чека или null для удаления информации о чеке |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если передан не инстанс класса чека и не null |

**Returns:** mixed - 


<a name="method_setSources" class="anchor"></a>
#### public setSources() : mixed

```php
public setSources(\YooKassa\Model\SourceInterface[]|array $value) : mixed
```

**Summary**

Устанавливает sources (массив распределения денег между магазинами)

**Details:**
* Inherited From: [\YooKassa\Request\Refunds\CreateRefundRequest](../classes/YooKassa-Request-Refunds-CreateRefundRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\SourceInterface[] OR array</code> | value  | Массив распределения денег между магазинами |

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
Abstract public validate() : bool
```

**Summary**

Валидирует текущий запрос, проверяет все ли нужные свойства установлены

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRequest](../classes/YooKassa-Common-AbstractRequest.md)

**Returns:** bool - True если запрос валиден, false если нет


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