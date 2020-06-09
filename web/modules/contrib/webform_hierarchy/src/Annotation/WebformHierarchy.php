<?php

namespace Drupal\webform_hierarchy\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a webform hierarchy annotation object.
 *
 * @Annotation
 */
class WebformHierarchy extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the hierarchy.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label = '';

  /**
   * The description of the hierarchy.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $description = '';

  /**
   * An list of widgets.
   *
   * @var array
   */
  public $widgets = [];

}
