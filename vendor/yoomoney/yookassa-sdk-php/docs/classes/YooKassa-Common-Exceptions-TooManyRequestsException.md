# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Common\Exceptions\TooManyRequestsException
### Namespace: [\YooKassa\Common\Exceptions](../namespaces/yookassa-common-exceptions.md)
---
**Summary:**

Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.


---
### Constants
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [HTTP_CODE](../classes/YooKassa-Common-Exceptions-TooManyRequestsException.md#constant_HTTP_CODE) |  |  |

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [$retryAfter](../classes/YooKassa-Common-Exceptions-TooManyRequestsException.md#property_retryAfter) |  |  |
| public | [$type](../classes/YooKassa-Common-Exceptions-TooManyRequestsException.md#property_type) |  |  |
| protected | [$responseBody](../classes/YooKassa-Common-Exceptions-ApiException.md#property_responseBody) |  |  |
| protected | [$responseHeaders](../classes/YooKassa-Common-Exceptions-ApiException.md#property_responseHeaders) |  |  |

---
### Methods
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [__construct()](../classes/YooKassa-Common-Exceptions-TooManyRequestsException.md#method___construct) |  | Constructor |
| public | [getResponseBody()](../classes/YooKassa-Common-Exceptions-ApiException.md#method_getResponseBody) |  |  |
| public | [getResponseHeaders()](../classes/YooKassa-Common-Exceptions-ApiException.md#method_getResponseHeaders) |  |  |

---
### Details
* File: [lib/Common/Exceptions/TooManyRequestsException.php](../../lib/Common/Exceptions/TooManyRequestsException.php)
* Package: YooKassa
* Class Hierarchy:  
  * [\Exception](\Exception)
  * [\YooKassa\Common\Exceptions\ApiException](../classes/YooKassa-Common-Exceptions-ApiException.md)
  * \YooKassa\Common\Exceptions\TooManyRequestsException

---
## Constants
<a name="constant_HTTP_CODE" class="anchor"></a>
###### HTTP_CODE
```php
HTTP_CODE = 429
```



---
## Properties
<a name="property_retryAfter"></a>
#### public $retryAfter
---

**Details:**


<a name="property_type"></a>
#### public $type
---

**Details:**


<a name="property_responseBody"></a>
#### protected $responseBody : mixed
---
**Type:** <a href="../mixed"><abbr title="mixed">mixed</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\Exceptions\ApiException](../classes/YooKassa-Common-Exceptions-ApiException.md)


<a name="property_responseHeaders"></a>
#### protected $responseHeaders : string[]
---
**Type:** <a href="../string[]"><abbr title="string[]">string[]</abbr></a>

**Details:**
* Inherited From: [\YooKassa\Common\Exceptions\ApiException](../classes/YooKassa-Common-Exceptions-ApiException.md)



---
## Methods
<a name="method___construct" class="anchor"></a>
#### public __construct() : mixed

```php
public __construct(mixed $responseHeaders = array(), mixed $responseBody = null) : mixed
```

**Summary**

Constructor

**Details:**
* Inherited From: [\YooKassa\Common\Exceptions\TooManyRequestsException](../classes/YooKassa-Common-Exceptions-TooManyRequestsException.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">mixed</code> | responseHeaders  | HTTP header |
| <code lang="php">mixed</code> | responseBody  | HTTP body |

**Returns:** mixed - 


<a name="method_getResponseBody" class="anchor"></a>
#### public getResponseBody() : mixed

```php
public getResponseBody() : mixed
```

**Details:**
* Inherited From: [\YooKassa\Common\Exceptions\ApiException](../classes/YooKassa-Common-Exceptions-ApiException.md)

**Returns:** mixed - 


<a name="method_getResponseHeaders" class="anchor"></a>
#### public getResponseHeaders() : string[]

```php
public getResponseHeaders() : string[]
```

**Details:**
* Inherited From: [\YooKassa\Common\Exceptions\ApiException](../classes/YooKassa-Common-Exceptions-ApiException.md)

**Returns:** string[] - 



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