<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CI - Ajax</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/custom.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font-awesome.min.css'?>">
</head>
<body>
<div class="container">
	<!-- Page Heading -->
    <div class="row panel-container">
        <div class="col-12">
            <div class="col-md-12">
                <h2>Product List</h2>
                <div><button class="btn btn-primary" data-toggle="modal" data-target="#AddProduct"><span class="fa fa-plus"></span> New Product</button></div>
            </div>
            
            <table class="table table-striped table-responsive" id="allData">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="showData">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer>
        IGabParis - 2019
</footer>

		<!-- ADD -->
            <div class="modal fade" id="AddProduct" tabindex="-1" role="dialog" aria-labelledby="MyModalAdd" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title" id="MyModalAdd">Add New Product</h5>
                  </div>
                  <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Name Product</label>
                            <input type="text" name="name_product" id="name_product" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Category Product</label>
                            <select name="cat_product" id="cat_product" class="form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price Product (USD)</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" name="quant" id="quant" class="form-control" required>
                        </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btnSave" class="btn btn-primary">Save</button>
                </form>
                  </div>
                </div>
              </div>
            </div>
            
        <!--END ADD-->

        <!-- EDIT -->
        
            <div class="modal fade" id="EditProduct" tabindex="-1" role="dialog" aria-labelledby="MyModalEdit" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title" id="MyModalEdit">Edit Product</h5>
                  </div>
                  <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Code Product</label>
                            <input type="text" name="code_edit" id="code_edit" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Name Product</label>
                            <input type="text" name="name_product_edit" id="name_product_edit" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Price Product (USD)</label>
                            <input type="number" name="price_edit" id="price_edit" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" name="quant_edit" id="quant_edit" class="form-control" required>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btnUpdate" class="btn btn-primary">Update</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            
        <!--END EDIT-->

        <!-- DELETE -->
         
            <div class="modal fade" id="DeleteProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                  </div>
                  <div class="modal-body">
                    <form>
                       <strong>You sure?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="code" id="code" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btnDelete" class="btn btn-primary">Yes</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            
        <!--END DELETE-->

        <!-- SUCCESS ALERT -->
            <div class="modal fade" id="SuccessAction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                  </div>
                  <div class="modal-body">
                       <strong>Actione Done Right</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Done!</button>
                  </div>
                </div>
              </div>
            </div>
        <!-- END SUCCESS ALERT -->

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
		showProducts();	//Call function Show data
		 
		//Function Show All data
		function showProducts(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('product/dataProduct')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].code+'</td>'+
		                        '<td>'+data[i].name_product+'</td>'+
		                        '<td>'+data[i].cat_product+'</td>'+
                                '<td>'+data[i].price+'</td>'+
                                '<td>'+data[i].quant+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="label label-info item_edit" data-code="'+data[i].code+'" data-name_product="'+data[i].name_product+'" data-price="'+data[i].price+'" data-quant="'+data[i].quant+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="label label-danger item_delete" data-code="'+data[i].code+'">Delete</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#showData').html(html);
		        }

		    });
		}

        //Save product in DB
        $('#btnSave').on('click',function(){
            var code = '<?php echo time(); ?>';
            var name_product = $('#name_product').val();
            var cat_product = $('#cat_product').val();
            var price = $('#price').val();
            var quant = $('#quant').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/saveProduct')?>",
                dataType : "JSON",
                data : {code:code , name_product:name_product, cat_product:cat_product, price:price, quant:quant},
                success: function(data){
                    $('[name="code"]').val("");
                    $('[name="name_product"]').val("");
                    $('[name="cat_product"]').val("");
                    $('[name="price"]').val("");
                    $('[name="quant"]').val("");
                    $('#AddProduct').modal('hide');
                    $('#SuccessAction').modal('show');
                    showProducts();
                }
            });
            return false;
        });

        //Get data from DB
        $('#showData').on('click','.item_edit',function(){
            var code = $(this).data('code');
            var name_product = $(this).data('name_product');
            var price = $(this).data('price');
            var quant = $(this).data('quant');
            
            $('#EditProduct').modal('show');
            $('[name="code_edit"]').val(code);
            $('[name="name_product_edit"]').val(name_product);
            $('[name="price_edit"]').val(price);
            $('[name="quant_edit"]').val(quant);
        });

        //Update in DB
         $('#btnUpdate').on('click',function(){
            var code = $('#code_edit').val();
            var price = $('#price_edit').val();
            var quant = $('#quant_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/updateProduct')?>",
                dataType : "JSON",
                data : {code:code , price:price, quant:quant},
                success: function(data){
                    $('[name="code_edit"]').val("");
                    $('[name="name_product_edit"]').val("");
                    $('[name="price_edit"]').val("");
                    $('[name="quant_edit"]').val("");
                    $('#EditProduct').modal('hide');
                    $('#SuccessAction').modal('show');
                    showProducts();
                }
            });
            return false;
        });

        //Get Product to delete
        $('#showData').on('click','.item_delete',function(){
            var code = $(this).data('code');
            
            $('#DeleteProduct').modal('show');
            $('[name="code"]').val(code);
        });

        //Delete product in DB
         $('#btnDelete').on('click',function(){
            var code = $('#code').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/deleteProduct')?>",
                dataType : "JSON",
                data : {code:code},
                success: function(data){
                    $('[name="code"]').val("");
                    $('#DeleteProduct').modal('hide');
                    $('#SuccessAction').modal('show');
                    showProducts();
                }
            });
            return false;
        });

	});

</script>
</body>
</html>