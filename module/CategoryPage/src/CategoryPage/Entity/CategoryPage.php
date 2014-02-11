<?php

namespace CategoryPage\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
* @ORM\Entity
* @ORM\Table(name="categories")
* @property string $category
* @property string $category_display
*/
 
class CategoryPage implements InputFilterAwareInterface
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
protected $category;
/**
* @ORM\Column(type="string");
*/
protected $category_display;

 
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
      $this->id               = $data['id'];
      $this->category         = $data['category'];
      $this->category_display = $data['category_display'];
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
            'name' => 'category',
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
                 'max' => 40,
                 ),
               ),
          ),
       )));
       
       $inputFilter->add($factory->createInput(array(
            'name' => 'category_display',
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
                 'max' => 40,
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
