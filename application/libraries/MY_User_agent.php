<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Agent Class
 *
 * Identifies the platform, browser, robot, or mobile device of the browsing agent
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    User Agent
 * @author        EllisLab Dev Team
 * @link        http://codeigniter.com/user_guide/libraries/user_agent.html
 */
class MY_User_agent{

    // {{{ property
    /**
     * Current user-agent
     *
     * @var string
     */
    public $agent = NULL;

    /**
     * Flag for if the user-agent belongs to a browser
     *
     * @var bool
     */
    public $is_browser = FALSE;

    /**
     * Flag for if the user-agent is a robot
     *
     * @var bool
     */
    public $is_robot = FALSE;

    /**
     * Flag for if the user-agent is a mobile browser
     *
     * @var bool
     */
    public $is_mobile = FALSE;

    /**
     * Languages accepted by the current user agent
     *
     * @var array
     */
    public $languages = array();

    /**
     * Character sets accepted by the current user agent
     *
     * @var array
     */
    public $charsets = array();

    /**
     * List of platforms to compare against current user agent
     *
     * @var array
     */
    public $platforms = array();

    /**
     * List of browsers to compare against current user agent
     *
     * @var array
     */
    public $browsers = array();

    /**
     * List of mobile browsers to compare against current user agent
     *
     * @var array
     */
    public $mobiles = array();

    /**
     * List of robots to compare against current user agent
     *
     * @var array
     */
    public $robots = array();

    /**
     * Current user-agent platform
     *
     * @var string
     */
    public $platform = '';

    /**
     * Current user-agent browser
     *
     * @var string
     */
    public $browser = '';

    /**
     * Current user-agent version
     *
     * @var string
     */
    public $version = '';

    /**
     * Current user-agent mobile name
     *
     * @var string
     */
    public $mobile = '';

    /**
     * Current user-agent robot name
     *
     * @var string
     */
    public $robot = '';

    /**
     * HTTP Referer
     *
     * @var    mixed
     */
    public $referer;
    // }}}

    // {{{ public function __construct()
    /**
     * Constructor
     *
     * Sets the User Agent and runs the compilation routine
     *
     * @return    void
     */
    public function __construct()
    {
        if (isset($_SERVER['HTTP_USER_AGENT']))
        {
            $this->agent = trim($_SERVER['HTTP_USER_AGENT']);
        }

        if ($this->agent !== NULL && $this->_load_agent_file())
        {
            $this->_compile_data();
        }

        log_message('info', 'User Agent Class Initialized');
    }
    // }}}

    // {{{ protected function _load_agent_file()
    /**
     * Compile the User Agent Data
     *
     * @return    bool
     */
    protected function _load_agent_file()
    {
        if (($found = file_exists(APPPATH.'config/user_agents.php')))
        {
            include(APPPATH.'config/user_agents.php');
        }

        if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/user_agents.php'))
        {
            include(APPPATH.'config/'.ENVIRONMENT.'/user_agents.php');
            $found = TRUE;
        }

        if ($found !== TRUE)
        {
            return FALSE;
        }

        $return = FALSE;

        if (isset($platforms))
        {
            $this->platforms = $platforms;
            unset($platforms);
            $return = TRUE;
        }

        if (isset($browsers))
        {
            $this->browsers = $browsers;
            unset($browsers);
            $return = TRUE;
        }

        if (isset($mobiles))
        {
            $this->mobiles = $mobiles;
            unset($mobiles);
            $return = TRUE;
        }

        if (isset($robots))
        {
            $this->robots = $robots;
            unset($robots);
            $return = TRUE;
        }

        return $return;
    }

    // }}}

    // {{{ protected function _compile_data()
    /**
     * Compile the User Agent Data
     *
     * @return    bool
     */
    protected function _compile_data()
    {
        $this->_set_platform();

        foreach (array('_set_robot', '_set_browser', '_set_mobile') as $function)
        {
            if ($this->$function() === TRUE)
            {
                break;
            }
        }
    }

    // }}}

    // {{{ protected function _set_platform()
    /**
     * Set the Platform
     *
     * @return    bool
     */
    protected function _set_platform()
    {
        if (is_array($this->platforms) && count($this->platforms) > 0)
        {
            foreach ($this->platforms as $key => $val)
            {
                if (preg_match('|'.preg_quote($key).'|i', $this->agent))
                {
                    $this->platform = $val;
                    return TRUE;
                }
            }
        }

        $this->platform = 'Unknown Platform';
        return FALSE;
    }

