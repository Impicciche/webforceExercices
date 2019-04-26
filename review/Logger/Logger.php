<?php
namespace Logger;

class Logger
{
    /**
     * @var string
     */
    private $fileLocation;

    /**
     * Logger constructor.
     * @param $fileLocation
     */
    public function __construct(string $fileLocation)
    {
        $this->fileLocation = $fileLocation;
    }

    public function addMessage(string $message)
    {
        $file = fopen($this->fileLocation, 'a');
        fwrite($file, $message);
        fclose($file);
    }
}