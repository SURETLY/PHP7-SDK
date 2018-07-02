<?php

namespace Suretly\LenderApi\Model;

/**
 * Заемщик
 *
 * Class Borrower
 * @package Suretly\LenderApi\Model
 */
class Borrower implements \JsonSerializable
{
    /**
     * @var Name $name Экземпляр имени заемщика
     */
    private $name;

    /**
     * @var string $gender Пол
     */
    private $gender;

    /**
     * @var Birth $birth Экземпляр даты и места рождения
     */
    private $birth;

    /**
     * @var string $email Электроанная почта
     */
    private $email;

    /**
     * @var string $phone Телефон
     */
    private $phone;

    /**
     * @var string $city Город заемщика
     */
    private $city;

    /**
     * @var string $profile_url Ссылка на соц. сети
     */
    private $profile_url;

    /**
     * @var string $photo_url Ссылка на изображение заемщика
     */
    private $photo_url;

    /**
     * @var PassportRF $identity_document Документ удостоверяющий личность
     */
    private $identity_document;

    /**
     * @var string $identity_document_type Тип документа удостоверяющего личность
     */
    private $identity_document_type;

    /**
     * @var Address $residential
     */
    private $residential;

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @param Name $name
     */
    public function setName(Name $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return Birth
     */
    public function getBirth(): Birth
    {
        return $this->birth;
    }

    /**
     * @param Birth $birth
     */
    public function setBirth(Birth $birth): void
    {
        $this->birth = $birth;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
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
     * @return string
     */
    public function getProfileUrl(): string
    {
        return $this->profile_url;
    }

    /**
     * @param string $profile_url
     */
    public function setProfileUrl(string $profile_url): void
    {
        $this->profile_url = $profile_url;
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photo_url;
    }

    /**
     * @param string $photo_url
     */
    public function setPhotoUrl(string $photo_url): void
    {
        $this->photo_url = $photo_url;
    }

    /**
     * @return mixed
     */
    public function getIdentityDocument()
    {
        return $this->identity_document;
    }

    /**
     * @param mixed $identity_document
     */
    public function setIdentityDocument($identity_document): void
    {
        $this->identity_document = $identity_document;
    }

    /**
     * @return string
     */
    public function getIdentityDocumentType(): string
    {
        return $this->identity_document_type;
    }

    /**
     * @param string $identity_document_type
     */
    public function setIdentityDocumentType(string $identity_document_type): void
    {
        $this->identity_document_type = $identity_document_type;
    }

    /**
     * @return Address
     */
    public function getResidential(): Address
    {
        return $this->residential;
    }

    /**
     * @param Address $residential
     */
    public function setResidential(Address $residential): void
    {
        $this->residential = $residential;
    }
}