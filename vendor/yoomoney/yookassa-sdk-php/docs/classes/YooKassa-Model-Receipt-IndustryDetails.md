# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Model\Receipt\IndustryDetails
### Namespace: [\YooKassa\Model\Receipt](../namespaces/yookassa-model-receipt.md)
---
**Summary:**

Class IndustryDetails

**Description:**

Данные отраслевого реквизита

---
### Constants
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [DOCUMENT_NUMBER_MAX_LENGTH](../classes/YooKassa-Model-Receipt-IndustryDetails.md#constant_DOCUMENT_NUMBER_MAX_LENGTH) |  |  |
| public | [VALUE_MAX_LENGTH](../classes/YooKassa-Model-Receipt-IndustryDetails.md#constant_VALUE_MAX_LENGTH) |  |  |
| public | [DOCUMENT_DATE_FORMAT](../classes/YooKassa-Model-Receipt-IndustryDetails.md#constant_DOCUMENT_DATE_FORMAT) |  |  |

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [$document_date](../classes/YooKassa-Model-Receipt-IndustryDetails.md#property_document_date) |  | Дата документа основания (тег в 54 ФЗ — 1263) |
| public | [$document_number](../classes/YooKassa-Model-Receipt-IndustryDetails.md#property_document_number) |  | Номер нормативного акта федерального органа исполнительной власти (тег в 54 ФЗ — 1264) |
| public | [$documentDate](../classes/YooKassa-Model-Receipt-IndustryDetails.md#property_documentDate) |  | Дата документа основания (тег в 54 ФЗ — 1263) |
| public | [$documentNumber](../classes/YooKassa-Model-Receipt-IndustryDetails.md#property_documentNumber) |  | Номер нормативного акта федерального органа исполнительной власти (тег в 54 ФЗ — 1264) |
| public | [$federal_id](../classes/YooKassa-Model-Receipt-IndustryDetails.md#property_federal_id) |  | Идентификатор федерального органа исполнительной власти (тег в 54 ФЗ — 1262) |
| public | [$federalId](../classes/YooKassa-Model-Receipt-IndustryDetails.md#property_federalId) |  | Идентификатор федерального органа исполнительной власти (тег в 54 ФЗ — 1262) |
| public | [$value](../classes/YooKassa-Model-Receipt-IndustryDetails.md#property_value) |  | Значение отраслевого реквизита (тег в 54 ФЗ — 1265) |

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
| public | [getDocumentDate()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_getDocumentDate) |  | Возвращает дату документа основания |
| public | [getDocumentNumber()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_getDocumentNumber) |  | Возвращает номер нормативного акта федерального органа исполнительной власти |
| public | [getFederalId()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_getFederalId) |  | Возвращает идентификатор федерального органа исполнительной власти |
| public | [getValue()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_getValue) |  | Возвращает значение отраслевого реквизита |
| public | [jsonSerialize()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_jsonSerialize) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации |
| public | [offsetExists()](../classes/YooKassa-Common-AbstractObject.md#method_offsetExists) |  | Проверяет наличие свойства |
| public | [offsetGet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetGet) |  | Возвращает значение свойства |
| public | [offsetSet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetSet) |  | Устанавливает значение свойства |
| public | [offsetUnset()](../classes/YooKassa-Common-AbstractObject.md#method_offsetUnset) |  | Удаляет свойство |
| public | [setDocumentDate()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_setDocumentDate) |  | Устанавливает дату документа основания |
| public | [setDocumentNumber()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_setDocumentNumber) |  | Устанавливает номер нормативного акта федерального органа исполнительной власти |
| public | [setFederalId()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_setFederalId) |  | Устанавливает идентификатор федерального органа исполнительной власти |
| public | [setValue()](../classes/YooKassa-Model-Receipt-IndustryDetails.md#method_setValue) |  | Устанавливает значение отраслевого реквизита |
| public | [toArray()](../classes/YooKassa-Common-AbstractObject.md#method_toArray) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации Является алиасом метода AbstractObject::jsonSerialize() |
| protected | [getUnknownProperties()](../classes/YooKassa-Common-AbstractObject.md#method_getUnknownProperties) |  | Возвращает массив свойств которые не существуют, но были заданы у объекта |

---
### Details
* File: [lib/Model/Receipt/IndustryDetails.php](../../lib/Model/Receipt/IndustryDetails.php)
* Package: YooKassa
* Class Hierarchy: 
  * [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)
  * \YooKassa\Model\Receipt\IndustryDetails

---
## Constants
<a name="constant_DOCUMENT_NUMBER_MAX_LENGTH" class="anchor"></a>
###### DOCUMENT_NUMBER_MAX_LENGTH
```php
DOCUMENT_NUMBER_MAX_LENGTH = 32 : int
```


<a name="constant_VALUE_MAX_LENGTH" class="anchor"></a>
###### VALUE_MAX_LENGTH
```php
VALUE_MAX_LENGTH = 256 : int
```


<a name="constant_DOCUMENT_DATE_FORMAT" class="anchor"></a>
###### DOCUMENT_DATE_FORMAT
```php
DOCUMENT_DATE_FORMAT = 'Y-m-d' : string
```



---
## Properties
<a name="property_document_date"></a>
#### public $document_date : \DateTime
---
***Description***

Дата документа основания (тег в 54 ФЗ — 1263)

**Type:** \DateTime

**Details:**


<a name="property_document_number"></a>
#### public $document_number : string
---
***Description***

Номер нормативного акта федерального органа исполнительной власти (тег в 54 ФЗ — 1264)

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_documentDate"></a>
#### public $documentDate : \DateTime
---
***Description***

Дата документа основания (тег в 54 ФЗ — 1263)

**Type:** \DateTime

**Details:**


<a name="property_documentNumber"></a>
#### public $documentNumber : string
---
***Description***

Номер нормативного акта федерального органа исполнительной власти (тег в 54 ФЗ — 1264)

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_federal_id"></a>
#### public $federal_id : string
---
***Description***

Идентификатор федерального органа исполнительной власти (тег в 54 ФЗ — 1262)

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_federalId"></a>
#### public $federalId : string
---
***Description***

Идентификатор федерального органа исполнительной власти (тег в 54 ФЗ — 1262)

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_value"></a>
#### public $value : string
---
***Description***

Значение отраслевого реквизита (тег в 54 ФЗ — 1265)

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


<a name="method_getDocumentDate" class="anchor"></a>
#### public getDocumentDate() : \DateTime

```php
public getDocumentDate() : \DateTime
```

**Summary**

Возвращает дату документа основания

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

**Returns:** \DateTime - Дата документа основания


<a name="method_getDocumentNumber" class="anchor"></a>
#### public getDocumentNumber() : string

```php
public getDocumentNumber() : string
```

**Summary**

Возвращает номер нормативного акта федерального органа исполнительной власти

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

**Returns:** string - Номер нормативного акта федерального органа исполнительной власти


<a name="method_getFederalId" class="anchor"></a>
#### public getFederalId() : string

```php
public getFederalId() : string
```

**Summary**

Возвращает идентификатор федерального органа исполнительной власти

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

**Returns:** string - Идентификатор федерального органа исполнительной власти


<a name="method_getValue" class="anchor"></a>
#### public getValue() : string

```php
public getValue() : string
```

**Summary**

Возвращает значение отраслевого реквизита

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

**Returns:** string - Значение отраслевого реквизита


<a name="method_jsonSerialize" class="anchor"></a>
#### public jsonSerialize() : array

```php
public jsonSerialize() : array
```

**Summary**

Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

**Returns:** array - 

##### Tags
| Tag | Version | Description |
| --- | ------- | ----------- |
| inheritdoc |  |  |

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


<a name="method_setDocumentDate" class="anchor"></a>
#### public setDocumentDate() : mixed

```php
public setDocumentDate(string|\DateTime $value) : mixed
```

**Summary**

Устанавливает дату документа основания

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string OR \DateTime</code> | value  | Дата документа основания |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** mixed - 


<a name="method_setDocumentNumber" class="anchor"></a>
#### public setDocumentNumber() : mixed

```php
public setDocumentNumber(string $value) : mixed
```

**Summary**

Устанавливает номер нормативного акта федерального органа исполнительной власти

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Номер нормативного акта федерального органа исполнительной власти |

**Returns:** mixed - 


<a name="method_setFederalId" class="anchor"></a>
#### public setFederalId() : mixed

```php
public setFederalId(string $value) : mixed
```

**Summary**

Устанавливает идентификатор федерального органа исполнительной власти

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Идентификатор федерального органа исполнительной власти |

**Returns:** mixed - 


<a name="method_setValue" class="anchor"></a>
#### public setValue() : mixed

```php
public setValue(string $value) : mixed
```

**Summary**

Устанавливает значение отраслевого реквизита

**Details:**
* Inherited From: [\YooKassa\Model\Receipt\IndustryDetails](../classes/YooKassa-Model-Receipt-IndustryDetails.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Значение отраслевого реквизита |

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