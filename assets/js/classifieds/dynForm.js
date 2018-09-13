dynForm = {
    jsonSchema : {
	    title : tradDynForm.addclassified,
	    icon : "bullhorn",
	    type : "object",	    
	    onLoads : {
	    	//pour creer un subevnt depuis un event existant
	    	sub : function(){
	    		dyFInputs.setSub();
	    	},
	    	onload : function(data){
	    		$("#ajax-modal .modal-header").removeClass("bg-dark bg-purple bg-red bg-azure bg-green bg-green-poi bg-orange bg-yellow bg-blue bg-turq bg-url")
							  					  .addClass("bg-azure");
	    		
	    		if(data && data.section && data.type ){
	    			$("#ajaxFormModal #id").val(data.id);
	    			var breadCrumbTxt = "<a href='javascript:;'' class='btn btn-xs btn-danger'  onclick='dyFObj.elementObj.dynForm.jsonSchema.actions.clear()'><i class='fa fa-times'></i></a> "+tradCategory[data.section]+" > "+tradCategory[data.type];
	    			if(data.subtype ) 
	    				breadCrumbTxt = breadCrumbTxt+" > "+tradCategory[data.subtype]; 
	    			$(".breadcrumbcustom").html( "<h4>"+breadCrumbTxt+"</h4>" );
					$(".sectionBtntagList").hide();
					$(".categoryBtntagList").hide();
	    		} else
	    			$(".categoryBtntagList, .nametext, .descriptiontextarea, .pricetext, .contactInfotext, .locationlocation, .imageuploader, .formshowerscustom, .tagstags, #btn-submit-form, .deviseselect").hide();
	    	
	    		$("#devise").val(deviseDefault);

	    		contextDataId = userId;
	    		contextDataType = "citoyens";
	    		if(contextData != null && contextData.type && contextData.id )
	    		{
    				contextDataId = contextData.id;
	    			contextDataType = contextData.type;
	    		} 
	    		$('#ajaxFormModal #parentId').val(contextDataId);
	    		$("#ajaxFormModal #parentType").val( contextDataType ); 
	    	},
	    	/*,
	    	loadData : function(data){
		    	mylog.warn("--------------- loadData ---------------------",data);
		    	$('#ajaxFormModal #name').val(data.name);
		    	$('#ajaxFormModal #type').val(data.type);
		    	$('#ajaxFormModal #parentId').val(data.parentId);
	    		$("#ajaxFormModal #parentType").val( data.parentType ); 
		    },*/
	    },
	    beforeBuild : function(){
	    	dyFObj.setMongoId('classifieds',function(){
	    		uploadObj.gotoUrl = (contextData != null && contextData.type && contextData.id  ) ? "#page.type."+contextData.type+".id."+contextData.id+".view.directory.dir.classifieds" : location.hash;
	    	});
	    },
	    beforeSave : function(){
	    	var tagAndTypes = ( $("#ajaxFormModal #tags").val() != "" ) ? $("#ajaxFormModal #tags").val()+"," : "" ;

	    	if( $("#ajaxFormModal #section").val() )
	    		tagAndTypes += $("#ajaxFormModal #section").val();
	    	if( $("#ajaxFormModal #type").val() )
	    		tagAndTypes += ","+$("#ajaxFormModal #type").val();
	    	if( $("#ajaxFormModal #subtype").val() )
	    		tagAndTypes += ","+$("#ajaxFormModal #subtype").val();
	    	$("#ajaxFormModal #tags").val( tagAndTypes );
	    	
	    	if( typeof $("#ajaxFormModal #description").code === 'function' )  
	    		$("#ajaxFormModal #description").val( $("#ajaxFormModal #description").code() );
	    	if($('#ajaxFormModal #parentId').val() == "" && $('#ajaxFormModal #parentType').val() ){
		    	$('#ajaxFormModal #parentId').val(userId);
		    	$("#ajaxFormModal #parentType").val( "citoyens" ); 
		    }
		    $("#ajaxFormModal #type").val("classifieds");
	    },
	    afterSave : function(){
	    	dyFObj.commonAfterSave();
	    },
	    canSubmitIf : function () { 
	    	if( $("#ajaxFormModal #section").val() && $("#ajaxFormModal #type").val() &&  $("#ajaxFormModal #subtype").val() )
	    		return true;
	    	else 
	    		return false;
	    },
	    actions : {
	    	clear : function() {
	    		
	    		$("#ajaxFormModal #section, #ajaxFormModal #type, #ajaxFormModal #subtype").val("");

	    		$(".breadcrumbcustom").html( "");
	    		$(".sectionBtntagList").show(); 
	    		$(".categoryBtntagList").hide(); 
	    		$(".subtypeSection").html("");
	    		$(".subtypeSectioncustom").show();
	    		$(".categoryBtntagList, .nametext, .descriptiontextarea, .pricetext, .contactInfotext, .locationlocation, .imageuploader, .formshowerscustom, .tagstags, .deviseselect").hide();
	    		$("#btn-submit-form").hide(); 
	    	}, 
	    	initTypeBtn : function () { 
	    		$(".categoryBtn").off().on("click",function(){
            		$(".categoryBtn").removeClass("active btn-dark-blue text-white");
            		$( "."+$(this).data('key')+"Btn" ).toggleClass("active btn-dark-blue text-white");
            		$("#ajaxFormModal #category").val( ( $(this).hasClass('active') ) ? $(this).data('key') : "" );
            		
            		$(".breadcrumbcustom").html(
            			"<h4><a href='javascript:;'' class='btn btn-xs btn-danger'  onclick='dyFObj.elementObj.dynForm.jsonSchema.actions.clear()'><i class='fa fa-times'></i></a>  "
            				+$(".sectionBtn.active").data('tag')+" > "+
            				$(".categoryBtn.active").data('tag')+
            			"</h4>");
            		$(".categoryBtntagList").hide();

            		//$(".typeBtn:not(.active)").hide();
            		$("#ajaxFormModal #subtype").val("");
            		fieldHTML = "";
            		var filt = //(modules.classifieds.categories.currentLeftFilters != null ) 
            					//? classified[modules.classifieds.categories.currentLeftFilters] 
            					modules.classifieds.categories.filters;
            		if( Object.keys(filt[ $(this).data('key') ]["subcat"]).length >= 1 )
            		{
	            		$.each(filt[ $(this).data('key') ]["subcat"], function(k,v) { 
	            			mylog.log(">>>> click type BTn" , k ,v, v.key,tradCategory[v.key]);
	            			fieldHTML += '<div class="col-md-6 padding-5">'+
	            							'<a class="btn tagListEl subtypeBtn '+tradCategory[k]+'Btn " data-tag="'+tradCategory[k]+'"  data-key="'+k+'" href="javascript:;">'+tradCategory[k]+'</a>' +
	    									//'<a class="btn tagListEl subtypeBtn '+k+'Btn " data-tag="'+v.key+'"  data-lbl="'+tradCategory[v.key]+'" href="javascript:;">'+tradCategory[v.key]+'</a>' +
	            						"</div>";
	            		});
	            		$(".subtypeSection").html('<hr class="col-md-12 no-padding">'+
	            								  '<label class="col-md-12 text-left control-label no-padding" for="typeBtn">'+
	            								  	'<i class="fa fa-chevron-down"></i> '+tradDynForm["subcategory"]+
	            								  '</label>' + fieldHTML );

	            		$(".subtypeBtn").off().on("click",function()
		            	{
		            		$( ".subtypeBtn" ).removeClass("active");
		            		$(this).addClass("active");
		            		$("#ajaxFormModal #subtype").val( ( $(this).hasClass('active') ) ? $(this).data('key') : "" );
		            		$(".nametext, .descriptiontextarea, .pricetext, .contactInfotext, .locationlocation, .imageuploader, .formshowerscustom, .tagstags, .deviseselect").show();
		            		
		            		if($(".form-group.sectionhidden #section").val() == "donation" ||
		            		   $(".form-group.sectionhidden #section").val() == "sharing" ||
		            		   $(".form-group.sectionhidden #section").val() == "lookingfor"){
		            			$(".pricetext, .deviseselect").hide();
		            		}else{
		            			$(".pricetext, .deviseselect").show();
		            		}
		            		//$(".subtypeBtn:not(.active)").hide();

		            		$(".breadcrumbcustom").html( "<h4><a href='javascript:;'' class='btn btn-xs btn-danger'  onclick='dyFObj.elementObj.dynForm.jsonSchema.actions.clear()'><i class='fa fa-times'></i></a> "+
		            										$(".sectionBtn.active").data('tag')+" > "+$(".categoryBtn.active").data('tag')+" > "+$(".subtypeBtn.active").data('tag')+"</h4>" );
		            		$(".subtypeSectioncustom").hide();
		            		dyFObj.canSubmitIf();
						});
	            	} else 
	            		$(".nametext, .descriptiontextarea, .pricetext, .contactInfotext, .locationlocation, .imageuploader, .formshowerscustom, .tagstags, .deviseselect").show();
	            	
            	});
	    	}
	    },
	    properties : {
	    	info : {
                inputType : "custom",
                html:"",//<p><i class='fa fa-info-circle'></i> Une Annonce est un élément assez libre qui peut etre géolocalisé ou pas, qui peut etre rataché à tous les éléments.</p>",
            },
            breadcrumb : {
                inputType : "custom",
                html:"",
            },
            sectionBtn :{
                label : tradDynForm.whichkindofclassified+" ? ",
	            inputType : "tagList",
                placeholder : "Choisir un type",
                list : modules.classifieds.categories.sections,
                trad : tradCategory,
                init : function(){
                	$(".sectionBtn").off().on("click",function()
	            	{
	            		$(".categoryBtntagList").show();
	            		$(".sectionBtn").removeClass("active btn-dark-blue text-white");
	            		$( "."+$(this).data('key')+"Btn" ).toggleClass("active btn-dark-blue text-white");
	            		$("#ajaxFormModal #section").val( ( $(this).hasClass('active') ) ? $(this).data('key') : "" );
						//$(".sectionBtn:not(.active)").hide();
						var sectionKey = $(this).data('key');
						//alert(sectionKey);
						var what = { title : tradDynForm.inwhichcategoryforclassified+" ?", 
				                         icon : modules.classifieds.categories.sections[sectionKey].icon }
						
						if( jsonHelper.notNull( "modules.classifieds.categories.sections."+sectionKey+".filters" ) ){
				            //alert('build btns menu'+modules.classifieds.categories.sections[sectionKey].filters);
				            modules.classifieds.categories.currentLeftFilters = modules.classifieds.categories.sections[sectionKey].filters;
				            var filters = classified[modules.classifieds.categories.currentLeftFilters]; 
				            directory.sectionFilter( filters, ".categoryBtntagList",what,'btn');
				            dyFObj.elementObj.dynForm.jsonSchema.actions.initTypeBtn();
				        }
				        else if( modules.classifieds.categories.currentLeftFilters != null ) {
				            //alert('rebuild common list'); 
				            directory.sectionFilter( modules.classifieds.categories.filters, ".categoryBtntagList",what,'btn');
				            dyFObj.elementObj.dynForm.jsonSchema.actions.initTypeBtn()
				            modules.classifieds.categories.currentLeftFilters = null;
				        }

						$(".breadcrumbcustom").html( "<h4><a href='javascript:;'' class='btn btn-xs btn-danger'  onclick='dyFObj.elementObj.dynForm.jsonSchema.actions.clear()'><i class='fa fa-times'></i></a> "+$(this).data('tag')+"</h4>");
						$(".sectionBtntagList").hide();
	            	});
	            }
            },
            section : dyFInputs.inputHidden(),
	        categoryBtn :{
                label : tradDynForm.inwhichcategoryforclassified+" ? ",
	            inputType : "tagList",
                placeholder : "Choisir une catégorie",
                list : modules.classifieds.categories.filters,
                trad:tradCategory,
                init : function(){
                	modules.classifieds.categories.currentLeftFilters = null;
                	dyFObj.elementObj.dynForm.jsonSchema.actions.initTypeBtn();
	            }
            },
            category : dyFInputs.inputHidden(),
            subtypeSection : {
                inputType : "custom",
                html:"<div class='subtypeSection'></div>"
            },
            subtype : dyFInputs.inputHidden(),
            name : dyFInputs.name( "classified" ) ,
            description : dyFInputs.textarea(tradDynForm.description, "..."),
            price : dyFInputs.price(),
            devise : dyFInputs.inputSelect(tradDynForm.currency, tradDynForm.indicatethemoneyused, deviseTheme),
            image : dyFInputs.image(),
            contactInfo : dyFInputs.inputText(tradDynForm.contactinfo, tradDynForm.telemail+" ..."),
            location : dyFInputs.location,
            tags : dyFInputs.tags(),
            type : dyFInputs.inputHidden(),
            parentId : dyFInputs.inputHidden(),
            parentType : dyFInputs.inputHidden(),
	    }
	}
};