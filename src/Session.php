<?php namespace CodeZero\Session;

interface Session
{
    /**
     * Get session data
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key = null);

    /**
     * Store session data
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function store($key, $value);

    /**
     * Delete session data
     *
     * @param string $key
     *
     * @return void
     */
    public function delete($key);

    /**
     * Clear all session data
     *
     * @return void
     */
    public function flush();

    /**
     * Destroy the current session
     * and start a new one
     *
     * @return void
     */
    public function destroy();
}
