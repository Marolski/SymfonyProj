<?php
// src/Controller/ProductController.php
namespace App\Controller;

// ...
use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductsController extends AbstractController
{
    /**
    * @Route("/", name="product_list")
    * @Method({"GET"})
    */
    public function index() {
        // return new Response('<html><body>Hello</body><html>');

        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('products/index.html.twig', array(
            'products' => $products
        ));
    }
    /**
    * @Route("/product/new", name="new_product")
    * @Method({"GET", "POST"})
    */
    public function new(Request $request) {
            $product = new Product();

            $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('price', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('count', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('ProcentDiscount', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('soldOut', CheckboxType::class, array('required' => false,'attr' => array('class' => 'custom-control custom-checkbox')))
            ->add('Discount', CheckboxType::class, array('required' => false,'attr' => array('class' => 'custom-control custom-checkbox')))
            ->add('NeedProduct', CheckboxType::class, array('required' => false,'attr' => array('class' => 'custom-control custom-checkbox')))
            ->add('save', SubmitType::class, array('label' => 'Create', 'attr' => array('class' => 'form-control')))->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $product = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($product);
                $entityManager->flush();

                return $this->redirectToRoute('product_list');
            }

            return $this->render('/products/new.html.twig', array(
                'form' => $form->createView()
            ));
        }
}