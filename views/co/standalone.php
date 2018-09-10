
<style type="text/css">
	.headerTitleStanalone{
		left:-25px;
		right:-25px;
	}
	.contentOnePage{
		border: 1px solid lightgray;
		margin-top: 25px;
	}
	.ressourceStandalone h2,
	.ressourceStandalone h4,
	.ressourceStandalone h5,
	.ressourceStandalone h6{
	    text-transform: none;
	}
	.carousel-media > ol > li.active{
	   margin:1px;
	   border-top: 5px solid #EF5B34 !important;
	}
	.carousel-media > ol > li{
		width: 60px !important;
	    background-color: inherit;
	    border: inherit !important;
	    height: 65px !important;
	    border-radius: inherit;
	    border-top: 5px solid lightgray !important;
	}
	
	.carousel-media > ol > li > img{
	   float:left;
	   width:60px;
	   height:60px;
	}
	.carousel-media > ol{
		bottom: -85px
	}
	.carousel-media{
		margin-bottom: 100px;
	}
	.informations .btn-social{
		padding: 0px;
	    height: inherit;
	    width: 50px;
	}
	.informations .btn-social > span{
		position: absolute;
    	font-size: 20px;
	}
	.container-txtarea{
		padding-left:5px!important;
	}
	.ctnr-txtarea {
	    left: 45px !important;
	}
	.carousel-indicators{
		bottom: -85px;
		position: absolute;
		left: 0%;
		width: 100%;
		margin-left: 0px;
	}
	hr.hr10{
		margin-bottom: 10px;
		margin-top: 10px;
	}

	.portfolio-modal .modal-content{
		text-align: left;
	}
</style>

<?php 	/*$layoutPath = 'webroot.themes.'.Yii::app()->theme->name.'.views.layouts.';
		$this->renderPartial($layoutPath.'header', 
		        array(  "layoutPath"=>$layoutPath , 
		                "page" => "page") ); */

		//echo $element["_id"]. $type;
		// $cssAnsScriptFilesModule = array('/css/ressource.css');
		// HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesModule, $this->module->getAssetsUrl());
		// echo $this->module->assetsUrl;
?>

