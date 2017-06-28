<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', TextType::class, array('label' => 'N°'))
            ->add('totalpriceHT', MoneyType::class , array('label' => 'Prix total HT'))
            ->add('totalpriceTTC', MoneyType::class , array('label' => 'Prix total TTC'))
            ->add('customerId', EntityType::class, array('class' => 'AppBundle:Customer', 'choice_label' => 'name', 'label' => 'Nom du client'))
            ->add('vatId', EntityType::class, array('class' => 'AppBundle:Vat', 'choice_label' => 'name', 'label' => 'TVA'))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer'))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Invoice'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_invoice';
    }


}
