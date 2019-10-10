<?php

class ProductionSettings {
    public $DB_SERVER;
    public $DB_USERNAME;
    public $DB_PASSWORD;
    public $DB_DB;

    public function __construct () {
      $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

      $this->DB_SERVER = $url["host"];
      $this->DB_USERNAME = $url["user"];
      $this->DB_PASSWORD = $url["pass"];
      $this->DB_DB = substr($url["path"], 1);
    }
}