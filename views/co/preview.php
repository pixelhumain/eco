
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
	   border-top: 5px solid #ea4335 !important;
	}
	.carousel-media > ol > li{
		width: 60px !important;
	    background-color: inherit;
	    border: inherit !important;
	    height: 65px !important;
	    border-radius: inherit;
	    border-top: 5px solid #666F78 !important;
	}
	
	.carousel-media > ol > li > img{
	   float:left;
	   width:60px;
	   height:60px;
	}
	.carousel-media > ol{
		bottom: -85px;
		left: inherit !important;
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


	#modal-preview-coop{
		overflow: auto;
	}

</style>

<?php 	//$layoutPath = 'webroot.themes.'.Yii::app()->theme->name.'.views.layouts.';
?>

<div class="ressourceStandalone">
	<div class="headerTitleStanalone col-xs-12 hidden"></div>

	<div class="col-xs-12 col-lg-12">

		<div class="col-xs-12 margin-top-50">
			<?php if(@$element["parent"]["name"]){ ?>
				<span class="letter-azure font-montserrat">
					<i class="fa fa-angle-down"></i> <i class="fa fa-bullhorn"></i> 
					<?php echo Yii::t("ressources", @$type." published by");  ?> 
					<a href="#page.type.<?php echo @$element["parentType"]; ?>.id.<?php echo @$element["parentId"]; ?>" 
						class="lbh">
						<?php echo @$element["parent"]["name"]; ?>
					</a>
				</span>
			<?php } ?>
			<button class="btn btn-default pull-right btn-close-preview" style="margin-top:-15px;">
					<i class="fa fa-times"></i>
			</button>
			<?php if( $element["creator"] == Yii::app()->session["userId"] || Authorisation::canEditItem( Yii::app()->session["userId"], Ressource::COLLECTION, $id, @$element["parentType"], @$element["parentId"] ) ){?>
			<button class="btn btn-default pull-right text-red deleteThisBtn" data-type="ressources" data-id="<?php echo $id ?>" style="margin-top:-15px;">
				<i class=" fa fa-trash"></i>
			</button>
			<button class="btn btn-default pull-right btn-edit-preview" style="margin-top:-15px;">
				<i class="fa fa-pencil"></i>
			</button>
			<?php } ?>
			<br>
			<a href="#page.type.<?php echo @$type; ?>.id.<?php echo (string)@$element["_id"]; ?>" 
				class="letter-green lbh">
				#page.type.<?php echo @$type; ?>.id.<?php echo (string)@$element["_id"]; ?>
			</a>

			<?php if(@$element["type"]){ ?>
				<hr class="hr10">
				<small>
					<?php echo Yii::t("category", @$element["type"]); ?> > 
					<?php echo Yii::t("category", @$element["subtype"]); ?>
				</small>
			<?php } ?>

		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 contentOnePage">
			<div class="col-md-12 no-padding title text-left margin-top-15">
				<h4 class="pull-left"><?php echo ucfirst($element["name"]) ?></h4>
				<?php if(@$element["price"] && @$element["devise"]){ ?>
					<h4 class="pull-right letter-green">
						<?php echo @$element["price"]." ".@$element["devise"]; ?>
					</h4>
				<?php } ?>
			</div>
			<?php 
				$images=Document::getListDocumentsWhere(array("id"=>(string)$element["_id"],"type"=>$type,"doctype"=>Document::DOC_TYPE_IMAGE),Document::DOC_TYPE_IMAGE);
					$this->renderPartial('../pod/sliderMedia', 
								array(
									  "medias"=>@$element["medias"],
									  "images" => @$images,
									  ) ); 
									  ?>

			<?php if(@$element["gallery"]) { $i=0; ?>
				<!--<div id="myCarousel" class="col-md-12 no-padding carousel carousel-media slide" data-ride="carousel">
										  <ol class="carousel-indicators pull-left">

					    <?php foreach($element["gallery"] as $k => $img){ $i++; ?>
								<li data-target="#myCarousel" data-slide-to="<?php echo $i-1; ?>" 
									class="pull-left <?php if($i==1) echo "active"; ?>">
							    	<img src="<?php echo $img["path"]; ?>" alt="img">
							    </li>
					  	<?php } ?>

					  </ol>

					  <div class="carousel-inner">
					  <?php $i=0; foreach($element["gallery"] as $k => $img){ $i++; ?>
							    <div class="item <?php if($i==1) echo "active"; ?>">
							      <img src="<?php echo $img["path"]; ?>" alt="img">
							    </div>
					  <?php } ?>
					  </div>
				</div>-->
			<?php } ?>



			<div class="col-md-12 margin-bottom-20 no-padding">
				<?php echo @$element["description"]; ?>
				<hr>
				<?php foreach(@$element["tags"] as $tag){ ?>
					<label class="label bg-red">#<?php echo Yii::t("category", @$tag); ?></label>
				<?php } ?>
			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 padding-25 margin-top-15">
			<!-- <hr class="col-xs-12 no-padding"> -->
			<!-- TODO TIB : open rocket-chat with user @$element["parent"] 
				 in => $("#btn-private-contact").click(function(){
			-->
			<?php if(@Yii::app()->session["userId"] && Yii::app()->params['rocketchatEnabled'] )
	  			{
	  				$creator = Person::getById($element["creator"]);
		  		
	  	  ?>
			<button class="btn btn-link bg-azure margin-bottom-15" id="btn-private-contact" data-name-el="<?php echo $creator['name']; ?>" data-username="<?php echo $creator['username']; ?>" data-id="<?php echo $element['creator']; ?>" >
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
	console.log("thisressource", element);
	
	jQuery(document).ready(function() {	
		var nav = directory.findNextPrev("#page.type."+type+".id."+element['_id']['$id']);

		//if(typeof params.name != "undefined" && params.name != "")
        str =  "<div class='col-md-6 no-padding'>"+ 
			        nav.prev+
			        "<span>"+element.name+"</span>"+
			        nav.next+
			    "</div>";

	    $(".headerTitleStanalone").html(str);

	    initBtnLink();

	    getAjax("#commentElement",baseUrl+"/"+moduleId+"/comment/index/type/ressources/id/"+element['_id']['$id'],
				function(){  			
		},"html");

	    
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

		$("#modal-preview-coop .btn-close-preview, .deleteThisBtn").click(function(){
			console.log("close preview");
			$("#modal-preview-coop").hide(300);
			$("#modal-preview-coop").html("");
		});

		$(".btn-edit-preview").click(function(){
			$("#modal-preview-coop").hide(300);
			$("#modal-preview-coop").html("");
			dyFObj.editElement('ressources', '<?php echo $id ?>' );
		});
		
		element["id"] = element['_id']['$id'];
		//var html = directory.preview(ressource);
	  	//$("#ressource").html(html);
	});
</script>