    // }}}

    // {{{ protected function _set_browser()
    /**
     * Set the Browser
     *
     * @return    bool
     */
    protected function _set_browser()
    {
        if (is_array($this->browsers) && count($this->browsers) > 0)
        {
            foreach ($this->browsers as $key => $val)
            {
                if (preg_match('|'.$key.'.*?([0-9\.]+)|i', $this->agent, $match))
                {
                    $this->is_browser = TRUE;
                    $this->version = $match[1];
                    $this->browser = $val;
                    $this->_set_mobile();
                    return TRUE;
                }
            }
        }

        return FALSE;
    }

    // }}}

    // {{{ protected function _set_robot()
    /**
     * Set the Robot
     *
     * @return    bool
     */
    protected function _set_robot()
    {
        if (is_array($this->robots) && count($this->robots) > 0)
        {
            foreach ($this->robots as $key => $val)
            {
                if (preg_match('|'.preg_quote($key).'|i', $this->agent))
                {
                    $this->is_robot = TRUE;
                    $this->robot = $val;
                    $this->_set_mobile();
                    return TRUE;
                }
            }
        }

        return FALSE;
    }

    // }}}

    // {{{ protected function _set_mobile()
    /**
     * Set the Mobile Device
     *
     * @return    bool
     */
    protected function _set_mobile()
    {
        if (is_array($this->mobiles) && count($this->mobiles) > 0)
        {
            foreach ($this->mobiles as $key => $val)
            {
                if (FALSE !== (stripos($this->agent, $key)))
                {
                    $this->is_mobile = TRUE;
                    $this->mobile = $val;
                    return TRUE;
                }
            }
        }

        return FALSE;
    }

    // }}}

