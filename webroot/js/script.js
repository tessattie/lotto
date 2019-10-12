$( document ).ready(function() {

    $('#file').change(function(){
		$(this).parent().parent().find('label.label-file').html($(this).val());
	})

	$('#categoryIdName').change(function(){
		var category = $(this).val();
		$.ajax({
	       url : '/customers/getProducts',
	       type : 'POST',
	       data : {category_id : category},
	       dataType : 'json',
	       success : function(data, statut){
	       	// $('#productIdName').attr('disabled', false);
	       	$('#productIdName > option').each(function(){
	       		if($(this).val() != ""){
	       			$(this).remove();
	       		}
	       	})
	       	console.log(data)
	       	for(var i=0;i<Object.keys(data).length;i++){
	       		// console.log(data[i])
	       		// if(data[i].status == 1){
	       			$('#productIdName').append($('<option>', {value: data[i].id,text: data[i].name+" - "+data[i].pack+" / "+ data[i].size+" "+data[i].size_type+" - "+data[i].onhand+" Units" }));	
	       		// }
	       	}

	       },

	       error : function(resultat, statut, erreur){
	       	$('.displayNone').slideUp();
	       },	

	       complete : function(resultat, statut){

	       }
	    });
	})

	$(".customerOrdersId").change(function(){
		var customer = $(this).val();

		$.ajax({
	       url : '/refunds/getOrders',
	       type : 'POST',
	       data : {customer_id : customer},
	       dataType : 'json',
	       success : function(data, statut){
	       	// $('#productIdName').attr('disabled', false);
	       	$('.ordernumbers > option').each(function(){
	       		if($(this).val() != ""){
	       			$(this).remove();
	       		}
	       	})
	       	console.log(data)
	       	for(var i=0;i<Object.keys(data).length;i++){
	       		// console.log(data[i])
	       		// if(data[i].status == 1){
	       			$('.ordernumbers').append($('<option>', {value: data[i].id,text: "#"+data[i].order_number}));	
	       		// }
	       	}

	       },

	       error : function(resultat, statut, erreur){
	       	
	       },	

	       complete : function(resultat, statut){

	       }
	    });
	})

	$("#transferTo").change(function(){
		$(this).submit();
	})

	$(".changeQuantityValue").change(function(){
		var quantity = parseFloat($(this).val());
		var price = parseFloat($(this).parent().parent().parent().find(".realprice").text().replace(" USD", ''));
		var total = price*quantity;
		var real_total = parseFloat($('#amount').val());
		real_total = real_total + total;
		$('#amount').val(real_total);
	})

	$(".checkall").change(function(){
		if($(this).is(":checked")){
			$(this).parent().parent().parent().parent().find(".checkingall").each(function(){
				$(this).attr("checked", true);
			})
		}else{
			$(this).parent().parent().parent().parent().find(".checkingall").each(function(){
				$(this).attr("checked", false);
			})
		}
	})

	$('.product_id').change(function(){
		var product = $(this);
		$.ajax({
	       url : '/products/getProduct',
	       type : 'POST',
	       data : {product : product.val()},
	       dataType : 'json',
	       success : function(data, statut){
	       	console.log(data);
		       	$('.displayNone').slideDown();
		       	$('.vendor_id').find('option').each(function(){
		       		if($(this).val() != ""){
		       			$(this).remove();
		       		}
		       	})
	         	for(var i=0;i<Object.keys(data.vendors_products).length;i++){
	         		console.log(data.vendors_products[i]);
	         		$('.vendor_id').append($('<option>', {value: data.vendors_products[i].vendor.id,
																									text: data.vendors_products[i].vendor.name
																									}));

	         	}
	         	$('.door_price').val(data.door_cost);
	         	$('.vendor_id').val(data.vendor_id);
	       },

	       error : function(resultat, statut, erreur){
	       	$('.displayNone').slideUp();
	       },	

	       complete : function(resultat, statut){

	       }
	    });
	})

	$(".parentCat").click(function(){
		var display = false;
		var elements = $(this).attr('id'); 
		$("." + elements).each(function(){
			$(this).toggleClass('hidden showing');
			// $(this).find('a').toggleClass();
		}).find('button.btn').click(function(e) {
		  return false;
		});

		// if(display == true){
		// 	$('.nav>li').show();
		// }else{
		// 	$('.nav>li.').hide();
		// }
	})


	$(".resetImage").click(function(e){
		e.preventDefault();
		alert("clicked");
	})

	$('.price').change(function(){
		var margin = 0;
		var door_cost= parseFloat($(this).parent().parent().prev().find('.door-cost').val()); 
		var door_cost2 = parseFloat($(this).parent().parent().next().find('.door-cost').val()); 
		var price = parseFloat($(this).val());
		if(door_cost == 'NaN'){
			door_cost = 0;
		}
		if(door_cost2 == 'NaN'){
			door_cost2 = 0;
		}
		if(price == 'NaN'){
			price = 0;
		}
		if(price != 0){
			margin = (price - door_cost)/price;
			margin2 = (price - door_cost2)/price;
		}
		$(this).parent().parent().next().find('.margin').val(margin*100);
		$(this).parent().parent().next().next().find('.margin').val(margin2*100);
	})

	// $('.p_type').change(function(){
	// 	if($(this).val() == 1){
	// 		$(this).parent().parent().next().find('#code').attr('disabled', true);
	// 	}else{
	// 		$(this).parent().parent().next().find('#code').attr('disabled', false);
	// 	}
	// })

	$(".parent").click(function(){
		$("."+$(this).attr('id')).toggleClass('hidden');
	})

	$('.category_id').change(function(){
		var category = $(this);
		$.ajax({
	       url : '/products/getSubCategories',
	       type : 'POST',
	       data : {category : $(this).val()},
	       dataType : 'json',
	       success : function(data, statut){
	       	category.parent().next().find('.subcategory_id > option').each(function(){
	       		if($(this).val() != ""){
	       			$(this).remove();
	       		}
	       	})
	       	category.parent().parent().next().find('.subcategory_id > option').each(function(){
	       		if($(this).val() != ""){
	       			$(this).remove();
	       		}
	       	})
	       	category.parent().next().find('.subcategory_id').attr('readonly', false);
	       	category.parent().parent().next().find('.subcategory_id').attr('readonly', false);
	       		for(var i = 0;i<Object.keys(data).length;i++){
	       			category.parent().next().find('.subcategory_id').append($('<option>', {value: data[i].id,
																									text: data[i].name
																									}));
	       			category.parent().parent().next().find('.subcategory_id').append($('<option>', {value: data[i].id,
																									text: data[i].name
																									}));
	       		}
	         	  
	       },

	       error : function(resultat, statut, erreur){
	       	console.log(erreur);
	       },	

	       complete : function(resultat, statut){

	       }
	    });
	})

	$('.door-cost').change(function(){
		var margin = 0;
		var price2= parseFloat($(this).parent().parent().next().find('.price').val()); 
		var price= parseFloat($(this).parent().parent().prev().find('.price').val()); 
		var door_cost = parseFloat($(this).val());
		if(door_cost == 'NaN'){
			door_cost = 0;
		}
		if(price == 'NaN'){
			price = 0;
		}
		if(price != 0){
			margin = (price - door_cost)/price;
		}
		if(price2 == 'NaN'){
			price = 0;
		}
		if(price2 != 0){
			margin2 = (price2 - door_cost)/price2;
		}
		$(this).parent().parent().next().next().find('.margin').val(margin2*100);
		$(this).parent().parent().next().find('.margin').val(margin*100);
	})

	$('#featured_image').change(function(){
		$(this).parent().parent().find('label.label-file').html($(this).val());
	})

    $('.inputFile').change(function(){
    	var tmppath = URL.createObjectURL(event.target.files[0]);
		$(this).parent().find(".thumbnailImg").attr('src',tmppath);
    });

    $('.detailButton').click(function(){
    	if($(this).next().css('display') == 'none'){
    		$(this).next().show();
    	}else{
    		$(this).next().hide();
    	}
    	
    })

    $('.qtyBack').change(function(){
    	var refund = parseFloat($(this).parent().parent().find('td.priceBack').text())*parseFloat($(this).val());
    	if($(this).parent().parent().parent().parent().parent().find('div input#refund').val() == ''){
    		$(this).parent().parent().parent().parent().parent().find('div input#refund').val(refund);
    	}else{
    		$(this).parent().parent().parent().parent().parent().find('div input#refund').val(refund + parseFloat($(this).parent().parent().parent().parent().parent().find('div input#refund').val()));
    	}
    })

    $('.inputFiles').change(function(){
    	var tmppath = URL.createObjectURL(event.target.files[0]);
		$("#uploadedFile").append("<span>"+tmppath+"</span>");
    });

    $('.customer_id').change(function(){
    	if($(this).val() == 22){
    		$(this).parent().parent().parent().parent().find('.guest_checkout').slideDown();
    		$(this).parent().parent().parent().parent().find('.payment_type').find('option[value="2"]').attr('disabled', true);
    		$(this).parent().parent().parent().parent().find('.payment_type').find('option[value="1"]').attr('selected', true);
    		$(this).parent().parent().parent().parent().find('.payment_type').val('1');
    	}else{
    		$(this).parent().parent().parent().parent().find('.guest_checkout').slideUp();
    		$(this).parent().parent().parent().parent().find('.guest_checkout').find('input').each(function(){
    			$(this).val('');
    		})
    		$(this).parent().parent().parent().parent().find('.payment_type').find('option[value="2"]').attr('disabled', false);
    	}
    })

    $('.payment_type').change(function(){
    	if($(this).val() == 2){
    		$(this).parent().parent().parent().parent().find('.duedatefield').slideDown();
    	}else{
    		$(this).parent().parent().parent().parent().find('.duedatefield').slideUp();
    	}
    })

    $('#filtersForm').change(function(){
    		$(this).submit();
    })


    $('#myTab a').click(function(e) {
	  e.preventDefault();
	  $(this).tab('show');
	  $('.nav-link').each(function(){
			$(this).removeClass('active');
		})
		$(this).addClass("active");
	});
// store the currently selected tab in the hash value
	$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
	  var id = $(e.target).attr("href").substr(1);
	  window.location.hash = id;
	});

	// on load of the page: switch to the currently selected tab
	var hash = window.location.hash;
	if(!hash){
		hash = "#profile";
	}

	// $('.addProduct').click(function(){
	// 	var quantity = $(this).parent().find('input').val(); 
	// 	var discount = $('.discountTD').text().replace(" %", "");
	// 	var prd_name = $(this).parent().parent().find('.name > span').text(); 
	// 	var shipping = $('.shippingTD').text().replace(" USD", "");
	// 	var taxe = $('.taxeTD').text().replace(" USD", "");
	// 	var price = $(this).parent().parent().find('.realprice').text().replace(' USD', "").replace(",","."); 
	// 	// alert(price);
	// 	var total = parseFloat(price)*parseFloat(quantity);
	// 	// alert(total);
	// 	newTotal = total - total*(parseFloat(discount)/100);
	// 	var totalbox = parseFloat($('.totalBox').text()) + newTotal;
	// 	var inventory = $(this).parent().parent().find('.inventory').text();
	// 	totalbox = totalbox + parseFloat(taxe) + parseFloat(shipping);
	// 	var order_id = $('#order_identification').text();
	// 	var customer_id = $('#cust_identification').text();
	// 	var product_id = $(this).parent().parent().attr('id');
	// 	if(inventory == 0){
	// 		alert('This product is out of stock.');
	// 	}else{
	// 		if(quantity < 1){
	// 			alert('You must choose a quantity');
	// 		}else{
	// 			if(parseFloat(quantity) > parseFloat(inventory)){
	// 				alert("There is not enough stock for this quantity")
	// 			}else{
	// 				if($('#'+prd_name.split(" ").join("")+"11").html() == undefined){
	// 					if(parseFloat($('.lowCreditValue').text().replace(',','')) < totalbox){
	// 						$('.lowCredit').hide();
	// 					}else{
	// 						$('.lowCredit').show();
	// 					}
	// 					$.ajax({
	// 				       url : '/clientOrders/orders/addProduct',
	// 				       type : 'POST',
	// 				       data : {product : product_id, customer : customer_id, order : order_id, qty : quantity, order_total : totalbox},
	// 				       dataType : 'html',
	// 				       success : function(code_html, statut){
	// 				         	console.log(code_html);  
	// 				       },

	// 				       error : function(resultat, statut, erreur){
	// 				       	console.log(erreur);
	// 				       },	

	// 				       complete : function(resultat, statut){

	// 				       }

	// 				    });
	// 					$('#ficheTable').append("<tr id='"+prd_name.split(" ").join("")+"11'><td>"+prd_name+"</td><td class='text-center'>"+price+"</td><td class='text-center lastQty'>"+quantity+"</td><td class='text-center lastTotal'>"+total.toFixed(2)+" USD</td></tr>");
	// 					$('.totalBox').text(totalbox.toFixed(2)+' USD');
	// 				}else{
	// 					// alert('already there');
	// 					if(parseFloat($('.lowCreditValue').text().replace(',','')) < total){
	// 						$('.lowCredit').slideDown();
	// 					}else{
	// 						$('.lowCredit').slideUp();
	// 					}
	// 					var lastQty = $('#'+prd_name.split(" ").join("")+"11").find('.lastQty').text();
	// 					// alert(lastQty); alert(quantity);
	// 					if(quantity != lastQty){
	// 						$.ajax({
	// 					       url : '/clientOrders/orders/addProduct',
	// 					       type : 'POST',
	// 					       data : {product : product_id, customer : customer_id, order : order_id, qty : quantity, order_total : totalbox},
	// 					       dataType : 'html',
	// 					       success : function(code_html, statut){
	// 					         	console.log(code_html);  
	// 					       },

	// 					       error : function(resultat, statut, erreur){
	// 					       	console.log(erreur);
	// 					       },	

	// 					       complete : function(resultat, statut){

	// 					       }

	// 					    });
	// 						var toremove = $('#'+prd_name.split(" ").join("")+"11").find('.lastTotal').text().replace(' USD', '');
	// 						// alert(toremove);
	// 						totalbox = totalbox - parseFloat(toremove);
	// 						// alert(totalbox);
	// 						$('#'+prd_name.split(" ").join("")+"11").remove();
	// 						$('#ficheTable').append("<tr id='"+prd_name.split(" ").join("")+"11'><td>"+prd_name+"</td><td class='text-center'>"+price+" USD</td><td class='text-center lastQty'>"+quantity+"</td><td class='text-center lastTotal'>"+total.toFixed(2)+" USD</td></tr>");
	// 						$('.totalBox').text(totalbox.toFixed(2)+' USD');
	// 						// alert($('.lowCreditValue').text());
	// 						if(parseFloat($('.lowCreditValue').text().replace(',','')) < total){
	// 							$('.lowCredit').slideDown();
	// 						}else{
	// 							$('.lowCredit').slideUp();
	// 						}
	// 					}else{
	// 						alert("Product and quantity already added");
	// 					}
						
	// 				}
					
	// 			}
	// 		}
	// 	}
	// })
	
	$('#myTab a[href="' + hash + '"]').tab('show');
	$('#myTab a[href="' + hash + '"]').addClass('active');
	$('#myTab a[href="' + hash + '"]').parent().removeClass('active');

	$('#productsTable').DataTable();

	$('#customersTable').DataTable();

	$('.datatable').DataTable({
		'order' : [], 
	});

	$('#customersProductsTable').DataTable();

	$('#usersTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 5}
		  ]});

	$('#usersTable2').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]
	});

	$('#prdTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 11}
		  ]});


	$('#refundsTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 4}
		  ]});

	$('#prdTable3').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 10}
		  ]});

	$('#prdTable2').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]
	});

	$('#creditSumTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]
	});

	$('#catsTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 3}
		  ]});
	$('#catsTable2').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
	});

	$('#brdTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 2}
    ]});

