<?php

class Project
{
private $id;
private $name;
private $author;
private $langeuage;
private $description;

    /**
     * @param $id
     * @param $name
     * @param $author
     * @param $langeuage
     * @param $description
     */
    public function __construct($id, $name, $author, $langeuage, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->langeuage = $langeuage;
        $this->description = $description;
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getLangeuage()
    {
        return $this->langeuage;
    }

    /**
     * @param mixed $langeuage
     */
    public function setLangeuage($langeuage): void
    {
        $this->langeuage = $langeuage;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

}