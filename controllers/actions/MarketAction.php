<?php
class MarketAction extends CAction
{
    public function run()
    {
      	CO2Stat::incNbLoad("co2-annonces");
    	echo $this->getController()->renderPartial("co2.views.app.search",array("type"=>"classified"));
    }
}

