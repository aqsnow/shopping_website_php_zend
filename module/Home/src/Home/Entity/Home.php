<?php

namespace Home\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
* @ORM\Entity
* @ORM\Table(name="home")
* @property string  $type
* @property string  $photo_url
* @property integer $item_id
* @property string  $alt_text
* @property string  $title
* @property string  $description1
* @property string  $description2
* @property decimal $price
*/
 
class Home implements InputFilterAwareInterface
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
protected $type;
/**
* @ORM\Column(type="string");
*/
protected $photo_url;
/**
* @ORM\Column(type="integer");
*/
protected $item_id;
/**
* @ORM\Column(type="string");
*/
protected $alt_text;
/**
* @ORM\Column(type="string");
*/
protected $title;
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
      $this->id           = $data['id'];
      $this->type         = $data['type'];    
      $this->photo_url    = $data['photo_url'];
      $this->item_id      = $data['item_id'];
      $this->alt_text     = $data['alt_text'];
      $this->title        = $data['title'];
      $this->description1 = $data['description1'];
      $this->description2 = $data['description2'];
      $this->price        = $data['price'];
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
            'name' => 'photo_url',
            'required' => true,
       )));
 
         $inputFilter->add($factory->createInput(array(
             'name' => 'item_id',
             'required' => true,
             'filters' => array(
             array(
                 'name' => 'Int'),
             ),
          )));
 
        $inputFilter->add($factory->createInput(array(
            'name' => 'title',
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
            'name' => 'description1',
            'required' => false,
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
            'name' => 'description2',
            'required' => false,
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
             'name' => 'price',
             'required' => false,
          )));

       $inputFilter->add($factory->createInput(array(
            'name' => 'type',
            'required' => false,
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
            

       $this->inputFilter = $inputFilter;
      }
    return $this->inputFilter;
  }
}
?>