    // {{{ protected function _set_languages()
    /**
     * Set the accepted languages
     *
     * @return    void
     */
    protected function _set_languages()
    {
        if ((count($this->languages) === 0) && ! empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
        {
            $this->languages = explode(',', preg_replace('/(;\s?q=[0-9\.]+)|\s/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_LANGUAGE']))));
        }

        if (count($this->languages) === 0)
        {
            $this->languages = array('Undefined');
        }
    }

    // }}}

    // {{{ protected function _set_charsets()
    /**
     * Set the accepted character sets
     *
     * @return    void
     */
    protected function _set_charsets()
    {
        if ((count($this->charsets) === 0) && ! empty($_SERVER['HTTP_ACCEPT_CHARSET']))
        {
            $this->charsets = explode(',', preg_replace('/(;\s?q=.+)|\s/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_CHARSET']))));
        }

        if (count($this->charsets) === 0)
        {
            $this->charsets = array('Undefined');
        }
    }

    // }}}

    // {{{ public function is_browser($key = NULL)
    /**
     * Is Browser
     *
     * @param    string    $key
     * @return    bool
     */
    public function is_browser($key = NULL)
    {
        if ( ! $this->is_browser)
        {
            return FALSE;
        }

        // No need to be specific, it's a browser
        if ($key === NULL)
        {
            return TRUE;
        }

        // Check for a specific browser
        return (isset($this->browsers[$key]) && $this->browser === $this->browsers[$key]);
    }

    // }}}

    // {{{ public function is_robot($key = NULL)
    /**
     * Is Robot
     *
     * @param    string    $key
     * @return    bool
     */
    public function is_robot($key = NULL)
    {
        if ( ! $this->is_robot)
        {
            return FALSE;
        }

        // No need to be specific, it's a robot
        if ($key === NULL)
        {
            return TRUE;
        }

        // Check for a specific robot
        return (isset($this->robots[$key]) && $this->robot === $this->robots[$key]);
    }

    // }}}

    // {{{ public function is_mobile($key = NULL)
    /**
     * Is Mobile
     *
     * @param    string    $key
     * @return    bool
     */
    public function is_mobile($key = NULL)
    {
        if ( ! $this->is_mobile)
        {
            return FALSE;
        }

        // No need to be specific, it's a mobile
        if ($key === NULL)
        {
            return TRUE;
        }

        // Check for a specific robot
        return (isset($this->mobiles[$key]) && $this->mobile === $this->mobiles[$key]);
    }

    // }}}

    // {{{ public function is_iOS()
    /**
     * Is iOs
     *
     * @param    string    $key
     * @return    bool
     */
    public function is_iOS()
    {
        return ( $this->platforms['iphone'] === $this->platform );
    }

    // }}}

    // {{{ public function is_androidOS()
    /**
     * Is Android
     *
     * @param    string    $key
     * @return    bool
     */
    public function is_androidOS()
    {
        return ( $this->platforms['android'] === $this->platform );
    }

    // }}}

    // {{{ public function is_referral()
    /**
     * Is this a referral from another site?
     *
     * @return    bool
     */
    public function is_referral()
    {
        if ( ! isset($this->referer))
        {
            if (empty($_SERVER['HTTP_REFERER']))
            {
                $this->referer = FALSE;
            }
            else
            {
                $referer_host = @parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
                $own_host = parse_url(config_item('base_url'), PHP_URL_HOST);

                $this->referer = ($referer_host && $referer_host !== $own_host);
            }
        }

        return $this->referer;
    }

    // }}}

    // {{{ public function agent_string()
    /**
     * Agent String
     *
     * @return    string
     */
    public function agent_string()
    {
        return $this->agent;
    }

    // }}}

    // {{{ public function platform()
    /**
     * Get Platform
     *
     * @return    string
     */
    public function platform()
    {
        return $this->platform;
    }

    // }}}

    // {{{ public function browser()
    /**
     * Get Browser Name
     *
     * @return    string
     */
    public function browser()
    {
        return $this->browser;
    }

    // }}}

    // {{{ public function version()
    /**
     * Get the Browser Version
     *
     * @return    string
     */
    public function version()
    {
        return $this->version;
    }

    // }}}

    // {{{ public function robot()
    /**
     * Get The Robot Name
     *
     * @return    string
     */
    public function robot()
    {
        return $this->robot;
    }

    // }}}

    // {{{ public function mobile()
    /**
     * Get the Mobile Device
     *
     * @return    string
     */
    public function mobile()
    {
        return $this->mobile;
    }

    // }}}

    // {{{ public function referrer()
    /**
     * Get the referrer
     *
     * @return    bool
     */
    public function referrer()
    {
        return empty($_SERVER['HTTP_REFERER']) ? '' : trim($_SERVER['HTTP_REFERER']);
    }

    // }}}

    // {{{ public function languages()
    /**
     * Get the accepted languages
     *
     * @return    array
     */
    public function languages()
    {
        if (count($this->languages) === 0)
        {
            $this->_set_languages();
        }

        return $this->languages;
    }

    // }}}

    // {{{ public function charsets()
    /**
     * Get the accepted Character Sets
     *
     * @return    array
     */
    public function charsets()
    {
        if (count($this->charsets) === 0)
        {
            $this->_set_charsets();
        }

        return $this->charsets;
    }

    // }}}

    // {{{ public function accept_lang($lang = 'en')
    /**
     * Test for a particular language
     *
     * @param    string    $lang
     * @return    bool
     */
    public function accept_lang($lang = 'en')
    {
        return in_array(strtolower($lang), $this->languages(), TRUE);
    }

    // }}}

    // {{{ public function accept_charset($charset = 'utf-8')
    /**
     * Test for a particular character set
     *
     * @param    string    $charset
     * @return    bool
     */
    public function accept_charset($charset = 'utf-8')
    {
        return in_array(strtolower($charset), $this->charsets(), TRUE);
    }

    // }}}

    // {{{ public function parse($string)
    /**
     * Parse a custom user-agent string
     *
     * @param    string    $string
     * @return    void
     */
    public function parse($string)
    {
        // Reset values
        $this->is_browser = FALSE;
        $this->is_robot = FALSE;
        $this->is_mobile = FALSE;
        $this->browser = '';
        $this->version = '';
        $this->mobile = '';
        $this->robot = '';

        // Set the new user-agent string and parse it, unless empty
        $this->agent = $string;

        if ( ! empty($string))
        {
            $this->_compile_data();
        }
    }

    // }}}

}
/**
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: sw=4 ts=4 fdm=marker
 * vim<600: sw=4 ts=4
 */
