<?php

namespace Human;

use Model\User;

class Human
{
    /**
     * Gender list
     *
     * This constant store the list of allowed gender for the Human class
     *
     * @var string[]
     */
    public const GENDER_LIST = ['FEMALE', 'MALE', 'OTHER'];

    /**
     * Gender
     *
     * This property store the specific gender of the current instance
     *
     * @var string
     */
    private $gender;

    /**
     * Human constructor.
     *
     * Set up a new Human instance by storing the gender type of the instance
     *
     * @param string $gender The gender of the human, refer to Human::GENDER_LIST
     */
    public function __construct(string $gender)
    {
        if (!in_array($gender, self::GENDER_LIST)) {
            throw new \RuntimeException(sprintf('Gender have to be in [%s]', implode(self::GENDER_LIST)));
        }

        $this->gender = $gender;
    }

    /**
     * Short explain
     *
     * Here we will have the long explanation for the metho
     *
     * @param string    $string  A string
     * @param int       $integer An integer
     * @param \DateTime $time    A datetime instance
     * @param User      $user    A user instance
     *
     * @return int
     * @throws \LogicException If the given string is empty
     * @example <pre>
     *
     * </pre>
     */
    public function doSomething(
        string $string,
        int $integer,
        \DateTime $time,
        User $user
    ) {
        if (empty($string)) {
            throw new \LogicException();
        }
        return 12;
    }
}







