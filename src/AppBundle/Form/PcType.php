<?php

namespace AppBundle\Form;

use AppBundle\Entity\GraphicsCard;
use AppBundle\Entity\Processor;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PcType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('model', TextType::class)
            ->add('processor', EntityType::class, [
                'class' => Processor::class
            ])
            ->add('ram', IntegerType::class)
            ->add('graphicsCard', EntityType::class, [
                'class' => GraphicsCard::class
            ])
            ->add('diskSpace', TextType::class)
            ->add('system', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pc'
        ));
    }

    public function getName()
    {
        return 'app_bundle_pc_type';
    }
}
