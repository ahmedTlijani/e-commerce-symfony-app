<?php

namespace App\Controller;

use App\Entity\Product;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\form;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }

    // save product if exist

    /**
     * @Route("/product/save")
     */
    public function add_product()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        $product= new Product();
        $product-> setProductName("Product 3");
        $product-> setProductQte(100);

         // tell Doctrine you want to (eventually) save the Product (no queries yet)
         $entityManager->persist($product);

         // actually executes the queries (i.e. the INSERT query)
         $entityManager->flush();
 
         return new Response('Saved new product with id '.$product->getId());
    }

    // new product 

    /**
     * @Route("/product/new")
     * Method({"POST"})
     */
    public function new_product(Request $request)
    {
        $new_p = new Product();
        //get post values from keys
        $product_name = $request->request->get("product_name");
        $product_qte = $request->request->get("product_qte");
        $product_description= $request->request->get("product_description");
        $product_price= $request->request->get("product_price");
        $product_purchas_number= $request->request->get("product_purchase_number");
        $product_img_src= $request->request->get("product_img_src");
        $product_created_at= $request->request->get("product_created_at");


        $new_p-> setProductName($product_name);
        $new_p-> setProductQte($product_qte);
        $new_p-> setProductDescription($product_description);
        $new_p-> setProductPrice($product_price);
        $new_p-> setProductPurchaseNumber($product_purchas_number);
        $new_p-> setProductImgSrc($product_img_src);
        $new_p-> setProductCreatedAt($product_created_at);
        
        //save to database
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($new_p);
        $entityManager->flush();
        //https://stackoverflow.com/questions/51821263/doctrine-how-to-check-if-flush-is-successful

   return new Response(); // if no exception thrown the insert is done
 
   }

    // shwp product by id

    /**
     * @Route("/product/get/{id}", name="product_show")
     */
    public function show_product($id)
    {
        $product_info = $this->getDoctrine()->getRepository(Product::class)->find($id);

        if (!$product_info) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //return new Response('Check out this great product: '.$product_info->getProductName());
        return $this->json(['product_informations'=>[
            'product_id' => $product_info -> getId(),
            'product_name' => $product_info -> getProductName(),
            'product_qte' => $product_info -> getProductQte(),
            'product_description' => $product_info -> getProductDescription(),
            'product_price' => $product_info -> getProductPrice(),
            'product_purchas_number' => $product_info -> getProductPurchaseNumber(),
            'product_img_src' => $product_info -> getProductImgSrc(),
            'product_created_at' => $product_info -> getProductCreatedAt(),
        ]]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    // fetch all data in product table and entity

    /**
     * @Route("/product/fetchAll", name="show_all")
     */
    public function get_all_products()
    {
        $prodcuts_information = array(); // array to store all data converted
        $temp_array=array(); // temporary array
    
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll(); // data from database using orm Doctrine

        //alternative function till we find solution
        for($i=0;$i<count($products);$i++)
        {
            $temp_array= array(
                'product_id' => $products[$i]-> getId(),
                'product_name' => $products[$i]-> getProductName(),
                'product_qte' => $products[$i]-> getProductQte(),
                'product_description' => $products[$i]-> getProductDescription(),
                'product_price' => $products[$i]-> getProductPrice(),
                'product_purchas_number' => $products[$i]-> getProductPurchaseNumber(),
                'product_img_src' => $products[$i]-> getProductImgSrc(),
                'product_created_at' => $products[$i]-> getProductCreatedAt(),
            );
            array_push($prodcuts_information, $temp_array);
        }

        return $this->json([
            'products' => $prodcuts_information
        ]);
    }

    // delete product by id 

    /**
     * @Route("/product/delete/{id}",name="delete_id")
     */

     public function delete_product($id)
     {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $entityManager->remove($product);
        $entityManager->flush();

        //return new Response('Product '.$product->getId().' deleted');
        return new Response();  // if no exception thrown the udate is done

     }

     //update product with id and arguments 


     /**
      * @Route("/product/edit/{id}")
      * Method({"POST"})
      */
     public function edit_product(Request $request,$id) // all the values of the product to modify is sent by post methode
     {

        //get post values from keys

        $product_name = $request->request->get("product_name");
        $product_qte = $request->request->get("product_qte");
        $product_description= $request->request->get("product_description");
        $product_price= $request->request->get("product_price");
        $product_purchas_number= $request->request->get("product_purchase_number");
        $product_img_src= $request->request->get("product_img_src");
        $product_created_at= $request->request->get("product_created_at");

        
        //setting the doctrine manager to update the querry 

        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product-> setProductName($product_name);
        $product-> setProductQte($product_qte);
        $product-> setProductDescription($product_description);
        $product-> setProductPrice($product_price);
        $product-> setProductPurchaseNumber($product_purchas_number);
        $product-> setProductImgSrc($product_img_src);
        $product-> setProductCreatedAt($product_created_at);


        $entityManager->flush();
       
        return new Response();

        /*
        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
        */

        //return new Response("id: ".$id." name: ".$name." qte=".$qte);

     }


}
