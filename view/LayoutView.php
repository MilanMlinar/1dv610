<?php

namespace view;

class LayoutView {
  private $link = '';
  
  public function render($isLoggedIn, View $v, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderRegistrationLink($isLoggedIn) . '
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $v->response($isLoggedIn) . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) 
    {
      return '<h2>Logged in</h2>';
    }
    else 
    {
      return '<h2>Not logged in</h2>';
    }
  }

  private function renderRegistrationLink ($isLoggedIn) {

    if (!$isLoggedIn && !$this->clickedRegistrationLink()) 
    {
      $this->link = '<a href="?register">Register a new user</a>';
    }
    else if (!$isLoggedIn && $this->clickedRegistrationLink())
    {
      $this->link = '<a href="?">Back to login</a>';
    }

    return $this->link;
  }

  public function clickedRegistrationLink() : bool
	{
		return (isset($_GET['register']));
	}
}
