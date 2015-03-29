<?php namespace CodeZero\Session; 

use Illuminate\Session\Store;

class LaravelSession implements Session
{
    /**
     * Laravel's Session Store
     *
     * @var Store
     */
    private $session;

    /**
     * Create a new instance of VanillaSession
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = & $session;
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
        if ($key === null) {
            return $this->session->all();
        }

        return $this->session->get($key);
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
        $this->session->put($key, $value);
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
        $this->session->forget($key);
    }

    /**
     * Clear all session data
     *
     * @return void
     */
    public function flush()
    {
        $this->session->flush();
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
        $this->session->regenerate();
    }
}
