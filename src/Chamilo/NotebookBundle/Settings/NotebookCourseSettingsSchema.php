<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\NotebookBundle\Settings;

use Sylius\Bundle\SettingsBundle\Schema\SchemaInterface;
use Sylius\Bundle\SettingsBundle\Schema\SettingsBuilderInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class NotebookCourseSettingsSchema
 * Settings for a notebook inside a course
 * @package Chamilo\NotebookBundle\Settings
 */
class NotebookCourseSettingsSchema implements SchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildSettings(SettingsBuilderInterface $builder)
    {
        $builder
            ->setDefaults(
                array(
                    'enabled' => 'true',
                )
            )
            ->setAllowedTypes(
                array(
                    'enabled' => array('string'),
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder)
    {
        $builder
            ->add('enabled', 'yes_no');
    }
}
