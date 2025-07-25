# [YooKassa API SDK](../home.md)

# Class: \YooKassa\Request\Payments\CreatePaymentRequest
### Namespace: [\YooKassa\Request\Payments](../namespaces/yookassa-request-payments.md)
---
**Summary:**

Класс объекта запроса к API на проведение нового платежа


---
### Examples
Пример использования билдера

```php
try {
    $builder = \YooKassa\Request\Payments\CreatePaymentRequest::builder();
    $builder->setAmount(100)
            ->setCurrency(\YooKassa\Model\CurrencyCode::RUB)
            ->setCapture(true)
            ->setDescription('Оплата заказа 112233')
            ->setMetadata(array(
                'cms_name'       => 'yoo_api_test',
                'order_id'       => '112233',
                'language'       => 'ru',
                'transaction_id' => '123-456-789',
            ));

    // Устанавливаем страницу для редиректа после оплаты
    $builder->setConfirmation(array(
        'type'      => \YooKassa\Model\ConfirmationType::REDIRECT,
        'returnUrl' => 'https://merchant-site.ru/payment-return-page',
    ));

    // Можем установить конкретный способ оплаты
    $builder->setPaymentMethodData(\YooKassa\Model\PaymentMethodType::BANK_CARD);

    // Составляем чек
    $builder->setReceiptEmail('john.doe@merchant.com');
    $builder->setReceiptPhone('71111111111');
    // Добавим товар
    $builder->addReceiptItem(
        'Платок Gucci',
        3000,
        1.0,
        2,
        'full_payment',
        'commodity'
    );
    // Добавим доставку
    $builder->addReceiptShipping(
        'Delivery/Shipping/Доставка',
        100,
        1,
        \YooKassa\Model\Receipt\PaymentMode::FULL_PAYMENT,
        \YooKassa\Model\Receipt\PaymentSubject::SERVICE
    );

    // Можно добавить распределение денег по магазинам
    $builder->setTransfers(array(
        array(
            'account_id' => 123456,
            'amount' => array(
                array(
                    'value' => 1000,
                    'currency' => \YooKassa\Model\CurrencyCode::RUB
                )
            ),
        ),
        array(
            'account_id' => 654321,
            'amount' => array(
                array(
                    'value' => 2000,
                    'currency' => \YooKassa\Model\CurrencyCode::RUB
                )
            ),
        )
    ));

    // Создаем объект запроса
    $request = $builder->build();

    // Можно изменить данные, если нужно
    $request->setDescription($request->getDescription() . ' - merchant comment');

    $idempotenceKey = uniqid('', true);
    $response = $client->createPayment($request, $idempotenceKey);
} catch (\Exception $e) {
    $response = $e;
}

var_dump($response);

```

