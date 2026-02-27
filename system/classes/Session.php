<?php

/**
 * Kontiki\Session
 *
 * @package    part of Kontiki
 * @author     Jidaikobo Inc.
 * @license    The MIT License (MIT)
 * @copyright  Jidaikobo Inc.
 * @link       http://www.jidaikobo.com
 */

namespace Kontiki;

class Session
{
    protected static $values = array();

    /**
     * Create Session
     *
     * @param String $session_name
     * @return void
     */
    public static function forge($session_name = 'KNTKSESSID')
    {
        if (self::isSessionDisabled()) {
            Util::error('couldn\'t start session.');
        }

        if (! self::canStartSession()) {
            return;
        }

        self::configureSessionIni();
        session_name($session_name);
        session_start();
        self::keepSessionAliveSecurely();
    }

    /**
     * started?
     *
     * @return Bool
     */
    public static function isStarted()
    {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE;
        }
        return session_id() !== '';
    }

    /**
     * Destroy Session
     *
     * @return Void
     */
    public static function destroy()
    {
        $_SESSION = array();
        if (Input::cookie(session_name()) !== null) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
        session_destroy();
    }

    /**
     * add
     *
     * @param String $realm
     * @param String $key
     * @param Mixed $vals
     * @return Void
     */
    public static function add($realm, $key, $vals)
    {
        SessionBucket::add(static::$values, $_SESSION, $realm, $key, $vals);
    }

    /**
     * remove
     *
     * @param String $realm
     * @param String $key
     * @param Integer $c_key
     * @return Void
     */
    public static function remove($realm, $key = '', $c_key = '')
    {
        SessionBucket::remove(static::$values, $_SESSION, $realm, $key, $c_key);
    }

    /**
     * fetch
     * fetch data from SESSION and static value.
     * after fetching data will be deleted (default).
     *
     * @param String $realm
     * @param String $key
     * @param Bool $is_once
     * @return Mixed
     */
    public static function fetch($realm, $key = '', $is_once = true)
    {
        return SessionBucket::fetch(static::$values, $_SESSION, $realm, $key, $is_once);
    }

    private static function isSessionDisabled()
    {
        if (! defined('PHP_SESSION_DISABLED') || version_compare(phpversion(), '5.4.0', '<')) {
            return false;
        }
        return session_status() === PHP_SESSION_DISABLED;
    }

    private static function canStartSession()
    {
        return static::isStarted() === false && ! headers_sent();
    }

    private static function configureSessionIni()
    {
        if (Util::isSsl()) {
            ini_set('session.cookie_secure', 1);
        }
        ini_set('session.cookie_httponly', true);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.use_only_cookies', 1);
    }

    private static function keepSessionAliveSecurely()
    {
        static::add('kntk_sess', 'expire', time());
        if (! self::shouldRegenerateSessionId()) {
            return;
        }
        static::add('kntk_sess', 'expire', time());
        session_regenerate_id(true);
    }

    private static function shouldRegenerateSessionId()
    {
        if (mt_rand(1, 10) !== 1) {
            return false;
        }
        $expires = static::show('kntk_sess', 'expire');
        return end($expires) + 5 < time();
    }

    /**
     * show
     *
     * @param String $realm
     * @param String $key
     * @return Mixed
     */
    public static function show($realm = '', $key = '')
    {
        return SessionBucket::show(static::$values, $_SESSION, $realm, $key);
    }
}
