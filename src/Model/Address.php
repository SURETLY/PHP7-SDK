<?php

namespace Suretly\LenderApi\Model;

/**
 * Адресс
 *
 * Class Address
 * @package Suretly\LenderApi\Model
 */
class Address implements \JsonSerializable
{
    /**
     * @var string $country Страна
     */
    private $country;

    /**
     * @var string $zip Индекс
     */
    private $zip;

    /**
     * @var string $area Район, область, края или республика
     */
    private $area;

    /**
     * @var string $city Город / населеный пункт
     */
    private $city;

    /**
     * @var string $street Улица
     */
    private $street;

    /**
     * @var string $house Дом
     */
    private $house;

    /**
     * @var string $suite Корпус
     */
    private $suite;

    /**
     * @var string $building Строение
     */
    private $building;

    /**
     * @var string $flat Квартира
     */
    private $flat;

    /**
     * @var string $flat Адрес №1 (сша)
     */
    private $address_line_1;

    /**
     * @var string $flat Адрес №2 (сша)
     */
    private $address_line_2;

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * @param string $area
     */
    public function setArea(string $area): void
    {
        $this->area = $area;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return null|string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param null|string $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHouse(): string
    {
        return $this->house;
    }

    /**
     * @param string $house
     */
    public function setHouse(string $house): void
    {
        $this->house = $house;
    }

    /**
     * @return null|string
     */
    public function getSuite(): ?string
    {
        return $this->suite;
    }

    /**
     * @param null|string $suite
     */
    public function setSuite(?string $suite): void
    {
        $this->suite = $suite;
    }

    /**
     * @return null|string
     */
    public function getBuilding(): ?string
    {
        return $this->building;
    }

    /**
     * @param null|string $building
     */
    public function setBuilding(?string $building): void
    {
        $this->building = $building;
    }

    /**
     * @return null|string
     */
    public function getFlat(): ?string
    {
        return $this->flat;
    }

    /**
     * @param null|string $flat
     */
    public function setFlat(?string $flat): void
    {
        $this->flat = $flat;
    }

    /**
     * @return null|string
     */
    public function getAddressLine1(): ?string
    {
        return $this->address_line_1;
    }

    /**
     * @param null|string $address_line_1
     */
    public function setAddressLine1(?string $address_line_1): void
    {
        $this->address_line_1 = $address_line_1;
    }

    /**
     * @return null|string
     */
    public function getAddressLine2(): ?string
    {
        return $this->address_line_2;
    }

    /**
     * @param null|string $address_line_2
     */
    public function setAddressLine2(?string $address_line_2): void
    {
        $this->address_line_2 = $address_line_2;
    }
}