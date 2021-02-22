<?php
require_once 'init.php';

/*-------------------------------------------------------- CATEGORY ------------------------------------------------- */

//ROUTING FOR ADDING A CATEGORY
if(isset($_POST['add_category']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result  = $di->get('category')->addCategory($_POST);
        switch($result)
        {
            case ADD_ERROR;
                Session::setSession(ADD_ERROR, "Add Category Error!");
                Util::redirect("manage-category.php");
                break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS, "Add Category Success!");
                Util::redirect("manage-category.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation', "Validation Error");
                Session::setSession('old', $_POST);
                Session::setSession('errors', serialize($di->get('category')->getValidator()->errors()));
                Util::redirect("add-category.php");
            break;
        }
    }
    else
    {
        Session::setSession("csrf", "CSRF ERROR");
        Util::redirect("manage-category.php");
    }
}

if(isset($_POST['editCategory']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('category')->update($_POST,$_POST['category_id']);
        //Util::dd($_POST);
        switch($result)
        {
            case UPDATE_ERROR:
                Session::setSession(UPDATE_ERROR,"Update Catgeory Error!");
                Util::redirect("manage-category.php");
            break;
            case UPDATE_SUCCESS:
                Session::setSession(UPDATE_SUCCESS,"Update Category Success!");
                Util::redirect("manage-category.php");
            break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors', serialize($di->get('category')->getValidator()->errors()));
                Util::redirect("manage-category.php");
            break;
        }
    }
    else{
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-category.php"); //Need to change,actualy we will be redirecting to error page, indicating unauthorized access
    }
} 

if(isset($_POST['deleteCategory']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('category')->delete($_POST['record_id']);
        switch($result)
        {
            case DELETE_ERROR:
                Session::setSession(DELETE_ERROR,"Delete Category Error!");
                Util::redirect("manage-category.php");
            break;
            case DELETE_SUCCESS:
                Session::setSession(DELETE_SUCCESS,"Delete Category Success!");
                Util::redirect("manage-category.php");
            break;
        }
    }
    else{
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-category.php"); //Need to change,actualy we will be redirecting to error page, indicating unauthorized access
    }
}
//  ROUTING ENDS FOR ADDING A CATEGORY

/*-------------------------------------------------------- CUSTOMER ------------------------------------------------- */

if(isset($_POST['add_customer']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result  = $di->get('customer')->addCustomer($_POST);
        switch($result)
        {
            case ADD_ERROR;
                Session::setSession(ADD_ERROR, "Add Customer Error!");
                Util::redirect("manage-customers.php");
                break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS, "Add Customer Success!");
                Util::redirect("manage-customers.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation', "Validation Error");
                Session::setSession('old', $_POST);
                Session::setSession('errors', serialize($di->get('customer')->getValidator()->errors()));
                Util::redirect("add-customer.php");
            break;
        }
    }
    else
    {
        Session::setSession("csrf", "CSRF ERROR");
        Util::redirect("manage-customers.php");
    }
}

if(isset($_POST['editCustomer']))
{
    // Util::dd($_POST);
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('customer')->update($_POST,$_POST['customer_id']);
        switch($result)
        {
            case UPDATE_ERROR:
                Session::setSession(UPDATE_ERROR,"Update Customer Error!");
                Util::redirect("manage-customers.php");
            break;
            case UPDATE_SUCCESS:
                Session::setSession(UPDATE_SUCCESS,"Update Customer Success!");
                Util::redirect("manage-customers.php");
            break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors', serialize($di->get('customer')->getValidator()->errors()));
                // Util::dd($_POST);
                Util::redirect("edit-customer.php?id={$_POST['customer_id']}");
            break;
        }
    }
    else{
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-customers.php"); //Need to change,actualy we will be redirecting to error page, indicating unauthorized access
    }  
}

if(isset($_POST['deleteCustomer']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('customer')->delete($_POST['record_id']);
        switch($result)
        {
            case DELETE_ERROR:
                Session::setSession(DELETE_ERROR,"Delete Customer Error!");
                Util::redirect("manage-customers.php");
            break;
            case DELETE_SUCCESS:
                Session::setSession(DELETE_SUCCESS,"Delete Customer Success!");
                Util::redirect("manage-customers.php");
            break;
        }
    }
    else{
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-customers.php"); //Need to change,actualy we will be redirecting to error page, indicating unauthorized access
    }
}

//ROUTING ENDS FOR CUSTOMERS

/*-------------------------------------------------------- SUPPLIER ------------------------------------------------- */

if(isset($_POST['add_supplier']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result  = $di->get('supplier')->addSupplier($_POST);
        switch($result)
        {
            case ADD_ERROR;
                Session::setSession(ADD_ERROR, "Add Supplier Error!");
                Util::redirect("manage-suppliers.php");
                break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS, "Add Supplier Success!");
                Util::redirect("manage-suppliers.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation', "Validation Error");
                Session::setSession('old', $_POST);
                Session::setSession('errors', serialize($di->get('supplier')->getValidator()->errors()));
                Util::redirect("add-supplier.php");
            break;
        }
    }
    else
    {
        Session::setSession("csrf", "CSRF ERROR");
        Util::redirect("manage-suppliers.php");
    }
}

