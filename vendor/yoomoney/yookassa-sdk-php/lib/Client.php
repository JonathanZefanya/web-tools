<?php

/*
 * The MIT License
 *
 * Copyright (c) 2025 "YooMoney", NBСO LLC
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace YooKassa;

use Exception;
use InvalidArgumentException;
use YooKassa\Client\BaseClient;
use YooKassa\Common\Exceptions\ApiConnectionException;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\AuthorizeException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\InvalidPropertyValueException;
use YooKassa\Common\Exceptions\InvalidPropertyValueTypeException;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;
use YooKassa\Common\HttpVerb;
use YooKassa\Helpers\TypeCast;
use YooKassa\Helpers\UUID;
use YooKassa\Model\DealInterface;
use YooKassa\Model\PaymentInterface;
use YooKassa\Model\PayoutInterface;
use YooKassa\Model\PersonalData\PersonalDataInterface;
use YooKassa\Model\RefundInterface;
use YooKassa\Model\SelfEmployed\SelfEmployedInterface;
use YooKassa\Model\Webhook\Webhook;
use YooKassa\Request\Deals\CreateDealRequest;
use YooKassa\Request\Deals\CreateDealRequestInterface;
use YooKassa\Request\Deals\CreateDealRequestSerializer;
use YooKassa\Request\Deals\CreateDealResponse;
use YooKassa\Request\Deals\DealResponse;
use YooKassa\Request\Deals\DealsRequest;
use YooKassa\Request\Deals\DealsRequestInterface;
use YooKassa\Request\Deals\DealsRequestSerializer;
use YooKassa\Request\Deals\DealsResponse;
use YooKassa\Request\Payments\CreatePaymentRequest;
use YooKassa\Request\Payments\CreatePaymentRequestInterface;
use YooKassa\Request\Payments\CreatePaymentResponse;
use YooKassa\Request\Payments\CreatePaymentRequestSerializer;
use YooKassa\Request\Payments\Payment\CancelResponse;
use YooKassa\Request\Payments\Payment\CreateCaptureRequest;
use YooKassa\Request\Payments\Payment\CreateCaptureRequestInterface;
use YooKassa\Request\Payments\Payment\CreateCaptureRequestSerializer;
use YooKassa\Request\Payments\Payment\CreateCaptureResponse;
use YooKassa\Request\Payments\PaymentResponse;
use YooKassa\Request\Payments\PaymentsRequest;
use YooKassa\Request\Payments\PaymentsRequestInterface;
use YooKassa\Request\Payments\PaymentsRequestSerializer;
use YooKassa\Request\Payments\PaymentsResponse;
use YooKassa\Request\Payouts\CreatePayoutRequest;
use YooKassa\Request\Payouts\CreatePayoutRequestInterface;
use YooKassa\Request\Payouts\CreatePayoutRequestSerializer;
use YooKassa\Request\Payouts\CreatePayoutResponse;
use YooKassa\Request\Payouts\PayoutResponse;
use YooKassa\Request\Payouts\SbpBanksResponse;
use YooKassa\Request\PersonalData\CreatePersonalDataRequest;
use YooKassa\Request\PersonalData\CreatePersonalDataRequestInterface;
use YooKassa\Request\PersonalData\CreatePersonalDataRequestSerializer;
use YooKassa\Request\PersonalData\PersonalDataResponse;
use YooKassa\Request\Receipts\AbstractReceiptResponse;
use YooKassa\Request\Receipts\CreatePostReceiptRequest;
use YooKassa\Request\Receipts\CreatePostReceiptRequestInterface;
use YooKassa\Request\Receipts\CreatePostReceiptRequestSerializer;
use YooKassa\Request\Receipts\ReceiptResponseFactory;
use YooKassa\Request\Receipts\ReceiptResponseInterface;
use YooKassa\Request\Receipts\ReceiptsRequest;
use YooKassa\Request\Receipts\ReceiptsRequestSerializer;
use YooKassa\Request\Receipts\ReceiptsResponse;
use YooKassa\Request\Refunds\CreateRefundRequest;
use YooKassa\Request\Refunds\CreateRefundRequestInterface;
use YooKassa\Request\Refunds\CreateRefundRequestSerializer;
use YooKassa\Request\Refunds\CreateRefundResponse;
use YooKassa\Request\Refunds\RefundResponse;
use YooKassa\Request\Refunds\RefundsRequest;
use YooKassa\Request\Refunds\RefundsRequestInterface;
use YooKassa\Request\Refunds\RefundsRequestSerializer;
use YooKassa\Request\Refunds\RefundsResponse;
use YooKassa\Request\SelfEmployed\SelfEmployedRequest;
use YooKassa\Request\SelfEmployed\SelfEmployedRequestSerializer;
use YooKassa\Request\SelfEmployed\SelfEmployedResponse;
use YooKassa\Request\Webhook\WebhookListResponse;

/**
 * Класс клиента API
 *
 * @example 01-client.php 3 7 Создание клиента
 *
 * @package YooKassa
 *
 * @since 1.0.1
 */
