<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $product_name_;

    /**
     * @ORM\Column(type="integer")
     */
    private $product_qte_;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $product_description_;

    /**
     * @ORM\Column(type="float")
     */
    private $product_price_;

    /**
     * @ORM\Column(type="integer")
     */
    private $product_purchase_number_;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $product_img_src_;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $product_created_at_;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name_;
    }

    public function setProductName(?string $product_name_): self
    {
        $this->product_name_ = $product_name_;

        return $this;
    }

    public function getProductQte(): ?int
    {
        return $this->product_qte_;
    }

    public function setProductQte(int $product_qte_): self
    {
        $this->product_qte_ = $product_qte_;

        return $this;
    }


    public function getProductDescription(): ?string
    {
        return $this->product_description_;
    }

    public function setProductDescription(?string $product_description_): self
    {
        $this->product_description_ = $product_description_;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->product_price_;
    }

    public function setProductPrice(?float $product_price_): self
    {
        $this->product_price_ = $product_price_;

        return $this;
    }

    public function getProductPurchaseNumber(): ?int
    {
        return $this->product_purchase_number_;
    }

    public function setProductPurchaseNumber(?int $product_purchase_number_): self
    {
        $this->product_purchase_number_ = $product_purchase_number_;

        return $this;
    }


    public function getProductImgSrc(): ?string
    {
        return $this->product_img_src_;
    }

    public function setProductImgSrc(?string $product_img_src_): self
    {
        $this->product_img_src_ = $product_img_src_;

        return $this;
    }

    public function getProductCreatedAt(): ?string
    {
        return $this->product_created_at_;
    }

    public function setProductCreatedAt(?string $product_created_at_): self
    {
        $this->product_created_at_ = $product_created_at_;

        return $this;
    }


    /* --js
    var s = "Mon Dec 24 2018 19:05:53 GMT+0100 (heure normale d’Europe centrale)";
    var d= new Date(s);
    */

    
}
