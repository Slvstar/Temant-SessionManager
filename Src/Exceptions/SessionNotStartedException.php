<?php declare(strict_types=1);

namespace Temant\SessionManager\Exceptions {
    class SessionNotStartedException extends \RuntimeException
    {
        /**
         * Constructor for SessionNotStartedException.
         *
         * @param string $message The error message for this exception.
         * @param int $code The error code for this exception (default: 801).
         */
        public function __construct(string $message = "Session has not been started yet.", int $code = 801)
        {
            parent::__construct($message, $code);
        }
    }
}