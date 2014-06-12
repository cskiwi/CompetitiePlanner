<?php

class HomeController extends BaseController {
  public function Index() {
    return View::make( 'hello' );
  }

}