if(isset($_POST['editSupplier']))
{
    // Util::dd($_POST);
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('supplier')->update($_POST,$_POST['supplier_id']);
        switch($result)
        {
            case UPDATE_ERROR:
                Session::setSession(UPDATE_ERROR,"Update Supplier Error!");
                Util::redirect("manage-suppliers.php");
            break;
            case UPDATE_SUCCESS:
                Session::setSession(UPDATE_SUCCESS,"Update Supplier Success!");
                Util::redirect("manage-suppliers.php");
            break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors', serialize($di->get('supplier')->getValidator()->errors()));
                Util::redirect("edit-supplier.php?id={$_POST['supplier_id']}");
            break;
        }
    }
    else{
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-suppliers.php"); //Need to change,actualy we will be redirecting to error page, indicating unauthorized access
    }  
}

if(isset($_POST['deleteSupplier']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('supplier')->delete($_POST['record_id']);
        switch($result)
        {
            case DELETE_ERROR:
                Session::setSession(DELETE_ERROR,"Delete Supplier Error!");
                Util::redirect("manage-suppliers.php");
            break;
            case DELETE_SUCCESS:
                Session::setSession(DELETE_SUCCESS,"Delete Supplier Success!");
                Util::redirect("manage-suppliers.php");
            break;
        }
    }
    else{
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-suppliers.php"); //Need to change,actualy we will be redirecting to error page, indicating unauthorized access
    }
}

//ROUTING ENDS FOR SUPPLIERS

/*-------------------------------------------------------- PRODUCT ------------------------------------------------- */

if(isset($_POST['add_product']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        $result  = $di->get('product')->addProduct($_POST);
        switch($result)
        {
            case ADD_ERROR;
                Session::setSession(ADD_ERROR, "Add Product Error!");
                // Util::dd("ERROR");
                Util::redirect("manage-product.php");
                break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS, "Add Product Success!");
                Util::redirect("manage-product.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation', "Validation Error");
                Session::setSession('old', $_POST);
                Session::setSession('errors', serialize($di->get('product')->getValidator()->errors()));
                Util::redirect("add-product.php");
            break;
        }
    }
    else
    {
        Session::setSession("csrf", "CSRF ERROR");
        Util::redirect("manage-product.php");
    }
}

if(isset($_POST['editProduct']))
{
    // Util::dd($_POST);
    if(Util::verifyCSRFToken($_POST))
    {
        $result = $di->get('product')->update($_POST,$_POST['product_id']);
        switch($result)
        {
            case UPDATE_ERROR:
                Session::setSession(UPDATE_ERROR,"Update Product Error!");
                Util::redirect("manage-product.php");
            break;
            case UPDATE_SUCCESS:
                Session::setSession(UPDATE_SUCCESS,"Update Product Success!");
                Util::redirect("manage-product.php");
            break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors', serialize($di->get('product')->getValidator()->errors()));
                Util::redirect("edit-product.php?id={$_POST['product_id']}");
            break;
        }
    }
    else{
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-product.php"); //Need to change,actualy we will be redirecting to error page, indicating unauthorized access
    }  
}

/*-------------------------------------------------------- COMBINED ------------------------------------------------- */

//ROUTING STARTS FOR MODAL EDIT CATEGORY NAME
if(isset($_POST['fetch']))
{
    if($_POST['fetch']=='category')
    {
        $category_id = $_POST['category_id'];
        $result = $di->get('category')->getCategoryByID($category_id, PDO::FETCH_ASSOC);
        //Util::dd($result);
        echo json_encode($result[0]);
    }
}


//ENDED ROUTING  FOR MODAL EDIT CATEGORY NAME



if(isset($_POST['page']))
{
    // Util::dd('FETCHED');
    $dependency = "";
    if($_POST['page'] == 'manage-category')
    {
        $dependency = "category";
    }
    elseif($_POST['page'] == 'manage-customers')
    {
        $dependency = "customer";
    }
    elseif($_POST['page'] == 'manage-suppliers')
    {
        $dependency = "supplier";
    }
    elseif($_POST['page'] == 'manage-product')
    {
        $dependency = "product";
    }
    $search_parameter = $_POST['search']['value'] ?? null;
    $order_by = $_POST['order'] ?? null;
    $start = $_POST['start'];
    $length = $_POST['length'];
    $draw = $_POST['draw'];
    $di->get($dependency)->getJSONDataForDataTable($draw,$search_parameter,$order_by,$start,$length);
}

if(isset($_POST['getCategories'])) {
    echo json_encode($di->get('category')->all());
}

if(isset($_POST['getProductsByCategoryID'])) {
    $category_id = $_POST['categoryID'];
    echo json_encode($di->get('product')->getProductsByCategoryID($category_id));
}

if(isset($_POST['getSellingPriceFromProductID'])) {
    $product_id = $_POST['productID'];
    echo json_encode($di->get('product')->getSellingPriceFromProductID($product_id));
}