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
     * _authenticationType 
     * 
     * @var string
     */
    protected $_authenticationType;
    /**
     * _uid 
     * 
     * @var string
     */
    protected $_uid;
    /**
     * _providerUid 
     * 
     * @var string
     */
    protected $_providerUid;
    /**
     * _timestamp 
     * 
     * @var DateTime
     */
    protected $_timestamp;

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
     * Add a role to this user
     *
     * @param int|Default_Model_Role $role
     */
    public function addRole($role)
    {
        $role = Zend_Registry::get('Default_DiContainer')->getRoleService()->getRoleDetect($role);
        $this->_roles[$role->getRoleId()] = $role;

        return $this;
    }

    /**
     * hasRole 
     * 
     * @param Default_Model_Role|int|string $role 
     * @return void
     */
    public function hasRole($role)
    {
        $role = Zend_Registry::get('Default_DiContainer')->getRoleService()->getRoleDetect($role);
        foreach ($this->_roles as $r) {
            if ($role->getName() === $r->getName()) {
                return true;
            }
        }

        return false;
    }
 
    /**
     * Get all roles.
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->_roles;
    }
 
    /**
     * Set role.
     *
     * @param array $roles
     */
    public function setRoles(array $roles)
    {
        $this->_roles = Zend_Registry::get('Default_DiContainer')->getRoleService()->getRoleDetect($roles);
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
 
    /**
     * Get authenticationType.
     *
     * @return authenticationType
     */
    public function getAuthenticationType()
    {
        return $this->_authenticationType;
    }
 
    /**
     * Set authenticationType.
     *
     * @param $authenticationType the value to be set
     */
    public function setAuthenticationType($authenticationType)
    {
        $this->_authenticationType = strtolower($authenticationType);
        return $this;
    }
 
    /**
     * Get uid.
     *
     * @return uid
     */
    public function getUid()
    {
        return $this->_uid;
    }
 
    /**
     * Set uid.
     *
     * @param $uid the value to be set
     */
    public function setUid($uid)
    {
        $this->_uid = $uid;
        return $this;
    }
 
    /**
     * Get providerUid.
     *
     * @return providerUid
     */
    public function getProviderUid()
    {
        return $this->_providerUid;
    }
 
    /**
     * Set providerUid.
     *
     * @param $providerUid the value to be set
     */
    public function setProviderUid($providerUid)
    {
        $this->_providerUid = $providerUid;
        return $this;
    }
 
    /**
     * Get timestamp.
     *
     * @return timestamp
     */
    public function getTimestamp()
    {
        return $this->_timestamp;
    }
 
    /**
     * Set timestamp.
     *
     * @param $timestamp the value to be set
     */
    public function setTimestamp($timestamp)
    {
        if (is_numeric($timestamp)) $timestamp = '@'.$timestamp;
        $this->_timestamp = new DateTime($timestamp);
        return $this;
    }
}
