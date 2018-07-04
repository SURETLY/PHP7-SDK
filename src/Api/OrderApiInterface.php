<?php

namespace Suretly\LenderApi\Api;

use Suretly\LenderApi\Exception\ResponseErrorException;
use Suretly\LenderApi\Model\NewOrder;
use Suretly\LenderApi\Model\Order;
use Suretly\LenderApi\Model\OrderStatus;

/**
 * Interface OrderApiInterface
 * @package Suretly\LenderApi\Api
 */
interface OrderApiInterface
{
    /**
     * Получение заявки по id
     *
     * @param string $id
     * @return Order
     * @throws \JsonMapper_Exception
     * @throws ResponseErrorException
     */
    public function getOrder(string $id): Order;

    /**
     * Получение ссылки на заявку для поручителя
     *
     * @param string $id
     * @return string
     * @throws ResponseErrorException
     */
    public function getOrderPublicUrl(string $id): string;

    /**
     * Создание заявки
     *
     * @param NewOrder $newOrder
     * @return array
     * @throws \JsonMapper_Exception
     * @throws ResponseErrorException
     */
    public function postNewOrder(NewOrder $newOrder): array;

    /**
     * Загрузка файла с фото заемщика
     *
     * @param string $id
     * @param string $realPathToFile
     * @param string $filename
     * @throws ResponseErrorException
     */
    public function postUploadImageOrder(string $id, string $realPathToFile, string $filename): void;

    /**
     * Получение статуса заявки
     *
     * @param string $id
     * @return OrderStatus
     * @throws \JsonMapper_Exception
     * @throws ResponseErrorException
     */
    public function getOrderStatus(string $id): OrderStatus;

    /**
     * Отмена заявки
     *
     * @param string $id
     * @throws ResponseErrorException
     */
    public function postOrderStop(string $id): void;

    /**
     * Подтверждение что заявка оплачена и выдана
     *
     * @param string $id
     * @throws ResponseErrorException
     */
    public function postOrderIssued(string $id): void;

    /**
     * Отметить займ как выплаченный
     *
     * @param string $id
     * @throws ResponseErrorException
     */
    public function postOrderPaid(string $id): void;

    /**
     * Отметить займ как выплаченный частично
     *
     * @param string $id
     * @param float $sum
     * @throws ResponseErrorException
     */
    public function postOrderPartialPaid(string $id, float $sum): void;

    /**
     * Отметить займ как просроченный
     *
     * @param string $id
     * @throws ResponseErrorException
     */
    public function postOrderUnpaid(string $id): void;

    /**
     * Получение суммы вознаграждения за пролонгацию займа
     *
     * @param string $id
     * @param int $days
     * @return float
     * @throws ResponseErrorException
     */
    public function getOrderProlong(string $id, int $days): float;

    /**
     * Пролонгация займа
     *
     * @param string $id
     * @param int $days
     * @throws ResponseErrorException
     */
    public function postOrderProlong(string $id, int $days): void;
}