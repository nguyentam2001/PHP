<?php
session_start();
    if(!isset($_SESSION["invoice_import_product"]))
    $_SESSION["invoice_import_product"]=[];
    require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
    require '../invoice/invoice-func.php';
    
    function getNameByID($TableName,$SelectName,$IDName,$CategoryID){
        $database=new Database();
        $database->connect_db();//kết nối database
        $query="SELECT $SelectName From $TableName where $IDName=$CategoryID";
        $data=mysqli_query( $database->conn,$query);
        $output="";
        while($row=mysqli_fetch_array($data)){
            $output = $row[0];
        }
         $database->close_db();//ngắt kết nối database
        return $output;
       
    }
        if(isset($_POST["addProductInvoice"])&&$_POST["addProductInvoice"]&&$_SERVER["REQUEST_METHOD"] == "POST"){
         //Lưu này tháng tạo vào session
         $_SESSION["invoiceImportDate"]=$_POST["DateCreate"];
          //Lưu  nhà cung cấp được chọn vào session
         $_SESSION["invoiceImportManufacture"]= $_POST["ManufactureSelelted"];   
         //Lưu  nhà nhân viên được chọn vào session
         $_SESSION["invoiceImportEmployee"]= $_POST["EmployeeSelected"];
        $CategoryID=$_POST["CategorySelected"];
        //get category name;
        $CategoryName=getNameByID("category","CategoryName","CategoryID",$CategoryID);
        $ProductID=$_POST["ProductSelected"];
        $ProductName= getNameByID("product","ProductName","ProductID",$ProductID);
        $TotalImport= (empty( $_POST["TotalImport"]))?0: $_POST["TotalImport"];//kiểm tra xem có empty không
        $PriceImport=(empty( $_POST["PriceImport"]))?0:$_POST["PriceImport"];
        //Xử lý dữ kiện nếu mã sản phẩm đã tồn tại trong hóa đơn thì cộng tổng sản phẩm 
        $flag=false;
        for($i=0;$i<sizeof($_SESSION["invoice_import_product"]);$i++){
            if($_SESSION["invoice_import_product"][$i]["ProductID"]==$ProductID&&$_SESSION["invoice_import_product"][$i]["CategoryID"]==$CategoryID){
                $_SESSION["invoice_import_product"][$i]["TotalImport"]= (int)( $_SESSION["invoice_import_product"][$i]["TotalImport"])+(int)($TotalImport);
                $_SESSION["invoice_import_product"][$i]["PriceImport"]= $PriceImport;
                $flag=true;
            }
        }
        if(!$flag){
            $ProductOder=["CategoryName"=>$CategoryName, "CategoryID"=>$CategoryID,"ProductName"=> $ProductName, "ProductID"=>$ProductID, "TotalImport"=>$TotalImport, "PriceImport"=>$PriceImport];
            $_SESSION["invoice_import_product"][]=$ProductOder;
        }
        header('Location: /ntstore/page/invoice-import-detail.php?invoice-import=add');
    }
    if(isset($_POST["addInvoiceImport"])&&$_POST["addInvoiceImport"]){
       
        $InvoiceName="Hóa đơn nhập hàng";
        $DateCreate=$_POST["DateCreate"];
        $EmployeeID=$_POST["EmployeeSelected"];
        $ManufactureID=$_POST["ManufactureSelelted"];
        $lastId=insertImportInvoice( $InvoiceName,$DateCreate, $EmployeeID, $ManufactureID);

        //Thêm vào bảng sinh từ bảng hóa đơn và sản phẩm (import_invoice_product)
        for ($i=0; $i <sizeof($_SESSION["invoice_import_product"])  ; $i++) { 
            $InvoiceID=$lastId;
            $ProductID=$_SESSION["invoice_import_product"][$i]["ProductID"];
            $TotalImport=$_SESSION["invoice_import_product"][$i]["TotalImport"];
            $PriceImport=$_SESSION["invoice_import_product"][$i]["PriceImport"];
            insertImportInvoiceProduct($InvoiceID,$ProductID, $TotalImport,$PriceImport);
        }

        //reset lại session
        header("Location:/ntstore/page/invoice.php");
        session_destroy();

    }
    if (isset($_POST["cancelInvoiceImport"]) &&$_POST["cancelInvoiceImport"]){
         //reset lại session
         header("Location:/ntstore/page/invoice.php");
         session_destroy();
    }
    ?>