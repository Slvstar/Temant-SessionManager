<?php declare(strict_types=1);

namespace Temant\SessionManager {
    use Temant\SessionManager\Exceptions\{
        SessionNotStartedException,
        SessionStartedException
    };

    class SessionManager implements SessionManagerInterface
    {
        /**
         * Checks if the session is currently active.
         *
         * @return bool True if the session is active, false otherwise.
         */
        public function isActive(): bool
        {
            return session_status() === PHP_SESSION_ACTIVE;
        }

        /**
         * Set the session name.
         *
         * @param string $name The name of the session.
         * @return static
         */
        public function setName(string $name): self
        {
            if (!$this->isActive()) {
                session_name($name);
                return $this;
            }
            throw new SessionStartedException;
        }

        /**
         * Start a new session or resume the existing session.
         * @param mixed[] $options The name of the session.
         * @return bool True if the session was successfully started, false otherwise.
         */
        public function start(array $options = []): bool
        {
            return !$this->isActive() ? session_start($options) : throw new SessionStartedException;
        }

        /**
         * Set a session variable.
         *
         * @param string $key   The name of the session variable.
         * @param mixed  $value The value to set.
         */
        public function set(string $key, mixed $value): self
        {
            $_SESSION[$key] = $value;
            return $this;
        }

        /**
         * Get the value of a session variable.
         *
         * @param string $key The name of the session variable.
         *
         * @return mixed The value of the session variable, or null if it doesn't exist.
         */
        public function get(string $key): mixed
        {
            return $this->has($key) ? $_SESSION[$key] : null;
        }

        /**
         * Get the value of all the session variables.
         *
         * @return mixed[]
         */
        public function all(): array
        {
            return $_SESSION;
        }

        /**
         * Check if a session variable exists.
         *
         * @param string $key The name of the session variable.
         *
         * @return bool True if the session variable exists, false otherwise.
         */
        public function has(string $key): bool
        {
            return isset($_SESSION[$key]);
        }

        /**
         * Remove a session variable.
         *
         * @param string $key The name of the session variable to remove.
         */
        public function remove(string $key): void
        {
            unset($_SESSION[$key]);
        }

        /**
         * Regenerate the session ID.
         *
         * @param bool $deleteOldSession Whether to delete the old session data or not.
         */
        public function regenerate(bool $deleteOldSession = true): bool
        {
            return $this->isActive() ? session_regenerate_id($deleteOldSession) : throw new SessionNotStartedException;
        }

        /**
         * Destroy the current session.
         */
        public function destroy(): bool
        {
            if ($this->isActive()) {
                session_unset();
                return session_destroy();
            }
            throw new SessionNotStartedException;
        }
    }
}