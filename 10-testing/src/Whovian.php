<?php
class Whovian
{
    /**
     * @var string
     */
    protected $favoriteDoctor;

    /**
     * Constructor
     * @param  string $favoriteDoctor
     */
    public function __construct($favoriteDoctor)
    {
        $this->favoriteDoctor = (string)$favoriteDoctor;
    }

    /**
     * Say
     * @return string
     */
    public function say()
    {
        return 'The best doctor is ' . $this->favoriteDoctor;
    }

    /**
     * Respond to
     * @param  string $input
     * @return string
     * @throws \Exception
     */
    public function respondTo($input)
    {
        $input = strtolower($input);
        $myDoctor = strtolower($this->favoriteDoctor);

        if (strpos($input, $myDoctor) === false) {
            throw new Exception(
                sprintf(
                    'No way! %s is the best doctor ever!',
                    $this->favoriteDoctor
                )
            );
        }

        return 'I agree!';
    }
}
