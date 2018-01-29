<?php

/**
 * @file
 * Contains \Drupal\paragraph_types\Form\d8dwParagraphsAdminSettingsForm.
 */

namespace Drupal\d8dw_paragraphs\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\PluginFormInterface;
use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configures wondrous_paragraphs settings for this site.
 */
class d8dwParagraphsAdminSettingsForm extends ConfigFormBase {

  /**
   * The instantiated plugin instances that have configuration forms.
   *
   * @var \Drupal\Core\Plugin\PluginFormInterface[]
   */
  protected $configurableInstances = array();


  /**
   * Constructs a \Drupal\wondrous_paragraphs\SettingsForm object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    parent::__construct($config_factory);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'd8dw_paragraphs_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['d8dw_paragraphs.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('d8dw_paragraphs.settings');

    $form['load_gallery_assets'] = array(
      '#title' => t('Load gallery assets'),
      '#type' => 'checkbox',
      '#default_value' => $config->get('load_gallery_assets'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $values = $form_state->getValues();
    $this
      ->config('d8dw_paragraphs.settings')
      ->set('load_gallery_assets', $values['load_gallery_assets'])
      ->save();
  }

}