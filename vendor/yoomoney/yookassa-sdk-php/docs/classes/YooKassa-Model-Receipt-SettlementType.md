# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Model\Receipt\SettlementType
### Namespace: [\YooKassa\Model\Receipt](../namespaces/yookassa-model-receipt.md)
---
**Summary:**

SettlementType - Тип расчета

**Description:**

Тип расчета передается в запросе на создание чека в массиве `settlements`, в параметре `type`.

Возможные значения:
- `cashless` - Безналичный расчет
- `prepayment` - Предоплата (аванс)
- `postpayment` - Постоплата (кредит)
- `consideration` - Встречное предоставление

---
### Constants
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [CASHLESS](../classes/YooKassa-Model-Receipt-SettlementType.md#constant_CASHLESS) |  | Безналичный расчет |
| public | [PREPAYMENT](../classes/YooKassa-Model-Receipt-SettlementType.md#constant_PREPAYMENT) |  | Предоплата (аванс) |
| public | [POSTPAYMENT](../classes/YooKassa-Model-Receipt-SettlementType.md#constant_POSTPAYMENT) |  | Постоплата (кредит) |
| public | [CONSIDERATION](../classes/YooKassa-Model-Receipt-SettlementType.md#constant_CONSIDERATION) |  | Встречное предоставление |

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| protected | [$validValues](../classes/YooKassa-Model-Receipt-SettlementType.md#property_validValues) |  |  |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [getEnabledValues()](../classes/YooKassa-Common-AbstractEnum.md#method_getEnabledValues) |  | Возвращает значения в enum'е значения которых разрешены |
| public | [getValidValues()](../classes/YooKassa-Common-AbstractEnum.md#method_getValidValues) |  | Возвращает все значения в enum'e |
| public | [valueExists()](../classes/YooKassa-Common-AbstractEnum.md#method_valueExists) |  | Проверяет наличие значения в enum'e |

---
### Details
* File: [lib/Model/Receipt/SettlementType.php](../../lib/Model/Receipt/SettlementType.php)
* Package: Default
* Class Hierarchy: 
  * [\YooKassa\Common\AbstractEnum](../classes/YooKassa-Common-AbstractEnum.md)
  * \YooKassa\Model\Receipt\SettlementType

---
## Constants
<a name="constant_CASHLESS" class="anchor"></a>
###### CASHLESS
Безналичный расчет

```php
CASHLESS = 'cashless'
```


<a name="constant_PREPAYMENT" class="anchor"></a>
###### PREPAYMENT
Предоплата (аванс)

```php
PREPAYMENT = 'prepayment'
```


<a name="constant_POSTPAYMENT" class="anchor"></a>
###### POSTPAYMENT
Постоплата (кредит)

```php
POSTPAYMENT = 'postpayment'
```


<a name="constant_CONSIDERATION" class="anchor"></a>
###### CONSIDERATION
Встречное предоставление

```php
CONSIDERATION = 'consideration'
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