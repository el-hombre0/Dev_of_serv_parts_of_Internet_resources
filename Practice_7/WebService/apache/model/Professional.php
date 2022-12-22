<?php

class Professional
{
    private $id;
    private $name;
    private $birthday;
    private $birthPlace;
    private $Contacts;
    private $Skills;
    private $JobExpirience;
    private $education;

    /**
     * @param $id
     * @param $name
     * @param $birthday
     * @param $birthPlace
     * @param $Contacts
     * @param $Skills
     * @param $JobExperience
     * @param $education
     */
    public function __construct($id, $name, $birthday, $birthPlace, $Contacts, $Skills, $JobExperience, $education)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->birthPlace = $birthPlace;
        $this->Contacts = $Contacts;
        $this->Skills = $Skills;
        $this->JobExpirience = $JobExperience;
        $this->education = $education;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @param mixed $birthPlace
     */
    public function setBirthPlace($birthPlace): void
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->Contacts;
    }

    /**
     * @param mixed $Contacts
     */
    public function setContacts($Contacts): void
    {
        $this->Contacts = $Contacts;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->Skills;
    }

    /**
     * @param mixed $Skills
     */
    public function setSkills($Skills): void
    {
        $this->Skills = $Skills;
    }

    /**
     * @return mixed
     */
    public function getJobExpirience()
    {
        return $this->JobExpirience;
    }

    /**
     * @param mixed $JobExpirience
     */
    public function setJobExpirience($JobExpirience): void
    {
        $this->JobExpirience = $JobExpirience;
    }

    /**
     * @return mixed
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * @param mixed $education
     */
    public function setEducation($education): void
    {
        $this->education = $education;
    }

}