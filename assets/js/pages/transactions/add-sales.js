var id = 2;
var baseURL = window.location.origin;
var filePath = "/helper/routing.php";

function deleteProduct(delete_id) {
  var elements = document.getElementsByClassName("product_row");
  if (elements.length != 1) {
    $("#element_" + delete_id).remove();
    updateFinalTotal();
  }
}
function addProduct() {
  $("#products_container").append(
    `<!-- PRODUCT CUSTOM CONTROL -->
        <div class="row product_row" id="element_${id}">
            <!-- CATEGORY SELECT -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Category</label>
                    <select id="category_${id}" class="form-control category_select">
                        <option disabled selected>Select Category</option>
                    </select>
                </div>
            </div>
            <!-- /CATEGORY SELECT -->
            <!-- PRODUCTS SELECT -->
            <div class="col-md-3">
                <div class="form-group">
                        <label for="">Products</label>
                        <select name="product_id[]" id="product_${id}" class="form-control product_select">
                            <option disabled selected>Select Product</option>
                        </select>
                </div>
            </div>
            <!-- /PRODUCTS SELECT -->
            <!-- SELLING PRICE -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Selling Price</label>
                    <input type="number" value="0" id="selling_price_${id}" class="form-control" readonly>
                </div>
            </div>
            <!-- /SELLING PRICE -->
            <!-- QUANTITY -->
            <div class="col-md-1">
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity[]" id="quantity_${id}" value="0" class="form-control quantity_select">
                </div>
            </div>
            <!-- /QUANTITY -->
            <!-- DISCOUNT -->
            <div class="col-md-1">
                <div class="form-group">
                    <label for="">Discount</label>
                    <input type="number" name="discount[]" id="discount_${id}" class="form-control discount_select" value="0">
                </div>
            </div>
            <!-- /DISCOUNT -->
            <!-- FINAL RATE -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Final Rate</label>
                    <input type="number" name="final_rate[]" id="final_rate_${id}" class="form-control" value=0 readonly>
                </div>
            </div>
            <!-- /FINAL RATE -->
            <!-- DELETE BUTTON -->
            <div class="col-md-1">
                <button onclick="deleteProduct(${id})" type="button" class="btn btn-danger" style="margin-top: 43%;"> 
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
            <!-- /DELETE BUTTON -->
        </div>
        <!-- /PRODUCT CUSTOM CONTROL -->`
  );
  $.ajax({
    url: baseURL + filePath,
    method: "POST",
    data: {
      getCategories: true,
    },
    dataType: "json",
    success: function (categories) {
      categories.forEach(function (category) {
        $("#category_" + id).append(
          `<option value='${category.id}'>${category.name}</option>`
        );
      });
      id++;
    },
  });
}

$("#products_container").on("change", ".category_select", function () {
  var element_id = $(this).attr("id").split("_")[1];
  var category_id = this.value;
  $.ajax({
    url: baseURL + filePath,
    method: "POST",
    data: {
      getProductsByCategoryID: true,
      categoryID: category_id,
    },
    dataType: "json",
    success: function (products) {
      $("#product_" + element_id).empty();
      $("#product_" + element_id).append(
        "<option disabled selected>Select Product</option>"
      );
      products.forEach(function (product) {
        $("#product_" + element_id).append(
          `<option value='${product.id}'>${product.name}</option>`
        );
      });
    },
  });
});

$('#products_container').on('change', '.product_select', function() {
    var element_id = $(this).attr("id").split("_")[1];
    var product_id = this.value;
    $.ajax({
        url: baseURL + filePath,
        method: "POST",
        data: {
            getSellingPriceFromProductID: true,
            productID: product_id
        },
        dataType: "json",
        success: function (sellingPrice) {
            // console.log(sellingPrice[0].selling_rate);
            // console.log(element_id);
            $("#selling_price_" + element_id).val(sellingPrice[0].selling_rate);
            updateFinalRate(element_id);
        }
    });
});

$('#products_container').on('keyup click', ".quantity_select", function(){
    var element_id = $(this).attr("id").split("_")[1];
    updateFinalRate(element_id);
});

$('#products_container').on('keyup click', ".discount_select", function(){
    var element_id = $(this).attr("id").split("_")[1];
    updateFinalRate(element_id);
});

const updateFinalRate = function(element_id){
    var selling_rate = parseInt($('#selling_price_' + element_id).val());
    var quantity = parseInt($('#quantity_' + element_id).val());
    var discount = parseInt($('#discount_' + element_id).val());
    var final_rate = (selling_rate * quantity) * ((100-discount)/100);
    // console.log(selling_rate + " " + quantity + " " + discount + " " + final_rate);
    $('#final_rate_' + element_id).val(final_rate);
    updateFinalTotal();
}

const updateFinalTotal = function(){
    var product_rows = $('.product_row');
    var sum = 0;
    length = product_rows.length;
    for (let i = 0; i < product_rows.length; i++) {
        var id = product_rows[i].id.split("_")[1];
        sum = sum + parseInt($('#final_rate_' + id).val());
    }
    $('#finalTotal').val(sum);
}
