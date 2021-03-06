<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\CourseBundle\Settings;

use Sylius\Bundle\SettingsBundle\Schema\SchemaInterface;
use Sylius\Bundle\SettingsBundle\Schema\SettingsBuilderInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class UserCourseSettingsSchema
 * @package Chamilo\CourseBundle\Settings
 */
class UserCourseSettingsSchema implements SchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildSettings(SettingsBuilderInterface $builder)
    {
        $builder
            ->setDefaults(array(
                'enabled' => '',
                'allow_user_view_user_list' => '',
            ))
            ->setAllowedTypes(array(
                'enabled' => array('string'),
                'allow_user_view_user_list' => array('string'),
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder)
    {
        $builder
            ->add('enabled', 'yes_no')
            ->add('allow_user_view_user_list', 'yes_no')
        ;
    }
}
