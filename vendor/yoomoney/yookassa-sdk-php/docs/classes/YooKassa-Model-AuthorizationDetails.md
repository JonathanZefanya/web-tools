# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Model\AuthorizationDetails
### Namespace: [\YooKassa\Model](../namespaces/yookassa-model.md)
---
**Summary:**

AuthorizationDetails - Данные об авторизации платежа


---
### Constants
* No constants found

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [$authCode](../classes/YooKassa-Model-AuthorizationDetails.md#property_authCode) |  | Код авторизации банковской карты |
| public | [$rrn](../classes/YooKassa-Model-AuthorizationDetails.md#property_rrn) |  | Retrieval Reference Number — уникальный идентификатор транзакции в системе эмитента |
| public | [$threeDSecure](../classes/YooKassa-Model-AuthorizationDetails.md#property_threeDSecure) |  | Данные о прохождении пользователем аутентификации по 3‑D Secure |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [__construct()](../classes/YooKassa-Common-AbstractObject.md#method___construct) |  | AbstractObject constructor. |
| public | [__get()](../classes/YooKassa-Common-AbstractObject.md#method___get) |  | Возвращает значение свойства |
| public | [__isset()](../classes/YooKassa-Common-AbstractObject.md#method___isset) |  | Проверяет наличие свойства |
| public | [__set()](../classes/YooKassa-Common-AbstractObject.md#method___set) |  | Устанавливает значение свойства |
| public | [__unset()](../classes/YooKassa-Common-AbstractObject.md#method___unset) |  | Удаляет свойство |
| public | [fromArray()](../classes/YooKassa-Model-AuthorizationDetails.md#method_fromArray) |  | Устанавливает значения свойств текущего объекта из массива |
| public | [getAuthCode()](../classes/YooKassa-Model-AuthorizationDetails.md#method_getAuthCode) |  | Возвращает код авторизации банковской карты |
| public | [getRrn()](../classes/YooKassa-Model-AuthorizationDetails.md#method_getRrn) |  | Возвращает уникальный идентификатор транзакции |
| public | [getThreeDSecure()](../classes/YooKassa-Model-AuthorizationDetails.md#method_getThreeDSecure) |  | Возвращает данные о прохождении пользователем аутентификации по 3‑D Secure |
| public | [jsonSerialize()](../classes/YooKassa-Common-AbstractObject.md#method_jsonSerialize) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации |
| public | [offsetExists()](../classes/YooKassa-Common-AbstractObject.md#method_offsetExists) |  | Проверяет наличие свойства |
| public | [offsetGet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetGet) |  | Возвращает значение свойства |
| public | [offsetSet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetSet) |  | Устанавливает значение свойства |
| public | [offsetUnset()](../classes/YooKassa-Common-AbstractObject.md#method_offsetUnset) |  | Удаляет свойство |
| public | [setAuthCode()](../classes/YooKassa-Model-AuthorizationDetails.md#method_setAuthCode) |  | Устанавливает код авторизации банковской карты |
| public | [setRrn()](../classes/YooKassa-Model-AuthorizationDetails.md#method_setRrn) |  | Устанавливает уникальный идентификатор транзакции |
| public | [setThreeDSecure()](../classes/YooKassa-Model-AuthorizationDetails.md#method_setThreeDSecure) |  | Устанавливает данные о прохождении пользователем аутентификации по 3‑D Secure |
| public | [toArray()](../classes/YooKassa-Common-AbstractObject.md#method_toArray) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации Является алиасом метода AbstractObject::jsonSerialize() |
| protected | [getUnknownProperties()](../classes/YooKassa-Common-AbstractObject.md#method_getUnknownProperties) |  | Возвращает массив свойств которые не существуют, но были заданы у объекта |

---
### Details
* File: [lib/Model/AuthorizationDetails.php](../../lib/Model/AuthorizationDetails.php)
* Package: Default
* Class Hierarchy: 
  * [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)
  * \YooKassa\Model\AuthorizationDetails
* Implements:
  * [\YooKassa\Model\AuthorizationDetailsInterface](../classes/YooKassa-Model-AuthorizationDetailsInterface.md)

---
## Properties
<a name="property_authCode"></a>
#### public $authCode : string
---
***Description***

Код авторизации банковской карты

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_rrn"></a>
#### public $rrn : string
---
***Description***

Retrieval Reference Number — уникальный идентификатор транзакции в системе эмитента

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_threeDSecure"></a>
#### public $threeDSecure : \YooKassa\Model\ThreeDSecure
---
***Description***

Данные о прохождении пользователем аутентификации по 3‑D Secure

**Type:** <a href="../classes/YooKassa-Model-ThreeDSecure.html"><abbr title="\YooKassa\Model\ThreeDSecure">ThreeDSecure</abbr></a>

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


<a name="method_fromArray" class="anchor"></a>
#### public fromArray() : mixed

```php
public fromArray(mixed $sourceArray) : mixed
```

**Summary**

Устанавливает значения свойств текущего объекта из массива

**Details:**
* Inherited From: [\YooKassa\Model\AuthorizationDetails](../classes/YooKassa-Model-AuthorizationDetails.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">mixed</code> | sourceArray  | Ассоциативный массив с настройками |

**Returns:** mixed - 


<a name="method_getAuthCode" class="anchor"></a>
#### public getAuthCode() : string|null

```php
public getAuthCode() : string|null
```

**Summary**

Возвращает код авторизации банковской карты

**Details:**
* Inherited From: [\YooKassa\Model\AuthorizationDetails](../classes/YooKassa-Model-AuthorizationDetails.md)

**Returns:** string|null - Код авторизации банковской карты


<a name="method_getRrn" class="anchor"></a>
#### public getRrn() : string|null

```php
public getRrn() : string|null
```

**Summary**

Возвращает уникальный идентификатор транзакции

**Details:**
* Inherited From: [\YooKassa\Model\AuthorizationDetails](../classes/YooKassa-Model-AuthorizationDetails.md)

**Returns:** string|null - Уникальный идентификатор транзакции


<a name="method_getThreeDSecure" class="anchor"></a>
#### public getThreeDSecure() : \YooKassa\Model\ThreeDSecure|null

```php
public getThreeDSecure() : \YooKassa\Model\ThreeDSecure|null
```

**Summary**

Возвращает данные о прохождении пользователем аутентификации по 3‑D Secure

**Details:**
* Inherited From: [\YooKassa\Model\AuthorizationDetails](../classes/YooKassa-Model-AuthorizationDetails.md)

**Returns:** \YooKassa\Model\ThreeDSecure|null - Объект с данными о прохождении пользователем аутентификации по 3‑D Secure


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


<a name="method_setAuthCode" class="anchor"></a>
#### public setAuthCode() : mixed

```php
public setAuthCode($value) : mixed
```

**Summary**

Устанавливает код авторизации банковской карты

**Details:**
* Inherited From: [\YooKassa\Model\AuthorizationDetails](../classes/YooKassa-Model-AuthorizationDetails.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php"></code> | value  |  |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException |  |

**Returns:** mixed - 


<a name="method_setRrn" class="anchor"></a>
#### public setRrn() : mixed

```php
public setRrn($value) : mixed
```

**Summary**

Устанавливает уникальный идентификатор транзакции

**Details:**
* Inherited From: [\YooKassa\Model\AuthorizationDetails](../classes/YooKassa-Model-AuthorizationDetails.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php"></code> | value  |  |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException |  |

**Returns:** mixed - 


<a name="method_setThreeDSecure" class="anchor"></a>
#### public setThreeDSecure() : mixed

```php
public setThreeDSecure(\YooKassa\Model\ThreeDSecure|array $value) : mixed
```

**Summary**

Устанавливает данные о прохождении пользователем аутентификации по 3‑D Secure

**Details:**
* Inherited From: [\YooKassa\Model\AuthorizationDetails](../classes/YooKassa-Model-AuthorizationDetails.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\ThreeDSecure OR array</code> | value  | Данные о прохождении аутентификации по 3‑D Secure |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException |  |

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