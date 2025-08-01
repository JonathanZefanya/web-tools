# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Model\NotificationEventType
### Namespace: [\YooKassa\Model](../namespaces/yookassa-model.md)
---
**Summary:**

NotificationEventType - Тип уведомления

**Description:**

Возможные значения:
- `payment.waiting_for_capture` - Успешно оплачен покупателем, ожидает подтверждения магазином (capture или aviso)
- `payment.succeeded` - Успешно оплачен и подтвержден магазином
- `payment.canceled` - Неуспех оплаты или отменен магазином
- `refund.succeeded` - Успешный возврат
- `deal.closed` - Сделка перешла в статус closed
- `payout.canceled` - Выплата перешла в статус canceled
- `payout.succeeded` - Выплата перешла в статус succeeded

---
### Constants
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [PAYMENT_WAITING_FOR_CAPTURE](../classes/YooKassa-Model-NotificationEventType.md#constant_PAYMENT_WAITING_FOR_CAPTURE) |  | Успешно оплачен покупателем, ожидает подтверждения магазином |
| public | [PAYMENT_SUCCEEDED](../classes/YooKassa-Model-NotificationEventType.md#constant_PAYMENT_SUCCEEDED) |  | Успешно оплачен и подтвержден магазином |
| public | [PAYMENT_CANCELED](../classes/YooKassa-Model-NotificationEventType.md#constant_PAYMENT_CANCELED) |  | Неуспех оплаты или отменен магазином |
| public | [REFUND_SUCCEEDED](../classes/YooKassa-Model-NotificationEventType.md#constant_REFUND_SUCCEEDED) |  | Успешный возврат |
| public | [DEAL_CLOSED](../classes/YooKassa-Model-NotificationEventType.md#constant_DEAL_CLOSED) |  | Сделка перешла в статус closed |
| public | [PAYOUT_CANCELED](../classes/YooKassa-Model-NotificationEventType.md#constant_PAYOUT_CANCELED) |  | Выплата перешла в статус canceled |
| public | [PAYOUT_SUCCEEDED](../classes/YooKassa-Model-NotificationEventType.md#constant_PAYOUT_SUCCEEDED) |  | Выплата перешла в статус succeeded |

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| protected | [$validValues](../classes/YooKassa-Model-NotificationEventType.md#property_validValues) |  |  |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [getEnabledValues()](../classes/YooKassa-Common-AbstractEnum.md#method_getEnabledValues) |  | Возвращает значения в enum'е значения которых разрешены |
| public | [getValidValues()](../classes/YooKassa-Common-AbstractEnum.md#method_getValidValues) |  | Возвращает все значения в enum'e |
| public | [valueExists()](../classes/YooKassa-Common-AbstractEnum.md#method_valueExists) |  | Проверяет наличие значения в enum'e |

---
### Details
* File: [lib/Model/NotificationEventType.php](../../lib/Model/NotificationEventType.php)
* Package: YooKassa
* Class Hierarchy: 
  * [\YooKassa\Common\AbstractEnum](../classes/YooKassa-Common-AbstractEnum.md)
  * \YooKassa\Model\NotificationEventType

---
## Constants
<a name="constant_PAYMENT_WAITING_FOR_CAPTURE" class="anchor"></a>
###### PAYMENT_WAITING_FOR_CAPTURE
Успешно оплачен покупателем, ожидает подтверждения магазином

```php
PAYMENT_WAITING_FOR_CAPTURE = 'payment.waiting_for_capture'
```


<a name="constant_PAYMENT_SUCCEEDED" class="anchor"></a>
###### PAYMENT_SUCCEEDED
Успешно оплачен и подтвержден магазином

```php
PAYMENT_SUCCEEDED = 'payment.succeeded'
```


<a name="constant_PAYMENT_CANCELED" class="anchor"></a>
###### PAYMENT_CANCELED
Неуспех оплаты или отменен магазином

```php
PAYMENT_CANCELED = 'payment.canceled'
```


<a name="constant_REFUND_SUCCEEDED" class="anchor"></a>
###### REFUND_SUCCEEDED
Успешный возврат

```php
REFUND_SUCCEEDED = 'refund.succeeded'
```


<a name="constant_DEAL_CLOSED" class="anchor"></a>
###### DEAL_CLOSED
Сделка перешла в статус closed

```php
DEAL_CLOSED = 'deal.closed'
```


<a name="constant_PAYOUT_CANCELED" class="anchor"></a>
###### PAYOUT_CANCELED
Выплата перешла в статус canceled

```php
PAYOUT_CANCELED = 'payout.canceled'
```


<a name="constant_PAYOUT_SUCCEEDED" class="anchor"></a>
###### PAYOUT_SUCCEEDED
Выплата перешла в статус succeeded

```php
PAYOUT_SUCCEEDED = 'payout.succeeded'
```



---
## Properties
<a name="property_validValues"></a>
#### protected $validValues : array
---
**Type:** <a href="../array"><abbr title="array">array</abbr></a>
Массив принимаемых enum&#039;ом значений
**Details:**



---
## Methods
<a name="method_getEnabledValues" class="anchor"></a>
#### public getEnabledValues() : string[]

```php
Static public getEnabledValues() : string[]
```

**Summary**

Возвращает значения в enum'е значения которых разрешены

**Details:**
* Inherited From: [\YooKassa\Common\AbstractEnum](../classes/YooKassa-Common-AbstractEnum.md)

**Returns:** string[] - Массив разрешённых значений


<a name="method_getValidValues" class="anchor"></a>
#### public getValidValues() : array

```php
Static public getValidValues() : array
```

**Summary**

Возвращает все значения в enum'e

**Details:**
* Inherited From: [\YooKassa\Common\AbstractEnum](../classes/YooKassa-Common-AbstractEnum.md)

**Returns:** array - Массив значений в перечислении


<a name="method_valueExists" class="anchor"></a>
#### public valueExists() : bool

```php
Static public valueExists(mixed $value) : bool
```

**Summary**

Проверяет наличие значения в enum'e

**Details:**
* Inherited From: [\YooKassa\Common\AbstractEnum](../classes/YooKassa-Common-AbstractEnum.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">mixed</code> | value  | Проверяемое значение |

**Returns:** bool - True если значение имеется, false если нет



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