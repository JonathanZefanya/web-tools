# [YooKassa API SDK](../home.md)

# Abstract Class: \YooKassa\Common\AbstractPaymentRequestBuilder
### Namespace: [\YooKassa\Common](../namespaces/yookassa-common.md)
---
**Summary:**

Базовый класс объекта платежного запроса, передаваемого в методы клиента API


---
### Constants
* No constants found

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| protected | [$amount](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#property_amount) |  | Сумма |
| protected | [$currentObject](../classes/YooKassa-Common-AbstractRequestBuilder.md#property_currentObject) |  | Инстанс собираемого запроса |
| protected | [$receipt](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#property_receipt) |  | Объект с информацией о чеке |
| protected | [$transfers](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#property_transfers) |  | Массив платежей в пользу разных мерчантов |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [__construct()](../classes/YooKassa-Common-AbstractRequestBuilder.md#method___construct) |  | Конструктор, инициализирует пустой запрос, который в будущем начнём собирать |
| public | [addReceiptItem()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_addReceiptItem) |  | Добавляет в чек товар |
| public | [addReceiptShipping()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_addReceiptShipping) |  | Добавляет в чек доставку товара |
| public | [build()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_build) |  | Строит запрос, валидирует его и возвращает, если все прошло нормально |
| public | [setAmount()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_setAmount) |  | Устанавливает сумму |
| public | [setCurrency()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_setCurrency) |  | Устанавливает валюту в которой будет происходить подтверждение оплаты заказа |
| public | [setOptions()](../classes/YooKassa-Common-AbstractRequestBuilder.md#method_setOptions) |  | Устанавливает свойства запроса из массива |
| public | [setReceipt()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_setReceipt) |  | Устанавливает чек |
| public | [setReceiptEmail()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_setReceiptEmail) |  | Устанавливает адрес электронной почты получателя чека |
| public | [setReceiptItems()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_setReceiptItems) |  | Устанавлвиает список товаров для создания чека |
| public | [setReceiptPhone()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_setReceiptPhone) |  | Устанавливает телефон получателя чека |
| public | [setTaxSystemCode()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_setTaxSystemCode) |  | Устанавливает код системы налогообложения. |
| public | [setTransfers()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_setTransfers) |  | Устанавливает трансферы |
| protected | [initCurrentObject()](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md#method_initCurrentObject) |  | Инициализирует пустой запрос |

---
### Details
* File: [lib/Common/AbstractPaymentRequestBuilder.php](../../lib/Common/AbstractPaymentRequestBuilder.php)
* Package: YooKassa
* Class Hierarchy: 
  * [\YooKassa\Common\AbstractRequestBuilder](../classes/YooKassa-Common-AbstractRequestBuilder.md)
  * \YooKassa\Common\AbstractPaymentRequestBuilder

---
### Tags
| Tag | Version | Description |
| --- | ------- | ----------- |
| since | 1.0.18 |  |

---
## Properties
<a name="property_amount"></a>
#### protected $amount : \YooKassa\Model\MonetaryAmount
---
**Summary**

Сумма

**Type:** <a href="../classes/YooKassa-Model-MonetaryAmount.html"><abbr title="\YooKassa\Model\MonetaryAmount">MonetaryAmount</abbr></a>

**Details:**


<a name="property_currentObject"></a>
#### protected $currentObject : \YooKassa\Common\AbstractRequest
---
**Summary**

Инстанс собираемого запроса

**Type:** <a href="../classes/YooKassa-Common-AbstractRequest.html"><abbr title="\YooKassa\Common\AbstractRequest">AbstractRequest</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRequestBuilder](../classes/YooKassa-Common-AbstractRequestBuilder.md)


<a name="property_receipt"></a>
#### protected $receipt : \YooKassa\Model\Receipt
---
**Summary**

Объект с информацией о чеке

**Type:** <a href="../classes/YooKassa-Model-Receipt.html"><abbr title="\YooKassa\Model\Receipt">Receipt</abbr></a>

**Details:**


<a name="property_transfers"></a>
#### protected $transfers : \YooKassa\Model\TransferInterface[]
---
**Summary**

Массив платежей в пользу разных мерчантов

**Type:** <a href="../\YooKassa\Model\TransferInterface[]"><abbr title="\YooKassa\Model\TransferInterface[]">TransferInterface[]</abbr></a>

**Details:**



---
## Methods
<a name="method___construct" class="anchor"></a>
#### public __construct() : mixed

```php
public __construct() : mixed
```

**Summary**

Конструктор, инициализирует пустой запрос, который в будущем начнём собирать

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRequestBuilder](../classes/YooKassa-Common-AbstractRequestBuilder.md)

**Returns:** mixed - 


<a name="method_addReceiptItem" class="anchor"></a>
#### public addReceiptItem() : self

```php
public addReceiptItem(string $title, string $price, float $quantity, int $vatCode, null|string $paymentMode = null, null|string $paymentSubject = null, mixed $productCode = null, mixed $countryOfOriginCode = null, mixed $customsDeclarationNumber = null, mixed $excise = null) : self
```

**Summary**

Добавляет в чек товар

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)
* See Also:
 * [](\YooKassa\Model\Receipt\PaymentSubject::class)
 * [](\YooKassa\Model\Receipt\PaymentMode::class)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | title  | Название или описание товара |
| <code lang="php">string</code> | price  | Цена товара в валюте, заданной в заказе |
| <code lang="php">float</code> | quantity  | Количество товара |
| <code lang="php">int</code> | vatCode  | Ставка НДС |
| <code lang="php">null OR string</code> | paymentMode  | значение перечисления PaymentMode |
| <code lang="php">null OR string</code> | paymentSubject  | значение перечисления PaymentSubject |
| <code lang="php">mixed</code> | productCode  |  |
| <code lang="php">mixed</code> | countryOfOriginCode  |  |
| <code lang="php">mixed</code> | customsDeclarationNumber  |  |
| <code lang="php">mixed</code> | excise  |  |

**Returns:** self - Инстанс билдера запросов


<a name="method_addReceiptShipping" class="anchor"></a>
#### public addReceiptShipping() : self

```php
public addReceiptShipping(string $title, string $price, int $vatCode, null|string $paymentMode = null, null|string $paymentSubject = null) : self
```

**Summary**

Добавляет в чек доставку товара

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)
* See Also:
 * [](\YooKassa\Model\Receipt\PaymentSubject::class)
 * [](\YooKassa\Model\Receipt\PaymentMode::class)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | title  | Название доставки в чеке |
| <code lang="php">string</code> | price  | Стоимость доставки |
| <code lang="php">int</code> | vatCode  | Ставка НДС |
| <code lang="php">null OR string</code> | paymentMode  | значение перечисления PaymentMode |
| <code lang="php">null OR string</code> | paymentSubject  | значение перечисления PaymentSubject |

**Returns:** self - Инстанс билдера запросов


<a name="method_build" class="anchor"></a>
#### public build() : \YooKassa\Common\AbstractRequest

```php
public build(array $options = null) : \YooKassa\Common\AbstractRequest
```

**Summary**

Строит запрос, валидирует его и возвращает, если все прошло нормально

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">array</code> | options  | Массив свойств запроса, если нужно их установить перед сборкой |

**Returns:** \YooKassa\Common\AbstractRequest - Инстанс собранного запроса


<a name="method_setAmount" class="anchor"></a>
#### public setAmount() : self

```php
public setAmount(\YooKassa\Model\AmountInterface|array|string $value) : self
```

**Summary**

Устанавливает сумму

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\AmountInterface OR array OR string</code> | value  | Сумма оплаты |

**Returns:** self - Инстанс билдера запросов


<a name="method_setCurrency" class="anchor"></a>
#### public setCurrency() : self

```php
public setCurrency(string $value) : self
```

**Summary**

Устанавливает валюту в которой будет происходить подтверждение оплаты заказа

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Валюта в которой подтверждается оплата |

**Returns:** self - Инстанс билдера запросов


<a name="method_setOptions" class="anchor"></a>
#### public setOptions() : \YooKassa\Common\AbstractRequestBuilder

```php
public setOptions(array|\Traversable $options) : \YooKassa\Common\AbstractRequestBuilder
```

**Summary**

Устанавливает свойства запроса из массива

**Details:**
* Inherited From: [\YooKassa\Common\AbstractRequestBuilder](../classes/YooKassa-Common-AbstractRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">array OR \Traversable</code> | options  | Массив свойств запроса |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \InvalidArgumentException | Выбрасывается если аргумент не массив и не итерируемый объект |
| \YooKassa\Common\Exceptions\InvalidPropertyException | Выбрасывается если не удалось установить один из параметров, переданныч в массиве настроек |

**Returns:** \YooKassa\Common\AbstractRequestBuilder - Инстанс текущего билдера запросов


<a name="method_setReceipt" class="anchor"></a>
#### public setReceipt() : self

```php
public setReceipt(\YooKassa\Model\ReceiptInterface|array $value) : self
```

**Summary**

Устанавливает чек

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\ReceiptInterface OR array</code> | value  | Инстанс чека или ассоциативный массив с данными чека |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Генерируется если было передано значение невалидного типа |

**Returns:** self - 


<a name="method_setReceiptEmail" class="anchor"></a>
#### public setReceiptEmail() : self

```php
public setReceiptEmail(string $value) : self
```

**Summary**

Устанавливает адрес электронной почты получателя чека

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Email получателя чека |

**Returns:** self - Инстанс билдера запросов


<a name="method_setReceiptItems" class="anchor"></a>
#### public setReceiptItems() : self

```php
public setReceiptItems(array $value) : self
```

**Summary**

Устанавлвиает список товаров для создания чека

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">array</code> | value  | Массив товаров в заказе |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueException | Выбрасывается если хотя бы один из товаров имеет неверную структуру |

**Returns:** self - Инстанс билдера запросов


<a name="method_setReceiptPhone" class="anchor"></a>
#### public setReceiptPhone() : self

```php
public setReceiptPhone(string $value) : self
```

**Summary**

Устанавливает телефон получателя чека

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Телефон получателя чека |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если в качестве значения была передана не строка |

**Returns:** self - Инстанс билдера запросов


<a name="method_setTaxSystemCode" class="anchor"></a>
#### public setTaxSystemCode() : self

```php
public setTaxSystemCode(int $value) : self
```

**Summary**

Устанавливает код системы налогообложения.

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">int</code> | value  | Код системы налогообложения. Число 1-6. |

**Returns:** self - Инстанс билдера запросов


<a name="method_setTransfers" class="anchor"></a>
#### public setTransfers() : self

```php
public setTransfers(\YooKassa\Model\TransferInterface[]|array|null $value) : self
```

**Summary**

Устанавливает трансферы

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\TransferInterface[] OR array OR null</code> | value  | Массив трансферов |

**Returns:** self - Инстанс билдера запросов


<a name="method_initCurrentObject" class="anchor"></a>
#### protected initCurrentObject() : self

```php
protected initCurrentObject() : self
```

**Summary**

Инициализирует пустой запрос

**Details:**
* Inherited From: [\YooKassa\Common\AbstractPaymentRequestBuilder](../classes/YooKassa-Common-AbstractPaymentRequestBuilder.md)

**Returns:** self - 



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