<div class="ressourceStandalone">
	<div class="headerTitleStanalone col-xs-12 hidden"></div>

	<div class="col-xs-12 col-lg-11 col-lg-offset-1">
		<div class="col-xs-12 margin-top-50">
			<?php if(@$element["parent"]["name"]){ ?>
				<span class="letter-<?php echo Element::getColorIcon(@$element["typeClassified"]) ?> font-montserrat">
					<i class="fa fa-angle-down"></i> <i class="fa fa-<?php echo Element::getFaIcon(@$element["typeClassified"]) ?>"></i> 
					<?php echo Yii::t("classified", "{what} published by {who}", 
						array("{what}"=>Yii::t("common",Element::getControlerByCollection(@$element["typeClassified"])),
							"{who}"=>"<a href='#page.type.".@$element["parentType"].".id.".@$element["parentId"]."' class='lbh'>".
										@$element["parent"]["name"].
									"</a>")
						);
					 ?> 
				</span>
			<?php } ?>
			<?php if( $element["creator"] == Yii::app()->session["userId"] || Authorisation::canEditItem( Yii::app()->session["userId"], Classified::COLLECTION, (string)$element["_id"], @$element["parentType"], @$element["parentId"] ) ){?>
			<button class="btn btn-default pull-right text-red deleteThisBtn" data-type="<?php echo Classified::COLLECTION ?>" data-id="<?php echo (string)$element["_id"] ?>" style="margin-top:-15px;">
				<i class=" fa fa-trash"></i> <?php echo Yii::t("common","Delete") ?>
			</button>
			<button class="btn btn-default pull-right btn-edit-preview" style="margin-top:-15px;margin-right: 5px;">
				<i class="fa fa-pencil"></i> <?php echo Yii::t("common","Edit") ?>
			</button>
			<?php } ?>
			<br>
			<?php if(@$element["section"]){ ?>
				<hr class="hr10">
					<span class="sectionClassified"><?php echo Yii::t("category", @$element["section"]); ?></span> >
				<small> 
					<span class="categoryClassified"><?php echo Yii::t("category", @$element["category"]); ?></span> >
					<span class="subtypeClassified"><?php echo Yii::t("category", @$element["subtype"]); ?></span>
				</small>
			<?php } ?>
		</div>
		<div class="col-md-6 col-sm-7 col-xs-12 contentOnePage">
			<div class="col-md-12 no-padding title text-left margin-top-15">
				<h4 class="pull-left"><?php echo ucfirst(@$element["name"]) ?></h4>
				<?php if(@$element["price"] && @$element["devise"]){ ?>
					<h4 class="pull-right letter-green">
						<?php echo @$element["price"]." ".@$element["devise"]; ?>
					</h4>
				<?php } ?>
			</div>

			<?php $this->renderPartial('../pod/sliderMedia', 
				array(
					  "medias"=>@$element["medias"],
					  "images" => @$element["images"],
					  ) ); 
			?>



			<div class="col-md-12 margin-bottom-20 no-padding">
				<?php echo @$element["description"]; ?>
				<hr>
				<?php if(@$element["tags"]){
				 	foreach(@$element["tags"] as $tag){ ?>
					<label class="label bg-red">#<?php echo Yii::t("category", @$tag); ?></label>
				<?php }
				} ?>
			</div>
		</div>

		<div class="col-md-5 col-sm-5 col-xs-12 padding-25 margin-top-15">
			<!-- <hr class="col-xs-12 no-padding"> -->
			<!-- TODO TIB : open rocket-chat with user @$element["parent"] 
				 in => $("#btn-private-contact").click(function(){
			-->
			<?php if(@Yii::app()->session["userId"] && Yii::app()->params['rocketchatEnabled'] )
	  			{
	  				$creator = Person::getById($element["creator"]);
		  		
	  	  ?>
			<button class="btn btn-link bg-azure margin-bottom-15" id="btn-private-contact" 
					data-name-el="<?php echo @$creator['name']; ?>" data-username="<?php echo @$creator['username']; ?>" 
					sdata-id="<?php echo $element['creator']; ?>" >
				<i class="fa fa-comments"></i> <?php echo Yii::t("ressources", "Send a private message to the author");  ?>
			</button>
		<?php } ?>

				<?php if(@$element["parent"]["preferences"]["publicFields"]["email"]==true &&
						 @$element["parent"]["email"]!=""){ ?>
					<br>
					<b><i class="fa fa-envelope"></i> Contacter par e-mail : </b><?php echo @$element["parent"]["email"]; ?>
				<?php } ?>

				<?php if(@$element["parent"]["preferences"]["publicFields"]["phone"]==true){ ?><br>
					<b><i class="fa fa-phone"></i> Contacter par téléphone : </b>
					<?php if(@$element["parent"]["telephone"]["fixe"]){ ?>
						<?php echo @$element["parent"]["telephone"]["fixe"][0]; ?>
					<?php } ?>
					<?php if(@$element["parent"]["telephone"]["mobile"] && 
							@$element["parent"]["telephone"]["fixe"]){ ?>
						- 
					<?php } ?>
					<?php if(@$element["parent"]["telephone"]["mobile"]){ ?>
						<?php echo @$element["parent"]["telephone"]["mobile"][0]; ?>
					<?php } ?>
				<?php } ?>

				<?php if(@$element["contactInfo"]){ ?>
					<br><i class="fa fa-user-circle"></i> <b>Contact : </b><?php echo @$element["contactInfo"]; ?>
				<?php } ?>
			
			<hr>

			<h5>
				<i class="fa fa-angle-down"></i> <i class="fa fa-comment"></i> 
				<?php echo Yii::t("comment", "Comments");  ?>
			</h5>

			<!-- <hr style="margin-top: 15px;margin-bottom: 0px;"> -->
			<div id="commentElement" class="col-xs-12 no-padding margin-top-20"></div>
		</div>
	</div>
</div>

<script type="text/javascript">

	var element= <?php echo json_encode($element); ?>;
	var type = "<?php echo $type; ?>";
	var id=element._id.$id;
	var typeClassified = "<?php echo @$element["typeClassified"]; ?>";
	
	jQuery(document).ready(function() {	
		var nav = directory.findNextPrev("#page.type."+type+".id."+element['_id']['$id']);

	    initBtnLink();

	    getAjax("#commentElement",baseUrl+"/"+moduleId+"/comment/index/type/classifieds/id/"+element['_id']['$id'],
		function(){},"html");
	    
		$("#btn-private-contact").click(function(){

	    	var nameElo = $(this).data("name-el");
	    	var idEl = $(this).data("id");
	    	var usernameEl = $(this).data("username");
	    	//alert(nameElo  +" | "+idEl +" | "+usernameEl);
	    	var ctxData = {
	    		name 	 : nameElo,
	    		type  	 : "citoyens",
	    		username : usernameEl,
	    		id 		 : idEl
	    	};
	    	
	    	rcObj.loadChat(nameElo ,"citoyens" ,true ,true, ctxData );			
		});
		
		setTitle("", "", element.name);
		$("#modal-preview-coop .btn-close-preview, .deleteThisBtn").click(function(){
			console.log("close preview");
			$("#modal-preview-coop").hide(300);
			$("#modal-preview-coop").html("");
		});

		$(".btn-edit-preview").click(function(){
			$("#modal-preview-coop").hide(300);
			$("#modal-preview-coop").html("");
			dyFObj.editElement('classifieds', id, typeClassified );
		});
		
		element["id"] = element['_id']['$id'];

		$("#modal-preview-coop").hide(300);
		$("#modal-preview-coop").html("");
	});
</script>