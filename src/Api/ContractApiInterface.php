<?php

namespace Suretly\LenderApi\Api;

use Suretly\LenderApi\Exception\ResponseErrorException;

/**
 * Interface ContractApiInterface
 * @package Suretly\LenderApi\Api
 */
interface ContractApiInterface
{
    /**
     * Получить контракт для заемщика
     *
     * @param string $id Номер заявки
     * @return string
     * @throws ResponseErrorException
     */
    public function getContract(string $id): string;

    /**
     * Подтверждение, что договор по заявке подписан заемщиком
     *
     * @param string $id Номер заявки
     * @return string
     * @throws ResponseErrorException
     */
    public function postContractAccept(string $id): void;
}