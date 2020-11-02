<?php


namespace App\Entity\OrderService;


class OrderService
{
    private int $idOrder;
    private string $problemMotorcycle;
    private string $descriptionMotorcycle;
    private string $dateDayMothYear;
    private string $dateTime;

    /**
     * @return string
     */
    public function getDateDayMothYear(): string
    {
        return $this->dateDayMothYear;
    }

    /**
     * @param string $dateDayMothYear
     */
    public function setDateDayMothYear(string $dateDayMothYear): void
    {
        $this->dateDayMothYear = $dateDayMothYear;
    }

    /**
     * @return string
     */
    public function getDateTime(): string
    {
        return $this->dateTime;
    }

    /**
     * @param string $dateTime
     */
    public function setDateTime(string $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return int
     */
    public function getIdOrder(): int
    {
        return $this->idOrder;
    }

    /**
     * @param int $idOrder
     */
    public function setIdOrder(int $idOrder): void
    {
        $this->idOrder = $idOrder;
    }

    /**
     * @return string
     */
    public function getProblemMotorcycle(): string
    {
        return $this->problemMotorcycle;
    }

    /**
     * @param string $problemMotorcycle
     */
    public function setProblemMotorcycle(string $problemMotorcycle): void
    {
        $this->problemMotorcycle = $problemMotorcycle;
    }

    /**
     * @return string
     */
    public function getDescriptionMotorcycle(): string
    {
        return $this->descriptionMotorcycle;
    }

    /**
     * @param string $descriptionMotorcycle
     */
    public function setDescriptionMotorcycle(string $descriptionMotorcycle): void
    {
        $this->descriptionMotorcycle = $descriptionMotorcycle;
    }

}