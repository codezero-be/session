<?php namespace CodeZero\Session; 

class VanillaSession implements Session
{
    /**
     * Session Data
     *
     * @var array
     */
    private $session;

    /**
     * Create a new instance of VanillaSession
     *
     * @param array $session
     */
    public function __construct(array &$session = null)
    {
        if ($session) {
            $this->session = & $session;
        } else {
            $this->session = & $_SESSION;
        }

        $this->start();
    }

    /**
     * Get session data
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key = null)
    {
        if ( ! $key) {
            return $this->session;
        }

        if ( ! $this->exists($key)) {
            return null;
        }

        return $this->session[$key];
    }

    /**
     * Store session data
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function store($key, $value)
    {
        $this->session[$key] = $value;
    }

    /**
     * Delete session data
     *
     * @param string $key
     *
     * @return void
     */
    public function delete($key)
    {
        if ($this->exists($key)) {
            $this->store($key, null);
            unset($this->session[$key]);
        }
    }

    /**
     * Clear all session data
     *
     * @return void
     */
    public function flush()
    {
        $this->session = [];
        session_unset();
    }

    /**
     * Destroy the current session
     * and start a new one
     *
     * @return void
     */
    public function destroy()
    {
        $this->flush();
        session_destroy();
        session_write_close();
        setcookie(session_name(), null, -1, '/');
        session_regenerate_id(true);
        $this->start();
    }

    /**
     * Start a new session if none exists
     *
     * @return void
     */
    private function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Check if a session key exists
     *
     * @param string $key
     *
     * @return bool
     */
    private function exists($key)
    {
        return isset($this->session[$key]);
    }
}
