<?php

namespace ProductPage\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
* @ORM\Entity
* @ORM\Table(name="product_pages")
* @property integer $category_id
* @property string  $product_name
* @property string  $description1
* @property string  $description2
* @property decimal $price
* @property string  $size
* @property string  $colors
* @property string  $photo1_url
* @property string  $photo2_url
* @property string  $photo3_url
* @property string  $photo4_url
*/
 
class ProductPage implements InputFilterAwareInterface
{

protected $inputFiter;

/**
* @ORM\Id
* @ORM\Column(type="integer");
* @ORM\GeneratedValue(strategy="AUTO")
*/
protected $id;
/**
* @ORM\Column(type="string");
*/
protected $category_id;
/**
* @ORM\Column(type="string");
*/
protected $product_name;
/**
* @ORM\Column(type="string");
*/
protected $description1;
/**
* @ORM\Column(type="string");
*/
protected $description2;
/**
* @ORM\Column(type="decimal");
*/
protected $price;
/**
* @ORM\Column(type="string");
*/
protected $size;
/**
* @ORM\Column(type="string");
*/
protected $colors;
/**
* @ORM\Column(type="string");
*/
protected $photo1_url;
/**
* @ORM\Column(type="string");
*/
protected $photo2_url;
/**
* @ORM\Column(type="string");
*/
protected $photo3_url;
/**
* @ORM\Column(type="string");
*/
protected $photo4_url;

 
   public function __get($property)
   {
     return $this->$property;
   }
 
   public function __set($property, $value)
   {
     $this->$property = $value;
   }
 
   public function getArrayCopy()
   {
      return get_object_vars($this);
   }
 
   public function populate($data = array())
   {
      $this->id              = $data['id'];
      $this->category_id     = $data['category_id'];
      $this->product_name    = $data['product_name'];    
      $this->description1    = $data['description1'];
      $this->description2    = $data['description2'];
      $this->price           = $data['price'];
      $this->size            = $data['size'];
      $this->colors          = $data['colors'];
      $this->photo1_url      = $data['photo1_url'];
      $this->photo2_url      = $data['photo2_url'];
      $this->photo3_url      = $data['photo3_url'];
      $this->photo4_url      = $data['photo4_url'];
   }
 
   public function setInputFilter(InputFilterInterface $inputFilter)
   {
      throw new \Exception("Not used");
   }
 
   public function getInputFilter()
   {
      if (!$this->inputFilter) 
      {
         $inputFilter = new InputFilter();
         $factory = new InputFactory();
 
         $inputFilter->add($factory->createInput(array(
             'name' => 'id',
             'required' => true,
             'filters' => array(
             array(
                 'name' => 'Int'),
             ),
          )));

         $inputFilter->add($factory->createInput(array(
             'name' => 'category_id',
             'required' => true,
          )));

         $inputFilter->add($factory->createInput(array(
             'name' => 'product_name',
             'required' => true,
             'filters' => array(
                 array(
                    'name' => 'StripTags'),
                 array('name' => 
                    'StringTrim'),
             ),
             'validators' => array(
                 array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 40,
                    ),
                ),
            ),
         )));

        $inputFilter->add($factory->createInput(array(
            'name' => 'description1',
            'required' => true,
            'filters' => array(
                array(
                 'name' => 'StripTags'),
                array(
                 'name' => 'StringTrim'),
            ),
           'validators' => array(
                array(
                 'name' => 'StringLength',
                 'options' => array(
                 'encoding' => 'UTF-8',
                 'min' => 1,
                 'max' => 500,
                 ),
               ),
          ),
       )));

        $inputFilter->add($factory->createInput(array(
            'name' => 'description2',
            'required' => true,
            'filters' => array(
                array(
                 'name' => 'StripTags'),
                array(
                 'name' => 'StringTrim'),
            ),
           'validators' => array(
                array(
                 'name' => 'StringLength',
                 'options' => array(
                 'encoding' => 'UTF-8',
                 'min' => 1,
                 'max' => 500,
                 ),
               ),
          ),
       )));
                          
         $inputFilter->add($factory->createInput(array(
             'name' => 'price',
             'required' => true,
             
          ))); 

       $inputFilter->add($factory->createInput(array(
            'name' => 'size',
            'required' => true,
            'filters' => array(
                array(
                 'name' => 'StripTags'),
                array(
                 'name' => 'StringTrim'),
            ),
           'validators' => array(
                array(
                 'name' => 'StringLength',
                 'options' => array(
                 'encoding' => 'UTF-8',
                 'min' => 1,
                 'max' => 100,
                 ),
               ),
          ),
       )));
       $inputFilter->add($factory->createInput(array(
            'name' => 'colors',
            'required' => true,
            'filters' => array(
                array(
                 'name' => 'StripTags'),
                array(
                 'name' => 'StringTrim'),
            ),
           'validators' => array(
                array(
                 'name' => 'StringLength',
                 'options' => array(
                 'encoding' => 'UTF-8',
                 'min' => 1,
                 'max' => 100,
                 ),
               ),
          ),
       )));
       $inputFilter->add($factory->createInput(array(
            'name' => 'photo1_url',
            'required' => false,
       )));
       $inputFilter->add($factory->createInput(array(
            'name' => 'photo2_url',
            'required' => false,
       )));

       $inputFilter->add($factory->createInput(array(
            'name' => 'photo3_url',
            'required' => false,
       )));

       $inputFilter->add($factory->createInput(array(
            'name' => 'photo4_url',
            'required' => false,
       )));
                                            
       

       $this->inputFilter = $inputFilter;
      }
    return $this->inputFilter;
  }
}
?>
