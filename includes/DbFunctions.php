<?php
    class DbFunctions{

        private $conn;

        public function __construct(){

            require_once 'DbConfig.php';
            $database = new DbConfig();
            $this->conn = $database->DB_CONNECT();

        }

        //feed Customer
        public function feed_customer(){

              $sql = "SELECT * FROM customers";
               $stmt = $this->conn->prepare($sql);
               $stmt->execute(array());
               $result = $stmt->fetchAll();

                   $output = "";
                   foreach($result as $key){
                      $output .='<option value="'.$key['customer_id'].'">'.'Customer ID:'.$key['customer_id'].' ' .$key['lastname'].', '.$key['firstname'].'</option>';
                   }
                   return $output;
               return $result;
           }

        //get all invoice
        public function get_all_invoice(){

          $SQL = "SELECT * FROM invoice";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute(array());
          $result = $stmt->fetchAll();
          return $result;
        }

        //add products
        public function add_new_product_stocks($code,$product_description,$cost,$price,$total_cost,$stocks){

            $SQL = "INSERT INTO products (code, product_description, cost, price, total_cost, stocks)VALUES(?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($code,$product_description,$cost,$price,$total_cost,$stocks));
            $result = $stmt->fetch();
            return $result;
        }
        //check products if exist
        public function check_product_if_exist($product_description){

          $SQL = "SELECT * FROM products WHERE product_description = ?";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute(array($product_description));
          $result = $stmt->fetch();
          return $result;
        }

        //generate product code
        public function generate_product_code(){

          $sql = "SELECT * FROM products";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(array());
          $result = $stmt->rowCount();
          return $result;
        }

        //get single proucts
        public function get_single_products($id){

          $SQL = "SELECT * FROM products WHERE id = ?";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute(array($id));
          $result = $stmt->fetch();
          return $result;
        }

        //edit products
        public function editProducts($id,$product_description,$cost,$price,$total_cost,$stocks){

          $SQL = "UPDATE products SET product_description = ?, cost = ?, price = ?, total_cost = ?, stocks = ? WHERE id = ? ";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute(array($product_description,$cost,$price,$total_cost,$stocks,$id));
          $result = $stmt->fetch();
          return $result;
        }

        //Delete Single Products
        public function delete_single_products($id){

          $SQL = "DELETE FROM products WHERE id = ?";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute(array($id));
          $result = $stmt->fetch();
          return $result;
        }

        /**
         * User Login
         */
        public function user_login($username, $password, $user_type){

            $SQL = "SELECT * FROM user WHERE username = ? AND password = ? AND user_type = ? ";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($username,$password,$user_type));
            $result = $stmt->fetch();
            return $result;
        }

        /**
        * get all products
        **/
        public function get_all_products(){

            $SQL = "SELECT * FROM products";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;

        }

        /**
        * get single products for adding into billing area
        **/
        public function get_single_item_for_billing_area($id){

            $SQL = "SELECT * FROM products WHERE id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($id));
            $result = $stmt->fetch();
            return $result;
        }

        /**
        * Insert into cart
        **/
        public function addCart($product_id,$product_description,$qty,$price,$total){

            $SQL = "INSERT INTO cart (product_id,product_description, qty, price, total)VALUES(?,?,?,?,?)";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($product_id,$product_description,$qty,$price,$total));
            $result = $stmt->fetch();
            return $result;
        }


        /**
        * get all cart
        **/
        public function get_all_cart(){

            $SQL = "SELECT * FROM cart";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        /**
        * get total in cart
        **/
        public function get_total_in_cart(){

            $SQL = "SELECT sum(total) FROM cart";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array());
            $result = $stmt->fetch();
            $total = $result["sum(total)"];
            return $total;

        }

        /**
        * Insert into sales
        **/
        public function insert_sales($invoice_no,$product_description,$qty,$price,$total,$payment_method){

            $SQL = "INSERT INTO sales(invoice_no,product_description,qty,price,total,payment_method,created_at)VALUES(?,?,?,?,?,?,NOW())";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($invoice_no,$product_description,$qty,$price,$total,$payment_method));
            $result = $stmt->fetch();
            return $result;
        }

        //Delete all From Cart
        public function delete_all_cart(){

            $sql = "DELETE FROM cart";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array());
            $result = $stmt->fetch();
            return $result;
        }

        public function get_sales_in_cart(){

            $SQL = "SELECT * FROM cart ";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array());
            $result = $stmt->fetchAll();
            return $result;
        }

        //update status
        public function update_status_ok($status){

            $SQL = "UPDATE sales SET status = 'OK' WHERE status = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($status));
            $result = $stmt->fetch();
            return $result;
        }

        public function update_stocks($id,$stocks){

            $SQL = "UPDATE products SET stocks = ? WHERE id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($stocks,$id));
            $result = $stmt->fetch();
            return $result;
        }

        //display status out of Stock
        public function status_out_of_stock($stocks){


            $SQL = "SELECT * FROM products WHERE ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($stocks));
            $result = $stmt->fetch();
            return $result;
        }

        //insert into invoice
        public function insert_into_invoice($invoice_no,$cash,$total,$change_amount,$user_id){

            $SQL = "INSERT INTO invoice (invoice_no,cash,total,change_amount,user_id,created_at)
                                VALUES(?,?,?,?,?,NOW())";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($invoice_no,$cash,$total,$change_amount,$user_id));
            $result = $stmt->fetch();
            return $result;
        }

        //check invoice no
        public function check_invoice($invoice_no){

            $SQL = "SELECT * FROM invoice WHERE invoice_no = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($invoice_no));
            $result = $stmt->fetch();
            return $result;
        }

        //generate invoice number
        public function generate_invoice_no(){

            $SQL = "SELECT * FROM invoice";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array());
            $result = $stmt->rowCount();
            return $result;
        }

        //Display sales by invoice number
        public function get_sales_by_invoice_number($invoice_number){

            $SQL = "SELECT * FROM sales WHERE invoice_no = ? ";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($invoice_number));
            $result = $stmt->fetchAll();
            return $result;
        }

        //get invoice number, total, cash and change
        public function get_invoice_detail($invoice_number){

            $SQL = "SELECT * FROM invoice WHERE invoice_no = ? ";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($invoice_number));
            $result = $stmt->fetch();
            return $result;
        }

        //Upte Quantity
        public function update_quantity_if_exist($id,$qty,$total){

            $SQL = "UPDATE cart SET qty = ?, total = ? WHERE product_id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($qty,$total,$id));
            $result = $stmt->fetch();
            return $result;
        }

        //get current quantity
        public function get_current_quantity($id){

            $SQL = "SELECT * FROM cart WHERE product_id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($id));
            $result = $stmt->fetch();
            return $result;
        }

        public function check_if_exists($id){

            $SQL = "SELECT * FROM cart WHERE product_id = ? ";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($id));
            $result = $stmt->fetch();
            return $result;
        }


        //get item details fro edit
        public function get_item_details($id){

            $SQL = "SELECT * FROM cart WHERE id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($id));
            $result = $stmt->fetch();
            return $result;
        }

        //delete single items
        public function delete_single_items_in_cart($id){

            $SQL = "DELETE FROM cart WHERE id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($id));
            $result = $stmt->fetch();
            return $result;
        }

        public function update_cart($id,$qty,$total){

            $SQL = "UPDATE cart SET qty = ?, total = ? WHERE id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($qty,$total,$id));
            $result = $stmt->fetch();
            return $result;
        }

        //get current stocks per products
        public function get_current_stock_by_product_id($product_id){

            $SQL = "SELECT * FROM products WHERE id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($product_id));
            $result = $stmt->fetch();
            return $result;
        }

      //update product stock after deletion
        public function update_stock_after_deletion($product_id,$stocks){

            $SQL = "UPDATE products SET stocks = ? WHERE id = ?";
            $stmt = $this->conn->prepare($SQL);
            $stmt->execute(array($stocks,$product_id));
            $result = $stmt->fetch();
            return $result;

        }

        //Daily Sales
        public function daily_sales($key_date){

          $SQL = "SELECT * FROM sales WHERE created_at = ?";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute(array($key_date));
          $result = $stmt->fetchAll();
          return $result;
        }

        //compute daily sales
        public function TotalDailySales($key_date){

          $SQL = "SELECT sum(total) FROM sales WHERE created_at = ?";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute(array($key_date));
          $result = $stmt->fetch();
          $total = $result["sum(total)"];
          return $total;
        }

        public function print_all_products(){
          $SQL = "SELECT * FROM products ORDER BY product_description ASC";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute();
          $result = $stmt->fetchAll();
          return $result;
        }

        public function get_final_cost_overall(){
          $SQL = "SELECT sum(total_cost) FROM products";
          $stmt = $this->conn->prepare($SQL);
          $stmt->execute(array());
          $result = $stmt->fetch();
          $total = $result["sum(total_cost)"];
          return $total;
        }
    }
?>
