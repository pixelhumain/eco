<?php

class Classified {
	const COLLECTION = "classifieds";
	const TYPE_RESSOURCES = "ressources";
	const TYPE_JOBS = "jobs";
	const CONTROLLER = "classified";
	const TYPE_RESSOURCES_CONTROLLER= "ressource";
	const TYPE_JOBS_CONTROLLER= "job";
	const MODULE = "eco";
	const ICON = "fa-bullhorn";
	const ICON_RESSOURCES = "fa-cubes";
	const ICON_JOBS = "fa-briefcase";
	
	//TODO Translate
	public static $classifiedTypes = array(
	    "health" => "Santé",
	    "work" => "Travail",
	    "retail" => "Immobilier"
    );
	public static $classifiedSubTypes = array(
	    "health" => array(
	        "subType" => array("remplacement", "emploi", "cession", "stagiaire", "assistanat", "collaborateur", "mission humanitaire")
	        ),
	    "work" => array(
	        "subType" => array("cherche travail", "proposition de travail", "bénévolat", "stagiaire")
	        ),
	    "retail" => array(
	        "subType" => array("cherche collocation", "cherche location", "offre de vends", "cherche achat", "offre de location")
	        ),
    );

	//From Post/Form name to database field name
	public static $dataBinding = array (
	    "section" => array("name" => "section"),
	    "type" => array("name" => "type"),
	    "subtype" => array("name" => "subtype"),
	    "category" => array("name" => "category"),
	    "name" => array("name" => "name", "rules" => array("required")),
	    "address" => array("name" => "address", "rules" => array("addressValid")),
	    "addresses" => array("name" => "addresses"),
	    "streetAddress" => array("name" => "address.streetAddress"),
	    "postalCode" => array("name" => "address.postalCode"),
	    "city" => array("name" => "address.codeInsee"),
	    "addressLocality" => array("name" => "address.addressLocality"),
	    "addressCountry" => array("name" => "address.addressCountry"),
	    "geo" => array("name" => "geo"),
	    "geoPosition" => array("name" => "geoPosition"),
	    "description" => array("name" => "description"),
	    "addresses" => array("name" => "addresses"),
	    "parentId" => array("name" => "parentId"),
	    "parentType" => array("name" => "parentType"),
	    "media" => array("name" => "media"),
	    "urls" => array("name" => "urls"),
	    "medias" => array("name" => "medias"),
	    "tags" => array("name" => "tags"),
	    "price" => array("name" => "price"),
	    "devise" => array("name" => "devise"),
	    "public"  => array("name" => "public"),
	    "preferences"  => array("name" => "preferences"),
	    "contactInfo" => array("name" => "contactInfo", "rules" => array("required")),
	    "source" => array("name" => "source", "rules" => array("source")),
	    "modified" => array("name" => "modified"),
	    "updated" => array("name" => "updated"),
	    "creator" => array("name" => "creator"),
	    "created" => array("name" => "created"),
	    );

	//used in initJs.php for the modules definition
	public static function getConfig($context=null){
		return array(
			"collection"    => self::COLLECTION,
            "controller"   => self::CONTROLLER,
            "module"   => self::MODULE,
			"init"   => Yii::app()->getModule( self::MODULE )->assetsUrl."/js/init.js" ,
			"form"   => Yii::app()->getModule( self::MODULE )->assetsUrl."/js/".$context."/dynForm.js" ,
            "categories" => CO2::getModuleContextList(self::MODULE, "categories", $context),
            "deviseTheme" 	=> array(
            	"all" => "All",
				"€" => "€",
				"Ğ1" => "Ğ1",
				"£" => "£",
				"$" => "$",
	            "CFP" => "CFP"
	        ),
	        "eco" => "€dzfzfezfezfz",
    		"deviseDefault" => "All",
    		"lbhp" => true
		);
	}

	/**
	 * get a Poi By Id
	 * @param String $id : is the mongoId of the poi
	 * @return poi
	 */
	public static function getById($id) { 
	  	$classified = PHDB::findOneById( self::COLLECTION ,$id );
	  	//$classified["parent"] = Element::getElementByTypeAndId()
	  	$classified["typeClassified"]=@$classified["type"];
	  	$classified["type"]=self::COLLECTION;
	  	$where=array("id"=>@$id, "type"=>self::COLLECTION, "doctype"=>"image");
	  	$classified["images"] = Document::getListDocumentsWhere($where, "image");//(@$id, self::COLLECTION);
	  	return $classified;
	}


	public static function getClassifiedByCreator($id){
		$allClassified = PHDB::findAndSort( self::COLLECTION , array("creator"=> $id), array("updated"=>-1));
		foreach ($allClassified as $key => $value) {
			if(@$value["creator"]){// && @$value["parentType"])
				$parent = Element::getElementById(@$value["creator"], "citoyens");//@$value["parentType"]);
				$aParent = array("name"=>@$parent["name"],
								 "profilThumbImageUrl"=>@$parent["profilThumbImageUrl"],
								);
			}else{
				$aParent=array();
			}

			$allClassified[$key]["parent"] = $aParent;
			$allClassified[$key]["category"] = @$allClassified[$key]["type"];
			$allClassified[$key]["type"] = "classified";
			//if(@$value["type"])
			//	$allClassified[$key]["typeSig"] = Classified::COLLECTION.".".$value["type"];
			//else
			$allClassified[$key]["typeSig"] = Classified::COLLECTION;
		}
	  	return $allClassified;
	}
}
?>