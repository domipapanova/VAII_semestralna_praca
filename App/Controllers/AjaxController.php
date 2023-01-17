<?php

namespace App\Controllers;

use App\Models\Product;

class AjaxController
{

    //src = W3Schools
    function search()
    {
        // $xmlDoc=new DOMDocument();
        // $xmlDoc->load("links.xml");

        //$x=$xmlDoc->getElementsByTagName('link');

        $products = Product::getAll();
        $product_names = array();
        foreach ($product_names as $product_name) {
            $product_names[] = $product_name->getProductName();
        }
//get the q parameter from URL
        $q = $_GET["q"];

//lookup all links from the xml file if length of q>0
        if (strlen($q) > 0) {
            $hint = "";
            $x = strlen($q);
            $q = strtolower($q);

            foreach ($product_names as $product) {
                //find a link matching the search text
                if (stristr(substr($product, 0, $x), $q)) {
                    if ($hint == "") {
                        $hint = $product;

                    } else {
                        $hint = $hint . $product;
                    }

                }
            }
        }

// Set output to "no suggestion" if no hint was found
// or to the correct values
        if ($hint == "") {
            $hint = "Nenašli sa žiadne položky";
        }

    }

}