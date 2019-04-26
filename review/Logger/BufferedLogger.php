<?php
namespace Logger;

class BufferedLogger
{
    /**
     * @var string
     */
    private $fileLocation;

    /**
     * @var string
     */
    private $buffer;

    /**
     * BufferedLogger constructor.
     * @param string $fileLocation
     */
    public function __construct(string $fileLocation)
    {
        $this->fileLocation = $fileLocation;
        $this->buffer = '';
    }

    public function addMessage(string $message)
    {
        $this->buffer .= $message;
    }

    public function __destruct()
    {
        $file = fopen($this->fileLocation, 'a');
        fwrite($file, $this->buffer);
        fclose($file);
        $this->buffer = '';
    }

}