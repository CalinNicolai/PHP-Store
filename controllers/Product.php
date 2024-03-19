<?php

    namespace controllers;

    class Product
    {
        private $connect;
        private array $get;
        private array $post;

        function __construct(
            $connect,
            array $get,
            array $post
        )
        {

            $this->connect = $connect;
            $this->get = $get;
            $this->post = $post;


            if ($get["id"] ?? 0) {
                echo "Create";
                $this->create();
            } elseif ($get["update"] ?? 0) {
                $this->update($get["update"]);
            } elseif ($get['delete'] ?? 0) {
                $this->delete($get["delete"]);
            }

            //
        }

        function getAll(): array
        {

            $sql = "SELECT * FROM products";
            $result = $this->connect->query($sql);

            $products = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
            }

            return $products;
        }

        function getOne(int $id)
        {

        }

        public function deleteProduct($productId)
        {
            echo " Deleting ";
            $query = "DELETE FROM products WHERE id = $productId";

            if ($this->connect->query($query) === TRUE) {
                echo "Product deleted successfully";
            } else {
                echo "Error adding product: " . $this->connect->error;
            }
        }

        public function addProduct($data)
        {
            echo "Adding";
            $category = $data['category'];
            $name = $data['name'];
            $price = $data['price'];
            $description = $data['description'];
            $image = $data['image'];

            $query = "INSERT INTO products (category, name, price, description, image) 
                  VALUES ('$category', '$name', $price, '$description', '$image')";

            if ($this->connect->query($query) === TRUE) {
                echo "Product added successfully";
            } else {
                echo "Error adding product: " . $this->connect->error;
            }
        }


        public function updateProduct($data)
        {
            $id = $data['id'];
            $category = $data['category'];
            $name = $data['name'];
            $price = $data['price'];
            $description = $data['description'];
            $image = $data['image'];

            $query = "UPDATE products 
                  SET category='$category', name='$name', price=$price, description='$description', image='$image' 
                  WHERE id=$id";

            if ($this->connect->query($query) === TRUE) {
                echo "Product updated successfully";
            } else {
                echo "Error updating product: " . $this->connect->error;
            }
        }

        public function printHtml()
        {
            $products = $this->getAll();
            include(__DIR__ . '/../views/products/Products.php');
        }

        public function admin()
        {
            $products = $this->getAll();
            include(__DIR__ . '/../views/products/Admin.php');
        }
    }