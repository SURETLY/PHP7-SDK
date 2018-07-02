<?php

namespace Suretly\LenderApi\Model;

/**
 * Список заявок
 *
 * Class Orders
 * @package Suretly\LenderApi\Model
 */
class Orders
{
    /**
     * @var int $total Количество
     */
    private $total;

    /**
     * @var Order[] $list Список заявок
     */
    private $list;

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    /**
     * @return Order[]
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * @param Order[] $list
     */
    public function setList(array $list): void
    {
        $this->list = $list;
    }
}