$('#brdTable22').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 5}
    ]});

    $('#brdTable2').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]
	});

	$('#brdTable34').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]
	});

    $('#creditSumamryTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 6}
    ]});

    $('#paymentsTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]
	});

    $('#storagesTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 1}
    ]});

    $('#storagesTable2').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]});

    $('#industryTable').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]], 
		"columnDefs": [
		    { "orderable": false, "targets": 2}
    ]});

    $('#industryTable2').DataTable({
		'order' : [], 
		"lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]});

	$('#vendorsTable').DataTable({
		"columnDefs": [
		    { "orderable": false, "targets": 5}
    ]});

    $('#vendorsTable2').DataTable({
		"columnDefs": [
		    { "orderable": false, "targets": 4}
    ]});

	$('#cartTable').DataTable();

	$('#ordersTable').DataTable({
		'order' : [], 
		"columnDefs": [
		    { "orderable": false, "targets": 10}
    ]});

	$('#cpTable').DataTable({
		"columnDefs": [
		    { "orderable": false, "targets": 4}
    ]});

	$('#contactsTable').DataTable({
		"columnDefs": [
		    { "orderable": false, "targets": 7}
    ]});

	$('#custCont').DataTable({
		"columnDefs": [
		    { "orderable": false, "targets": 6}
    ]});

	$('#inventoryTable').DataTable();

	$('#vendorsProducts').DataTable({
		"columnDefs": [
		    { "orderable": false, "targets": 3}
    ]});

	// $('.selectpicker').selectpicker();


});