---
### Constants
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [MAX_LENGTH_PAYMENT_TOKEN](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#constant_MAX_LENGTH_PAYMENT_TOKEN) |  |  |

---
### Properties
| Visibility | Name | Flag | Summary |
| ----------:| ---- | ---- | ------- |
| public | [$airline](../classes/YooKassa-Common-AbstractPaymentRequest.md#property_airline) |  | Данные фискального чека 54-ФЗ |
| public | [$amount](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_amount) |  | Сумма создаваемого платежа |
| public | [$amount](../classes/YooKassa-Common-AbstractPaymentRequest.md#property_amount) |  | Сумма |
| public | [$capture](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_capture) |  | Автоматически принять поступившую оплату |
| public | [$client_ip](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_client_ip) |  | IPv4 или IPv6-адрес покупателя. Если не указан, используется IP-адрес TCP-подключения |
| public | [$clientIp](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_clientIp) |  | IPv4 или IPv6-адрес покупателя. Если не указан, используется IP-адрес TCP-подключения |
| public | [$confirmation](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_confirmation) |  | Способ подтверждения платежа |
| public | [$deal](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_deal) |  | Данные о сделке, в составе которой проходит платеж |
| public | [$description](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_description) |  | Описание транзакции |
| public | [$fraud_data](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_fraud_data) |  | Информация для проверки операции на мошенничество |
| public | [$fraudData](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_fraudData) |  | Информация для проверки операции на мошенничество |
| public | [$merchant_customer_id](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_merchant_customer_id) |  | Идентификатор покупателя в вашей системе, например электронная почта или номер телефона |
| public | [$merchantCustomerId](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_merchantCustomerId) |  | Идентификатор покупателя в вашей системе, например электронная почта или номер телефона |
| public | [$metadata](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_metadata) |  | Метаданные привязанные к платежу |
| public | [$payment_method_data](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_payment_method_data) |  | Данные используемые для создания метода оплаты |
| public | [$payment_method_id](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_payment_method_id) |  | Идентификатор записи о сохраненных платежных данных покупателя |
| public | [$payment_token](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_payment_token) |  | Одноразовый токен для проведения оплаты, сформированный YooKassa JS widget |
| public | [$paymentMethodData](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_paymentMethodData) |  | Данные используемые для создания метода оплаты |
| public | [$paymentMethodId](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_paymentMethodId) |  | Идентификатор записи о сохраненных платежных данных покупателя |
| public | [$paymentToken](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_paymentToken) |  | Одноразовый токен для проведения оплаты, сформированный YooKassa JS widget |
| public | [$receipt](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_receipt) |  | Данные фискального чека 54-ФЗ |
| public | [$receipt](../classes/YooKassa-Common-AbstractPaymentRequest.md#property_receipt) |  | Данные фискального чека 54-ФЗ |
| public | [$recipient](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_recipient) |  | Получатель платежа, если задан |
| public | [$save_payment_method](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_save_payment_method) |  | Сохранить платежные данные для последующего использования. Значение true инициирует создание многоразового payment_method |
| public | [$savePaymentMethod](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#property_savePaymentMethod) |  | Сохранить платежные данные для последующего использования. Значение true инициирует создание многоразового payment_method |
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
| public | [builder()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_builder) |  | Возвращает билдер объектов запросов создания платежа |
| public | [clearValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_clearValidationError) |  | Очищает статус валидации текущего запроса |
| public | [fromArray()](../classes/YooKassa-Common-AbstractObject.md#method_fromArray) |  | Устанавливает значения свойств текущего объекта из массива |
| public | [getAirline()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_getAirline) |  | Возвращает данные авиабилетов |
| public | [getAmount()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_getAmount) |  | Возвращает сумму оплаты |
| public | [getCapture()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getCapture) |  | Возвращает флаг автоматического принятия поступившей оплаты |
| public | [getClientIp()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getClientIp) |  | Возвращает IPv4 или IPv6-адрес покупателя |
| public | [getConfirmation()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getConfirmation) |  | Возвращает способ подтверждения платежа |
| public | [getDeal()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getDeal) |  | Возвращает данные о сделке, в составе которой проходит платеж |
| public | [getDescription()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getDescription) |  | Возвращает описание транзакции |
| public | [getFraudData()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getFraudData) |  | Возвращает информацию для проверки операции на мошенничество. |
| public | [getLastValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_getLastValidationError) |  | Возвращает последнюю ошибку валидации |
| public | [getMerchantCustomerId()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getMerchantCustomerId) |  | Возвращает идентификатор покупателя в вашей системе |
| public | [getMetadata()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getMetadata) |  | Возвращает данные оплаты установленные мерчантом |
| public | [getPaymentMethodData()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getPaymentMethodData) |  | Возвращает данные для создания метода оплаты |
| public | [getPaymentMethodId()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getPaymentMethodId) |  | Устанавливает идентификатор записи платёжных данных покупателя |
| public | [getPaymentToken()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getPaymentToken) |  | Возвращает одноразовый токен для проведения оплаты |
| public | [getReceipt()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_getReceipt) |  | Возвращает чек, если он есть |
| public | [getRecipient()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getRecipient) |  | Возвращает объект получателя платежа |
| public | [getSavePaymentMethod()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_getSavePaymentMethod) |  | Возвращает флаг сохранения платёжных данных |
| public | [getTransfers()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_getTransfers) |  | Возвращает данные о распределении денег — сколько и в какой магазин нужно перевести. |
| public | [hasAirline()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_hasAirline) |  | Проверяет, были ли установлены данные авиабилетов |
| public | [hasAmount()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_hasAmount) |  | Проверяет, была ли установлена сумма оплаты |
| public | [hasCapture()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasCapture) |  | Проверяет, был ли установлен флаг автоматического принятия поступившей оплаты |
| public | [hasClientIp()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasClientIp) |  | Проверяет, был ли установлен IPv4 или IPv6-адрес покупателя |
| public | [hasConfirmation()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasConfirmation) |  | Проверяет, был ли установлен способ подтверждения платежа |
| public | [hasDeal()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasDeal) |  | Проверяет, были ли установлены данные о сделке |
| public | [hasDescription()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasDescription) |  | Проверяет наличие описания транзакции в создаваемом платеже |
| public | [hasFraudData()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasFraudData) |  | Проверяет, была ли установлена информация для проверки операции на мошенничество |
| public | [hasMerchantCustomerId()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasMerchantCustomerId) |  | Проверяет, был ли установлен идентификатор покупателя в вашей системе |
| public | [hasMetadata()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasMetadata) |  | Проверяет, были ли установлены метаданные заказа |
| public | [hasPaymentMethodData()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasPaymentMethodData) |  | Проверяет установлен ли объект с методом оплаты |
| public | [hasPaymentMethodId()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasPaymentMethodId) |  | Проверяет наличие идентификатора записи о платёжных данных покупателя |
| public | [hasPaymentToken()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasPaymentToken) |  | Проверяет наличие одноразового токена для проведения оплаты |
| public | [hasReceipt()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_hasReceipt) |  | Проверяет наличие чека |
| public | [hasRecipient()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasRecipient) |  | Проверяет наличие получателя платежа в запросе |
| public | [hasSavePaymentMethod()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_hasSavePaymentMethod) |  | Проверяет, был ли установлен флаг сохранения платёжных данных |
| public | [hasTransfers()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_hasTransfers) |  | Проверяет наличие данных о распределении денег |
| public | [jsonSerialize()](../classes/YooKassa-Common-AbstractObject.md#method_jsonSerialize) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации |
| public | [offsetExists()](../classes/YooKassa-Common-AbstractObject.md#method_offsetExists) |  | Проверяет наличие свойства |
| public | [offsetGet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetGet) |  | Возвращает значение свойства |
| public | [offsetSet()](../classes/YooKassa-Common-AbstractObject.md#method_offsetSet) |  | Устанавливает значение свойства |
| public | [offsetUnset()](../classes/YooKassa-Common-AbstractObject.md#method_offsetUnset) |  | Удаляет свойство |
| public | [removeReceipt()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_removeReceipt) |  | Удаляет чек из запроса |
| public | [setAirline()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_setAirline) |  | Устанавливает информацию об авиабилетах |
| public | [setAmount()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_setAmount) |  | Устанавливает сумму |
| public | [setCapture()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setCapture) |  | Устанавливает флаг автоматического принятия поступившей оплаты |
| public | [setClientIp()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setClientIp) |  | Устанавливает IP адрес покупателя |
| public | [setConfirmation()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setConfirmation) |  | Устанавливает способ подтверждения платежа |
| public | [setDeal()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setDeal) |  | Устанавливает данные о сделке, в составе которой проходит платеж. |
| public | [setDescription()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setDescription) |  | Устанавливает описание транзакции |
| public | [setFraudData()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setFraudData) |  | Устанавливает информацию для проверки операции на мошенничество. |
| public | [setMerchantCustomerId()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setMerchantCustomerId) |  | Устанавливает идентификатор покупателя в вашей системе |
| public | [setMetadata()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setMetadata) |  | Устанавливает метаданные, привязанные к платежу |
| public | [setPaymentMethodData()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setPaymentMethodData) |  | Устанавливает объект с информацией для создания метода оплаты |
| public | [setPaymentMethodId()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setPaymentMethodId) |  | Устанавливает идентификатор записи о сохранённых данных покупателя |
| public | [setPaymentToken()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setPaymentToken) |  | Устанавливает одноразовый токен для проведения оплаты, сформированный YooKassa JS widget |
| public | [setReceipt()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_setReceipt) |  | Устанавливает чек |
| public | [setRecipient()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setRecipient) |  | Устанавливает объект с информацией о получателе платежа |
| public | [setSavePaymentMethod()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_setSavePaymentMethod) |  | Устанавливает флаг сохранения платёжных данных. Значение true инициирует создание многоразового payment_method. |
| public | [setTransfers()](../classes/YooKassa-Common-AbstractPaymentRequest.md#method_setTransfers) |  | Устанавливает transfers (массив распределения денег между магазинами) |
| public | [toArray()](../classes/YooKassa-Common-AbstractObject.md#method_toArray) |  | Возвращает ассоциативный массив со свойствами текущего объекта для его дальнейшей JSON сериализации Является алиасом метода AbstractObject::jsonSerialize() |
| public | [validate()](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md#method_validate) |  | Проверяет на валидность текущий объект |
| protected | [getUnknownProperties()](../classes/YooKassa-Common-AbstractObject.md#method_getUnknownProperties) |  | Возвращает массив свойств которые не существуют, но были заданы у объекта |
| protected | [setValidationError()](../classes/YooKassa-Common-AbstractRequest.md#method_setValidationError) |  | Устанавливает ошибку валидации |

---
### Details
* File: [lib/Request/Payments/CreatePaymentRequest.php](../../lib/Request/Payments/CreatePaymentRequest.php)
* Package: YooKassa
* Class Hierarchy:   
  * [\YooKassa\Common\AbstractObject](../classes/YooKassa-Common-AbstractObject.md)
  * [\YooKassa\Common\AbstractRequest](../classes/YooKassa-Common-AbstractRequest.md)
  * [\YooKassa\Common\AbstractPaymentRequest](../classes/YooKassa-Common-AbstractPaymentRequest.md)
  * \YooKassa\Request\Payments\CreatePaymentRequest
* Implements:
  * [\YooKassa\Request\Payments\CreatePaymentRequestInterface](../classes/YooKassa-Request-Payments-CreatePaymentRequestInterface.md)

---
## Constants
<a name="constant_MAX_LENGTH_PAYMENT_TOKEN" class="anchor"></a>
###### MAX_LENGTH_PAYMENT_TOKEN
```php
MAX_LENGTH_PAYMENT_TOKEN = 10240
```



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

Сумма создаваемого платежа

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


<a name="property_capture"></a>
#### public $capture : bool
---
***Description***

Автоматически принять поступившую оплату

**Type:** <a href="../bool"><abbr title="bool">bool</abbr></a>

**Details:**


<a name="property_client_ip"></a>
#### public $client_ip : string
---
***Description***

IPv4 или IPv6-адрес покупателя. Если не указан, используется IP-адрес TCP-подключения

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_clientIp"></a>
#### public $clientIp : string
---
***Description***

IPv4 или IPv6-адрес покупателя. Если не указан, используется IP-адрес TCP-подключения

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_confirmation"></a>
#### public $confirmation : \YooKassa\Model\ConfirmationAttributes\AbstractConfirmationAttributes
---
***Description***

Способ подтверждения платежа

**Type:** <a href="../classes/YooKassa-Model-ConfirmationAttributes-AbstractConfirmationAttributes.html"><abbr title="\YooKassa\Model\ConfirmationAttributes\AbstractConfirmationAttributes">AbstractConfirmationAttributes</abbr></a>

**Details:**


<a name="property_deal"></a>
#### public $deal : \YooKassa\Model\Deal\PaymentDealInfo
---
***Description***

Данные о сделке, в составе которой проходит платеж

**Type:** <a href="../classes/YooKassa-Model-Deal-PaymentDealInfo.html"><abbr title="\YooKassa\Model\Deal\PaymentDealInfo">PaymentDealInfo</abbr></a>

**Details:**


<a name="property_description"></a>
#### public $description : string
---
***Description***

Описание транзакции

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_fraud_data"></a>
#### public $fraud_data : \YooKassa\Model\FraudData
---
***Description***

Информация для проверки операции на мошенничество

**Type:** <a href="../classes/YooKassa-Model-FraudData.html"><abbr title="\YooKassa\Model\FraudData">FraudData</abbr></a>

**Details:**


<a name="property_fraudData"></a>
#### public $fraudData : \YooKassa\Model\FraudData
---
***Description***

Информация для проверки операции на мошенничество

**Type:** <a href="../classes/YooKassa-Model-FraudData.html"><abbr title="\YooKassa\Model\FraudData">FraudData</abbr></a>

**Details:**


<a name="property_merchant_customer_id"></a>
#### public $merchant_customer_id : string
---
***Description***

Идентификатор покупателя в вашей системе, например электронная почта или номер телефона

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_merchantCustomerId"></a>
#### public $merchantCustomerId : string
---
***Description***

Идентификатор покупателя в вашей системе, например электронная почта или номер телефона

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_metadata"></a>
#### public $metadata : \YooKassa\Model\Metadata
---
***Description***

Метаданные привязанные к платежу

**Type:** <a href="../classes/YooKassa-Model-Metadata.html"><abbr title="\YooKassa\Model\Metadata">Metadata</abbr></a>

**Details:**


<a name="property_payment_method_data"></a>
#### public $payment_method_data : \YooKassa\Model\PaymentData\AbstractPaymentData
---
***Description***

Данные используемые для создания метода оплаты

**Type:** <a href="../classes/YooKassa-Model-PaymentData-AbstractPaymentData.html"><abbr title="\YooKassa\Model\PaymentData\AbstractPaymentData">AbstractPaymentData</abbr></a>

**Details:**


<a name="property_payment_method_id"></a>
#### public $payment_method_id : string
---
***Description***

Идентификатор записи о сохраненных платежных данных покупателя

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_payment_token"></a>
#### public $payment_token : string
---
***Description***

Одноразовый токен для проведения оплаты, сформированный YooKassa JS widget

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_paymentMethodData"></a>
#### public $paymentMethodData : \YooKassa\Model\PaymentData\AbstractPaymentData
---
***Description***

Данные используемые для создания метода оплаты

**Type:** <a href="../classes/YooKassa-Model-PaymentData-AbstractPaymentData.html"><abbr title="\YooKassa\Model\PaymentData\AbstractPaymentData">AbstractPaymentData</abbr></a>

**Details:**


<a name="property_paymentMethodId"></a>
#### public $paymentMethodId : string
---
***Description***

Идентификатор записи о сохраненных платежных данных покупателя

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

**Details:**


<a name="property_paymentToken"></a>
#### public $paymentToken : string
---
***Description***

Одноразовый токен для проведения оплаты, сформированный YooKassa JS widget

**Type:** <a href="../string"><abbr title="string">string</abbr></a>

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


<a name="property_recipient"></a>
#### public $recipient : \YooKassa\Model\RecipientInterface
---
***Description***

Получатель платежа, если задан

**Type:** <a href="../classes/YooKassa-Model-RecipientInterface.html"><abbr title="\YooKassa\Model\RecipientInterface">RecipientInterface</abbr></a>

**Details:**


<a name="property_save_payment_method"></a>
#### public $save_payment_method : bool
---
***Description***

Сохранить платежные данные для последующего использования. Значение true инициирует создание многоразового payment_method

**Type:** <a href="../bool"><abbr title="bool">bool</abbr></a>

**Details:**


<a name="property_savePaymentMethod"></a>
#### public $savePaymentMethod : bool
---
***Description***

Сохранить платежные данные для последующего использования. Значение true инициирует создание многоразового payment_method

**Type:** <a href="../bool"><abbr title="bool">bool</abbr></a>

**Details:**


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
#### public builder() : \YooKassa\Request\Payments\CreatePaymentRequestBuilder

```php
Static public builder() : \YooKassa\Request\Payments\CreatePaymentRequestBuilder
```

**Summary**

Возвращает билдер объектов запросов создания платежа

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** \YooKassa\Request\Payments\CreatePaymentRequestBuilder - Инстанс билдера объектов запросов


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


<a name="method_getCapture" class="anchor"></a>
#### public getCapture() : bool

```php
public getCapture() : bool
```

**Summary**

Возвращает флаг автоматического принятия поступившей оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если требуется автоматически принять поступившую оплату, false если нет


<a name="method_getClientIp" class="anchor"></a>
#### public getClientIp() : string

```php
public getClientIp() : string
```

**Summary**

Возвращает IPv4 или IPv6-адрес покупателя

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** string - IPv4 или IPv6-адрес покупателя


<a name="method_getConfirmation" class="anchor"></a>
#### public getConfirmation() : \YooKassa\Model\ConfirmationAttributes\AbstractConfirmationAttributes

```php
public getConfirmation() : \YooKassa\Model\ConfirmationAttributes\AbstractConfirmationAttributes
```

**Summary**

Возвращает способ подтверждения платежа

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** \YooKassa\Model\ConfirmationAttributes\AbstractConfirmationAttributes - Способ подтверждения платежа


<a name="method_getDeal" class="anchor"></a>
#### public getDeal() : \YooKassa\Model\Deal\PaymentDealInfo

```php
public getDeal() : \YooKassa\Model\Deal\PaymentDealInfo
```

**Summary**

Возвращает данные о сделке, в составе которой проходит платеж

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** \YooKassa\Model\Deal\PaymentDealInfo - Данные о сделке, в составе которой проходит платеж.


<a name="method_getDescription" class="anchor"></a>
#### public getDescription() : string

```php
public getDescription() : string
```

**Summary**

Возвращает описание транзакции

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** string - 


<a name="method_getFraudData" class="anchor"></a>
#### public getFraudData() : \YooKassa\Model\FraudData|null

```php
public getFraudData() : \YooKassa\Model\FraudData|null
```

**Summary**

Возвращает информацию для проверки операции на мошенничество.

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** \YooKassa\Model\FraudData|null - Информация для проверки операции на мошенничество


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


<a name="method_getMerchantCustomerId" class="anchor"></a>
#### public getMerchantCustomerId() : string

```php
public getMerchantCustomerId() : string
```

**Summary**

Возвращает идентификатор покупателя в вашей системе

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** string - Идентификатор покупателя в вашей системе


<a name="method_getMetadata" class="anchor"></a>
#### public getMetadata() : \YooKassa\Model\Metadata

```php
public getMetadata() : \YooKassa\Model\Metadata
```

**Summary**

Возвращает данные оплаты установленные мерчантом

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** \YooKassa\Model\Metadata - Метаданные, привязанные к платежу


<a name="method_getPaymentMethodData" class="anchor"></a>
#### public getPaymentMethodData() : \YooKassa\Model\PaymentData\AbstractPaymentData

```php
public getPaymentMethodData() : \YooKassa\Model\PaymentData\AbstractPaymentData
```

**Summary**

Возвращает данные для создания метода оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** \YooKassa\Model\PaymentData\AbstractPaymentData - Данные используемые для создания метода оплаты


<a name="method_getPaymentMethodId" class="anchor"></a>
#### public getPaymentMethodId() : string

```php
public getPaymentMethodId() : string
```

**Summary**

Устанавливает идентификатор записи платёжных данных покупателя

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** string - Идентификатор записи о сохраненных платежных данных покупателя


<a name="method_getPaymentToken" class="anchor"></a>
#### public getPaymentToken() : string

```php
public getPaymentToken() : string
```

**Summary**

Возвращает одноразовый токен для проведения оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** string - Одноразовый токен для проведения оплаты, сформированный YooKassa JS widget


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


<a name="method_getRecipient" class="anchor"></a>
#### public getRecipient() : \YooKassa\Model\RecipientInterface|null

```php
public getRecipient() : \YooKassa\Model\RecipientInterface|null
```

**Summary**

Возвращает объект получателя платежа

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** \YooKassa\Model\RecipientInterface|null - Объект с информацией о получателе платежа или null, если получатель не задан


<a name="method_getSavePaymentMethod" class="anchor"></a>
#### public getSavePaymentMethod() : bool

```php
public getSavePaymentMethod() : bool
```

**Summary**

Возвращает флаг сохранения платёжных данных

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - Флаг сохранения платёжных данных


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


<a name="method_hasCapture" class="anchor"></a>
#### public hasCapture() : bool

```php
public hasCapture() : bool
```

**Summary**

Проверяет, был ли установлен флаг автоматического принятия поступившей оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если флаг автоматического принятия оплаты был установлен, false если нет


<a name="method_hasClientIp" class="anchor"></a>
#### public hasClientIp() : bool

```php
public hasClientIp() : bool
```

**Summary**

Проверяет, был ли установлен IPv4 или IPv6-адрес покупателя

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если IP адрес покупателя был установлен, false если нет


<a name="method_hasConfirmation" class="anchor"></a>
#### public hasConfirmation() : bool

```php
public hasConfirmation() : bool
```

**Summary**

Проверяет, был ли установлен способ подтверждения платежа

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если способ подтверждения платежа был установлен, false если нет


<a name="method_hasDeal" class="anchor"></a>
#### public hasDeal() : bool

```php
public hasDeal() : bool
```

**Summary**

Проверяет, были ли установлены данные о сделке

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если данные о сделке были установлены, false если нет


<a name="method_hasDescription" class="anchor"></a>
#### public hasDescription() : bool

```php
public hasDescription() : bool
```

**Summary**

Проверяет наличие описания транзакции в создаваемом платеже

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если описание транзакции есть, false если нет


<a name="method_hasFraudData" class="anchor"></a>
#### public hasFraudData() : bool

```php
public hasFraudData() : bool
```

**Summary**

Проверяет, была ли установлена информация для проверки операции на мошенничество

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если информация была установлена, false если нет


<a name="method_hasMerchantCustomerId" class="anchor"></a>
#### public hasMerchantCustomerId() : bool

```php
public hasMerchantCustomerId() : bool
```

**Summary**

Проверяет, был ли установлен идентификатор покупателя в вашей системе

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если идентификатор покупателя был установлен, false если нет


<a name="method_hasMetadata" class="anchor"></a>
#### public hasMetadata() : bool

```php
public hasMetadata() : bool
```

**Summary**

Проверяет, были ли установлены метаданные заказа

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если метаданные были установлены, false если нет


<a name="method_hasPaymentMethodData" class="anchor"></a>
#### public hasPaymentMethodData() : bool

```php
public hasPaymentMethodData() : bool
```

**Summary**

Проверяет установлен ли объект с методом оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если объект метода оплаты установлен, false если нет


<a name="method_hasPaymentMethodId" class="anchor"></a>
#### public hasPaymentMethodId() : bool

```php
public hasPaymentMethodId() : bool
```

**Summary**

Проверяет наличие идентификатора записи о платёжных данных покупателя

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если идентификатор задан, false если нет


<a name="method_hasPaymentToken" class="anchor"></a>
#### public hasPaymentToken() : bool

```php
public hasPaymentToken() : bool
```

**Summary**

Проверяет наличие одноразового токена для проведения оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если токен установлен, false если нет


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


<a name="method_hasRecipient" class="anchor"></a>
#### public hasRecipient() : bool

```php
public hasRecipient() : bool
```

**Summary**

Проверяет наличие получателя платежа в запросе

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если получатель платежа задан, false если нет


<a name="method_hasSavePaymentMethod" class="anchor"></a>
#### public hasSavePaymentMethod() : bool

```php
public hasSavePaymentMethod() : bool
```

**Summary**

Проверяет, был ли установлен флаг сохранения платёжных данных

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если флаг был установлен, false если нет


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


<a name="method_setCapture" class="anchor"></a>
#### public setCapture() : mixed

```php
public setCapture(bool $value) : mixed
```

**Summary**

Устанавливает флаг автоматического принятия поступившей оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">bool</code> | value  | Автоматически принять поступившую оплату |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Генерируется если переданный аргумент не кастится в bool |

**Returns:** mixed - 


<a name="method_setClientIp" class="anchor"></a>
#### public setClientIp() : mixed

```php
public setClientIp(string $value) : mixed
```

**Summary**

Устанавливает IP адрес покупателя

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | IPv4 или IPv6-адрес покупателя |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданный аргумент не является строкой |

**Returns:** mixed - 


<a name="method_setConfirmation" class="anchor"></a>
#### public setConfirmation() : mixed

```php
public setConfirmation(\YooKassa\Model\ConfirmationAttributes\AbstractConfirmationAttributes|null $value) : mixed
```

**Summary**

Устанавливает способ подтверждения платежа

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\ConfirmationAttributes\AbstractConfirmationAttributes OR null</code> | value  | Способ подтверждения платежа |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданное значение не является объектом типа AbstractConfirmationAttributes или null |

**Returns:** mixed - 


<a name="method_setDeal" class="anchor"></a>
#### public setDeal() : mixed

```php
public setDeal(\YooKassa\Model\Deal\PaymentDealInfo|array|null $value) : mixed
```

**Summary**

Устанавливает данные о сделке, в составе которой проходит платеж.

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\Deal\PaymentDealInfo OR array OR null</code> | value  | Данные о сделке, в составе которой проходит платеж |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданные данные не удалось интерпретировать как метаданные платежа |

**Returns:** mixed - 


<a name="method_setDescription" class="anchor"></a>
#### public setDescription() : mixed

```php
public setDescription(string $value) : mixed
```

**Summary**

Устанавливает описание транзакции

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  |  |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueException | Выбрасывается если переданное значение превышает допустимую длину |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданное значение не является строкой |

**Returns:** mixed - 


<a name="method_setFraudData" class="anchor"></a>
#### public setFraudData() : mixed

```php
public setFraudData(\YooKassa\Model\FraudData|array|null $value = null) : mixed
```

**Summary**

Устанавливает информацию для проверки операции на мошенничество.

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\FraudData OR array OR null</code> | value  | Информация для проверки операции на мошенничество |

**Returns:** mixed - 


<a name="method_setMerchantCustomerId" class="anchor"></a>
#### public setMerchantCustomerId() : mixed

```php
public setMerchantCustomerId(string $value) : mixed
```

**Summary**

Устанавливает идентификатор покупателя в вашей системе

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Идентификатор покупателя в вашей системе, например электронная почта или номер телефона. Не более 200 символов |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданный аргумент не является строкой |

**Returns:** mixed - 


<a name="method_setMetadata" class="anchor"></a>
#### public setMetadata() : mixed

```php
public setMetadata(\YooKassa\Model\Metadata|array|null $value) : mixed
```

**Summary**

Устанавливает метаданные, привязанные к платежу

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\Metadata OR array OR null</code> | value  | Метаданные платежа, устанавливаемые мерчантом |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданные данные не удалось интерпретировать как метаданные платежа |

**Returns:** mixed - 


<a name="method_setPaymentMethodData" class="anchor"></a>
#### public setPaymentMethodData() : mixed

```php
public setPaymentMethodData(\YooKassa\Model\PaymentData\AbstractPaymentData|null $value) : mixed
```

**Summary**

Устанавливает объект с информацией для создания метода оплаты

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\PaymentData\AbstractPaymentData OR null</code> | value  | Объект создания метода оплаты или null |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если был передан объект невалидного типа |

**Returns:** mixed - 


<a name="method_setPaymentMethodId" class="anchor"></a>
#### public setPaymentMethodId() : mixed

```php
public setPaymentMethodId(string $value) : mixed
```

**Summary**

Устанавливает идентификатор записи о сохранённых данных покупателя

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Идентификатор записи о сохраненных платежных данных покупателя |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Генерируется если переданные значение не является строкой или null |

**Returns:** mixed - 


<a name="method_setPaymentToken" class="anchor"></a>
#### public setPaymentToken() : mixed

```php
public setPaymentToken(string $value) : mixed
```

**Summary**

Устанавливает одноразовый токен для проведения оплаты, сформированный YooKassa JS widget

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">string</code> | value  | Одноразовый токен для проведения оплаты |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueException | Выбрасывается если переданное значение превышает допустимую длину |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Выбрасывается если переданное значение не является строкой |

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


<a name="method_setRecipient" class="anchor"></a>
#### public setRecipient() : mixed

```php
public setRecipient(\YooKassa\Model\RecipientInterface|null $value) : mixed
```

**Summary**

Устанавливает объект с информацией о получателе платежа

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">\YooKassa\Model\RecipientInterface OR null</code> | value  | Инстанс объекта информации о получателе платежа или null |

**Returns:** mixed - 


<a name="method_setSavePaymentMethod" class="anchor"></a>
#### public setSavePaymentMethod() : mixed

```php
public setSavePaymentMethod(bool $value) : mixed
```

**Summary**

Устанавливает флаг сохранения платёжных данных. Значение true инициирует создание многоразового payment_method.

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code lang="php">bool</code> | value  | Сохранить платежные данные для последующего использования |

##### Throws:
| Type | Description |
| ---- | ----------- |
| \YooKassa\Common\Exceptions\InvalidPropertyValueTypeException | Генерируется если переданный аргумент не кастится в bool |

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

Проверяет на валидность текущий объект

**Details:**
* Inherited From: [\YooKassa\Request\Payments\CreatePaymentRequest](../classes/YooKassa-Request-Payments-CreatePaymentRequest.md)

**Returns:** bool - True если объект запроса валиден, false если нет


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