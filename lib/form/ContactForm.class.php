<?php

class ProductForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormInput(),
      'description'   => new sfWidgetFormInput(),
    ));
  }
}