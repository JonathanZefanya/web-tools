# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Model\Leg
### Namespace: [\YooKassa\Model](../namespaces/yookassa-model.md)
---
**Summary:**

Класс, описывающий маршрут


---
### Constants
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [ISO8601](../classes/YooKassa-Model-Leg.md#constant_ISO8601) |  | Формат даты |

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [$departure_airport](../classes/YooKassa-Model-Leg.md#property_departure_airport) |  | Трёхбуквенный IATA-код аэропорта вылета |
| public | [$departure_date](../classes/YooKassa-Model-Leg.md#property_departure_date) |  | Дата вылета в формате YYYY-MM-DD ISO 8601:2004 |
| public | [$departureAirport](../classes/YooKassa-Model-Leg.md#property_departureAirport) |  | Трёхбуквенный IATA-код аэропорта вылета |
| public | [$departureDate](../classes/YooKassa-Model-Leg.md#property_departureDate) |  | Дата вылета в формате YYYY-MM-DD ISO 8601:2004 |
| public | [$destination_airport](../classes/YooKassa-Model-Leg.md#property_destination_airport) |  | Трёхбуквенный IATA-код аэропорта прилёта |
| public | [$destinationAirport](../classes/YooKassa-Model-Leg.md#property_destinationAirport) |  | Трёхбуквенный IATA-код аэропорта прилёта |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [__construct()](../classes/YooKassa-Common-AbstractObject.md#method___construct) |  | AbstractObject constructor. |
| public | [__get()](../classes/YooKassa-Common-AbstractObject.md#method___get) |  | Возвращает значение свойства |
| public | [__isset()](../classes/YooKassa-Common-AbstractObject.md#method___isset) |  | Проверяет наличие свойства |
| public | [__set()](../classes/YooKassa-Common-AbstractObject.md#method___set) |  | Устанавливает значение свойства |
| public | [__unset()](../classes/YooKassa-Common-AbstractObject.md#method___unset) |  | Удаляет свойство |
| public | [fromArray()](../classes/YooKassa-Common-AbstractObject.md#method_fromArray) |  | Устанавливает значения свойств текущего объекта из массива |
| public | [getDepartureAirport()](../classes/YooKassa-Model-Leg.md#method_getDepartureAirport) |  | Возвращает трёхбуквенный IATA-код аэропорта вылета |
| public | [getDepartureDate()](../classes/YooKassa-Model-Leg.md#method_getDepartureDate) |  | Возвращает дату вылета в формате YYYY-MM-DD ISO 8601:2004 |
| public | [getDestinationAirport()](../classes/YooKassa-Model-Leg.md#method_getDestinationAirport) |  | Возвращает трёхбуквенный IATA-код аэропорта прилёта |
| public | [jsonSerialize()](../classes/YooKassa-Common-AbstractObject.md#method_jsonSerialize) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации |
| public | [offsetExists()](../classes/YooKassa-Common-AbstractObject.md#method_offsetExists) |  | Проверяет наличие свойства |
| public | [offsetGet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetGet) |  | Возвращает значение свойства |
| public | [offsetSet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetSet) |  | Устанавливает значение свойства |
| public | [offsetUnset()](../classes/YooKassa-Common-AbstractObject.md#method_offsetUnset) |  | Удаляет свойство |
| public | [setDepartureAirport()](../classes/YooKassa-Model-Leg.md#method_setDepartureAirport) |  | Устанавливает трёхбуквенный IATA-код аэропорта вылета |
| public | [setDepartureDate()](../classes/YooKassa-Model-Leg.md#method_setDepartureDate) |  | Устанавливает дату вылета в формате YYYY-MM-DD ISO 8601:2004 |
| public | [setDestinationAirport()](../classes/YooKassa-Model-Leg.md#method_setDestinationAirport) |  | Устанавливает трёхбуквенный IATA-код аэропорта прилёта |
| public | [toArray()](../classes/YooKassa-Common-AbstractObject.md#method_toArray) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации Является алиасом метода AbstractObject::jsonSerialize() |
| protected | [getUnknownProperties()](../classes/YooKassa-Common-AbstractObject.md#method_getUnknownProperties) |  | Возвращает массив свойств которые не существуют, но были заданы у объекта |

---
### Details
* File: [lib/Model/Leg.php](../../lib/Model/Leg.php)
* Package: YooKassa
* Class Hierarchy: 
  * [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)
  * \YooKassa\Model\Leg
* Implements:
  * [\YooKassa\Model\LegInterface](../classes/YooKassa-Model-LegInterface.md)

---
## Constants
<a name="constant_ISO8601" class="anchor"></a>
###### ISO8601
Формат даты

```php
ISO8601 = 'Y-m-d'
```



---
## Properties
<a name="property_departure_airport"></a>
#### public $departure_airport : string
---
***Description***

Трёхбуквенный IATA-код аэропорта вылета

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_departure_date"></a>
#### public $departure_date : string
---
***Description***

Дата вылета в формате YYYY-MM-DD ISO 8601:2004

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_departureAirport"></a>
#### public $departureAirport : string
---
***Description***

Трёхбуквенный IATA-код аэропорта вылета

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_departureDate"></a>
#### public $departureDate : string
---
***Description***

Дата вылета в формате YYYY-MM-DD ISO 8601:2004

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_destination_airport"></a>
#### public $destination_airport : string
---
***Description***

Трёхбуквенный IATA-код аэропорта прилёта

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_destinationAirport"></a>
#### public $destinationAirport : string
---
***Description***

Трёхбуквенный IATA-код аэропорта прилёта

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

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


<a name="method_getDepartureAirport" class="anchor"></a>
#### public getDepartureAirport() : string

```php
public getDepartureAirport() : string
```

**Summary**

Возвращает трёхбуквенный IATA-код аэропорта вылета

**Details:**
* Inherited From: [\YooKassa\Model\Leg](../classes/YooKassa-Model-Leg.md)

**Returns:** string - Трёхбуквенный IATA-код аэропорта вылета

##### Tags
| Tag | Version | Description |
| --- | ------- | ----------- |
| inheritdoc |  |  |

<a name="method_getDepartureDate" class="anchor"></a>
#### public getDepartureDate() : string

```php
public getDepartureDate() : string
```

**Summary**

Возвращает дату вылета в формате YYYY-MM-DD ISO 8601:2004

**Details:**
* Inherited From: [\YooKassa\Model\Leg](../classes/YooKassa-Model-Leg.md)

**Returns:** string - Дата вылета в формате YYYY-MM-DD ISO 8601:2004

##### Tags
| Tag | Version | Description |
| --- | ------- | ----------- |
| inheritdoc |  |  |

<a name="method_getDestinationAirport" class="anchor"></a>
#### public getDestinationAirport() : string

```php
public getDestinationAirport() : string
```

**Summary**

Возвращает трёхбуквенный IATA-код аэропорта прилёта

**Details:**
* Inherited From: [\YooKassa\Model\Leg](../classes/YooKassa-Model-Leg.md)

**Returns:** string - Трёхбуквенный IATA-код аэропорта прилёта

##### Tags
| Tag | Version | Description |
| --- | ------- | ----------- |
| inheritdoc |  |  |

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


<a name="method_setDepartureAirport" class="anchor"></a>
#### public setDepartureAirport() : mixed

```php
public setDepartureAirport(string $value) : mixed
```

**Summary**

Устанавливает трёхбуквенный IATA-код аэропорта вылета

**Details:**
* Inherited From: [\YooKassa\Model\Leg](../classes/YooKassa-Model-Leg.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  |  |

**Returns:** mixed - 

##### Tags
| Tag | Version | Description |
| --- | ------- | ----------- |
| inheritdoc |  |  |

<a name="method_setDepartureDate" class="anchor"></a>
#### public setDepartureDate() : mixed

```php
public setDepartureDate(\DateTime|string $value) : mixed
```

**Summary**

Устанавливает дату вылета в формате YYYY-MM-DD ISO 8601:2004

**Details:**
* Inherited From: [\YooKassa\Model\Leg](../classes/YooKassa-Model-Leg.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\DateTime OR string</code> | value  |  |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** mixed - 

##### Tags
| Tag | Version | Description |
| --- | ------- | ----------- |
| inheritdoc |  |  |

<a name="method_setDestinationAirport" class="anchor"></a>
#### public setDestinationAirport() : mixed

```php
public setDestinationAirport(string $value) : mixed
```

**Summary**

Устанавливает трёхбуквенный IATA-код аэропорта прилёта

**Details:**
* Inherited From: [\YooKassa\Model\Leg](../classes/YooKassa-Model-Leg.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  |  |

**Returns:** mixed - 

##### Tags
| Tag | Version | Description |
| --- | ------- | ----------- |
| inheritdoc |  |  |

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