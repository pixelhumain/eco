<?php
class IndexAction extends CAction
{
    public function run()
    {
    	//$this->getController()->layout = "//layouts/empty";
    	$this->getController()->layout = "//layouts/directory";
      	echo $this->getController()->render("co2.views.app.search",array("type"=>"classifieds"));
    	
	   	echo $this->getController()->render("index");
    }
}