class Client extends BaseClient
{
    /**
     * Текущая версия библиотеки
     */
    const SDK_VERSION = '2.12.2';

    /**
     * Получить список платежей магазина
     *
     * Запрос позволяет получить список платежей, отфильтрованный по заданным критериям.
     * В ответ на запрос вернется список платежей с учетом переданных параметров. В списке будет информация о платежах,
     * созданных за последние 3 года. Список будет отсортирован по времени создания платежей в порядке убывания.
     * Если результатов больше, чем задано в `limit`, список будет выводиться фрагментами. В этом случае в ответе
     * на запрос вернется фрагмент списка и параметр `next_cursor` с указателем на следующий фрагмент.
     *
     * @example 01-client.php 227 23 Получить список платежей магазина с фильтрацией
     *
     * @param PaymentsRequestInterface|array|null $filter
     *
     * @return PaymentsResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function getPayments($filter = null)
    {
        $path = self::PAYMENTS_PATH;

        if ($filter === null) {
            $queryParams = array();
        } else {
            if (is_array($filter)) {
                $filter = PaymentsRequest::builder()->build($filter);
            }
            $serializer  = new PaymentsRequestSerializer();
            $queryParams = $serializer->serialize($filter);
        }

        $response = $this->execute($path, HttpVerb::GET, $queryParams);

        $paymentResponse = null;
        if ($response->getCode() == 200) {
            $responseArray   = $this->decodeData($response);
            $paymentResponse = new PaymentsResponse($responseArray);
        } else {
            $this->handleError($response);
        }

        return $paymentResponse;
    }

    /**
     * Создание платежа.
     *
     * Чтобы принять оплату, необходимо создать объект платежа — `Payment`. Он содержит всю необходимую информацию
     * для проведения оплаты (сумму, валюту и статус). У платежа линейный жизненный цикл, он последовательно
     * переходит из статуса в статус.
     *
     * Необходимо указать один из параметров:
     * <ul>
     * <li>payment_token — оплата по одноразовому PaymentToken, сформированному виджетом YooKassa JS;</li>
     * <li>payment_method_id — оплата по сохраненным платежным данным;</li>
     * <li>payment_method_data — оплата по новым платежным данным.</li>
     * </ul>
     *
     * Если не указан ни один параметр и `confirmation.type = redirect`, то в качестве `confirmation_url`
     * возвращается ссылка, по которой пользователь сможет самостоятельно выбрать подходящий способ оплаты.
     * Дополнительные параметры:
     * <ul>
     * <li>confirmation — передается, если необходимо уточнить способ подтверждения платежа;</li>
     * <li>recipient — указывается при наличии нескольких товаров;</li>
     * <li>metadata — дополнительные данные (передаются магазином).</li>
     * </ul>
     *
     * @example 01-client.php 21 28 Запрос на создание платежа
     *
     * @param CreatePaymentRequestInterface|array $payment
     * @param string|null $idempotenceKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return CreatePaymentResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function createPayment($payment, $idempotenceKey = null)
    {
        $path = self::PAYMENTS_PATH;

        $headers = array();

        if ($idempotenceKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotenceKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }
        if (is_array($payment)) {
            $payment = CreatePaymentRequest::builder()->build($payment);
        }

        $serializer     = new CreatePaymentRequestSerializer();
        $serializedData = $serializer->serialize($payment);
        $httpBody       = $this->encodeData($this->addDefaultCmsName($serializedData));

        $response = $this->execute($path, HttpVerb::POST, null, $httpBody, $headers);

        $paymentResponse = null;
        if ($response->getCode() == 200) {
            $resultArray     = $this->decodeData($response);
            $paymentResponse = new CreatePaymentResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $paymentResponse;
    }

    /**
     * Получить информацию о платеже
     *
     * Запрос позволяет получить информацию о текущем состоянии платежа по его уникальному идентификатору.
     * Выдает объект платежа {@link PaymentInterface} в актуальном статусе.
     *
     * @example 01-client.php 162 8 Получить информацию о платеже
     *
     * @param string $paymentId Идентификатор платежа
     *
     * @return PaymentInterface|null Объект платежа
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function getPaymentInfo($paymentId)
    {
        if ($paymentId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $paymentId');
        } elseif (!TypeCast::canCastToString($paymentId)) {
            throw new \InvalidArgumentException('Invalid paymentId value: string required');
        } elseif (mb_strlen($paymentId) !== 36) {
            throw new \InvalidArgumentException('Invalid paymentId value');
        }

        $path = self::PAYMENTS_PATH . '/' . $paymentId;

        $response = $this->execute($path, HttpVerb::GET, null);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result      = new PaymentResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Подтверждение платежа
     *
     * Подтверждает вашу готовность принять платеж. Платеж можно подтвердить, только если он находится
     * в статусе `waiting_for_capture`. Если платеж подтвержден успешно — значит, оплата прошла, и вы можете выдать
     * товар или оказать услугу пользователю. На следующий день после подтверждения платеж попадет в реестр,
     * и ЮKassa переведет деньги на ваш расчетный счет. Если вы не подтверждаете платеж до момента, указанного
     * в `expire_at`, по умолчанию он отменяется, а деньги возвращаются пользователю. При оплате банковской картой
     * у вас есть 7 дней на подтверждение платежа. Для остальных способов оплаты платеж необходимо подтвердить
     * в течение 6 часов.
     *
     * @example 01-client.php 51 34 Подтверждение платежа
     *
     * @param CreateCaptureRequestInterface|array $captureRequest
     * @param string $paymentId Идентификатор платежа
     * @param string|null $idempotencyKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return CreateCaptureResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function capturePayment($captureRequest, $paymentId, $idempotencyKey = null)
    {
        if ($paymentId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $paymentId');
        } elseif (!TypeCast::canCastToString($paymentId)) {
            throw new \InvalidArgumentException('Invalid paymentId value: string required');
        } elseif (mb_strlen($paymentId) !== 36) {
            throw new \InvalidArgumentException('Invalid paymentId value');
        }

        $path = '/payments/' . $paymentId . '/capture';

        $headers = array();

        if ($idempotencyKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotencyKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }
        if (is_array($captureRequest)) {
            $captureRequest = CreateCaptureRequest::builder()->build($captureRequest);
        }

        $serializer     = new CreateCaptureRequestSerializer();
        $serializedData = $serializer->serialize($captureRequest);
        $httpBody       = $this->encodeData($serializedData);

        $response = $this->execute($path, HttpVerb::POST, null, $httpBody, $headers);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result      = new CreateCaptureResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Отменить незавершенную оплату заказа.
     *
     * Отменяет платеж, находящийся в статусе `waiting_for_capture`. Отмена платежа значит, что вы
     * не готовы выдать пользователю товар или оказать услугу. Как только вы отменяете платеж, мы начинаем
     * возвращать деньги на счет плательщика. Для платежей банковскими картами отмена происходит мгновенно.
     * Для остальных способов оплаты возврат может занимать до нескольких дней.
     *
     * @example 01-client.php 87 9 Отменить незавершенную оплату заказа
     *
     * @param string $paymentId Идентификатор платежа
     * @param string|null $idempotencyKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return CancelResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function cancelPayment($paymentId, $idempotencyKey = null)
    {
        if ($paymentId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $paymentId');
        } elseif (!TypeCast::canCastToString($paymentId)) {
            throw new \InvalidArgumentException('Invalid paymentId value: string required');
        } elseif (mb_strlen($paymentId) !== 36) {
            throw new \InvalidArgumentException('Invalid paymentId value');
        }

        $path    = self::PAYMENTS_PATH . '/' . $paymentId . '/cancel';
        $headers = array();
        if ($idempotencyKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotencyKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }

        $response = $this->execute($path, HttpVerb::POST, null, null, $headers);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result      = new CancelResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Получить список возвратов платежей
     *
     * Запрос позволяет получить список возвратов, отфильтрованный по заданным критериям.
     * В ответ на запрос вернется список возвратов с учетом переданных параметров. В списке будет информация о возвратах,
     * созданных за последние 3 года. Список будет отсортирован по времени создания возвратов в порядке убывания.
     * Если результатов больше, чем задано в `limit`, список будет выводиться фрагментами. В этом случае в ответе
     * на запрос вернется фрагмент списка и параметр `next_cursor` с указателем на следующий фрагмент.
     *
     * @example 01-client.php 275 23 Получить список возвратов платежей магазина с фильтрацией
     *
     * @param RefundsRequestInterface|array|null $filter
     *
     * @return RefundsResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function getRefunds($filter = null)
    {
        $path = self::REFUNDS_PATH;

        if ($filter === null) {
            $queryParams = array();
        } else {
            if (is_array($filter)) {
                $filter = RefundsRequest::builder()->build($filter);
            }
            $serializer  = new RefundsRequestSerializer();
            $queryParams = $serializer->serialize($filter);
        }

        $response = $this->execute($path, HttpVerb::GET, $queryParams);

        $refundsResponse = null;
        if ($response->getCode() == 200) {
            $resultArray     = $this->decodeData($response);
            $refundsResponse = new RefundsResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $refundsResponse;
    }

    /**
     * Проведение возврата платежа
     *
     * Создает объект возврата — `Refund`. Возвращает успешно завершенный платеж по уникальному идентификатору
     * этого платежа. Создание возврата возможно только для платежей в статусе `succeeded`. Комиссии за проведение
     * возврата нет. Комиссия, которую ЮKassa берёт за проведение исходного платежа, не возвращается.
     *
     * @example 01-client.php 134 26 Запрос на создание возврата
     *
     * @param CreateRefundRequestInterface|array $request
     * @param string|null $idempotencyKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return CreateRefundResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function createRefund($request, $idempotencyKey = null)
    {
        $path = self::REFUNDS_PATH;

        $headers = array();

        if ($idempotencyKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotencyKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }
        if (is_array($request)) {
            $request = CreateRefundRequest::builder()->build($request);
        }

        $serializer     = new CreateRefundRequestSerializer();
        $serializedData = $serializer->serialize($request);
        $httpBody       = $this->encodeData($serializedData);

        $response = $this->execute($path, HttpVerb::POST, null, $httpBody, $headers);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result      = new CreateRefundResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Получить информацию о возврате
     *
     * Запрос позволяет получить информацию о текущем состоянии возврата по его уникальному идентификатору.
     * В ответ на запрос придет объект возврата {@link RefundResponse} в актуальном статусе.
     *
     * @example 01-client.php 182 8 Получить информацию о возврате
     *
     * @param string $refundId Идентификатор возврата
     *
     * @return RefundResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function getRefundInfo($refundId)
    {
        if ($refundId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $refundId');
        } elseif (!TypeCast::canCastToString($refundId)) {
            throw new \InvalidArgumentException('Invalid refundId value: string required');
        } elseif (mb_strlen($refundId) !== 36) {
            throw new \InvalidArgumentException('Invalid refundId value');
        }
        $path = self::REFUNDS_PATH . '/' . $refundId;

        $response = $this->execute($path, HttpVerb::GET, null);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result      = new RefundResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Создание Webhook
     *
     * Запрос позволяет подписаться на уведомления о событии (например, на переход платежа в статус successed).
     *
     * @example 01-client.php 192 33 Создание Webhook
     *
     * @param Webhook|array $request
     * @param string|null $idempotencyKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     * @return Webhook|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function addWebhook($request, $idempotencyKey = null)
    {
        $path = self::WEBHOOKS_PATH;

        $headers = array();

        if ($idempotencyKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotencyKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }
        if (is_array($request)) {
            $webhook = new Webhook($request);
        } else {
            $webhook = $request;
        }

        if (!($webhook instanceof Webhook)) {
            throw new InvalidArgumentException();
        }

        $httpBody = $this->encodeData($webhook->jsonSerialize());

        $response = $this->execute($path, HttpVerb::POST, null, $httpBody, $headers);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result      = new Webhook($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Удаление Webhook
     *
     * Запрос позволяет отписаться от уведомлений о событии для переданного OAuth-токена.
     * Чтобы удалить webhook, вам нужно передать в запросе его идентификатор.
     *
     * @example 01-client.php 192 33 Удаление Webhook
     *
     * @param string $webhookId Идентификатор Webhook
     * @param string|null $idempotencyKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)

     * @return Webhook|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function removeWebhook($webhookId, $idempotencyKey = null)
    {
        $headers = array();

        if ($idempotencyKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotencyKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }
        $path    = self::WEBHOOKS_PATH . '/' . $webhookId;

        $response = $this->execute($path, HttpVerb::DELETE, null, null, $headers);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result      = new Webhook($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Список созданных Webhook
     *
     * Запрос позволяет узнать, какие webhook есть для переданного OAuth-токена.
     *
     * @example 01-client.php 192 33 Список созданных Webhook
     *
     * @return WebhookListResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws AuthorizeException Ошибка авторизации. Не установлен заголовок.
     */
    public function getWebhooks()
    {
        $path = self::WEBHOOKS_PATH;

        $response = $this->execute($path, HttpVerb::GET, null);

        $result = null;
        if ($response->getCode() == 200) {
            $responseArray = $this->decodeData($response);
            $result        = new WebhookListResponse($responseArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Получить список чеков магазина
     *
     * Запрос позволяет получить список чеков, отфильтрованный по заданным критериям.
     * Можно запросить чеки по конкретному платежу, чеки по конкретному возврату или все чеки магазина.
     * В ответ на запрос вернется список чеков с учетом переданных параметров. В списке будет информация о чеках,
     * созданных за последние 3 года. Список будет отсортирован по времени создания чеков в порядке убывания.
     * Если результатов больше, чем задано в `limit`, список будет выводиться фрагментами.
     * В этом случае в ответе на запрос вернется фрагмент списка и параметр `next_cursor` с указателем на следующий фрагмент.
     *
     * @example 01-client.php 252 21 Получить список чеков магазина с фильтрацией
     *
     * @param PaymentInterface|RefundInterface|array|null $filter
     *
     * @return ReceiptsResponse
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function getReceipts($filter = null)
    {
        $path = self::RECEIPTS_PATH;

        if ($filter === null) {
            $queryParams = array();
        } else {
            if (is_array($filter)) {
                $filter = ReceiptsRequest::builder()->build($filter);
            }
            $serializer  = new ReceiptsRequestSerializer();
            $queryParams = $serializer->serialize($filter);
        }

        $response = $this->execute($path, HttpVerb::GET, $queryParams);

        $receiptsResponse = null;
        if ($response->getCode() == 200) {
            $responseArray    = $this->decodeData($response);
            $receiptsResponse = new ReceiptsResponse($responseArray);
        } else {
            $this->handleError($response);
        }

        return $receiptsResponse;
    }

    /**
     * Отправка чека в облачную кассу
     *
     * Создает объект чека — `Receipt`. Возвращает успешно созданный чек по уникальному идентификатору
     * платежа или возврата.
     *
     * @example 01-client.php 98 34 Запрос на создание чека
     *
     * @param CreatePostReceiptRequestInterface|array $receipt
     * @param string|null $idempotenceKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return AbstractReceiptResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws AuthorizeException Ошибка авторизации. Не установлен заголовок.
     * @throws Exception
     */
    public function createReceipt($receipt, $idempotenceKey = null)
    {
        $path = self::RECEIPTS_PATH;

        $headers = array();

        if ($idempotenceKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotenceKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }

        if (is_array($receipt)) {
            $receipt = CreatePostReceiptRequest::builder()->build($receipt);
        }

        $serializer     = new CreatePostReceiptRequestSerializer();
        $serializedData = $serializer->serialize($receipt);
        $httpBody       = $this->encodeData($serializedData);

        $response = $this->execute($path, HttpVerb::POST, null, $httpBody, $headers);

        $receiptResponse = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $factory = new ReceiptResponseFactory();
            $receiptResponse = $factory->factory($resultArray);
        } else {
            $this->handleError($response);
        }

        return $receiptResponse;
    }

    /**
     * Получить информацию о чеке
     *
     * Запрос позволяет получить информацию о текущем состоянии чека по его уникальному идентификатору.
     * Выдает объект чека {@link ReceiptResponseInterface} в актуальном статусе.
     *
     * @example 01-client.php 172 8 Получить информацию о чеке
     *
     * @param string $receiptId Идентификатор чека
     *
     * @return ReceiptResponseInterface|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function getReceiptInfo($receiptId)
    {
        if ($receiptId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $receiptId');
        } elseif (!TypeCast::canCastToString($receiptId)) {
            throw new \InvalidArgumentException('Invalid receiptId value: string required');
        } elseif (mb_strlen($receiptId) !== 39) {
            throw new \InvalidArgumentException('Invalid receiptId value');
        }

        $path = self::RECEIPTS_PATH . '/' . $receiptId;

        $response = $this->execute($path, HttpVerb::GET, null);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $factory = new ReceiptResponseFactory();
            $result = $factory->factory($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Создание сделки.
     *
     * Запрос позволяет создать сделку, в рамках которой необходимо принять оплату от покупателя и перечислить ее продавцу.
     *
     * Необходимо указать следующие параметры:
     * <ul>
     * <li>type — Тип сделки. Фиксированное значение: safe_deal — Безопасная сделка;</li>
     * <li>fee_moment — Момент перечисления вам вознаграждения платформы. Возможные значения: payment_succeeded — после успешной оплаты;</li>
     * <li>deal_closed — при закрытии сделки после успешной выплаты.</li>
     * </ul>
     *
     * Дополнительные параметры:
     * <ul>
     * <li>metadata — Любые дополнительные данные, которые нужны вам для работы (например, ваш внутренний идентификатор заказа);</li>
     * <li>description — Описание сделки (не более 128 символов). Используется для фильтрации при получении списка сделок.</li>
     * </ul>
     *
     * @example 01-client.php 300 18 Запрос на создание сделки
     *
     * @param CreateDealRequestInterface|array $deal
     * @param string|null $idempotenceKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return CreateDealResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function createDeal($deal, $idempotenceKey = null)
    {
        $path = self::DEALS_PATH;

        $headers = array();

        if ($idempotenceKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotenceKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }
        if (is_array($deal)) {
            $deal = CreateDealRequest::builder()->build($deal);
        }

        $serializer     = new CreateDealRequestSerializer();
        $serializedData = $serializer->serialize($deal);
        $httpBody       = $this->encodeData($serializedData);

        $response = $this->execute($path, HttpVerb::POST, null, $httpBody, $headers);

        $dealResponse = null;
        if ($response->getCode() == 200) {
            $resultArray     = $this->decodeData($response);
            $dealResponse = new CreateDealResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $dealResponse;
    }

    /**
     * Получить информацию о сделке
     *
     * Запрос позволяет получить информацию о текущем состоянии сделки по её уникальному идентификатору.
     * Выдает объект чека {@link DealInteface} в актуальном статусе.
     *
     * @example 01-client.php 320 8 Получить информацию о сделке
     *
     * @param string $dealId Идентификатор сделки
     *
     * @return DealInterface|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function getDealInfo($dealId)
    {
        if ($dealId === null) {
            throw new \InvalidArgumentException('Missing the required parameter dealId');
        } elseif (!TypeCast::canCastToString($dealId)) {
            throw new \InvalidArgumentException('Invalid dealId value: string required');
        } elseif (mb_strlen($dealId) < 36 || mb_strlen($dealId) > 50) {
            throw new \InvalidArgumentException('Invalid dealId value');
        }

        $path = self::DEALS_PATH . '/' . $dealId;

        $response = $this->execute($path, HttpVerb::GET, null);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result = new DealResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Получить список сделок магазина
     *
     * Запрос позволяет получить список сделок, отфильтрованный по заданным критериям.
     * В ответ на запрос вернется список сделок с учетом переданных параметров. В списке будет информация о сделках,
     * созданных за последние 3 года. Список будет отсортирован по времени создания сделок в порядке убывания.
     * Если результатов больше, чем задано в `limit`, список будет выводиться фрагментами.
     * В этом случае в ответе на запрос вернется фрагмент списка и параметр `next_cursor` с указателем на следующий фрагмент.
     *
     * @example 01-client.php 330 27 Получить список сделок с фильтрацией
     *
     * @param DealsRequestInterface|array|null $filter
     *
     * @return DealsResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function getDeals($filter = null)
    {
        $path = self::DEALS_PATH;

        if ($filter === null) {
            $queryParams = array();
        } else {
            if (is_array($filter)) {
                $filter = DealsRequest::builder()->build($filter);
            }
            $serializer  = new DealsRequestSerializer();
            $queryParams = $serializer->serialize($filter);
        }

        $response = $this->execute($path, HttpVerb::GET, $queryParams);

        $dealsResponse = null;
        if ($response->getCode() == 200) {
            $responseArray   = $this->decodeData($response);
            $dealsResponse = new DealsResponse($responseArray);
        } else {
            $this->handleError($response);
        }

        return $dealsResponse;
    }

    /**
     * Создание выплаты.
     *
     * Запрос позволяет перечислить продавцу оплату за выполненную услугу или проданный товар в рамках Безопасной сделки.
     * Выплату можно сделать на банковскую карту или на кошелек ЮMoney.
     *
     * Обязательный параметр:
     * <ul>
     * <li>amount — сумма выплаты. Есть ограничения на минимальный и максимальный размер выплаты и сумму выплат за месяц.</li>
     * </ul>
     *
     * Необходимо указать один из параметров:
     * <ul>
     * <li>payout_destination_data — данные платежного средства, на которое нужно сделать выплату;</li>
     * <li>payout_token — токенизированные данные для выплаты. Например, синоним банковской карты.</li>
     * </ul>
     *
     * Дополнительные параметры:
     * <ul>
     * <li>description — описание транзакции (не более 128 символов);</li>
     * <li>deal — сделка, в рамках которой нужно провести выплату. Необходимо передавать, если вы проводите Безопасную сделку;</li>
     * <li>metadata — любые дополнительные данные, которые нужны вам для работы (например, ваш внутренний идентификатор заказа).</li>
     * </ul>
     *
     * @param CreatePayoutRequestInterface|array $payout
     * @param string|null $idempotenceKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return CreatePayoutResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     *
     * @example 01-client.php 358 27 Запрос на создание выплаты
     */
    public function createPayout($payout, $idempotenceKey = null)
    {
        $path = self::PAYOUTS_PATH;

        $headers = array();

        if ($idempotenceKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotenceKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }
        if (is_array($payout)) {
            $payout = CreatePayoutRequest::builder()->build($payout);
        }

        $serializer     = new CreatePayoutRequestSerializer();
        $serializedData = $serializer->serialize($payout);
        $httpBody       = $this->encodeData($serializedData);

        $response = $this->execute($path, HttpVerb::POST, null, $httpBody, $headers);

        $payoutResponse = null;
        if ($response->getCode() == 200) {
            $resultArray     = $this->decodeData($response);
            $payoutResponse = new CreatePayoutResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $payoutResponse;
    }

    /**
     * Получить информацию о выплате
     *
     * Запрос позволяет получить информацию о текущем состоянии выплаты по ее уникальному идентификатору.
     * Выдает объект выплаты {@link PayoutInterface} в актуальном статусе.
     *
     * @param string $payoutId Идентификатор выплаты
     *
     * @return PayoutInterface|null Объект выплаты
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     *
     * @example 01-client.php 387 8 Получить информацию о выплате
     */
    public function getPayoutInfo($payoutId)
    {
        if ($payoutId === null) {
            throw new \InvalidArgumentException('Missing the required parameter payoutId');
        } elseif (TypeCast::canCastToString($payoutId)) {
            $length = mb_strlen($payoutId, 'utf-8');
            if ($length < 36 || $length > 50) {
                throw new InvalidPropertyValueException('Invalid Payout id value', 0, 'Payout.id', $payoutId);
            }
        } else {
            throw new InvalidPropertyValueTypeException('Invalid payoutId value: string required');
        }

        $path = self::PAYOUTS_PATH . '/' . $payoutId;

        $response = $this->execute($path, HttpVerb::GET, null);

        $result = null;
        if ($response->getCode() == 200) {
            $resultArray = $this->decodeData($response);
            $result      = new PayoutResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Информация о магазине
     *
     * Запрос позволяет получить информацию о магазине для переданного OAuth-токена.
     *
     * @example 01-client.php 12 7 Информация о магазине
     *
     * @param array|string|int|null $filter Параметры поиска. В настоящее время доступен только `on_behalf_of`
     *
     * @return array|null Массив с информацией о магазине
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws AuthorizeException Ошибка авторизации. Не установлен заголовок.
     */
    public function me($filter = null)
    {
        $path = self::ME_PATH;

        $queryParams = array();
        if (is_array($filter)) {
            $queryParams = $filter;
        } elseif (is_string($filter) || is_int($filter)) {
            $queryParams['on_behalf_of'] = $filter;
        }

        $response = $this->execute($path, HttpVerb::GET, $queryParams);

        $result = null;
        if ($response->getCode() == 200) {
            $responseArray = $this->decodeData($response);
            $result        = $responseArray;
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Создание персональных данных
     *
     * Используйте этот запрос, чтобы создать в ЮKassa [объект персональных данных](#personal_data_object).
     * В запросе необходимо передать фамилию, имя, отчество пользователя и указать, с какой целью эти данные будут использоваться.
     * Идентификатор созданного объекта персональных данных необходимо использовать в запросе на проведение выплаты через СБП с проверкой получателя.
     * [Подробнее о выплатах с проверкой получателя](/developers/payouts/scenario-extensions/recipient-check)
     *
     * @example 01-client.php 397 16 Запрос на создание персональных данных
     *
     * @param CreatePersonalDataRequestInterface|array $request
     * @param string|null $idempotencyKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return PersonalDataResponse|null Объект персональных данных
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     * @throws Exception
     */
    public function createPersonalData($request, $idempotencyKey = null)
    {
        $path = self::PERSONAL_DATA_PATH;

        $headers = array();

        if ($idempotencyKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotencyKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }
        if (is_array($request)) {
            $request = CreatePersonalDataRequest::builder()->build($request);
        }

        $serializer     = new CreatePersonalDataRequestSerializer();
        $serializedData = $serializer->serialize($request);
        $httpBody       = $this->encodeData($serializedData);

        $response = $this->execute($path, HttpVerb::POST, array(), $httpBody, $headers);

        $result = null;
        if ($response->getCode() === 200) {
            $resultArray = $this->decodeData($response);
            $result      = new PersonalDataResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Получить информацию о персональных данных
     *
     * Запрос позволяет получить информацию о текущем состоянии персональных данных по их уникальному идентификатору.
     * Выдает объект платежа {@link PersonalDataInterface} в актуальном статусе.
     *
     * @example 01-client.php 415 8 Получить информацию о персональных данных
     *
     * @param string $personalDataId Идентификатор персональных данных
     *
     * @return PersonalDataInterface|null Объект персональных данных
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function getPersonalDataInfo($personalDataId)
    {
        if ($personalDataId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $personalDataId');
        }
        if (!TypeCast::canCastToString($personalDataId)) {
            throw new \InvalidArgumentException('Invalid personalDataId value: string required');
        }
        if (mb_strlen($personalDataId) < PersonalDataInterface::MIN_LENGTH_ID || mb_strlen($personalDataId) > PersonalDataInterface::MAX_LENGTH_ID) {
            throw new \InvalidArgumentException('Invalid personalDataId value');
        }

        $path = self::PERSONAL_DATA_PATH . '/' . $personalDataId;

        $response = $this->execute($path, HttpVerb::GET, array());

        $result = null;
        if ($response->getCode() === 200) {
            $resultArray = $this->decodeData($response);
            $result      = new PersonalDataResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Получить список участников СБП
     *
     * С помощью этого запроса вы можете получить актуальный список всех участников СБП.
     * Список нужно вывести получателю выплаты, идентификатор выбранного участника СБП необходимо использовать
     * в запросе на создание выплаты.
     *
     * @example 01-client.php 415 7 Получить информацию о персональных данных
     *
     * @return SbpBanksResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function getSbpBanks()
    {
        $path = self::SBP_BANKS_PATH;

        $response = $this->execute($path, HttpVerb::GET, array());

        $result = null;
        if ($response->getCode() === 200) {
            $resultArray = $this->decodeData($response);
            $result      = new SbpBanksResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }


    /**
     * Создание самозанятого.
     *
     * Используйте этот запрос, чтобы создать в ЮKassa [объект самозанятого](https://yookassa.ru/developers/api?codeLang=bash#self_employed_object).
     *
     * В запросе необходимо передать ИНН или телефон самозанятого для идентификации в сервисе Мой налог,
     * сценарий подтверждения пользователем заявки ЮMoney на получение прав для регистрации чеков и описание самозанятого.
     *
     * Идентификатор созданного объекта самозанятого необходимо использовать в запросе на проведение выплаты.
     *
     * @example 01-client.php 425 14 Запрос на создание самозанятого
     *
     * @param SelfEmployedRequest|array $selfEmployed
     * @param string|null $idempotenceKey [Ключ идемпотентности](https://yookassa.ru/developers/using-api/basics?lang=php#idempotence)
     *
     * @return SelfEmployedResponse|null
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function createSelfEmployed($selfEmployed, $idempotenceKey = null)
    {
        $path = self::SELF_EMPLOYED_PATH;

        $headers = array();

        if ($idempotenceKey) {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = $idempotenceKey;
        } else {
            $headers[self::IDEMPOTENCY_KEY_HEADER] = UUID::v4();
        }

        $request = is_array($selfEmployed) ? SelfEmployedRequest::builder()->build($selfEmployed) : $selfEmployed;

        $serializer     = new SelfEmployedRequestSerializer();
        $serializedData = $serializer->serialize($request);
        $httpBody       = $this->encodeData($serializedData);

        $response = $this->execute($path, HttpVerb::POST, array(), $httpBody, $headers);

        $result = null;
        if ($response->getCode() === 200) {
            $resultArray     = $this->decodeData($response);
            $result = new SelfEmployedResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Получить информацию о самозанятом
     *
     * С помощью этого запроса вы можете получить информацию о текущем статусе самозанятого по его уникальному идентификатору.
     *
     * @example 01-client.php 441 8 Получить информацию о самозанятом
     *
     * @param string $selfEmployedId Идентификатор самозанятого
     *
     * @return SelfEmployedInterface|null Объект информации о самозанятом
     *
     * @throws ApiException Неожиданный код ошибки.
     * @throws BadApiRequestException Неправильный запрос. Чаще всего этот статус выдается из-за нарушения правил взаимодействия с API.
     * @throws ForbiddenException Секретный ключ или OAuth-токен верный, но не хватает прав для совершения операции.
     * @throws InternalServerError Технические неполадки на стороне ЮKassa. Результат обработки запроса неизвестен. Повторите запрос позднее с тем же ключом идемпотентности.
     * @throws NotFoundException Ресурс не найден.
     * @throws ResponseProcessingException Запрос был принят на обработку, но она не завершена.
     * @throws TooManyRequestsException Превышен лимит запросов в единицу времени. Попробуйте снизить интенсивность запросов.
     * @throws UnauthorizedException Неверное имя пользователя или пароль или невалидный OAuth-токен при аутентификации.
     * @throws ExtensionNotFoundException Требуемое PHP расширение не установлено.
     */
    public function getSelfEmployedInfo($selfEmployedId)
    {
        if ($selfEmployedId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $selfEmployedId');
        }
        if (!TypeCast::canCastToString($selfEmployedId)) {
            throw new \InvalidArgumentException('Invalid selfEmployedId value: string required');
        }
        if (mb_strlen($selfEmployedId) < SelfEmployedInterface::MIN_LENGTH_ID || mb_strlen($selfEmployedId) > SelfEmployedInterface::MAX_LENGTH_ID) {
            throw new \InvalidArgumentException('Invalid selfEmployedId value');
        }

        $path = self::SELF_EMPLOYED_PATH . '/' . $selfEmployedId;

        $response = $this->execute($path, HttpVerb::GET, array());

        $result = null;
        if ($response->getCode() === 200) {
            $resultArray = $this->decodeData($response);
            $result      = new SelfEmployedResponse($resultArray);
        } else {
            $this->handleError($response);
        }

        return $result;
    }

    /**
     * Добавляет в metadata метку cms_name, если она не была установлена
     *
     * @param array $requestArray
     * @return array
     */
    private function addDefaultCmsName(array $requestArray)
    {
        $defaultMetadata = array('cms_name' => 'yookassa_sdk_php_2');
        $requestArray['metadata'] = array_merge($defaultMetadata, isset($requestArray['metadata']) ? $requestArray['metadata'] : array());

        return $requestArray;
    }
}
