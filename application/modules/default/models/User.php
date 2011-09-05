<?php
class Default_Model_User
    extends Edp_Model_ModelAbstract
{
    /**
     * User ID
     *
     * @var int
     */
    protected $_userId;

    /**
     * Email address
     * 
     * @var string
     */
    protected $_email;

    /**
     * Display name
     *
     * @var string
     */
    protected $_displayName;

    /**
     * Language preference 
     * 
     * @var string
     */
    protected $_language;

    /**
     * Roles
     *
     * @var array of Default_Model_Role
     */
    protected $_roles;

    /**
     * Last login date/time
     *
     * @var DateTime
     */
    protected $_lastLogin;

    /**
     * Last IP they logged in with
     *
     * @var string
     */
    protected $_lastIp;

    /**
     * Registration date/time
     *
     * @var DateTime
     */
    protected $_registerTime;

    /**
     * IP address they registered with
     *
     * @var string
     */
    protected $_registerIp;

    /**
     * Get userId.
     *
     * @return userId
     */
    public function getUserId()
    {
        return $this->_userId;
    }
 
    /**
     * Set userId.
     *
     * @param $userId the value to be set
     */
    public function setUserId($userId)
    {
        $this->_userId = (int) $userId;
        return $this;
    }
 
    /**
     * Get email.
     *
     * @return email
     */
    public function getEmail()
    {
        return $this->_email;
    }
 
    /**
     * Set email.
     *
     * @param $email the value to be set
     */
    public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }
 
    /**
     * Get displayName.
     *
     * @return displayName
     */
    public function getDisplayName()
    {
        return $this->_displayName;
    }
 
    /**
     * Set displayName.
     *
     * @param $displayName the value to be set
     */
    public function setDisplayName($displayName)
    {
        $this->_displayName = $displayName;
        return $this;
    }
 
    /**
     * Get language.
     *
     * @return language
     */
    public function getLanguage()
    {
        return $this->_language;
    }
 
    /**
     * Set language.
     *
     * @param $language the value to be set
     */
    public function setLanguage($language)
    {
        $this->_language = $language;
        return $this;
    }
 
    /**
     * Get roles.
     *
     * @return roles
     */
    public function getRoles()
    {
        return $this->_roles;
    }
 
    /**
     * Set roles.
     *
     * @param $roles the value to be set
     */
    public function setRoles($roles)
    {
        $this->_roles = $roles;
        return $this;
    }
 
    /**
     * Get lastLogin.
     *
     * @return lastLogin
     */
    public function getLastLogin()
    {
        return $this->_lastLogin;
    }
 
    /**
     * Set lastLogin.
     *
     * @param $lastLogin the value to be set
     */
    public function setLastLogin($lastLogin)
    {
        $this->_lastLogin = new DateTime($lastLogin);
        return $this;
    }
 
    /**
     * Get lastIp.
     *
     * @return lastIp
     */
    public function getLastIp()
    {
        return $this->_lastIp;
    }
 
    /**
     * Set lastIp.
     *
     * @param $lastIp the value to be set
     */
    public function setLastIp($lastIp)
    {
        $this->_lastIp = $lastIp;
        return $this;
    }
 
    /**
     * Get registerTime.
     *
     * @return registerTime
     */
    public function getRegisterTime()
    {
        return $this->_registerTime;
    }
 
    /**
     * Set registerTime.
     *
     * @param $registerTime the value to be set
     */
    public function setRegisterTime($registerTime)
    {
        $this->_registerTime = new DateTime($registerTime);
        return $this;
    }
 
    /**
     * Get registerIp.
     *
     * @return registerIp
     */
    public function getRegisterIp()
    {
        return $this->_registerIp;
    }
 
    /**
     * Set registerIp.
     *
     * @param $registerIp the value to be set
     */
    public function setRegisterIp($registerIp)
    {
        $this->_registerIp = $registerIp;
        return $this;
    }
}
