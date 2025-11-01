<?php

namespace Sophia\Addon;

class Database
{
	private $DB;
	private $sql;

	function __construct()
	{
		$this->DB = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ($this->DB->connect_error) die("Connection failed: " . $this->DB->connect_error);
		$this->DB->set_charset("utf8");
		return $this->DB;
	}
	function query($q)
	{
		$this->sql = $q;
		$result = $this->DB->query($q);
		if ($this->DB->error)
			throw new \Exception($this->DB->error . " => [" . $q . "]");
		if (strpos(strtoupper($q), 'INSERT INTO') !== false)
			$result = $this->DB->insert_id;
		elseif (strpos(strtoupper($q), 'UPDATE') !== false)
			$result = $this->DB->affected_rows;

		return $result;
	}
	function get($q, $t = 10)
	{
		$f = pathFile(__DIR__ . '/db_cache/' . hash('sha512', $q) . '.txt');
		if (file_exists($f) && filemtime($f) > (time() - $t))
			return json_decode(readFiles($f), true);

		$r = $this->query($q)->fetch_all(MYSQLI_ASSOC);
		writeFile($f, 'w', json_encode($r));
		return $r;
	}
	function select($q)
	{
		return $this->query($q)->fetch_all(MYSQLI_ASSOC);
	}
	function fetch($q)
	{
		return $this->query($q . " LIMIT 1")->fetch_array(MYSQLI_ASSOC);
	}
	function values($q)
	{
		return array_values($this->query($q . " LIMIT 1")->fetch_array(MYSQLI_ASSOC) ?? []);
	}
	function numRows($q)
	{
		return $this->check("SELECT count(id) FROM " . $q);
	}
	function escape($q)
	{
		return $this->DB->real_escape_string($q);
	}
	function check($q)
	{
		$data = $this->fetch($q);
		$data = is_array($data) ? end($data) : 0;
		return empty($data) ? 0 : $data;
	}
}
