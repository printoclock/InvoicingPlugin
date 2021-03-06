<?php

declare(strict_types=1);

namespace Sylius\InvoicingPlugin\Form\Type;

use Sylius\Bundle\AddressingBundle\Form\Type\CountryCodeChoiceType;
use Sylius\InvoicingPlugin\Entity\ShopBillingData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ShopBillingDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('taxId', TextType::class, [
                'label' => 'sylius_invoicing_plugin.ui.tax_id',
                'required' => false,
            ])
            ->add('company', TextType::class, [
                'required' => false,
                'label' => 'sylius.form.address.company',
            ])
            ->add('countryCode', CountryCodeChoiceType::class, [
                'label' => 'sylius.form.address.country',
                'enabled' => true,
            ])
            ->add('street', TextType::class, [
                'label' => 'sylius.form.address.street',
            ])
            ->add('city', TextType::class, [
                'label' => 'sylius.form.address.city',
            ])
            ->add('postcode', TextType::class, [
                'label' => 'sylius.form.address.postcode',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', ShopBillingData::class);
    }
}
