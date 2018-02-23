<?php 

namespace Ipssi\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class File implements LoggerInterface
{
    /**
     * @var string
     */
    private $filename;
    /**
     * @var Formatter
     */
    private $formatter;

    use LoggerTrait;

    /**
     * File constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->setFilename($filename);
    }

    /**
     * @return mixed
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @param mixed $formatter
     */
    public function setFormatter($formatter): File
    {
        $this->formatter = $formatter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return bool|int
     */
    public function log($level, $message, array $context = array())
    {
        $msg = $this->formatter->format($level, Message::interpolate($message, $context));
        return file_put_contents(
            $this->getFilename(),
            $msg . PHP_EOL,
            FILE_APPEND
        );
    }
}

