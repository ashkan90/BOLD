<?php 

/**
 * 
 */
class Users extends Model
{
	private $_isLoggedIn, $_sessionName, $_cookieName;
	public static $currentLoggedInUser = null;

	public function __construct($user = ''){
		$table = $user;
		parent::__construct($table);
		$this->_sessionName = CURRENT_USER_SESSION_NAME;
		$this->_cookieName = REMEMBER_ME_COOKIE_NAME;
		$this->_softDelete = true;
		if ($user != '') {
			if (is_int($user)) {
				$u = $this->_db->first($table, ['conditions' => 'id = ?', 'bind' => [$user]]);
			}else {
				$u = $this->_db->first($table, ['conditions' => 'username = ?', 'bind' => [$user]]);
			}
			if ($u) {
				foreach ($u as $key => $value) {
					$this->$key = $value;
				}
			}
		}
	}

	public function findByUsername($username){
		return $this->first(['conditions' => 'username = ?', 'bind' => [$username]]);
	}

	public function findByMail($mail){
		return $this->first(['conditions' => 'mail = ?', 'bind' => [$mail]]);
	}

	public function login($rememberMe = false){
		Session::set($this->_sessionName, $this->id);
		if ($rememberMe) {
			$hash = md5(uniqid() + rand(0, 100));
			$user_agent = Session::uagent_no_version();
			Cookie::set($this->_cookieName, $hash, REMEMBER_COOKIE_EXPIRY);
			$fields = ['session' => $hash, 'user_agent' => $user_agent, 'user_id' => $this->id];
			$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
			$this->_db->insert("user_sessions", $fields);
		}
	}
}