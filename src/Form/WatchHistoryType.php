<?php

namespace App\Form;

use App\Entity\Media;
use App\Entity\User;
use App\Entity\WatchHistory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WatchHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastWatchedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('numberOfViews')
            ->add('watcher', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('media', EntityType::class, [
                'class' => Media::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WatchHistory::class,
        ]);
    }
}
