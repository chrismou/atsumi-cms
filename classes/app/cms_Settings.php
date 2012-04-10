<?php
class cms_Settings extends atsumi_AbstractAppSettings {
	/* we can setup base settings here, can be useful for version numbers etc */
	protected $settings = 	array (
			'siteName'	=> 'My Atsumi powered website!',
			'debug'		=> true,
			// Database Settings
			'dbName'	=> '******',
			'dbPort'	=> '5432',
			'dbUser'	=> '****************',
			'dbPassword'	=> '****************',
			'dbHost'	=> '127.0.0.1',
			// Path Settings
			'basePath'	=> '',
			'logPath'	=> '',
			'imagePath'	=> ''

				);
	/* 	At times you may want to utilise the construct, this could be to 
	 * 	analyse what domain a user is on and you could give them an 
	 * 	alternate specification for example */
	public function __construct () {
		parent::__construct();
	}
	
	/* the specification is how atsumi knows what URI's call what class & method */
	public function init_specification () {
		return array (	
			''	=> 'cms_FrontPageController',
			'ajax'	=> 'cms_AjaxController'
		);
	}

	public function configureErrorHandler() {
		Atsumi::error__addObserver (
			new listener_LogToFile($this->get_logPath),
				atsumi_ErrorHandler::EVENT_EXCEPTION_FC
		);
		Atsumi::error__setRecoverer(new recoverer_DisplayAndExit());
	}

	/* Init Database */                             
        public function init_db() {
                try {
                        $db = new db_PostgreSql(array(
				'host'		=> $this->get_dbHost,
				'port'		=> $this->get_dbPort,
				'username'	=> $this->get_dbUser,
				'password'	=> $this->get_dbPassword, 
				'dbname'	=> $this->get_dbName
			));

                        if ($this->get_debug) {
                                atsumi_Debug::addDatabase($db);                                 
                        }       
                } catch (Exception $e) {
                        throw new Exception("Failed to connect to database.");
                }               
                return $db;     
        }	

	public function init_session() {
		return session_Handler::getInstance(
			array(
				'storage'	=> 'session_BasicStorage'
			)
		);
	}

	public function init_memcache() {
		return mc_MemcacheObject::getInstance('localhost');
	}

}
?>
