<?php

class Memcached
{
	
	var $memcache;
	
	function Memcached()
	{
		$this->memcache = new Memcache;
		$this->memcache->connect('localhost', 11211);
		log_message('debug', 'Created Memcache connection.');
	}
	
	function set($key, $data, $flag, $expires)
	{
		$this->memcache->set($key, $data, $flag, $expires);
	}
	
	function replace($key, $data, $flag, $expires)
	{
		$this->memcache->replace($key, $data, $flag, $expires);
	}
	
	function get($key, $flag)
	{
		return $this->memcache->get($key, $flag);
	}
	
	function delete($key, $timeout = 0)
	{
		$this->memcache->delete($key, $timeout);
	}
	
	function flush()
	{
		$this->memcache->flush();
	}

	function close()
	{
		$this->memcache->close();
		log_message('debug', 'Closed Memcache connection.');
	}
	
}

?>